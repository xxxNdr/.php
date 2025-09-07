<?php

namespace p;

function aggiungi($nome)
{
    if (empty($nome)) {
        return false;
    }
    $nome = trim($nome);
    $sql = "INSERT INTO piatti (nome) VALUES (?)";
    $stmt = mysqli_prepare(\db\conn(), $sql);
    if (!$stmt) {
        return false;
    }
    mysqli_stmt_bind_param($stmt, 's', $nome);
    $risucita = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $risucita;
}

function modifica($nome, $idp)
{
    if (empty($nome) || empty($idp)) {
        return false;
    }
    $nome = trim($nome);
    $idp = intval($idp);
    $sql = "UPDATE piatti SET nome = ? WHERE idp = ?";
    $stmt = mysqli_prepare(\db\conn(), $sql);
    if (!$stmt) {
        return false;
    }
    mysqli_stmt_bind_param($stmt, 'si', $nome, $idp);
    $riuscita = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $riuscita;
}

function elimina($idp)
{
    if (empty($idp)) {
        return false;
    }
    $idp = intval($idp);
    $sql = "DELETE FROM piatti WHERE idp = ?";
    $stmt = mysqli_prepare(\db\conn(), $sql);
    if (!$stmt) {
        return false;
    }
    mysqli_stmt_bind_param($stmt, 'i', $idp);
    $riuscita = mysqli_stmt_execute($stmt);
    return $riuscita;
}

function records()
{
    $piatti = [];
    $sql = "SELECT * FROM piatti";
    $res = mysqli_query(\db\conn(), $sql);
    if ($res === false) {
        return [];
    }
    while ($row = mysqli_fetch_assoc($res)) {
        $piatti[] = $row;
    }
    return $piatti;
}
