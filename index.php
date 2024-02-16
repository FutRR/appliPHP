<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <ul class="nav bg-dark">
        <li class="nav-item">
            <a href="#" class="nav-link active text-light" aria-current="page">Ajout</a>
        </li>
        <li class="nav-item">
            <a href="recap.php" class="nav-link text-light">Récap</a>
        </li>
    </ul>

    <div class="container-fluid">
        <div class="row">
            <div class="col align-self-center">

                <h1 class="mt-2">Ajouter un produit</h1>
                <form action="traitement.php?action=add" method="POST" autocomplete="off" class="m-3 mx-auto">
                    <p>
                        <label>
                            Nom du produit :
                            <input type="text" name="name" class="form-control">
                        </label>
                    </p>
                    <p>
                        <label>
                            Prix du produit :
                            <input type="number" step="any" name="price" class="form-control">
                        </label>
                    </p>
                    <p>
                        <label>
                            Quantité désirée :
                            <input type="number" name="qtt" value="1" class="form-control">
                        </label>
                    </p>
                    <p>
                        <input class="btn btn-primary" type="submit" name="submit" value="Ajouter le produit">
                    </p>
                </form>

                <p>Nombre de produits en session :
                    <?php
                    if (!isset($_SESSION["products"]) || empty($_SESSION["products"])) {
                        echo "0";
                    } else {
                        $qtt_sum = 0;
                        foreach ($_SESSION["products"] as $product) {
                            $qtt_sum += $product["qtt"];
                        }
                        echo $qtt_sum;
                    }
                    ?>
                </p>

                <p>
                    <?php
                    if (isset($valid)) {
                        echo $valid;
                    }
                    ?>
                </p>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>