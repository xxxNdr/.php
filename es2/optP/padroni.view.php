<?php


$record = [];
foreach (padroni\lista() as $padrone) {
    $record[] = render\r(
        'tpl/padroni.table.row.html',
        [
            'id' => $padrone['id'],
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
        'id' => $_REQUEST['id'] ?? '',
        'cognome' => $_REQUEST['cognome'] ?? '',
        'telefono' => $_REQUEST['telefono'] ?? '',

    ]
);

$x['contenuto']['main'] = $lista . $form;