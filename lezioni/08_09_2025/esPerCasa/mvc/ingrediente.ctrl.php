<?php

$azione = $_REQUEST['azione'] ?? '';
$nome = $_REQUEST['ingrediente']['nome'] ?? '';
$idi = $_REQUEST['ingrediente']['idi'] ?? null;

switch ($azione) {
    case 'aggiungi':
        if ($nome !== '') {
            \i\aggiungi($nome);
        }
        header("Location: /?x=lista.ingredienti");
        exit;
    case 'modifica':
        if ($idi > 0 && $nome !== '') {
            \i\modifica($nome, $idi);
        }
        header("Location: /?x=lista.ingredienti");
        exit;
    case 'elimina':
        if ($idi > 0) {
            \i\elimina($idi);
        }
        header("Location: /?x=lista.ingredienti");
        exit;
    default:
        header("Location: /?x=lista.ingredienti");
        exit;
}
