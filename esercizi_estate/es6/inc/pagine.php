<?php


$pagine = [
    'homepage' => [
        'body' => [
            'titolo' => 'Legge di Ohm',
            'descrizione' => <<<EOD
La legge di Ohm, in forma base, stabilisce che la corrente che scorre in un circuito
è direttamente proporzionale alla tensione applicata e inversamente proporzionale alla resistenza del circuito.
Le formule principali sono: 
V = R * I:
dove V è la tensione (misurata in volt), R è la resistenza (misurata in ohm), e I è la corrente (misurata in ampere).
Questa formula afferma che la tensione è il prodotto della resistenza per la corrente. 
R = V / I:
questa formula, derivata dalla precedente, permette di calcolare la resistenza se si conoscono tensione e corrente. 
I = V / R:
questa formula, derivata anch'essa dalla prima, permette di calcolare la corrente se si conoscono tensione e resistenza.
EOD
        ],
        'template' => 'tpl/main.html'
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
