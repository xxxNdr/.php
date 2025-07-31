<?php

$server = "localhost";
$port = 3306;
$usr = "root";
$pw = "";
$db = "tragitti";

$conn = mysqli_connect($server, $usr, $pw, $db, $port); // ordine obbligatorio di parametri

if(!$conn){
    die("Connessione al database fallita: " . mysqli_connect_error());
}else{
    var_dump($conn);
}