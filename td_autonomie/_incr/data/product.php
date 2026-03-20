<?php 

function getProducts() {
    $path = __DIR__ . '/product.json';
    $json = file_get_contents($path);
    $data = json_decode($json, true);
    return $data;
}   