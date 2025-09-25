<?php


$destinazioni = [
    'mediterraneo' => 500,
    'caraibi' => 700,
    'norvegia' => 1000,
    'mondo' => 15000
];

$optional = [
    'assicurazione' => 30,
    'wifi' => 10,
    'spa' => 80,
    'escursione' => 50,
    'alcolici' => 30,
    'balcone' => 150,
    'suite' => 500
];

$risultato = "";

if (isset($_POST['destinazioni'])) {
    $scelta = $_POST['destinazioni'];
    $costoDestinazione = $destinazioni[$scelta] ?? 0;

    $costoOptional = 0;
    if (isset($_POST['optional'])) {
        foreach ($_POST['optional'] as $o) {
            if (isset($optional[$o])) {
                $costoOptional += $optional[$o];
            }
        }
    }
    $tot = $costoDestinazione + $costoOptional;
    $risultato = render\r('tpl/risultato.html', ['totale' => $tot]);
}

if(isset($_POST['reset'])){
header("Location: " . $_SERVER['PHP_SELF'])
/* I dati vengono cancellati tramite redirect
    Il browser riceve l'istruzione di ricaricare index.php
    tramite una nuova richiesta GET
    senza inviare i dati POST inseriti precedentemente nel form
    Questo comporta che tutte le variabili inviate via POST,
    inclusi i dati compilati nel form,
    vadano persi perché la nuova richiesta non li contiene*/;
exit;
}

$select = select\select($destinazioni, "mediterraneo", "destinazioni");
$checkbox = checkbox\checkbox($optional);

$form = render\r(
    'tpl/form.html',
    [
        'destinazioni' => $select,
        'optional' => $checkbox,
    ]
);