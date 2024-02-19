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

                    $_SESSION["alert"] = "Produit Ajouté";

                }

                $_SESSION["alert"] = "Erreur de formulaire";

                header("Location:index.php");

            }
            break;

        case "delete":
            if (isset($_GET["id"])) {
                $index = $_GET["id"];
                unset($_SESSION['products'][$index]);
                unset($product[$index]);
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
            if (isset($_GET["id"])) {
                $index = $_GET["id"];
                $_SESSION['products'][$index]["qtt"]++;
                $_SESSION['products'][$index]["total"] = $_SESSION['products'][$index]["price"] * $_SESSION['products'][$index]["qtt"];
                header("Location:recap.php");
            }
            break;

        case "down-qtt":
            if (isset($_GET["id"])) {
                $index = $_GET["id"];
                if ($_SESSION['products'][$index]["qtt"] > 1) {
                    $_SESSION['products'][$index]["qtt"]--;
                    $_SESSION['products'][$index]["total"] = $_SESSION['products'][$index]["price"] * $_SESSION['products'][$index]["qtt"];
                }
                header("Location:recap.php");
            }
            break;
    }
}

var_dump($_SESSION["products"]);


