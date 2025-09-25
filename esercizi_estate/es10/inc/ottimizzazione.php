<?php

// maratona: 11-24
// pausa pranzo: 13-14
// pausa cena: 20-21

include 'inc/dati.php';

function orarioTominuti($orarioInizio)
{
    list($ore, $minuti) = explode(':', $orarioInizio);
    return intval($ore) * 60 + intval($minuti);
}

function pause($orarioInizio, $durata)
{
    $start = orarioTominuti($orarioInizio);
    $end = $start + $durata;

    $inizioPranzo = 13 * 60;
    $finePranzo = 14 * 60;
    $inizioCena = 20 * 60;
    $fineCena = 21 * 60;

    if ($end > $inizioPranzo && $start < $finePranzo) {
        return true;
    }

    if ($end > $inizioCena && $start < $fineCena) {
        return true;
    }
    return false;
}

function maratona($orarioInizio, $durata)
{
    $start = orarioTominuti($orarioInizio);
    $end = $start + $durata;

    $inizioMaratona = 11 * 60;
    $fineMaratona = 24 * 60;

    if ($end > $fineMaratona || $start < $inizioMaratona) {
        return true;
    }
    return false;
}

function sovrapponimentoFilm($film1, $film2)
{
    $start1 = orarioTominuti($film1['orario']);
    $end1 = $start1 + intval($film1['durata']);

    $start2 = orarioTominuti($film2['orario']);
    $end2 = $start2 + intval($film2['durata']);

    if ($end1 > $start2 && $start1 < $end2) {
        return true;
    }
    return false;
}

function ottimizza($maratonaCine3)
{
    $validi = [];
    $scarti = [];

    foreach ($maratonaCine3 as $film) {
        $durata = intval($film['durata']);

        if (maratona($film['orario'], $durata) || pause($film['orario'], $durata)) {
            $scarti[] = $film;
        } else {
            $validi[] = $film;
        }
    }

    $ottimi = [];

    foreach ($validi as $film) {
        if (empty($ottimi)) {
            $ottimi[] = $film;
        }else{
            $ultimo = end($ottimi);
            if(!sovrapponimentoFilm($film, $ultimo)){
                $ottimi[] = $film;
            }
        }
    }
    return $ottimi;
}
