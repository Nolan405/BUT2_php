<?php
try {
    $pdo = new PDO('sqlite:db.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS SCORE (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        pseudo TEXT NOT NULL,
        score TEXT NOT NULL
    )";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}