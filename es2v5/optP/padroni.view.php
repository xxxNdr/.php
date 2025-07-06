<?php


$record = [];
foreach (padroni\lista() as $padrone) {
    $record[] = render\r(
        'tpl/padroni.table.row.html',
        [
            'idp' => $padrone['idp'],
            'cognome' => $padrone['cognome'],
            'telefono' => $padrone['telefono'],
        ]
    );
}

$lista = render\r(
    'tpl/padroni.table.html',
    [
        'lista' => implode('', $record)
    ]
);

$form = render\r(
    'tpl/padroni.form.html',
    [
        'azione' => (($_REQUEST['azione'] ?? '') == 'modifica') ? 'modifica' : 'aggiungi',
        'idp' => $_REQUEST['idp'] ?? '',
        'cognome' => $_REQUEST['cognome'] ?? '',
        'telefono' => $_REQUEST['telefono'] ?? '',

    ]
);

$x['contenuto']['main'] = $lista . $form;