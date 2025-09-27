<?php

namespace m;

use Exception;
use PDOException;

class Pagine
{
    private $conn;

    public function __construct(Db $db)
    {
        $this->conn = $db->gConn();
    }

    public function menu(string $nome): ?array
    {
        try {

            $sql = "SELECT * FROM pagine WHERE nome = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $nome, \PDO::PARAM_STR);
            $stmt->execute();
            $pagina = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($pagina === false) {
                return [];
            }
            $pagina['contenuto'] = json_decode($pagina['contenuto'], true);
            return $pagina;
        } catch (\PDOException $e) {
            throw new Exception("Errore nel caricamento della pagina '$nome' del database" . $e->getMessage());
        }
    }

    public function listaPagine()
    {
        $pagine = [];
        try {
            $sql = "SELECT nome FROM pagine ORDER BY nome ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $nomiPagine = $stmt->fetchAll(\PDO::FETCH_COLUMN);
            /* fetchAll dice di restituire ogni riga, FETCH COLUMN solo della colonna
            nel mio caso nome */

            foreach ($nomiPagine as $nome) {
                $pagine[$nome] = $this->menu($nome);
            }
            return $pagine;
        } catch (PDOException $e) {
            throw new Exception("Errore nel caricamento delle pagine" . $e->getMessage());
        }
    }
}
