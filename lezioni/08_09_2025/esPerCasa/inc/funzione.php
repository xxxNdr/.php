<?php

function tipo($array, $req)
{
    $tipo = (strpos($req, 'piatti') !== false) ? 'piatto' : 'ingrediente';
    $titolo = $array[$req]['body']['titolo'] ?? 'default title';

    return ['tipo' => $tipo, 'titolo' => $titolo];
}