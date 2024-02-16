<?php
session_start();

if (isset($_GET["action"])) {

    switch ($_GET["action"]) {
        case "add":
            if (isset($_POST["submit"])) {

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

                    if (isset($product)) {
                        $valid = "<script>alert('Produit Ajouté');</script>";
                    } else {
                        $error = "<script>alert('Please enter valid fields');</script>";
                    }

                }
            }
            break;

        case "delete":
            if (isset($_POST["delete"])) {
                header("Location:recap.php");
            }
            break;

        case "clear":
            if (isset($_POST["clear"])) {
                unset($_SESSION["products"]);
                header("Location:recap.php");
                $clear = "<script>function clearAlert(){alert('Session cleared');}</script>";
            }
            break;

        case "up-qtt":
            header("Location:recap.php");
            break;

        case "down-qtt":
            header("Location:recap.php");
            break;
    }
}

header("Location:index.php");

