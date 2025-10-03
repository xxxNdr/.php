<?php

namespace m;

class Argomenti
{
    private $conn;

    public function __construct()
    {
        $db = new \m\Database();
        $this->conn = $db->getConn();
    }

    public function getAll()
    {
        try {
            $stmt = $this->conn->query("SELECT * FROM argomenti");
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new \Exception("Errore nel recupero record della tabella argomenti:" . $e->getMessage());
        }
    }
}
