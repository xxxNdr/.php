<?php


$azione = $_REQUEST['azione'] ?? '';

$id = $_REQUEST['id'] ?? '';
$nome = $_REQUEST['nome'] ?? '';
$dataNascita = $_REQUEST['data_nascita'] ?? '';
$dataVaccinazione = $_REQUEST['data_vaccinazione'] ?? '';
$id_padrone = $_REQUEST['id_padrone'] ?? '';
$output = $x['contenuto']['footer'] ?? '';

switch ($azione) {
    case 'aggiungi':
        if (!empty($nome) && !empty($dataNascita) && !empty($dataVaccinazione) && !empty($id_padrone)) {
            $s = cani\aggiungi($nome, $dataNascita, $dataVaccinazione, (int)$id_padrone);
            $output = $s ? "<p>Aggiunta di $nome nato il $dataNascita con ultima vaccinazione $dataVaccinazione</p>"
                : "<p>Errore nell'ultima aggiunta</p>";
        }
        $x['contenuto']['main'] = cani\lista();
        break;

    case 'modifica':
        if ($id && $nome && $dataNascita && $dataVaccinazione && $id_padrone) {
            $s = cani\modifica($id, $nome, $dataNascita, $dataVaccinazione, (int)$id_padrone);
            $output = $s ? "<p>Modifica di $id riuscita</p>" : "<p>Ultima modifica fallita</p>";
        }

        if ($id) {
            $cane = cani\dettagli($id);
            // var_dump(cani\dettagli($id));
            if (!empty($cane)) {
                $_REQUEST = array_merge($_REQUEST, $cane);
            } else {
                $output = "<p>Errore nel recupero dei dati di $id</p>";
            }
        }
        $x['contenuto']['main'] = cani\lista();
        break;

    case 'elimina':
        if ($id) {
            $s = cani\elimina($id);
            $output = $s ? "<p>Eliminazione di $id riuscita</p>" : "<p>Errore nell'ultima eliminazione</p>";
        }
        $x['contenuto']['main'] = cani\lista();
        break;
}

$x['contenuto']['footer'] = $output;

