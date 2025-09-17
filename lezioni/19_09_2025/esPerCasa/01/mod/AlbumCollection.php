<?php

namespace App;
// usando backslash posso evitare di scrivere di scrivere le clausole use
// use ArrayIterator;
// use Traversable;

class AlbumCollection implements \IteratorAggregate
{
    /*
    la classe implementa IteratorAggregate, garantendo che la classe
    possa essere usata in un ciclo foreach
    IteratorAggregator è un'interfaccia definita nel namespace globale
    e necessita backslash
    */
    private array $lista = [];

    public function aggiungi(\App\Album $album): void
    {
        // void: nessun valore di ritorno
        // la funzione esegue codice ma non restituisce niente al chiamante
        $this->lista[] = $album;
    }

    public function getLista(): array
    {
        return $this->lista;
    }

    public function getIterator(): \Traversable
    {
        /*
        Traversable è un'interfaccia globale, non ha namespace, può essere utilizzata
        senza backslash
        metodo che restituisce un iteratore, un oggetto che implementa
        l'interfaccia Traversable, rappresenta un oggetto che può essere iterato.
        Vedi il ciclo for nel template twig
        */
        return new \ArrayIterator($this->lista);
    }
}
