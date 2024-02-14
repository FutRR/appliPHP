<?php
session_start();

if (isset($_POST["submit"])) {

    if (isset($_GET["action"])) {

        switch ($_GET["action"]) {
            case "add":
                break;
            case "delete":
                unset($_SESSION["products"]);
                break;
            case "clear":
                break;
            case "up-qtt":
                $product["qtt"] += 1;
                break;
            case "down-qtt":
                $product["qtt"] -= 1;
                break;
        }
    }

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    if ($name && $price && $qtt) {

        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price * $qtt
        ];

        $_SESSION["products"][] = $product;

        $_SESSION["valid_post"] = "<div class='alert alert-success w-22' role='alert'>Produit Ajouté!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";

    }
}

header("Location:index.php");