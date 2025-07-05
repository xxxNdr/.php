<?php


$record = [];
foreach (cani\lista() as $cane) {
    $record[] = render\r(
        'tpl/cani.table.row.html',
        [
            'id' => $cane['id'],
            'nome' => $cane['nome'],
            'data_nascita' => $cane['data_nascita'],
            'data_vaccinazione' => $cane['data_vaccinazione'],
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
$idPadroneSelezionato = $_REQUEST['id_padrone'] ?? ($_REQUEST['id_padrone'] ?? '');

foreach($padroni as $padrone){
    $selected = ($padrone['id'] == $idPadroneSelezionato) ? 'selected' : '';
    $opzioni .= "<option value='{$padrone['id']}' $selected>" . ($padrone['cognome']) . "</option>";
}

$form = render\r(
    'tpl/cani.form.html',
    [
        'azione' => (($_REQUEST['azione'] ?? '') == 'modifica') ? 'modifica' : 'aggiungi',
        'id' => $_REQUEST['id'] ?? '',
        'nome' => $_REQUEST['nome'] ?? '',
        'data_nascita' => $_REQUEST['data_nascita'] ?? '',
        'data_vaccinazione' => $_REQUEST['data_vaccinazione'] ?? '',
        'opzioni_padroni' => $opzioni
    ]
);

$x['contenuto']['main'] = $lista . $form;