<?php

error_log("Azione ricevuta: " . ($azione ?? 'nessuna'));
error_log("Dati ricevuti: " . print_r($_REQUEST, true));

$azione = $_REQUEST['azione'] ?? '';
$id = $_REQUEST['id'] ?? null;
$cognome = $_REQUEST['nome'] ?? null;
$telefono = $_REQUEST['telefono'] ?? null;
$output = $x['contenuto']['footer'] ?? null;

switch ($azione) {
    case 'aggiungi':
        if ($cognome && $telefono) {
            $s = padroni\aggiungi($cognome, $telefono);
            $output = $s ? "<p>Aggiunta di $cognome con $telefono</p>"
                : "<p>Errore nell'ultima aggiunta</p>";
        }
        break;

    case 'modifica':
        if ($id && $cognome && $telefono) {
            $s = padroni\modifica($id, $cognome, $telefono);
            $output = $s ? "<p>Modifica di $id riuscita</p>" : "<p>Ultima modifica fallita</p>";
        }

        if ($id) {
            $padrone = padroni\dettagli($id);
            if (!empty($padrone)) {
                $_REQUEST = array_merge($_REQUEST, $padrone);
            } else {
                $output = "<p>Errore nel recupero dei dati di $id</p>";
            }
        }
        break;

    case 'elimina':
        if ($id) {
            $s = padroni\elimina($id);
            $output = $s ? "<p>Eliminazione di $id riuscita</p>" : "<p>Errore nell'ultima eliminazione</p>";
        }
        break;
}
