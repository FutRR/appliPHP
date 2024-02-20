<?php
function afficherCount()
{
    if (!isset($_SESSION["products"]) || empty($_SESSION["products"])) {
        return "0";
    } else {
        $qtt_sum = 0;
        foreach ($_SESSION["products"] as $product) {
            $qtt_sum += $product["qtt"];
        }
        return $qtt_sum;
    }
}