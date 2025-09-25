

<?php

require_once 'lib/render.php';

$flaminiSRL = [
    'ceo' => [
        'nome' => 'Francesca Flamini',
        'dipendenti' => [
            'manager' => [
                'nome' => 'Paolo Sartori',
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
                        'nome' => 'Rosella Crucianelli',
                        'dipendenti' => [
                            'grafica' => [
                                'nome' => 'Mimmi'
                            ],
                            'stampa' => [
                                'nome' => 'Franco'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];

function trova(array $array, string $dipendente)
{
    $dipendente = strtolower($dipendente);

    foreach ($array as $k => $v) {
        foreach ($v['dipendenti'] as $k2 => $v2) {
            if (isset($v2['dipendenti'])) {
                foreach ($v2['dipendenti'] as $k3 => $v3) {
                    if (isset($v3['dipendenti'])) {
                        foreach ($v3['dipendenti'] as $k4 => $v4) {

                            if (strtolower($v4['nome']) == $dipendente) {
                                return $v3['nome'];
                            }
                        }
                    }
                    if (strtolower($v3['nome']) == $dipendente) {
                        return $v2['nome'];
                    };
                }
            }
            if (strtolower($v2['nome']) == $dipendente) {
                return $v['nome'];
            }
        }
        if (strtolower($v['nome']) == $dipendente) {
            return "{$v['nome']} è il CEO di FLAMINI SRL";
        }
    }
    return null;                // se non viene trovato il dipendente
};




$dip = [];
foreach ($flaminiSRL as $k => $v) {
    $dip[] = $v['nome'];
    foreach ($v['dipendenti'] as $k2 => $v2) {
        $dip[] = $v2['nome'];
        if (isset($v2['dipendenti'])) {
            foreach ($v2['dipendenti'] as $k3 => $v3) {
                $dip[] = $v3['nome'];
                if (isset($v3['dipendenti'])) {
                    foreach ($v3['dipendenti'] as $k4 => $v4) {
                        $dip[] = $v4['nome'];
                    }
                }
            }
        }
    }
}

$listaDip = '';
foreach($dip as $nome){
    $listaDip .= "<li>$nome</li>";
}

echo r\render('form.html', ['dipendenti' => $listaDip]);

if (isset($_POST['nome'])) {
    $capo = trova($flaminiSRL, $_POST['nome']);
    if ($capo == null) {
        ?><div id="msg"><?php echo "Dipendente non trovato";?></div><?php
    } else {
        ?><div id="msg"><?php echo "Il capo di {$_POST['nome']} è: $capo";?></div><?php
    }
}