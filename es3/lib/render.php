<?php

    function render($tpl, $d) {
        $c = file_get_contents($tpl);
        foreach ($d as $k => $v) {
            $c = str_replace('{{' . $k . '}}', $v, $c);
        }
        return $c;
    }

    // function somma($a, $b, $c)