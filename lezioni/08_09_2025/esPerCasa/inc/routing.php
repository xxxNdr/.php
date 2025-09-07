<?php

if ($_REQUEST['azione']) {
    $azione = $_REQUEST['azione'] ?? '';
    if ($azione && $azione !== 'aggiungi') {
        if (in_array($x, ['lista.piatti', 'lista.ingredienti'])) {
            include 'mvc/' . ($x === 'lista.piatti' ? 'piatto' : 'ingrediente') . '.ctrl.php';
        } else {
            if (isset($_REQUEST['piatto'])) {
                include 'mvc/piatto.ctrl.php';
            } elseif (isset($_REQUEST['ingrediente'])) {
                include 'mvc/ingrediente.ctrl.php';
            }
        }
    }
}
