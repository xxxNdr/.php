<?php

class Database
{
    private $host = 'localhost';
    private $db = 'rivista';
    private $usr = 'root';
    private $pw = '';
    private $port = 3306;
    public $conn;

    public function getConn()
    {
        $this->conn = null;
        /* inizialmente nessuno connessione attiva
         così da inizializzare le proprietà esplicitamente, aiuta a capire
         lo stato iniziale dell'oggetto e 
         permettere un controllo sulla connesione */

        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db . ";charset=utf8mb4";
            /* per  stabile una connessione PDO serve: DSN (host, nome db, porta),
            username e password */
            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                // costante per la gestione di errori / costante che indica di usare le ecceioni per gli errori
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                // coppia di valori per definire quale modalità usare per raccogliere i valori con la query nel db
                // i risultati devono essere restituiti come array associativi
                PDO::ATTR_EMULATE_PREPARES => false
                // emulazioni prepared statement disabilitate
                // verranno usate prepared statements native (vere) del db
                // il db gestisce i parametri evitando interpretazioni sql malevole (più sicuro)
            ];
            $this->conn = new PDO($dsn, $this->usr, $this->pw, $opt);
            /* nuova istanza della classe Database:
            viene chiamato il costruttorepassando DSN, username, password e opzioni,
            array opzionale per configurare la connessione PDO */
        } catch (PDOException $e) {
            echo "Connessione fallita: " . $e->getMessage();
            // se non funziona catch intercetta l'eccezione e invia un messaggio d'errore
            // con descrizione tecnica
        }
        return $this->conn;
    }
}
$db = new Database();
$conn = $db->getConn();
if ($conn) {
    echo "Connessione stabilizzata in re";
}
