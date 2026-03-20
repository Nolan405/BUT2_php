<?php

session_start();

require_once 'Autoload.php';
require_once 'data/product.php';
require_once 'data/questions.php';
require_once 'data/insert.php';

use model\form\elem\Checkbox;
use model\form\elem\Hidden;
use model\form\elem\Radio;
use model\form\elem\Text;
use model\form\elem\Textarearea;

$questions = getProducts();
$question_total = 0;
$question_correct = 0;
$score_total = 0;
$score_correct = 0;

$current_path = parse_url($_SERVER["REQUEST_URI"] ?? "/", PHP_URL_PATH);

if (!isset($_SESSION['pseudo']) && $current_path !== '/' && $current_path !== '/index') {
    header('Location: /index');
    exit();
}