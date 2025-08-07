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

$select = select\select($destinazioni, "mediterraneo", "destinazioni");
$checkbox = checkbox\checkbox($optional);

$form = render\r(
    'tpl/form.html',
    [
        'destinazioni' => $select,
        'optional' => $checkbox,
    ]
);

