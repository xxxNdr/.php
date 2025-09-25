<?php


$flaminiSRL = [
    'ceo' => [
        'nome' => 'Francesca Flamini',
        'dipendenti' => [
            'direttrice vendite' => [
                'nome' => 'Giulia Corradini',
                'dipendenti' => [
                    'agente vendite1' => [
                        'nome' => 'Giordano Corradini'
                    ],
                    'agente vendite2' => [
                        'nome' => 'Andrea Sartori'
                    ]
                ],
                'risorse umane' => [
                    'nome' => 'Elisa Flamini'
                ],
                'direttrice marketing' => [
                    'nome' => 'Rosella Caporaletti',
                    'dipendenti' => [
                        'grafica' => [
                            'nome' => 'Minni'
                        ],
                        'stampa' => [
                            'nome' => 'Franco'
                        ]
                    ]
                ]
            ]
        ]
    ]
];

foreach ($flaminiSRL as $k => $v) {
    echo $v['nome'] . " è il CEO" . '<br>';
    foreach (next($v) as $k2 => $v2) {
        echo "Il capo diretto diretto di " . $v2['nome'] . " è " . $v['nome'] . '<br>';
        foreach (next($v2) as $k3 => $v3) {
            echo "Il capo diretto diretto di " . ($v3['nome'] . " è " . $v2['nome'] . '<br>');
            foreach (next($v2) as $d) {
                if (is_array($d) && isset($d['nome'])) {
                    echo $d['nome'];
                } elseif (is_string($d)) {
                    echo "Il capo diretto diretto di " . $d . " è " . $v['nome'] . '<br>';
                }
                if (is_array($d)) {
                    foreach ($d as $k => $v) {
                        if (is_string($d)) {
                            echo "Il capo diretto diretto di " . $v['nome'] . " è " . $d['nome'] . '<br>';
                        }
                    }
                }
            }
        }
    }
};

/* next($v) NEL MIO ARRAY SPOSTA IL PUNTATORE DA 'nome' A 'dipendenti'.
    È COME SE AVESSI SCRITTO $v['dipendenti'].
    PERO USARE next() PIU VOLTE O DENTRO FOREACH ANNIDATI SENZA RESETTARE IL PUNTATORE COMPORTA
    CHE IL PUNTATORE POSSA SUPERARE IL LIMITE DELL'ARRAY, COSI RESTITUENDO FALSE
    O ANCHE STRINGA IN BASE ALLA STRUTTURA DELL'ARRAY.
    PERCIO SERVONO ALLA FINE I CONTROLLI is_array E is_string. */

echo '<br>';
echo '<pre>';
print_r($flaminiSRL);
echo '</pre>';
