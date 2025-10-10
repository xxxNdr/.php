<?php

namespace m;

class Padroni
{

    private $conn;

    public function __construct(Db $db)
    // connetti al db specifico che è nella classe Db
    {
        $this->conn = $db->gConn();
        // attraverso questo metodo che crea la connessione
    }

    public function aggiungi($nome, $telefono): bool
    {
        $nome = trim($nome);
        $telefono = trim($telefono);

        $sql = "INSERT INTO padroni (nome, telefono) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $nome, \PDO::PARAM_STR);
        $stmt->bindParam(2, $telefono, \PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function elimina($id): bool
    {
        $sql = "DELETE FROM padroni WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function lista(): array
    {
        $sql = "SELECT * FROM padroni";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function trova($id): ?array
    // ?array = se lo trova restituisce l'array di dati oppure null
    {
        $sql = "SELECT * FROM padroni WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res === false ? null : $res;
    }

    public function modifica($id, $nome, $telefono): bool
    {
        $id = intval($id);
        $nome = trim($nome);
        $telefono = trim($telefono);

        $sql = "UPDATE padroni SET nome = ?, telefono = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $nome, \PDO::PARAM_STR);
        $stmt->bindParam(2, $telefono, \PDO::PARAM_STR);
        $stmt->bindParam(3, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}
