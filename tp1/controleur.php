<?php

require_once "_inc/data/products.php";
require_once "_inc/templates/filtrer.php";

$path_info = $_SERVER["REQUEST_URI"] ?? "/";
$path_info = parse_url($path_info, PHP_URL_PATH);

if ($path_info !== '/' && file_exists(__DIR__ . $path_info)) {
    return false;
}

switch ($path_info) {

    case "/":
        include_once "index.php";
        break;

    case "/detail-produit-id":
        include_once "detail.php";
        break;

    case "/mon-panier":
        include_once "panier.php";
        break;

    default:
        http_response_code(404);
        echo "Page non trouvée";
        break;
}
