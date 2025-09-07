<?php

// error_reporting(E_ALL & ~E_WARNING);

foreach(glob('inc/*.php') as $f){
    require_once $f;
}
foreach(glob('mvc/*.php') as $f){
    require_once $f;
}

require_once 'lib/ext/autoload.php';
$lo = new \Twig\Loader\FilesystemLoader('tpl');
$tw = new \Twig\Environment($lo);
$te = $tw->load('.twig');

$info = tipo($pagine, $x);
$piatti = \p\records();
$ingredienti = \i\records();
$azione = $_REQUEST['azione'] ?? 'aggiungi';

echo $te->render(
    [
        'titolo' => $info['titolo'],
        'pagine' => $pagine,
        'tipo' => $info['tipo'],
        'piatti' => $piatti,
        'ingredienti' => $ingredienti,
        'azione' => $azione
    ]
);
