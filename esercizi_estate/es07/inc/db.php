<?php

$server = "localhost";
$port = 3306;
$usr = "root";
$pw = "";
$db = "tragitti";

$conn = mysqli_connect($server, $usr, $pw, $db, $port); // ordine obbligatorio di parametri

if (!$conn) {
    die("Connessione al database fallita: " . mysqli_connect_error());
} else {
    $info = "<p>";
    $info .= "Server: " . mysqli_get_server_info($conn) . "<br>";
    $info .= "Versione client: " . mysqli_get_client_info() . "<br>";
    $info .= "Protocollo: " . mysqli_get_proto_info($conn) . "<br>";
    $info .= "Host: " . mysqli_get_host_info($conn) . "<br>";
    $info .= "Charset: " . mysqli_character_set_name($conn) . "<br>";
    $info .= "Database selezionato: " . $db . "<br>";
    $info .= "Thread ID: " . mysqli_thread_id($conn) . "<br><br>";
    /* ogni volta che php si connette a MySQL, MySQL assegna un numero
    crescente, è un suo id interno per distinguere le diverse connessioni
    non si resetta mai */
    $info .= "INFO SULLE TABELLE" . "<br>";
    $result = mysqli_query($conn, "SHOW TABLES");
    $info .= "Tabelle nel DB: " . mysqli_num_rows($result) . "<br><br>";
    $info .= "CONTA RECORD DELLA TABELLA TAPPE" . "<br>";
    $count = mysqli_query($conn, "SELECT COUNT(*) AS tot FROM tappe");
    $row = mysqli_fetch_assoc($count);
    $info .= "Record in tappe: " . $row['tot'] . "<br><br>";
    $info .= "<p><strong>Info Sistema</strong></p>";
    $info .= "PHP: " . phpversion() . "<br>";
    $info .= "OS: " . php_uname('s') . " " . php_uname('r') . "<br>";
    $info .= "Memoria PHP: " . ini_get('memory_limit') . "<br>";
    $info .= "Max upload: " . ini_get('upload_max_filesize') . "<br>";
    $info .= "</p>";
}
