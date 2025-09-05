<?php

$risultato = '';
$migliore = '';

if ($_POST['reset'] ?? '') {
    $studenti = [];
    $risultato = '';
    $migliore = '';
} elseif (isset($_POST['js'])) {
    $studenti = json_decode($_POST['js'], true);

    $medie = [];
    $insufficienti = [];

    foreach ($studenti as $s) {
        if (!empty($s['nome'])) {
            $media = calcolaMedia($s);
            $medie[$s['nome']] = $media;
        }
    }
    if (!empty($medie)) {
        $mediaMax = max($medie);
        $migliore = array_search($mediaMax, $medie);
        $migliore = "<h3>Lo studente migliore è: <br>" . '<strong>' . $migliore . '</strong></h3>';
    } else {
        $risultato = $migliore = "Nessun dato disponibile per gli studenti";
    }
}

function calcolaMedia($s)
{
    $voti = [
        floatval($s['mat']),
        floatval($s['gra']),
        floatval($s['geo']),
        floatval($s['sto']),
        floatval($s['bio']),
        floatval($s['psi'])
    ];
    return array_sum($voti) / count($voti);
}
