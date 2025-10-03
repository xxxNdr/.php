<?php

namespace m;

class Database
{
    private $host = 'localhost';
    private $usr = 'root';
    private $pw = '';
    private $db = 'rivista';
    private $conn = null;

    public function getConn()
    {
        if ($this->conn === null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
                $this->conn = new \PDO($dsn, $this->usr, $this->pw);
                $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                throw new \Exception("Errore nella connessione:" . $e->getMessage(), (int)$e->getCode());
            }
        }
        return $this->conn;
    }
}
