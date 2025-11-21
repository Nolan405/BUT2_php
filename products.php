<?php 
function getProducts() {
    $json = file_get_contents('product.json');
    $data = json_decode($json, true);
    return $data;
}   