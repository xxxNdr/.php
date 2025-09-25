<?php

// v = tensione in volt
// r = resistenza in ohm
// i = corrente in ampere

function tensione($r, $i)
{
    return $r * $i;
}

function resistenza($v, $i)
{
    if ($i < 0.001) {
        throw new Exception("Il valore della corrente non può essere zero");
        // evito divisione per 0
    }
    return $v / $i;
}

function corrente($v, $r)
{
    if ($r < 0.001) {
        throw new Exception("Il valore della resistenza non può essere zero");
        // evito divisione per 0

    }
    return $v / $r;
}
