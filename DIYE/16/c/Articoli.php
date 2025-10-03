<?php

namespace c;

class Articoli
{

    private $articoli;

    public function __construct()
    {
        $this->articoli = new \m\Articoli();
    }
    public function all()
    {
        return $this->articoli->getAll();
    }
}
