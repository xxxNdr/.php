<?php

$risultato = '';
$azione = $_POST['azione'] ?? '';

if (!empty($azione)) {
    if ($azione === 'cten') {
        $r = isset($_POST['resistenza']) ? floatval($_POST['resistenza']) : 0;
        $i = isset($_POST['corrente']) ? floatval($_POST['corrente']) : 0;
        if ($r <= 0) {
            $risultato = "La resistenza deve essere maggiore di 0";
        } elseif ($i <= 0) {
            $risultato = "La corrente deve essere maggiore di 0";
        } else {
            $v = tensione($r, $i);
            $risultato = "La tensione è: $v V";
        }
    } elseif ($azione === 'cres') {
        $v = isset($_POST['tensione']) ? floatval($_POST['tensione']) : 0;
        $i = isset($_POST['corrente']) ? floatval($_POST['corrente']) : 0;
        if ($v <= 0) {
            $risultato = "La tensione deve essere maggiore di 0";
        } elseif ($i <= 0) {
            $risultato = "La corrente deve essere maggiore di 0";
        } else {
            $r = resistenza($v, $i);
            $risultato = "La resistenza è: $r Ω";
        }
    } elseif ($azione === 'ccor') {
        $v = isset($_POST['tensione']) ? floatval($_POST['tensione']) : 0;
        $r = isset($_POST['resistenza']) ? floatval($_POST['resistenza']) : 0;
        if ($v <= 0) {
            $risultato = "La tensione deve essere maggiore di 0";
        } elseif ($r <= 0) {
            $risultato = "La resistenza deve essere maggiore di 0";
        } else {
            $i = corrente($v, $r);
            $risultato = "La corrente è: $i A";
        }
    } else {
        $risultato = "Scelta di calcolo non riconosciuta";
    }
}
