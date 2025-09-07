<?php

$azione = $_REQUEST['azione'] ?? '';
$nome = $_REQUEST['piatto']['nome'] ?? '';
$idp = $_REQUEST['piatto']['idp'] ?? null;

switch ($azione) {
    case 'aggiungi':
        if ($nome !== '') {
            \p\aggiungi($nome);
        }
        header("Location: /?x=lista.piatti");
        exit;
    case 'modifica':
        if ($idp > 0 && $nome !== '') {
            \p\modifica($nome, $idp);
        }
        header("Location: /?x=lista.piatti");
        exit;
    case 'elimina':
        if ($idp > 0) {
            \p\elimina($idp);
        }
        header("Location: /?x=lista.piatti");
        exit;
    default:
        header("Location: /?x=lista.piatti");
        exit;
}
