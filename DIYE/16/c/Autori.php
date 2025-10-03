<?php

namespace c;

class Autori
{

    private $autori;

    public function __construct()
    {
        $this->autori = new \m\Autori();
    }

    public function all()
    {
        return $this->autori->getAll();
    }
}
