<?php

require_once '../data/Data.php';
require_once '../Autoload.php';

function translateInInput(): array {
    $questions = Data::$questions;
    $listInput = [];
    foreach($questions as $field) {
        $className = 'model\\form\\elem\\' . ucfirst($field['type']);
        $inputString = new $className($field['name'], true).PHP_EOL;
        echo $inputString;
        $listInput[] = $inputString;
    }
    return $listInput;
}

translateInInput();