<?php

/*esercizio 01
Scrivere un programma che gestisca cani con nome, data di nascita e data di vaccinazione.
Utilizzare struttura e approccio a piacere, utilizzare un database MySQL per stoccare i dati.
esercizio 02
Partendo dall'esercizio precedente aggiungere la gestione dei padroni
e l'associazione tramite tendina del cane al relativo padrone.*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

foreach (glob(__DIR__ . '/lib/*.php') as $file) {
    require_once $file;
}

foreach (glob(__DIR__ . '/inc/*.php') as $file) {
    require_once $file;
}
if (!empty($x['include']) && is_array($x['include'])) {
    foreach ($x['include'] as $file) {
        require_once $file;
    }
}

echo render\r(
    $x['template'],
    [
        'titolo' => $x['contenuto']['titolo'] ?? '',
        'menu' => $x['contenuto']['menu'] ?? '',
        'main' => $x['contenuto']['main'] ?? '',
        'footer' => $x['contenuto']['footer'] ?? '',
    ]
);
