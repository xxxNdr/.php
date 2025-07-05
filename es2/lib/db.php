<?php

namespace db;

use Exception;

function connetti()
{
    global $conn;
    if(!isset($conn)){
        throw new Exception("Connessione al database non inizializzata");
    }
    return $conn;
}
