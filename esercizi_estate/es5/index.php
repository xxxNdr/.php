<?php

/*esercizio 05
Riscrivere il programma precedente in modo che i livelli organizzativi siano cinque (titolare, manager, capo area, capo ufficio, lavoratore)
e in base al nome del lavoratore inserito dall'utente scrivere tutta la catena di comando che lo collega al titolare.
Utilizzare una funzione ricorsiva che attraversi l'albero in direzione foglie radice.*/



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
];

echo '<br>';
echo '<br>';


foreach ($flaminiSRL as $k => $v) {
    echo $v['nome'] . " è il CEO" . '<br>';
    foreach ($v['dipendenti'] as $k2 => $v2) {
        echo "Il capo diretto diretto di " . $v2['nome'] . " è " . $v['nome'] . '<br>';
        if (isset($v2['dipendenti']) && is_array($v2['dipendenti'])) {
            foreach ($v2['dipendenti'] as $k3 => $v3) {
                echo "Il capo diretto diretto di " . ($v3['nome'] . " è " . $v2['nome'] . '<br>');
            }
        }
    }
};
