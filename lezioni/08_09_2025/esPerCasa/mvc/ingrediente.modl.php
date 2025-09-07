<?php

namespace i;

function aggiungi($nome)
{
    if (empty($nome)) {
        return false;
    }
    $nome = trim($nome);
    $sql = "INSERT INTO ingredienti (nome) VALUES (?)";
    $stmt = mysqli_prepare(\db\conn(), $sql);
    if (!$stmt) {
        return false;
    }
    mysqli_stmt_bind_param($stmt, 's', $nome);
    $risucita = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $risucita;
}

function modifica($nome, $idi)
{
    if (empty($nome) || empty($idi)) {
        return false;
    }
    $nome = trim($nome);
    $idi = intval($idi);
    $sql = "UPDATE ingredienti SET nome = ? WHERE idi = ?";
    $stmt = mysqli_prepare(\db\conn(), $sql);
    if (!$stmt) {
        return false;
    }
    mysqli_stmt_bind_param($stmt, 'si', $nome, $idi);
    $riuscita = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $riuscita;
}

function elimina($idi)
{
    if (empty($idi)) {
        return false;
    }
    $idi = intval($idi);
    $sql = "DELETE FROM ingredienti WHERE idi = ?";
    $stmt = mysqli_prepare(\db\conn(), $sql);
    if (!$stmt) {
        return false;
    }
    mysqli_stmt_bind_param($stmt, 'i', $idi);
    $riuscita = mysqli_stmt_execute($stmt);
    return $riuscita;
}

function records()
{
    $ingredienti = [];
    $sql = "SELECT * FROM ingredienti";
    $res = mysqli_query(\db\conn(), $sql);
    if ($res === false) {
        return [];
    }
    while ($row = mysqli_fetch_assoc($res)) {
        $ingredienti[] = $row;
    }
    return $ingredienti;
}
