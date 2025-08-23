<?php

session_start();
// contenitore dinamico di studenti nelle stanze divisi per sesso e abbinati con amici

if (!isset($_SESSION['studenti'])) {
    $_SESSION['studenti'] = [];
    // inizializzo array $studenti se non esiste
}

if (isset($_POST['studente']) && isset($_POST['genere'])) {
    $nuovoStudente = [
        'nome' => $_POST['studente'],
        'genere' => strtolower($_POST['genere']),
        'amici' => !empty($_POST['amico']) ? explode(',', trim($_POST['amico'])) : []
    ];
    $_SESSION['studenti'][] = $nuovoStudente;
    // aggiungo nuovo studente con genere e amici separati da virgola, se non ne ha allora array vuoto
}

if (isset($_POST['cancella'])) {
    $_SESSION['studenti'] = [];
}

$studenti = $_SESSION['studenti'];
$stanze = [];
$risultato = "";

if (isset($_POST['calcola']) && count($studenti) > 0) {

    $m = [];
    $f = [];

    foreach ($studenti as $s) {
        if ($s["genere"] == "m") {
            $m[] = $s;
        } else {
            $f[] = $s;
        }
    }

    // PER I MASCHI
    $assegnati = [];

    foreach ($m as $studente) {
        // prendo ogni maschio dall'array $m
        if (!in_array($studente['nome'], $assegnati)) {
            // controllo che lo studente non è ancora stato assegnato a una stanza
            foreach ($studente['amici'] as $amico) {
                // prendo ogni nome dalla lista amici di questo studente
                foreach ($m as $altro) {
                    // confronto con ogni altro studente maschio
                    if ($altro['nome'] == $amico && !in_array($amico, $assegnati)) {
                        /* se trovo un maschio che:
                    - ha lo stesso nome dell'amico che sto cercando
                    - non è stato ancora assegnato */
                        $stanze[] = [$studente['nome'], $amico];
                        // creo una stanza con i due amici
                        $assegnati[] = $studente['nome'];
                        $assegnati[] = $amico;
                        // li marco entrambi come assegnati
                        break 2;
                        /* esco da 2 livelli di ciclo annidati (amico trovato) 
                    utile per non scrivere flag o molteplici condizioni d'uscita
                    appena trovato l'amico corrispondente non ha senso controllare
                    altri amici o altri maschi perché la stanza da 2 coi corrispettivi amici
                    è creata e riempita
                    quindi proseguo col ciclo successivo: foreach($m as $studente)*/
                    }
                }
            }
        }
    }

    // PER LE FEMMINE
    /* non creo altre stanze, uso $stanze,
$stanze è l'hotel, i gruppi sono già suddivisi per sesso
nelle stanze ci sono già coppie d'amici separate per sesso,
non mi serve altro*/

    foreach ($f as $studente) {
        if (!in_array($studente['nome'], $assegnati)) {
            foreach ($studente['amici'] as $amico) {
                foreach ($f as $altro) {
                    if ($altro['nome'] == $amico && !in_array($amico, $assegnati)) {
                        $stanze[] = [$amico, $studente['nome']];
                        $assegnati[] = $amico;
                        $assegnati[] = $studente['nome'];
                        break 2;
                    }
                }
            }
        }
    }

    $risultato = '<h3>Stanze create:</h3>';
    foreach ($stanze as $i => $stanza) {
        $risultato .= 'Camera ' . ($i + 1) . ': ' . implode(' + ', $stanza) . '<br>';
    }
}

$listaStudenti = '';
if(count($studenti) > 0){
    $listaStudenti = '<h3>Studenti inseriti</h3>';
    foreach($studenti as $s){
        $amici = count($s['amici']) > 0 ? ' (amici: ' . implode(', ', $s['amici']) . ')' : "";
        $listaStudenti .= $s['nome'] . ' (' . strtoupper($s['genere']) . ')' . $amici . '<br>';
    }
}