<?php

namespace db;

$host = 'localhost';
$db = 'piatti-ingredienti';
$usr = 'root';
$pw = '';
$port = 3306;

$conn = mysqli_connect($host, $usr, $pw, $db, $port);

if(!$conn){
    die('Connessione fallita: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8');

function conn(){
    return $GLOBALS['conn'];
}