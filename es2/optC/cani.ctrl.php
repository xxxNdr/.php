<?php

$azione = $_REQUEST['azione'] ?? '';

error_log("Azione ricevuta: " . ($azione ?? 'nessuna'));
error_log("Dati ricevuti: " . print_r($_REQUEST, true));

$id = $_REQUEST['id'] ?? null;
$nome = $_REQUEST['nome'] ?? null;
$dataNascita = $_REQUEST['data_nascita'] ?? null;
$dataVaccinazione = $_REQUEST['data_vaccinazione'] ?? null;
$id_padrone = $_REQUEST['id_padrone'] ?? null;
$output = $x['contenuto']['footer'] ?? null;

switch ($azione) {
    case 'aggiungi':
        if (!empty($nome) && !empty($dataNascita) && !empty($dataVaccinazione) && !empty($id_padrone)) {
            $s = cani\aggiungi($nome, $dataNascita, $dataVaccinazione, (int)$id_padrone);
            $output = $s ? "<p>Aggiunta di $nome nato il $dataNascita con ultima vaccinazione $dataVaccinazione</p>"
                : "<p>Errore nell'ultima aggiunta</p>";
        }
        break;

    case 'modifica':
        if ($id && $nome && $dataNascita && $dataVaccinazione && $id_padrone) {
            $s = cani\modifica($id, $nome, $dataNascita, $dataVaccinazione, (int)$id_padrone);
            $output = $s ? "<p>Modifica di $id riuscita</p>" : "<p>Ultima modifica fallita</p>";
        }

        if ($id) {
            $cane = cani\dettagli($id);
            if (!empty($cane)) {
                $_REQUEST = array_merge($_REQUEST, $cane);
            } else {
                $output = "<p>Errore nel recupero dei dati di $id</p>";
            }
        }
        break;

    case 'elimina':
        if ($id) {
            $s = cani\elimina($id);
            $output = $s ? "<p>Eliminazione di $id riuscita</p>" : "<p>Errore nell'ultima eliminazione</p>";
        }
        break;
}

$x['contenuto']['footer'] = $output;
