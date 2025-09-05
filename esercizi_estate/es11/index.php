<?php


/*
esercizio 11
Scrivere un programma che consenta di inserire la media dei voti per le varie materie di tutti gli studenti di una piccola scuola.
Dai dati inseriti ricavare lo studente migliore, che avrà un premio;
i dieci studenti migliori, che andranno in gita gratis;
i venti studenti peggiori che dovranno venire accompagnati dai genitori.
Compilare inoltre un elenco di tutti gli studenti con una insufficienza in qualche materia,
e compilare un piano per le lezioni di recupero tenendo conto che ogni gruppo di recupero dev'essere formato al massimo da cinque studenti
e deve trattare una sola materia.
*/

foreach (glob("inc/*.php") as $file) {
    require_once $file;
}

foreach (glob("lib/*.php") as $file) {
    require_once $file;
}

echo render\r(
    $x['template'],
    [
        'titolo' => $x['body']['titolo'],
        'form' => $form,
        'risultato' => $risultato,
        'migliore' => $migliore
    ]
);
