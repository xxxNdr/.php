<?php


$server = 'localhost';
$user = 'root';
$pw = '';
$db = 'cani';
$port = 3306;

$conn = mysqli_connect($server, $user, $pw, $db, $port);

if (!$conn) {
    throw new Exception("Connessione al database fallita: " . mysqli_connect_error());
}
