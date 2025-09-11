<?php

$x['contenuto']['dati'] = [];
$x['contenuto']['dati']['status'] = 'nessuna operazione in corso';
$x['contenuto']['dati']['id'] = "";
$x['contenuto']['dati']['nome'] = "";
$x['contenuto']['dati']['telefono'] = "";
$x['contenuto']['lista_padroni'] = "";

$status = $x['contenuto']['dati']['status'] ?? '';
$azione = null;

if (isset($_POST['nome']) && isset($_POST['telefono']) && empty($_POST['id'])) {
    $azione = 'aggiungi';
} elseif (isset($_POST['nome']) && isset($_POST['telefono']) && !empty($_POST['id'])) {
    $azione = 'modifica';
} elseif (isset($_GET['modifica'])) {
    $azione = 'modifica';
} elseif (isset($_GET['elimina'])) {
    $azione = 'elimina';
}

switch ($azione) {
    case 'aggiungi':
        $status = 'inserimento nuovo padrone';
        if (\padroni\aggiungi($_POST['nome'], $_POST['telefono'])) {
            $status = 'padrone aggiunto con successo';
        } else {
            $status = 'errore nell\'aggiunta del padrone';
        }
        break;
    case 'modifica':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = 'modifica padrone';
            if (\padroni\modifica($_POST['id'], $_POST['nome'], $_POST['telefono'])) {
                $status = 'padrone modificato con successo';
            } else {
                $status = 'errore nella modifica del padrone';
            }
        } else {
            $status = 'precompilazione dati padrone da modificare';
            if ($padrone = \padroni\precompile($_GET['modifica'])) {
                if (!empty($padrone)) {
                    $x['contenuto']['dati']['id'] = $padrone['id'];
                    $x['contenuto']['dati']['nome'] = $padrone['nome'];
                    $x['contenuto']['dati']['telefono'] = $padrone['telefono'];
                } else {
                    $status = 'errore nel recupero dati del padrone con id ' . $_GET['modifica'];
                }
            }
        }
        break;
    case 'elimina':
        $status = 'eliminazione dati padrone';
        if (\padroni\elimina($_GET['elimina'])) {
            $status = 'eliminazione dati padrone avvenuta con successo';
        } else {
            $status = 'errore nell\'eliminazione dati padrone';
        }
        break;
    default:
        echo "♥             ♥              ♥";
        break;
}

$x['contenuto']['dati']['status'] = $status;
$x['contenuto']['lista_padroni'] = \padroni\record();
