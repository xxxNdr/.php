<?php

/* esercizio 08
Scrivere un programma che consenta di selezionare una destinazione per una crociera, e un numero variabile di optional.
Creare un array associativo per memorizzare gli optional e uno per le possibili destinazioni.
Calcolare il costo del viaggio in base alla destinazione e agli optional scelti. Tramite i CSS dare alla pagina un aspetto tropicale. */

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
        'form' => $form,
        'risultato' => $risultato
    ]
);
