<?php

include 'inc/dati.php';
include 'inc/ottimizzazione.php';


$risultato = '';

if (isset($_POST['gen'])) {
    $fav = explode(',', $_POST['gen']);
    $fav = array_map('trim', $fav);
    $fav = array_map('strtolower', $fav);

    $trovati = [];
    foreach ($maratonaCine3 as $f) {
        if (in_array(strtolower($f['genere']), $fav)) {
            $trovati[] = $f;
        }
    }

    usort($trovati, function ($a, $b) {
        return strcasecmp($a['orario'], $b['orario']);
        /*
            strcasecmp confronta 2 stringhe in modo case-insensitive e restituisce un valore:
            positivo se il primo elemento è maggiore del secondo,
            negativo se il primo elemento è minore del secondo,
            0 se i due elementi sono uguali.
            Dopodiché usort considera i valori e li mette in ordine crescente
            */
    });

    $ottimi = ottimizza($trovati);

    if (empty($ottimi)) {
        $risultato = "Nessun film disponibile con orari ottimizzati in relazione alle tue preferenze: " . implode(', ', $fav);
    } else {
        $risultato = "<h3>Film disponibili:</h3>";
        foreach ($ottimi as $f) {
            $risultato .= "<p><strong>{$f['titolo']}</strong><br> genere: {$f['genere']}, delle ore: {$f['orario']}</p>";
        }
    }
};

// echo '<pre>';
// var_dump($ottimi);
// echo '</pre>';
