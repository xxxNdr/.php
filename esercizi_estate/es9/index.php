<?php

/* esercizio 09
Scrivere un programma per gestire l'assegnazione delle camere durante una gita scolastica.
creare un array associativo per memorizzare gli studenti.
l'utente deve poter inserire un numero arbitrario di studenti con le loro preferenze in termini di amicizie.
Produrre l'elenco degli accoppiamenti per le camere in modo che non ci siano camere miste,
che più studenti possibile finiscano in camera con un amico, e che ci sia il minor numero di camere singole possibile.*/

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
        'form' => file_get_contents('tpl/form.html'),
        'risultato' => $risultato,
        'lista_studenti' => $listaStudenti
    ]
);
