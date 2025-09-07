<?php


$pagine = [
    'lista.piatti' => [
        'body' => [
            'titolo' => 'Lista Piatti'
        ],
    ],
    'lista.ingredienti' => [
        'body' => [
            'titolo' => 'Lista Ingredienti'
        ],
    ]
];

$x = (!isset($_REQUEST['x']) || !isset($pagine[$_REQUEST['x']])) ? 'lista.piatti' : $_REQUEST['x'];
