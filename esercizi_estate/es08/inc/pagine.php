<?php

$pagine = [
    'crociere?' => [
        'body' => [
            'titolo' => 'Vacanze In Crociera'
        ],
        'template' => 'tpl/main.html',
        'include' => [
            'lib/fun.php',
            'inc/ctrl.php',
        ]
    ]
];

if (!isset($_REQUEST['x']) || !isset($pagine[$_REQUEST['x']])) {
    $_REQUEST['x'] = 'crociere?';
}

$x = &$pagine[$_REQUEST['x']];

