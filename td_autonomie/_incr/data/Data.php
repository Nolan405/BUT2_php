<?php

$questions = [
    array(
        "name" => "ultime",
        "type" => "text",
        "text" => "Quelle est la réponse ultime?",
        "answer" => "42",
        "score" => 1
    ),
    array(
        "name" => "cheval",
        "type" => "radio",
        "text" => "Quelle est la couleur du cheval blanc d'Henri IV?",
        "choices" => [
            array(
                "text" => "Bleu",
                "value" => "bleu"),
            array(
                "text" => "Blanc",
                "value" => "blanc"),
            array(
                "text" => "Rouge",
                "value" => "rouge"),
        ],
        "answer" => "blanc",
        "score" => 2
    ),
    array(
        "name" => "drapeau",
        "type" => "checkbox",
        "text" => "Quelles sont les couleurs du drapeau français?",
        "choices" => [
            array(
                "text" => "Bleu",
                "value" => "bleu"
            ),
            array(
                "text" => "Blanc",
                "value" => "blanc"
            ),
            array(
                "text" => "Vert",
                "value" => "vert"
            ),
            array(
                "text" => "Jaune",
                "value" => "jaune"
            ),
            array(
                "text" => "Rouge",
                "value" => "rouge"
            )
        ],
        "answer" => ["bleu", "blanc", "rouge"],
        "score" => 3
    ),
    array(
        "name" => "langage",
        "type" => "text",
        "text" => "Quel est le langage de programmation utilisé dans ce projet?",
        "answer" => "PHP",
        "score" => 1
    ),
    array(
        "name" => "capitale",
        "type" => "radio",
        "text" => "Quelle est la capitale de la France?",
        "choices" => [
            array(
                "text" => "Paris",
                "value" => "paris"
            ),
            array(
                "text" => "Lyon",
                "value" => "lyon"
            ),
            array(
                "text" => "Marseille",
                "value" => "marseille"
            ),
            array(
                "text" => "Toulouse",
                "value" => "toulouse"
            )
        ],
        "answer" => "paris",
        "score" => 2
    ),
    array(
        "name" => "types_scalaires",
        "type" => "checkbox",
        "text" => "Quels sont les types de données scalaires en PHP?",
        "choices" => [
            array(
                "text" => "string",
                "value" => "string"
            ),
            array(
                "text" => "int",
                "value" => "int"
            ),
            array(
                "text" => "bool",
                "value" => "bool"
            ),
            array(
                "text" => "float",
                "value" => "float"
            ),
            array(
                "text" => "array",
                "value" => "array"
            )
        ],
        "answer" => ["string", "int", "bool", "float"],
        "score" => 3
    ),
];