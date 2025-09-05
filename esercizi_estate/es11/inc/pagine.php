<?php


$pagine = [
    'media_materie' => [
        'body' => [
            'titolo' => 'Calcola la media dei voti e il miglior studente!'
        ],
        'template' => 'tpl/main.html',
        'include' => 'inc/view.php'

    ]
];


if(!isset($_REQUEST['x']) || !isset($pagine[$_REQUEST['x']])){
    $_REQUEST['x'] = 'media_materie';
}

$x = $pagine[$_REQUEST['x']];