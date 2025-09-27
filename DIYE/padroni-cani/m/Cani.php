<?php

namespace m;

class Cani
{

    private $conn;

    public function __construct(Db $db)
    {
        $this->conn = $db->gConn();
    }

    public function aggiungi($nome, $data_nascita)
    {
        $sql = "INSERT INTO cani (nome, data_nascita) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $nome, \PDO::PARAM_STR);
        $stmt->bindParam(2, $data_nascita, \PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function elimina($id)
    {
        $sql = "DELETE FROM cani WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function lista(): array
    {
        $sql = "SELECT * FROM cani";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function trova($id): ?array
    {
        $sql = "SELECT * FROM cani WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $nome, \PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res === false ? null : $res;
    }

    public function modifica($id, $nome, $data_nascita): bool
    {
        $sql = "UPDATE cani SET nome = ?, data_nascita = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $nome, \PDO::PARAM_STR);
        $stmt->bindParam(2, $data_nascita, \PDO::PARAM_STR);
        $stmt->bindParam(3, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}
