<?php
session_start();
ob_start();
?>

<div class="container-fluid">
    <div class="col align-self-center">

        <h1 class="mt-2">Ajouter un produit</h1>
        <form action="traitement.php?action=add" method="POST" autocomplete="off" enctype="multipart/form-data"
            class="mb-3 mx-auto">
            <p>
                <label class="form-label">
                    Nom du produit :
                    <input type="text" name="name" class="form-control">
                </label>
            </p>
            <p>
                <label class="form-label">
                    Description du produit :
                    <textarea name="desc" class="form-control" rows="3"></textarea>
                </label>
            </p>
            <p>
                <label class="form-label">
                    Prix du produit :
                    <input type="number" step="any" name="price" class="form-control" min="1">
                </label>
            </p>
            <p>
                <label class="form-label">
                    Quantité désirée :
                    <input type="number" name="qtt" value="1" class="form-control">
                </label>
            </p>
            <p>
                <label class="form-label">
                    Image :
                    <input type="file" name="file" class="form-control">
                </label>
            </p>
            <p>
                <input class="btn btn-primary" type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>

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