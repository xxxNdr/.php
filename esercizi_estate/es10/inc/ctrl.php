<?php


$maratonaCine3 = [
    [
        'titolo' => 'frankenstein junior, 1974',
        'genere' => 'comico',
        'orario' => '21:00'
    ],
    [
        'titolo' => 'non ci resta che piangere, 1984',
        'genere' => 'comico',
        'orario' => '23:00'
    ],
    [
        'titolo' => 'sinister',
        'genere' => 'horror',
        'orario' => '11:00'
    ],
    [
        'titolo' => 'host',
        'genere' => 'horror',
        'orario' => '14:00'
    ],
    [
        'titolo' => '2001: odissea nello spazio, 1968',
        'genere' => 'fantascienza',
        'orario' => '21:00'
    ],
    [
        'titolo' => 'blade runner, 1982',
        'genere' => 'fantascienza',
        'orario' => '14:00'
    ],
    [
        'titolo' => 'la donna che visse due volte, 1958',
        'genere' => 'thriller',
        'orario' => '16:00'
    ],
    [
        'titolo' => 'i soliti sospetti, 1995',
        'genere' => 'thriller',
        'orario' => '18:00'
    ],
];

$risultato = '';

if(isset($_POST['gen'])){
    $fav = explode(',',$_POST['gen']);
    $fav = array_map('trim', $fav);
    $fav = array_map('strtolower', $fav);

    $trovati = [];
    foreach($maratonaCine3 as $f){
        if(in_array(strtolower($f['genere']), $fav)){
            $trovati[] = $f;
        }
    }

    usort($trovati, function($a,$b){
        return strcasecmp($a['orario'], $b['orario']);
        /*
            strcasecmp confronta 2 stringhe in modo case-insensitive e restituisce un valore:
            positivo se il primo elemento è maggiore del secondo,
            negativo se il primo elemento è minore del secondo,
            0 se i due elementi sono uguali.
            Dopodiché usort considera i valori e li mette in ordine crescente
            */
    });

    if(empty($trovati)){
        $risultato = "Nessun genere trovato per la tua scelta: " . implode(', ', $fav);
    }else{
        $risultato = "<h3>Film disponibili:</h3>";
        foreach($trovati as $f){
            $risultato .= "<p><strong>{$f['titolo']}</strong><br> genere: {$f['genere']}, delle ore: {$f['orario']}</p>"; 
        }
    }
};