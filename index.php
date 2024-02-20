<?php
session_start();
ob_start();
?>

<div class="container-fluid">
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

        <?php if (isset($_SESSION["alert"])) {
            echo $_SESSION["alert"];
            unset($_SESSION["alert"]);
        }
        ?>

    </div>
</div>

<script>
    if (document.title != "Ajout Produit") {
        document.title = "Ajout Produit";
    }
</script>

<?php
$content = ob_get_clean();

require_once "template.php";
?>