<?php


namespace padroni;

use mysqli_sql_exception;


function aggiungi($nome, $telefono)
{
    if (empty($nome) || empty($telefono)) {
        return false;
    }
    $nome = trim($nome);
    if (!is_numeric($telefono) || strlen($telefono) > 10) {
        return false;
    }
    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $stmt = mysqli_prepare(\DB\conn(), "INSERT INTO persone (nome, telefono) VALUES (?,?)");
        mysqli_stmt_bind_param($stmt, 'si', $nome, $telefono);
        $res = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $res;
    } catch (mysqli_sql_exception $e) {
        error_log("Errore inserimento: " . $e->getMessage());
        return false;
    }
}

function elimina($id)
{
    if (!empty($id)) {
        $id = intval($id);
        try {
            // prima elimino tutti i cani associati al padrone
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $stmt = mysqli_prepare(\DB\conn(), "DELETE FROM padroni_cani WHERE padrone_id = ?");
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            // dopo elimino il padrone
            $stmt = mysqli_prepare(\DB\conn(), "DELETE FROM persone WHERE id = ?");
            mysqli_stmt_bind_param($stmt, 'i', $id);
            $ex = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            return $ex;
        } catch (mysqli_sql_exception $e) {
            error_log("Errore eliminazione: " . $e->getMessage());
            return false;
        }
    } else {
        return false;
    }
}


function record()
{
    $sql = "SELECT * FROM persone";
    $res = mysqli_query(\DB\conn(), $sql);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function precompile($id)
{
    if (!empty($id)) {
        $id = intval($id);
        $sql = "SELECT * FROM persone WHERE id = ?";
        $stmt = mysqli_prepare(\DB\conn(), $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($res);
        mysqli_stmt_close($stmt);
        return $row ?: false;
    } else {
        return false;
    }
}

function modifica($id, $nome, $telefono)
{
    if (!empty($nome) && !empty($telefono) && !empty($id)) {
        $id = intval($id);
        $nome = trim($nome);
        $telefono = intval($telefono);
        $sql = "UPDATE persone SET nome = ?, telefono = ? WHERE id = ?";
        $stmt = mysqli_prepare(\DB\conn(), $sql);
        mysqli_stmt_bind_param($stmt, 'sii', $nome, $telefono, $id);
        $ex = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $ex;
    } else {
        return false;
    }
}

function associa($padrone_id, array $cani_ids)
{
    $stmt = mysqli_prepare(\DB\conn(), "DELETE FROM padroni_cani WHERE padrone_id = ?");
    // eliminando il padrone id come anche cane id si spezza la relazione fra loro
    mysqli_stmt_bind_param($stmt, 'i', $padrone_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $stmt = mysqli_prepare(\DB\conn(), "INSERT INTO padroni_cani (padrone_id, cane_id) VALUES (?,?)");
    // il puntatore della variabile PHP si aggiorna all'ultimo stmt preparato
    foreach ($cani_ids as $cane_id) {
        $cane_id = intval($cane_id);
        mysqli_stmt_bind_param($stmt, 'ii', $padrone_id, $cane_id);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
}

function associati($padrone_id)
{
    /* $padrone_id invece di $cane_id andrebbe bene lo stesso ma in linea di principio
    cerco i cani associati al padrone e non i padroni associati al cane */

    $stmt = mysqli_prepare(\DB\conn(), "SELECT cane_id FROM padroni_cani WHERE padrone_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $padrone_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    /* prende il risultato di uno stmt già eseguito e lo trasforma in un oggetto
    utile per scorrere i dati ottenuti con altre funzioni */
    $ids = [];
    while ($row = mysqli_fetch_assoc($res)) {
        /* prende una riga per volta della query precedente, trasformata poi in oggetto $res
        e la trasforma in array associativo */
        $ids[] = $row['cane_id'];
    }
    mysqli_stmt_close($stmt);
    return $ids;
}
