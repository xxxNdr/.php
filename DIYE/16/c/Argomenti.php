<?php


namespace c;

class Argomenti
{

    private $argomenti;

    public function __construct()
    {
        $this->argomenti = new \m\Argomenti();
    }

    public function all()
    {
        return $this->argomenti->getAll();
    }
}
