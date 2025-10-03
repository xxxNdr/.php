<?php

namespace m;

class Pagine
{
    public $id = null;
    public $nome = null;
    public $title = null;
    public $h1 = null;
    public $menu = null;
    public $body = null;
    public $footer = null;

    private $conn;

    public function __construct()
    {
        $db = new \m\Database();
        $this->conn = $db->getConn();
    }

    public function initialize(array $data): void
    {
        foreach (['nome', 'title', 'h1', 'menu', 'body', 'footer'] as $field) {
            if (isset($data[$field])) {
                $this->$field = $data[$field];
            }
        }
    }

    public function all()
    {
        $stmt = $this->conn->query("SELECT * FROM pagine ORDER BY id");
        $rows = $stmt->fetchAll();

        $pagine = [];
        foreach ($rows as $row) {
            $pagina = new self();
            // self si riferisce alla classe Pagine
            // new self equivale a scrivere new Pagine
            // crea una nuova istanza di Pagine
            // migliore mantenibilità se rinomino la classe
            // ereditarietà se estendo la classe, self si riferisce alla figlia
            $pagina->initialize($row);
            $pagina->id = $row['id'];
            $pagine[] = $pagina;
        }
        return $pagine;
    }
}
