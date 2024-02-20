<?php
session_start();
ob_start();

if (!isset($_SESSION["products"]) || empty($_SESSION["products"])) {
    echo "<p>Aucun produit en session...</p>";
} else { ?>
    <table class="table table-striped table-bordered text-center">
        <caption class="text-center">Liste de produits</caption>
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Image</th>
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
                    <td class="col-md-2">
                        <img src="./upload/<?= $product['file'] ?>" alt="" class="rounded mx-auto d-block img-fluid">
                    </td>
                    <td>
                        <?php echo number_format($product["price"], 2, ",", "&nbsp;") ?> &nbsp;€
                    </td>
                    <td>
                        <a href="traitement.php?action=down-qtt&id=<?= $index ?>" class="link-dark text-decoration-none">-</a>
                        <?php echo $product["qtt"] ?>
                        <a href="traitement.php?action=up-qtt&id=<?= $index ?>" class="link-dark text-decoration-none">+</a>
                    </td>
                    <td>
                        <?php echo number_format($product["total"], 2, ",", "&nbsp;") ?> &nbsp;€
                    </td>
                    <td>
                        <a href="traitement.php?action=delete&id=<?= $index ?>" class="btn btn-outline-danger">Supprimer</a>
                    </td>
                </tr>
                <?php
                $qtt_sum += $product["qtt"];
                $totalGeneral += $product["total"];
            }
            ?>
            <tr>
                <th colspan=4>Total général : </th>
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
                            name="clear">Effacer</button></form>
                </td>
            </tr>
        </tbody>

        <?php
}

if (isset($_SESSION["alert"])) {
    echo $_SESSION["alert"];
    unset($_SESSION["alert"]);
}
?>

    <script>
        if (document.title != "Récapitulatif des produits") {
            document.title = "Récapitulatif des produits";
        }
    </script>

    <?php
    $content = ob_get_clean();

    require_once "template.php";
    ?>