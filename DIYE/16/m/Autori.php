<?php

namespace m;

class Autori
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
            $stmt = $this->conn->query("SELECT * FROM autori");
            // query esegue senza parametri, non serve execute dopo
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new \Exception("Errore nel recupero record della tabella autori:" . $e->getMessage());
        }
    }
}
