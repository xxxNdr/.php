<?php

namespace render;

function r($tpl, $dati)
/* funzione ricorsiva perché dentro se stessa si richiama per renderizzare il caso speciale
di template table.html oppure tutti gli altri */

{
    $c = file_get_contents($tpl);

    foreach ($dati as $k => $v) {
        if (is_string($v) && strpos($v, 'tpl/') === 0 && strpos($v, '.html') !== false && file_exists($v)) {
            /* se il valore è una stringa che inizia con tpl/ e contiene .html e il file esiste
            nel filesystem,
            se tutto è vero, allora $v è il percorso di un template da renderizzare ricorsivamente */

            if ($v === 'tpl/table.html') {
                /* se il template interno è table.html */

                global $rows;
                // recupero la variabile globale

                $v = r($v, ['rows' => $rows ?? '']);
                /* fai il rendering ricorsivo del template passando i dati ['rows' => $rows] */
            } else {
                $v = r($v, []);
                // altrimenti rendering di un altro template senza dati, come ad esempio form.html
            }
        }
        $c = str_replace('{{' . $k . '}}', $v, $c);
    }
    return $c;
}
