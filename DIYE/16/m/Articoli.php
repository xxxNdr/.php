<?php

namespace m;

class Articoli
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
            $stmt = $this->conn->query(
                "SELECT ar.*,
                (SELECT nome FROM autori a WHERE a.id = ar.id_autore) nome_autore
                FROM articoli ar 
                ORDER BY ar.data_inserimento DESC"
            );
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new \Exception("Errore nel recupero di tutti gli articoli:" . $e->getMessage());
        }
    }
}
