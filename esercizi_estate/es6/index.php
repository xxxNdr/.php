<?php


/* Scivere un programma che includa una libreria per il calcolo di tutte le forme della legge di Ohm.
Dare all'utente la possibilità di inserire le due grandezze note e restituire la terza effettuando il calcolo appropriato. */

foreach (glob("lib/*.php") as $file) {
    require_once $file;
}

foreach (glob("inc/*.php") as $file) {
    require_once $file;
}


echo render\r(
    $p['template'],
    [
        'titolo' => $p['body']['titolo'],
        'menu' => $menu,
        'descrizione' => $descrizione = file_exists($pagine['homepage']['body']['descrizione']) ?
            file_get_contents($pagine['homepage']['body']['descrizione']) : '',
        'risultato' => $risultato ?? ''
    ]
);
