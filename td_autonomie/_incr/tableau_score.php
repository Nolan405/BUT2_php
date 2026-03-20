<?php

require_once 'data/select.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <title>Quiz</title>
</head>
<body>
    <header>
        <button class="quitter"><a href="/quiz">Retour</a></button>
    </header>
    <h1>Tableau des scores</h1>
    <table border="1">
        <thead>
            <tr style="background-color: rgb(181, 219, 252);">
                <th>Joueur</th>
                <th>Score Obtenu</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (!empty($rows)) {
                foreach($rows as $row) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['pseudo']); ?></td>
                        <td><?php echo htmlspecialchars($row['score']); ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>