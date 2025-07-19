<?php

namespace render;

function r(string $tpl, array $dati): string
{
    $content = file_get_contents($tpl);
    foreach ($dati as $k => $v) {
        $placeholder = '{{' . $k . '}}';
        $content = str_replace($placeholder, $v, $content);
    }
    return $content;
}
