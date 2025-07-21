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


// echo '<br>';
// echo '<br>';
// var_dump($flaminiSRL['ceo']['dipendenti']['direttrice vendite']['nome']);
// $direttriceVendite = $flaminiSRL['ceo']['dipendenti']['direttrice vendite']['nome'];
// echo '<br>';
// echo '<br>';
// var_dump($flaminiSRL['ceo']['dipendenti']['direttrice vendite']['dipendenti']['agente vendite1']['nome']);
// echo '<br>';
// echo '<br>';
// var_dump($flaminiSRL['ceo']['dipendenti']['direttrice vendite']['dipendenti']['agente vendite2']['nome']);
// $agenteVendite1 = $flaminiSRL['ceo']['dipendenti']['direttrice vendite']['dipendenti']['agente vendite1']['nome'];
// $agenteVendite2 = $flaminiSRL['ceo']['dipendenti']['direttrice vendite']['dipendenti']['agente vendite2']['nome'];
// echo '<br>';
// echo '<br>';
// var_dump($flaminiSRL['ceo']['nome']);
// $ceo = $flaminiSRL['ceo']['nome'];
// echo '<br>';
// echo '<br>';
// var_dump($flaminiSRL['ceo']['dipendenti']['direttrice vendite']['risorse umane']['nome']);
// $risorseUmane = $flaminiSRL['ceo']['dipendenti']['direttrice vendite']['risorse umane']['nome'];
// echo '<br>';
// echo '<br>';
// var_dump($flaminiSRL['ceo']['dipendenti']['direttrice vendite']['direttrice marketing']['nome']);
// $direttriceMarketing = $flaminiSRL['ceo']['dipendenti']['direttrice vendite']['direttrice marketing']['nome'];
// echo '<br>';
// echo '<br>';


foreach ($flaminiSRL as $k => $v) {
    echo $v['nome'] . " è il CEO" . '<br>';
    foreach (next($v) as $k2 => $v2) {
        echo "Il capo diretto diretto di " . $v2['nome'] . " è " . $v['nome'] . '<br>';
        foreach (next($v2) as $k3 => $v3) {
            echo "Il capo diretto diretto di " . ($v3['nome'] . " è " . $v2['nome'] . '<br>');
            foreach (next($v2) as $d) {                 // $d può essere array e stringa
                if (is_array($d) && isset($d['nome'])) {
                    echo $d['nome'];
                } elseif (is_string($d)) {
                    echo "Il capo diretto diretto di " . $d . " è " . $v['nome'] . '<br>';
                }
                if (is_array($d)) {                     // is_array previene l'esecuzione del foreach quando una variabile è stringa
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

echo '<br>';
echo '<pre>';
print_r($flaminiSRL);
echo '</pre>';