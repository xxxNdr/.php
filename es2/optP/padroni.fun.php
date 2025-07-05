<?php

namespace padroni;

function lista(): array
{
    $conn = \db\connetti();
    $res = mysqli_query($conn, "select * from padroni order by cognome");
    $dati = $res ? mysqli_fetch_all($res, MYSQLI_ASSOC) : [];
    return $dati;
}



function aggiungi(string $cognome,  $telefono): bool
{
    if (!empty($cognome) && !empty($telefono)) {
        $conn = \db\connetti();
        if (!$conn) {
            return false;
        }
        $cognome = trim($cognome);
        $telefono = trim($telefono);

        $cognomeEsc = mysqli_real_escape_string($conn, $cognome);
        $telefonoEsc = mysqli_real_escape_string($conn, $telefono);

        $query = "insert into padroni (cognome, telefono) values ('$cognomeEsc', '$telefonoEsc')";
        $res = mysqli_query($conn, $query);
        return $res;
    } else {
        return false;
    }
}

function modifica(int $id, string $cognome, int $telefono): bool
{
    if ($id <= 0 || empty($cognome) || empty($telefono)){
        return false;
    }
    $conn = \db\connetti();
    if (!$conn) {
        return false;
    }

    $cognomeEsc = mysqli_real_escape_string($conn, trim($cognome));
    $telefonoEsc = mysqli_real_escape_string($conn, trim($telefono));

    $query = "update padroni set nome = '$cognomeEsc', telefono = '$telefonoEsc' where id = $id";

    $res = mysqli_query($conn, $query);

    if (!$res) {
        error_log("MySQL error in modifica(): " . mysqli_error($conn));
    }

    return $res;
}


function elimina(int $id): bool
{
    if ($id <= 0) {
        return false;
    }
    $conn = \db\connetti();
    if (!$conn) {
        return false;
    }

    $query = "delete from padroni where id = $id";
    $res = mysqli_query($conn, $query);
    return $res !== false;
};

function dettagli(int $id): array
{
    if ($id <= 0) {
        return [];
    }

    $conn = \db\connetti();

    if (!$conn) {
        return [];
    }
    $query = "select * from padroni where id = $id";
    $res = mysqli_query($conn, $query);
    if ($res) {
        $row = mysqli_fetch_assoc($res);
        mysqli_free_result($res);
        return $row !== null ? $row : [];
    } else {
        return [];
    }
}
