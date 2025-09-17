<?php

namespace App;

class Album
{
    private string $titolo;
    private  string $autore;
    private int $anno;
    private array $generi;

    public function __construct($titolo, $autore, $anno, $generi)
    {
        $this->titolo = $titolo;
        $this->autore = $autore;
        $this->anno = $anno;
        $this->generi = $generi;
    }

    public function getTitolo(): string
    // getter, metodo pubblico per accedere alla proprietà privata della classe
    {
        // metodo con visibilità pubblica
        // modo standard per definire metodi che verranno usati fuori dalla classe
        // potrei già fare un echo del titolo perché è un metodo pubblico

        return $this->titolo;
    }
    public function getAutore(): string
    {
        return $this->autore;
    }
    public function getAnno(): int
    {
        return $this->anno;
    }
    public function getGeneri(): array
    {
        return $this->generi;
    }
    public function getGeneriString(): string
    {
        return implode(', ', $this->generi);
    }
}
