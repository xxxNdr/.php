<?php

namespace c;


class Cani
{

    private $model;

    public function __construct(\m\Db $db)
    {
        $this->model = new \m\Cani($db);
    }

    // aggiunta nuovo Cane
    public function aggiungi($nome, $data_nascita)
    {
        $risultato = $this->model->aggiungi($nome, $data_nascita);
        if ($risultato) {
            return ['successo' => true, 'messaggio' => 'Cane aggiunto con successo'];
        } else {
            return ['successo' => false, 'messaggio' => 'Errore nell\'aggiunta del Cane'];
        }
    }

    // modifica Cane
    public function modifica($id, $nome, $data_nascita)
    {
        if ($this->model->trova($id)) {
            $risultato = $this->model->modifica($id, $nome, $data_nascita);
            if ($risultato) {
                return ['successo' => true, 'messaggio' => 'Cane modificato con successo'];
            } else {
                return ['successo' => false, 'messaggio' => 'Errore nella modifica del Cane'];
            }
        } else {
            return ['successo' => false, 'messaggio' => 'Cane non trovato'];
        }
    }

    // elimina Cane
    public function elimina($id)
    {
        if ($this->model->trova($id)) {
            $risultato = $this->model->elimina($id);
            if ($risultato) {
                return ['successo' => true, 'messaggio' => 'Cane eliminato con successo'];
            } else {
                return ['successo' => false, 'messaggio' => 'Errore nella cancellazione del Cane'];
            }
        } else {
            return ['successo' => false, 'messaggio' => 'Cane non trovato'];
        }
    }

    // precompila dati Cane durante la modifica
    public function caricaDatiModifica($id)
    {
        $cane = $this->model->trova($id);
        if ($cane) {
            return ['successo' => true, 'cane' => $cane];
        } else {
            return ['successo' => false, 'cane' => 'Cane non trovato'];
        }
    }
}
