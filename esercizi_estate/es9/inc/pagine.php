<?php

$pagine = [
    'gita?scolastica' => [
        'body' => [
            'titolo' => 'Prenota Camere Per La Tua Gita Scolastica'
        ],
        'template' => 'tpl/main.html',
        'include' => 'lib/render.php'
    ],
];

if(!isset($_REQUEST['x']) || !isset($pagine[$_REQUEST['x']])){
    $_REQUEST['x'] = 'gita?scolastica';
}

$x = $pagine[$_REQUEST['x']];