<?php

include 'inc/pagine.php';

/*
Creare un database di piatti con due tabelle (piatti e ingredienti);
creare le interfacce PHP necessarie a gestire i piatti e ad aggiungervi un numero variabile di ingredienti.
Dev'essere possibile aggiungere o rimuovere ingredienti ai piatti;
quando un piatto viene cancellato vanno cancellati anche tutti i suoi ingredienti.
Aggiungere una tabella piatti_ingredienti che metta in relazione molti a molti le tabelle piatti e ingredienti;
Creare una pagina che mostri per ogni piatto gli ingredienti necessari e una pagina che mostri per ogni ingrediente di quali piatti fa parte.
*/

require_once 'lib/ext/autoload.php';
$lo = new \Twig\Loader\FilesystemLoader('tpl');
$tw = new \Twig\Environment($lo);
$te = $tw->load('.twig');

$x = $_REQUEST['x'] ?? 'lista.piatti';
$tipo = (strpos($x, 'piatti') == true) ? 'piatto' : 'ingrediente';
$titolo = $pagine[$x]['body']['titolo'] ?? 'Default';

echo $te->render(
    [
        'titolo' => $titolo,
        'pagine' => $pagine,
        'tipo' => $tipo
    ]
);
