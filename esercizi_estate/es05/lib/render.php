<?php

namespace r;

function render($tpl, $dati)
{
    $c = file_get_contents($tpl);
    foreach ($dati as $k => $v) {
        $c = str_replace('{{' . $k . '}}', $v, $c);
    }
    return $c;
}
