    <?php


$azione = $_REQUEST['azione'] ?? '';

$idc = $_REQUEST['idc'] ?? null;
$nome = $_REQUEST['nome'] ?? null;
$dataNascita = $_REQUEST['data_nascita'] ?? null;
$dataVaccinazione = $_REQUEST['data_vaccinazione'] ?? null;
$id_padrone = $_REQUEST['id_padrone'] ?? null;
$output = $x['contenuto']['footer'] ?? '';

switch ($azione) {
    case 'aggiungi':
        if (!empty($nome) && !empty($dataNascita) && !empty($dataVaccinazione) && !empty($id_padrone)) {
            $s = cani\aggiungi($nome, $dataNascita, $dataVaccinazione, (int)$id_padrone);
            $output = $s ? "<p>Aggiunta di $nome nato il $dataNascita con ultima vaccinazione $dataVaccinazione</p>"
                : "<p>Errore nell'ultima aggiunta</p>";
        }
        break;

    case 'modifica':
        if ($idc && $nome && $dataNascita && $dataVaccinazione && $id_padrone) {
            $s = cani\modifica($idc, $nome, $dataNascita, $dataVaccinazione, (int)$id_padrone);
            $output = $s ? "<p>Modifica di $idc riuscita</p>" : "<p>Ultima modifica fallita</p>";
        }

        if ($idc) {
            $cane = cani\dettagli($idc);
            if (!empty($cane)) {
                $_REQUEST = array_merge($_REQUEST, $cane);
            } else {
                $output = "<p>Errore nel recupero dei dati di $idc</p>";
            }
        }
        break;

    case 'elimina':
        if ($idc) {
            $s = cani\elimina($idc);
            $output = $s ? "<p>Eliminazione di $idc riuscita</p>" : "<p>Errore nell'ultima eliminazione</p>";
        }
        break;
}

$x['contenuto']['footer'] = $output;

