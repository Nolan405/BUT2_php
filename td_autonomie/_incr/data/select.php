<?php

require_once 'create_db.php';

$select = "SELECT * FROM SCORE;";
$stmt = $pdo->query($select);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);