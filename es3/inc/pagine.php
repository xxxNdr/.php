<?php


$prezzi = array(
    '1' => 13,
    '2' => 15,
    '3' => 13,
    '4' => 10,
    '5' => 6.5,
    '6' => 5
);

$piatti = array(
    '1' => 'Ziti alla mediterranea',
    '2' => 'Mezzelune',
    '3' => 'Parmigiana',
    '4' => "Carpaccio d'anguria",
    '5' => 'Tortino al dattero',
    '6' => 'Macedonia di stagione'
);

$riepilogo = '';
$totale = 0;
if (!empty($_POST)) {
    foreach ($_POST as $k => $v) {
        if (isset($piatti[$v])) {
            $riepilogo .= $piatti[$v] . '..........€' . $prezzi[$v] . '<br>';
            $totale += $prezzi[$v];
        }
    }
    $riepilogo .= 'Totale: ..........' . '<strong>€' . $totale . '</strong>';
}

$pagine = array(
    0 => array(
        'dati' => array(
            'titolo' => 'menu',
            'h1' => 'Menu',
            'contenuto' => 'Scegli 3 portate',
            'select1' => '<option value="1">Ziti alla mediterranea</option>
  <option value="2">Mezzelune</option>',
            'select2' => '<option value="3">Parmigiana</option>
  <option value="4">Carpaccio d\'anguria</option>',
            'select3' => '<option value="5">Tortino al dattero</option>
  <option value="6">Macedonia di stagione</option>'
        ),
        'template' => 'tmp/index.html'
    ),
    1 => array(
        'dati' => array(
            'titolo' => 'ordinazione',
            'h1' => 'Riepilogo ordine',
            'contenuto' => $riepilogo
        ),
        'template' => 'tmp/conferma.html',
    ),
    2 => array(
        'dati' => array(
            'titolo' => 'conferma ordine',
            'h1' => 'Ordine confermato',
            'contenuto' => 'Grazie per aver effetuato un ordine con noi. Alla prossima!'
        ),
        'template' => 'tmp/output.html',
    ),

);


if (!isset($_REQUEST['x']) || !isset($pagine[$_REQUEST['x']])) {
    $_REQUEST['x'] = 0;
}