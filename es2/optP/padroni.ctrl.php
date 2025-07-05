<?php


$azione = $_REQUEST['azione'] ?? '';

$id = $_REQUEST['id'] ?? null;
$cognome = $_REQUEST['cognome'] ?? null;
$telefono = $_REQUEST['telefono'] ?? null;
$output = $x['contenuto']['footer'] ?? null;

switch ($azione) {
    case 'aggiungi':
        if ($cognome && $telefono) {
            $s = padroni\aggiungi($cognome, $telefono);
            $output = $s ? "<p>Aggiunta di $cognome con $telefono</p>"
                : "<p>Errore nell'ultima aggiunta</p>";
        }
        // Aggiorna la tabella dopo l'aggiunta
        $x['contenuto']['main'] = padroni\lista();
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
        // Aggiorna la tabella dopo la modifica
        $x['contenuto']['main'] = padroni\lista();
        break;

    case 'elimina':
        if ($id) {
            $s = padroni\elimina($id);
            $output = $s ? "<p>Eliminazione di $id riuscita</p>" : "<p>Errore nell'ultima eliminazione</p>";
        }
        // Aggiorna la tabella dopo l'eliminazione
        $x['contenuto']['main'] = padroni\lista();
        break;
}

$x['contenuto']['footer'] = $output;
