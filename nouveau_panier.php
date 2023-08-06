<?php
function nouveau_panier() {
    $fruits_data = file_get_contents("fruits.json");
    $fruits = json_decode($fruits_data, true);
    $panier = array();
    foreach($fruits as $fruit) {
        $panier[$fruit["nom"]] = 0;
    }
    return $panier;
}