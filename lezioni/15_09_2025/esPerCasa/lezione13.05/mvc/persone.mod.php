<?php

namespace persone;
use mysqli_sql_exception;

function aggiungi($nome, $telefono)
{
    if (empty($nome) || empty($telefono)) {
        return false;
    }
    $nome = trim($nome);
    $telefono = intval($telefono);
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
        $sql = "DELETE FROM persone WHERE id = ?";
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
