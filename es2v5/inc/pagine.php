<?php

$pagine = [
    'listaCani' => [
        'contenuto' => [
            'titolo' => 'Lista Cani'
        ],
        'template' => 'tpl/main.html',
        'include' => [
            'optC/cani.fun.php',
            'optP/padroni.fun.php',
            'optC/cani.ctrl.php',
            'optC/cani.view.php',
        ]
        ],
    'listaPadroni' => [
        'contenuto' => [
            'titolo' => 'Lista Padroni'
        ],
        'template' => 'tpl/main.html',
        'include' => [
            'optP/padroni.fun.php',
            'optP/padroni.ctrl.php',
            'optP/padroni.view.php',
        ]
    ]
];

$xKey = $_REQUEST['x'] ?? 'listaCani';
if(!isset($pagine[$xKey])){
    $xKey = 'listaCani';
}

$x = &$pagine[$xKey];

$voci = [];
foreach ($pagine as $k => $v) {
    $voci[] = render\r(
        'tpl/menu.voci.html',
        [
            'url' => "./$k.html",
            'label' => $v['contenuto']['titolo']
        ]
    );
}

$x['contenuto']['menu'] = render\r(
    'tpl/menu.html',
    [
        'voci' => implode('', $voci)
    ]
);
