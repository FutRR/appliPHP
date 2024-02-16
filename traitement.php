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

                    if (isset($_SESSION["products"])) {
                        $valid = "Produit Ajouté";
                    } else {
                        $error = "Please enter valid fields";
                    }

                }
                header("Location:index.php");

            }
            break;

        case "delete":
            if (isset($_GET["id"])) {
                $index = $_GET["id"];
                unset($_SESSION['products'][$index]);
                unset($product[$index]);
                $_SESSION["products"] = array_values($_SESSION["products"]);
                header("Location:recap.php");
            }
            break;

        case "clear":
            if (isset($_POST["clear"])) {
                unset($_SESSION["products"]);
                header("Location:recap.php");
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


