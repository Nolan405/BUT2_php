<?php

use model\form\elem\Checkbox;
use model\form\elem\Hidden;
use model\form\elem\Radio;
use model\form\elem\Text;
use model\form\elem\Textarearea;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    calcul_answers($questions);
    $affiche_rep_score = affiche_rep_score($questions);
    save_db($_SESSION['pseudo'], $score_correct, $score_total);
} else {
    $affiche_rep_score = affiche_rep_score($questions);
}

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
        <article>
            <?php echo "Bienvenue " . $_SESSION['pseudo'] . " !"; ?>
        </article>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {?>
            <article>
                <?php echo $affiche_rep_score[0] ?>
            </article>
            <article>
                <?php echo $affiche_rep_score[1] ?>
            </article>
        <?php } ?>
        <button class="quitter"><a href="/scores">Acceder au tableau des scores</a></button>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <button class="quitter"><a href="/quiz">Recommencer</a></button>
        <?php } ?>
        <button class="quitter"><a href="/index">Quitter</a></button>
    </header>
    <h1>Répondez aux questions</h1>
    <form action="" method="post">
        <?php
        $i = 0;
        foreach ($questions as $q) {
            ?> <article> <?php
                echo "<label>{$q['text']} ({$q['score']} pt)</label><br>";
                echo render_element($q) . "</br>";
            ?> </article> <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                affiche_answer($i, $q);
            }
            $i += 1;
        }
        if ($_SERVER["REQUEST_METHOD"] != "POST") { ?>
            <button type="submit">Valider</button>
        <?php } ?>
    </form>
</body>
</html>