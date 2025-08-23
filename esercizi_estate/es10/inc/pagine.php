<?php

$pagine = [
    "la-maratona-cinematografica" => [
        "body" => [
            "titolo" => "La Maratona Cinematrografica?"
        ],
        "template" => "tpl/main.html",
        "include" => [
            "inc/ctrl.php"
        ]
    ]
];

if (!isset($_REQUEST['x']) || !isset($pagine[$_REQUEST['x']])) {
    $_REQUEST['x'] = 'la-maratona-cinematografica';
}

$x = $pagine[$_REQUEST['x']];
