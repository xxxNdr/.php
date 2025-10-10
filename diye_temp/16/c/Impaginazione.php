<?php

namespace c;

class Impaginazione
{
    private $articoli;

    public function __construct()
    {
        $this->articoli = new \m\Articoli();
    }

    public function random()
    {
        $articoli = $this->articoli->getAll();

        $selezionati = [];
        $autoriCounter = [];
        $argomentiCounter = [];

        foreach ($articoli as $articolo) {
            $idAutore = $articolo['id_autore'];
            $idArgomento = $articolo['id_argomento'];
            if (isset($autoriCounter[$idAutore])) continue;
            if (($argomentiCounter[$idArgomento] ?? 0) >= 2) continue;

            $lunghezzaAttuale = array_sum(array_column($selezionati, 'lunghezza'));
            if ($lunghezzaAttuale + $articolo['lunghezza'] > 10000) continue;
            $selezionati[] = $articolo;
            $autoriCounter[$idAutore] = true;
            $argomentiCounter[$idArgomento] = ($argomentiCounter[$idArgomento] ?? 0) + 1;
        }
        return $selezionati;
    }
}
