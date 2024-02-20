<?php require_once "function.php" ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Application panier">
    <title>Ajout produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <ul class="nav bg-dark">
        <li class="nav-item">
            <a href="index.php" class="nav-link text-light" aria-current="page">Ajout</a>
        </li>
        <li class="nav-item">
            <a href="recap.php" class="nav-link text-light position-relative">Récap <span
                    class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">
                    <?= afficherCount() ?>
                </span>
            </a>
        </li>
    </ul>

    <?= $content ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>