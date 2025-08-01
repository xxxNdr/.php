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
    echo "Connessione OK. Server: " . mysqli_get_server_info($conn) . "<br>";
    echo "Versione client: " . mysqli_get_client_info() . "<br>";
    echo "Protocollo: " . mysqli_get_proto_info($conn) . "<br>";
    echo "Host: " . mysqli_get_host_info($conn) . "<br>";
    echo "Charset: " . mysqli_character_set_name($conn) . "<br>";
    echo "Database selezionato: " . $db . "<br>";
    echo "Thread ID: " . mysqli_thread_id($conn) . "<br><br>";
    /* ogni volta che php si connette a MySQL, MySQL assegna un numero
    crescente, è un suo id interno per distinguere le diverse connessioni
    non si resetta mai */
    echo "INFO SULLE TABELLE" . "<br>";
    $result = mysqli_query($conn, "SHOW TABLES");
    echo "Tabelle nel DB: " . mysqli_num_rows($result) . "<br><br>";
    echo "CONTA RECORD DELLA TABELLA TAPPE" . "<br>";
    $count = mysqli_query($conn, "SELECT COUNT(*) AS tot FROM tappe");
    $row = mysqli_fetch_assoc($count);
    echo "Record in tappe: " . $row['tot'] . "<br><br>";
    echo "<h3>Info Sistema</h3>";
    echo "PHP: " . phpversion() . "<br>";
    echo "OS: " . php_uname('s') . " " . php_uname('r') . "<br>";
    echo "Memoria PHP: " . ini_get('memory_limit') . "<br>";
    echo "Max upload: " . ini_get('upload_max_filesize') . "<br>";
}
