<?php

$pagine = [
    'lista-persone' => [
        'body' => [
            'titolo' => 'lista persone',
            'h1' => 'Lista Persone',
            'menu' => []
        ],
        'template' => 'persone.twig',
        'include' => []
    ],
    'lista-cani' => [
        'body' => [
            'titolo' => 'lista cani',
            'h1' => 'Lista Cani',
            'menu' => []
        ],
        'template' => 'cani.twig',
        'include' => []
    ]
];

if (!isset($_REQUEST['x']) || !isset($pagine[$_REQUEST['x']])) {
    $_REQUEST['x'] = 'lista-persone';
}

$menu = [];
foreach ($pagine as $k => &$v) {
    // & permette di modificare direttamente l'array originale
    // e non la copia $x
    $menu[] = [
        'url' => '?x=' . $k,
        'label' => $v['body']['h1']
    ];
}
unset($v);
// buona pratica liberare il riferimento

$x = $pagine[$_REQUEST['x']];
