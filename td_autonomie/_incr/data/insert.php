<?php

require_once __DIR__ . '/create_db.php';

function save_db($pseudo, $score_correct, $score_total) {
    global $pdo;
    $insert1 = "INSERT INTO SCORE (pseudo,score) VALUES (\"{$pseudo}\", \"{$score_correct} / {$score_total}\");";
    $stmt11 = $pdo->query($insert1);
}