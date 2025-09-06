<?php

// composer
require_once 'lib/ext/autoload.php';

// loader twig, cartella dove sono i template
$loader = new \Twig\Loader\FilesystemLoader('tpl');

// ambiente twig a partire dalla cartellla
// oggetto all'interno del quale posso fare delle cose, motore di rendering
$twig = new \Twig\Environment($loader);

// caricamento template, quale file renderizzare
$tpl = $twig->load('index.twig');

// rendering template
echo $tpl->render(
    [
        'nome' => 'mondo',
        'variabile' => true,
        'numeri' => [1,2,3,4,5],
        'lista' => [
            ['nome' => 'Mario', 'cognome' => 'Rossi'],
            ['nome' => 'Luigi', 'cognome' => 'Verdi'],
            ['nome' => 'Anna', 'cognome' => 'Bianchi']
        ],
        'colori' => [
            23 => 'rosso',
            45 => 'verde',
            67 => 'blu'
        ]
    ]
);
