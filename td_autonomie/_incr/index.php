<?php

require_once 'Autoload.php';
require_once 'data/Data.php';

use model\form\elem\Checkbox;
use model\form\elem\Hidden;
use model\form\elem\Radio;
use model\form\elem\Text;
use model\form\elem\Textarearea;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Quiz</title>
</head>
<body>
    <h1>Répondez aux questions</h1>
    <article>
        <label for="">Entrer votre Nom : </label>
        <?php echo new Text('name', True); ?>
    </article>
    <form action="" method="post">
        <?php
        foreach ($questions as $q) {
            ?> <article> <?php
                echo "<label>{$q['text']}</label><br>";
                $className = 'model\\form\\elem\\' . ucfirst($q['type']);

                if ($q['type'] == 'checkbox' || $q['type'] == 'radio') {
                    foreach ($q['choices'] as $choice) {
                        echo new $className($q['name'], false, $choice['value'], $choice['text']);
                    }
                } else {
                    echo new $className($q['name'], true);
                }
                echo "</br>";

            ?> </article> <?php
        }
        ?>
        <button type="submit">Valider</button>
    </form>
    <label for="">test</label>
</body>
</html>