<?php

    namespace R;

    function r($tmp, $dati) {
        $contenuto = file_get_contents($tmp);
        foreach ($dati as $k => $v) {
            $contenuto = str_replace('{{' . $k . '}}', $v, $contenuto);
        }
        return $contenuto;
    }

    