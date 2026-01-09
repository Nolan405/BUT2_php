<?php

$pdo = new PDO('sqlite:db.sqlite');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

# $insert1 = "INSERT INTO COMPANY (NAME,AGE,ADDRESS,SALARY) VALUES ('Allen', 25, 'Texas', 15000.00 );";
# $stmt11 = $pdo->query($insert1);

# $insert2 = "INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY) VALUES (3, 'leclerc', 30, 'Orléans', 45300.00 );";
# $stmt12 = $pdo->query($insert2);

$select1 = "SELECT * FROM COMPANY;";
$stmt2 = $pdo->query($select1);
$rows1 = $stmt2->fetchAll(PDO::FETCH_ASSOC); # Pour avoir que les clefs associatives et pas une fois avec clef "0" et une fois avec "id" par exemple

foreach($rows1 as $row) {
    foreach($row as $val) {
        echo $val;
    }
    echo "\n";
}

$select2 = "SELECT * FROM COMPANY WHERE ID = ?;";
$stmt3 = $pdo->prepare($select2);
$stmt3->execute([3]);
$row2 = $stmt3->fetch(PDO::FETCH_ASSOC);

foreach($row2 as $val) {
    echo $val;
}
echo "\n";