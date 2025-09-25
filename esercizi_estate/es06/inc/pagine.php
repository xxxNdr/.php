<?php


$pagine = [
    'homepage' => [
        'body' => [
            'titolo' => 'Legge di Ohm',
            'descrizione' => 'tpl/descrizione.html'
        ],
        'template' => 'tpl/main.html',
    ],
    'calcolo' => [
        'body' => [
            'titolo' => 'Calcola Corrente Resistenza Tensione'
        ],
        'template' => 'tpl/calcolo.html',
        'include' => [
            'lib/ohm.php'
        ]
    ]
];

$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : 'homepage';

if ($x !== 'homepage' && $x !== 'calcolo') {
    $x = 'homepage';
}
// QUESTO SAREBBE MEGLIO
// if (!array_key_exists($x, $pagine)) {
//     $x = 'homepage';
// }

$p = $pagine[$x];

$link = [];
foreach ($pagine as $k => $v) {
    $link[] = '<a href="?x=' . htmlspecialchars($k) . '">' . htmlspecialchars($v['body']['titolo']) . '</a>';
}

$menu = implode(' | ', $link);
