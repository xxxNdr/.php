<?php

$x['contenuto']['dati'] = [];
$x['contenuto']['dati']['status'] = 'nessuna operazione in corso';
$x['contenuto']['dati']['id'] = "";
$x['contenuto']['dati']['nome'] = "";
$x['contenuto']['dati']['data_nascita'] = "";
$x['contenuto']['lista_cani'] = "";

$status = $x['contenuto']['dati']['status'] ?? '';
$azione = null;

if (isset($_POST['nome']) && isset($_POST['data_nascita']) && empty($_POST['id'])) {
    $azione = 'aggiungi';
} elseif (isset($_POST['nome']) && isset($_POST['data_nascita']) && !empty($_POST['id'])) {
    $azione = 'modifica';
} elseif (isset($_GET['modifica'])) {
    $azione = 'modifica';
} elseif (isset($_GET['elimina'])) {
    $azione = 'elimina';
}

switch ($azione) {
    case 'aggiungi':
        $status = 'inserimento nuovo cane';
        if (\cani\aggiungi($_POST['nome'], $_POST['data_nascita'])) {
            $status = 'cane aggiunto con successo';
        } else {
            $status = 'errore nell\'aggiunta del cane';
        }
        break;
    case 'modifica':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = 'modifica cane';
            if (\cani\modifica($_POST['id'], $_POST['nome'], $_POST['data_nascita'])) {
                $status = 'cane modificato con successo';
            } else {
                $status = 'errore nella modifica del cane';
            }
        } else {
            $status = 'precompilazione dati cane da modificare';
            if ($cane = \cani\precompile($_GET['modifica'])) {
                if (!empty($cane)) {
                    $x['contenuto']['dati']['id'] = $cane['id'];
                    $x['contenuto']['dati']['nome'] = $cane['nome'];
                    $x['contenuto']['dati']['data_nascita'] = $cane['data_nascita'];
                } else {
                    $status = 'errore nel recupero dati del cane con id ' . $_GET['modifica'];
                }
            }
        }
        break;
    case 'elimina':
        $status = 'eliminazione dati cane';
        if (\cani\elimina($_GET['elimina'])) {
            $status = 'eliminazione dati cane avvenuta con successo';
        } else {
            $status = 'errore nell\'eliminazione dati cane';
        }
        break;
    default:
}

$x['contenuto']['dati']['status'] = $status;
$x['contenuto']['lista_cani'] = \cani\record();
