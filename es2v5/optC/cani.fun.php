<?php

namespace cani;

use mysqli;

function lista(): array
{
    $conn = \db\connetti();
    $query = mysqli_query($conn, "select *, p.cognome from cani c join padroni p on c.id_padrone = p.idp ");
    $res = $query ? mysqli_fetch_all($query, MYSQLI_ASSOC) : [];
    return $res;
}


function valida(string $date): bool
{
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        return false;
    }
    [$year, $month, $day] = explode('-', $date);
    return checkdate((int)$month, (int)$day, (int)$year);
};


function aggiungi(string $nome, string $datan, string $datav, int $id_padrone): bool
{
    if (!empty($nome) && !empty($datan) && !empty($datav) && $id_padrone > 0) {
        $conn = \db\connetti();
        if (!$conn) {
            return false;
        }
        $nomeEsc = mysqli_real_escape_string($conn, trim($nome));
        $datanEsc = mysqli_real_escape_string($conn, trim($datan));
        $datavEsc = mysqli_real_escape_string($conn, trim($datav) . '-01');
        $idPadroneEsc = (int)$id_padrone;

        if (!valida($datan) || !valida($datavEsc)) {
            return false;
        }

        $query = "insert into cani (nome, data_nascita, data_vaccinazione, id_padrone) values ('$nomeEsc', '$datanEsc',
        '$datavEsc', '$idPadroneEsc')";
        return mysqli_query($conn, $query);
    } else {
        return false;
    }
}

function modifica(int $idc, string $nome, string $datan, string $datav, $id_padrone): bool
{
    if ($idc <= 0 || empty($nome) || empty($datan) || empty($datav) || $id_padrone <= 0) {
        return false;
    }
    $conn = \db\connetti();
    if (!$conn) {
        return false;
    }

    $nomeEsc = mysqli_real_escape_string($conn, trim($nome));
    $datanEsc = mysqli_real_escape_string($conn, trim($datan));
    $datavEsc = mysqli_real_escape_string($conn, trim($datav) . '-01');
    $idPadroneEsc = (int)$id_padrone;

    if (!valida($datan) || !valida($datavEsc)) {
        return false;
    }

    $query = "update cani set nome = '$nomeEsc', data_nascita = '$datanEsc', data_vaccinazione = '$datavEsc',
        id_padrone = $idPadroneEsc where idc = $idc";

    return mysqli_query($conn, $query);
}


function elimina(int $idc): bool
{
    if ($idc <= 0) {
        return false;
    }
    $conn = \db\connetti();
    if (!$conn) {
        return false;
    }

    $query = "delete from cani where idc = $idc";
    $res = mysqli_query($conn, $query);
    return $res !== false;
}


function dettagli(int $idc): array
{
    if ($idc <= 0) {
        return [];
    }
    $conn = \db\connetti();

    if (!$conn) {
        return [];
    }
    $idc = (int)$idc;
    $query = "select * from cani where idc = $idc";
    $res = mysqli_query($conn, $query);

    if ($res) {
        $row = mysqli_fetch_assoc($res);
        mysqli_free_result($res);
        return $row !== null ? $row : [];
    } else {
        return [];
    }
}
