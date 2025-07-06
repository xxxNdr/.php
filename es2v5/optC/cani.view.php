<?php


$record = [];
foreach (cani\lista() as $cane) {
    $record[] = render\r(
        'tpl/cani.table.row.html',
        [
            'idc' => $cane['idc'],
            'nome' => $cane['nome'],
            'data_nascita' => $cane['data_nascita'],
            'data_vaccinazione' => $cane['data_vaccinazione'],
            'cognome_padrone' => $cane['cognome'],
        ]
    );
}

$lista = render\r(
    'tpl/cani.table.html',
    [
        'lista' => implode('', $record)
    ]
);

$padroni = \padroni\lista();
$opzioni = '';
$idPadroneSelezionato = $_REQUEST['id_padrone'] ?? '';

foreach($padroni as $padrone){
    $selected = ($padrone['idp'] == $idPadroneSelezionato) ? 'selected' : '';
    $opzioni .= "<option value='{$padrone['idp']}' $selected>" . ($padrone['cognome']) . "</option>";
}

$form = render\r(
    'tpl/cani.form.html',
    [
        'azione' => (($_REQUEST['azione'] ?? '') == 'modifica') ? 'modifica' : 'aggiungi',
        'idc' => $_REQUEST['idc'] ?? '',
        'nome' => $_REQUEST['nome'] ?? '',
        'data_nascita' => $_REQUEST['data_nascita'] ?? '',
        'data_vaccinazione' => $_REQUEST['data_vaccinazione'] ?? '',
        'opzioni_padroni' => $opzioni
    ]
);

$x['contenuto']['main'] = $lista . $form;