<?php
$path_info = $_SERVER["REQUEST_URI"] ?? "/";
$path_info = parse_url($path_info, PHP_URL_PATH);

if ($path_info !== '/' && file_exists(__DIR__ . $path_info)) {
    if (is_file(__DIR__ . $path_info)) {
        $file = __DIR__ . $path_info;
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $mime_types = [
            'css' => 'text/css'
        ];
        $mime = $mime_types[$ext] ?? 'application/octet-stream';
        header('Content-Type: ' . $mime);
        readfile($file);
        exit;
    }
}

require_once "init.php";

switch ($path_info) {
    case "/":
    case "/index":
        include_once "index.php";
        break;

    case "/quiz":
        include_once "quiz.php";
        break;

    case "/scores":
        include_once "tableau_score.php";
        break;

    default:
        http_response_code(404);
        echo "Page non trouvée";
        break;
}