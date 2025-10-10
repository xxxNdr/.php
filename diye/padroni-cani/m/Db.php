<?php

namespace m;

class Db{
    private $host = 'localhost';
    private $usr = 'root';
    private $pw = '';
    private $db = 'padroni_cani3';
    private $conn;

    public function __construct($host, $usr, $pw, $db)
    {
        $this->host = $host;
        $this->usr = $usr;
        $this->pw = $pw;
        $this->db = $db;
    }

    public function conn(){
        $this->conn = null;

        try {
            $this->conn = new \PDO(
                // \ namespace globale
                // nuova connessione al database
                "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8",
                /* Data Source Name, stringa passata come primo parametro a PDO come configurazione 
                per connettersi al db
                mysql è il driver, host è l'indirizzo del server, dbname è il nome del db, e la
                codifica dei caratteri,
                gli altri parametri sono: usr, pw e array di opzioni per configurare comportamenti
                come per fetch ed errori */
                $this->usr,
                $this->pw,
                [
                    // costanti
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (\PDOException $e) {
            throw new \Exception("Errore di connessione: " . $e->getMessage());
        }
        return $this->conn;
    }

    public function gConn(){
        if($this->conn === null)    {
            return $this->conn();
        }
        return $this->conn;
    }
}