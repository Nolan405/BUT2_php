<?php 
function getProducts() {
    $json = file_get_contents('_inc/data/product.json');
    $data = json_decode($json, true);
    return $data;
}   