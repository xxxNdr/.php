<?php

namespace render;

function r($tpl, $dati)
{
    $c = file_get_contents($tpl);
    foreach ($dati as $k => $v) {
        $c = str_replace('{{' . $k . '}}', $v, $c);
    }
    return $c;
}
