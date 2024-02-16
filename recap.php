<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <ul class="nav bg-dark">
        <li class="nav-item">
            <a href="index.php" class="nav-link text-light" aria-current="page">Ajout</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link active text-light">Récap</a>
        </li>
    </ul>

    <?php
    if (!isset($_SESSION["products"]) || empty($_SESSION["products"])) {
        echo "<p>Aucun produit en session...</p>";
    } else { ?>
        <table class="table table-striped table-bordered text-center">
            <caption class="text-center">Liste de produits</caption>
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $qtt_sum = 0;
                $totalGeneral = 0;
                foreach ($_SESSION["products"] as $index => $product) { ?>
                    <tr>
                        <td>
                            <?php echo $index ?>
                        </td>
                        <td>
                            <?php echo $product["name"] ?>
                        </td>
                        <td>
                            <?php echo number_format($product["price"], 2, ",", "&nbsp;") ?> &nbsp;€
                        </td>
                        <td>
                            <a href="traitement.php?action=down-qtt&decrease=<?= $product["qtt"] ?>"
                                class="link-dark text-decoration-none">-</a>
                            <?php echo $product["qtt"] ?>
                            <a href="traitement.php?action=up-qtt&add=<?= $product["qtt"] ?>"
                                class="link-dark text-decoration-none">+</a>
                        </td>
                        <td>
                            <?php echo number_format($product["total"], 2, ",", "&nbsp;") ?> &nbsp;€
                        </td>
                        <td>
                            <a href="traitement.php?action=delete&id=<?= $index ?>" class="btn btn-outline-danger"
                                onclick="deleteAlert()">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                    $qtt_sum += $product["qtt"];
                    $totalGeneral += $product["total"];
                }
                ?>
                <tr>
                    <th colspan=3>Total général : </th>
                    <td><strong>
                            <?php echo number_format($qtt_sum) ?>
                        </strong>
                    </td>
                    <td><strong>
                            <?php echo number_format($totalGeneral, 2, ",", "&nbsp;") ?> &nbsp;€
                        </strong>
                    </td>
                    <td>
                        <form method="POST" action="traitement.php?action=clear"><button class="btn btn-outline-danger"
                                name="clear" onclick="clearAlert()">Effacer</button></form>
                    </td>
                </tr>
            </tbody>
            <?php
    }
    ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>


        <script>function clearAlert() {
                alert('Panier effacé');
            }

            function deleteAlert() {
                alert("Produit supprimé");
            }
        </script>

</body>

</html>