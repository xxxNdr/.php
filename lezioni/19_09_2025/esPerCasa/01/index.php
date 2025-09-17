<?php

use App\{Album, AlbumCollection, View};

require_once 'vendor/autoload.php';

$definitelyMaybe = new Album("Definitely Maybe", "Oasis", 1994, ["Britpop"]);
$collezioneAlbum = new AlbumCollection();
$collezioneAlbum->aggiungi($definitelyMaybe);

$view = new View();
echo $view->render('albums.twig', ['album' => $collezioneAlbum, 'title' => "OOP & Interffacce"]);


/*
composer dump-autoload

serve a rigenerare i file di autoloading di Composer
dopo aver letto composer.json, esso genera mappature interne
per permettere il caricamento delle classi senza include o require
infine crea o aggiorna il file vendor/autoload

composer dump-autoload -o

fa la stessa cosa ma generando una mappa statica invece di dinamica
quindi più performante

per far sì che psr-4 funzioni correttamente ha bisogno che il nome del
file da caricare sia lo stesso identico della classe, è case sensitive
*/