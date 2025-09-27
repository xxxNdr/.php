<?php

namespace c;


class Padroni
{

    private $model;

    public function __construct(\m\Db $db)
    {
        $this->model = new \m\Padroni($db);
    }

    // aggiunta nuovo padrone
    public function aggiungi($nome, $telefono)
    {
        $risultato = $this->model->aggiungi($nome, $telefono);
        if ($risultato) {
            return ['successo' => true, 'messaggio' => '<p>Padrone aggiunto con successo</p>'];
        } else {
            return ['successo' => false, 'messaggio' => '<p>Errore nell\'aggiunta del padrone</p>'];
        }
    }


    // elimina padrone
    public function elimina($id)
    {
        if ($this->model->trova($id)) {
            $risultato = $this->model->elimina($id);
            if ($risultato) {
                return ['successo' => true, 'messaggio' => '<p>Padrone eliminato con successo</p>'];
            } else {
                return ['successo' => false, 'messaggio' => '<p>Errore nella cancellazione del padrone</p>'];
            }
        } else {
            return ['successo' => false, 'messaggio' => '<p>Padrone non trovato</p>'];
        }
    }

    // precompila e modfica
    public function caricaDatieModifica($id, $padrone = null)
    {
        if ($padrone === null) {
            $padrone = $this->model->trova($id);
            if ($padrone) {
                return ['successo' => true, 'padrone' => $padrone];
            }
            return ['successo' => false, 'padrone' => '<p>Padrone non trovato</p>'];
        } else {
            $nome = $padrone['nome'];
            $telefono = $padrone['telefono'];
            $risultato = $this->model->modifica($id, $nome, $telefono);
            if ($risultato) {
                return ['successo' => true, 'messaggio' => '<p>Padrone modificato con successo</p>'];
            }
            return ['successo' => false, 'messaggio' => '<p>Errore nella modifica del padrone</p>'];
        }
    }
}
