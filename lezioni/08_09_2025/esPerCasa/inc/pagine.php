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

$x = (isset($_REQUEST['x']) && array_key_exists($_REQUEST['x'], $pagine))
    ?
    $pagine[$_REQUEST['x']]
    :
    $pagine['lista.piatti'];
