<?php


/* esercizio 10
Scrivere un programma nel quale sia possibile pianificare una maratona cinematografica in una multisala.
Creare un array associativo per memorizzare titolo, genere e orari delle proiezioni.
Chiedere all'utente di specificare uno o più generi di preferenza,
e proporgli la soluzione che consente di vedere più film di quei generi nel corso della giornata.
Nel programma non devono esserci sovrapposizioni e dev'essere prevista una pausa per il pranzo dall'una alle due
e una pausa per la cena dalle otto alle nove.
La maratona comincia alle undici di mattina e finisce a mezzanotte. */

foreach (glob('lib/*.php') as $file) {
    require_once $file;
}
foreach (glob('inc/*.php') as $file) {
    require_once $file;
}

echo render\r(
    $x['template'],
    [
        'titolo' => $x['body']['titolo'],
        'form' => $x['body']['form'],
        'messaggio' => $x['body']['messaggio']
    ]
);
