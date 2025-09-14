<?php

namespace cani;

use DateTime;
use mysqli_result;
use mysqli_sql_exception;

function aggiungi($nome, $data_nascita)
{
    if (empty($nome) || empty($data_nascita)) {
        return false;
    }
    $nome = trim($nome);
    $data_nascita = trim($data_nascita);
    $date = DateTime::createFromFormat('Y-m-d', $data_nascita);
    // crea un oggetto DateTime partendo da una stringa se la data è valida in quel formato
    if (!$date || $date->format('Y-m-d') !== $data_nascita) {
        return false;
    }
    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        /*
    attiva report errori mysqli, col primo flag vengono segnalati gli errori come avvisi
    il secondo flag permette che gli errori vengano lanciati come eccezioni, rende gli errori
    più evidenti
    */
        $stmt = mysqli_prepare(\DB\conn(), "INSERT INTO cani (nome, data_nascita) VALUES (?,?)");
        mysqli_stmt_bind_param($stmt, 'ss', $nome, $data_nascita);
        $res = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $res;
    } catch (mysqli_sql_exception $e) {
        /* quando si verifica un errore nel db mysqli genera un'eccezione
        catch intercetta l'eccezione e la salva nella variabile $e*/
        error_log("Errore inserimento: " . $e->getMessage());
        /* messaggio di errore nei log php che include il messaggio specifico dell'eccezione*/
        return false;
        // infine restituisce false al chiamante per indicare che qualcosa non è andato bene
    }
}

function elimina($id)
{
    if (!empty($id)) {
        $id = intval($id);
        $sql = "DELETE FROM cani WHERE id = ?";
        $stmt = mysqli_prepare(\DB\conn(), $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        $ex = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $ex;
    } else {
        return false;
    }
}

function record()
{
    $sql = "SELECT * FROM cani";
    $res = mysqli_query(\DB\conn(), $sql);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function precompile($id)
{
    if (!empty($id)) {
        $id = intval($id);
        $sql = "SELECT * FROM cani WHERE id = ?";
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

function modifica($id, $nome, $data_nascita)
{
    if (!empty($nome) && !empty($data_nascita) && !empty($id)) {
        $id = intval($id);
        $nome = trim($nome);
        $data_nascita = trim($data_nascita);
        $sql = "UPDATE cani SET nome = ?, data_nascita = ? WHERE id = ?";
        $stmt = mysqli_prepare(\DB\conn(), $sql);
        mysqli_stmt_bind_param($stmt, 'ssi', $nome, $data_nascita, $id);
        $ex = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $ex;
    } else {
        return false;
    }
}
