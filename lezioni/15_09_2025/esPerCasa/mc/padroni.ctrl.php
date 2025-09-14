<?php

$x['contenuto']['dati'] = [];
$x['contenuto']['dati']['status'] = 'nessuna operazione in corso';
$x['contenuto']['dati']['id'] = "";
$x['contenuto']['dati']['nome'] = "";
$x['contenuto']['dati']['telefono'] = "";
$x['contenuto']['dati']['cani_selected'] = [];
$x['contenuto']['lista_cani'] = \cani\record();
/* lista cani che si aspetta il template,
la funzione record è una select di tutto dalla tabella cani */

$status = $x['contenuto']['dati']['status'] ?? '';
$azione = null;

if (isset($_POST['nome']) && isset($_POST['telefono']) && empty($_POST['id'])) {
    $azione = 'aggiungi';
} elseif (isset($_POST['nome']) && isset($_POST['telefono']) && !empty($_POST['id'])) {
    $azione = 'modifica';
} elseif (isset($_GET['modifica'])) {
    $azione = 'modifica';
} elseif (isset($_GET['elimina'])) {
    $azione = 'elimina';
}

switch ($azione) {
    case 'aggiungi':
        $status = 'inserimento nuovo padrone';
        if (\padroni\aggiungi($_POST['nome'], $_POST['telefono'])) {
            $padrone_id = mysqli_insert_id(\DB\conn());
            $cani_selezionati = $_POST['cani'] ?? [];
            \padroni\associa($padrone_id, $cani_selezionati);
            $status = 'padrone e cane/i aggiunti con successo';
        } else {
            $status = 'errore nell\'aggiunta di padrone e cane/i';
        }
        break;
    case 'modifica':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = 'modifica padrone';
            if (\padroni\modifica($_POST['id'], $_POST['nome'], $_POST['telefono'])) {
                $cani_selezionati = $_POST['cani'] ?? [];
                \padroni\associa($_POST['id'], $cani_selezionati);
                $status = 'padrone e cane/i modificati con successo';
            } else {
                $status = 'errore nella modifica del padrone e cane/i';
            }
        } else {
            $status = 'precompilazione dati padrone da modificare';
            if ($padrone = \padroni\precompile($_GET['modifica'])) {
                if (!empty($padrone)) {
                    $x['contenuto']['dati']['id'] = $padrone['id'];
                    $x['contenuto']['dati']['nome'] = $padrone['nome'];
                    $x['contenuto']['dati']['telefono'] = $padrone['telefono'];
                    $x['contenuto']['dati']['cani_selected'] = \padroni\associati($padrone['id']);
                } else {
                    $status = 'errore nel recupero dati del padrone con id ' . $_GET['modifica'];
                }
            }
        }
        break;
    case 'elimina':
        $status = 'eliminazione dati padrone';
        if (\padroni\elimina($_GET['elimina'])) {
            $status = 'eliminazione dati padrone avvenuta con successo';
        } else {
            $status = 'errore nell\'eliminazione dati padrone';
        }
        break;
    default:
        echo "♥             ♥              ♥";
        break;
}

$x['contenuto']['dati']['status'] = $status;
$x['contenuto']['lista_padroni'] = \padroni\record();
// recupero la lista padroni dal database

foreach($x['contenuto']['lista_padroni'] ?? [] as $k => $v){
    /* per ogni chiave valore della lista padroni
    $k sarà l'indice numerico degli array
    e $v sarà l'array che contiene i dati del padrone */
    $cani_associati_id = \padroni\associati($v['id']);
    /* recupera gli id dei cani associati grazie alla funzione
    che li collega all'id del padrone */
    $cani_nomi = [];
    // inizializzo un array per i nomi dei cani
    foreach($cani_associati_id as $cane_id){
        // dell'array $cani_associati_id mostra ogni singolo id
        foreach($x['contenuto']['lista_cani'] as $cane){
            // della lista cani mostra ogni cane
            if($cane['id'] == $cane_id){
                // se l'id del cane è lo stesso id del cane associato
                $cani_nomi[] = $cane['nome'];
                // riempi $cani_nomi con ogni nome di cane
                break;
                /* se trova la corrispondenza esce dal foreach interno
                e passa al prossimo id cane associato da controllare */
            }
        }
    }
$x['contenuto']['lista_padroni'][$k]['cani_associati'] = implode(', ', $cani_nomi);
/* nell'array lista_padroni, accedi attraverso la chiave $k con indice numerico
all'elemento e aggiungi la chiave 'cani_associati' che come valore ha
i nomi dei cani (implode($cani_nomi)) */
}
