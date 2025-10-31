<?php


$host = 'localhost';
$usr = 'root';
$pw = '';
$db = 'cani';
$port = 3306;


$conn = mysqli_connect($host, $usr, $pw, $db, $port);

if (!$conn) {
    die("Connessione al db fallita" . mysqli_connect_error());
}
