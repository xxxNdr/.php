<?php


/* esercizio 07
Scrivere un programma che consenta agli utenti di inserire un itinerario composto da
un numero arbitrario di tappe; il programma deve contenere un array associativo nel quale
siano memorizzate le distanze fra ogni tappa.
Calcolare la distanza totale coperta dall'itinerario scelto dall'utente. */

foreach (glob("lib/*.php") as $file) {
    require_once $file;
}

foreach (glob("inc/*.php") as $file) {
    require_once $file;
}

echo render\r(
    $x['template'],
    [
        'titolo' => $x['body']['titolo'],
    ]
);

var_dump($_POST['distanza']);