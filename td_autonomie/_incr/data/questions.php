<?php

function render_element($q) {
    $className = 'model\\form\\elem\\' . ucfirst($q['type']);
    
    if ($q['type'] == 'checkbox' || $q['type'] == 'radio') {
        foreach ($q['choices'] as $choice) {
            $outputs[] = new $className($q['name'], false, $choice['value'], $choice['text']);
        }
        return implode('', $outputs);
    } else {
        return new $className($q['name'], true);
    }
}

$answer_handlers = array(
    "text" => "answer_text_radio",
    "radio" => "answer_text_radio",
    "checkbox" => "answer_checkbox"
);

function answer_text_radio($q, $v) {
    global $question_correct, $score_correct;
    if (is_null($v)) {
        $_SESSION['quiz'][] = ['statut' => false, 'label' => $q['text']];
        return;
    }
    if ($q["answer"] == $v) {
        $question_correct += 1;
        $score_correct += $q["score"];
        $_SESSION['quiz'][] = ['statut' => true, 'label' => $q['text']];
    } else {
        $_SESSION['quiz'][] = ['statut' => false, 'label' => $q['text']];
    }
} 

function answer_checkbox($q, $v) {
    global $question_correct, $score_correct;
    if (is_null($v)) {
        $_SESSION['quiz'][] = ['statut' => false, 'label' => $q['text']];
        return;
    }
    $diff1 = array_diff($q["answer"], $v);
    $diff2 = array_diff($v, $q["answer"]);
    if (count($diff1) == 0 && count($diff2) == 0) {
        $question_correct += 1;
        $score_correct += $q["score"];
        $_SESSION['quiz'][] = ['statut' => true, 'label' => $q['text']];
    } else {
        $_SESSION['quiz'][] = ['statut' => false, 'label' => $q['text']];
    }
}

function affiche_rep_score($questions) {
    global $question_total, $answer_handlers, $question_correct, $score_correct, $score_total;
    foreach ($questions as $q) {
        $question_total += 1;
        $score_total += $q["score"];
    }
    $list[] = "Réponses correctes: " . $question_correct . "/" . $question_total . "<br>";
    $list[] = "Votre score: " . $score_correct . "/" . $score_total . "<br>";
    return $list;
}

function calcul_answers($questions) {
    global $answer_handlers, $question_total, $question_correct, $score_total, $score_correct;
    $reponses_form = $_POST['form'] ?? [];
    $_SESSION['quiz'] = [];
    foreach ($questions as $q) {
        $valeur_saisie = $reponses_form[$q["name"]] ?? NULL;
        if (isset($answer_handlers[$q["type"]])) {
            $answer_handlers[$q["type"]]($q, $valeur_saisie);
        }
    }
}

function affiche_answer($i, $q) {
    $answer = $_SESSION['quiz'][$i] ?? null;
    $question = $q['answer'];
    if ($answer) {
        $emoji = "";
        if ($answer["statut"] == true) {
            $emoji .= "✅ ";
        } else {
            $emoji .= "❌ ";
        }
    }
     if (is_array($question)) {
        $chaine = "";
        foreach($question as $a) {
            $chaine .= $a . " / ";
        }
        $chaine = rtrim($chaine, " / ");
        echo "<p>{$emoji} La réponse était {$chaine}</p>";
    } else {
        echo "<p>{$emoji} La réponse était {$q['answer']}</p>";
    }
}