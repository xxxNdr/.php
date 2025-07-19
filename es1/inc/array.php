<?php

$pagine = array(
    'spesa' => array(
        'contenuto' => array(
            'titolo' => 'Spesa',
            'testo' => 'Aggiungi prodotti',
            'form' => '<form method="post" action="index.php"><label for="lista"><input type="text" name="prodotto" placeholder="prodotto" id="lista"><input type="submit" name="aggiungi" value="Aggiungi"></form>',
        ),
        'template' => 'tmp/main.html',
        'include' => 'inc/pagine.php'
    ),
);

    if (!isset($_REQUEST['x']) || !isset($pagine[$_REQUEST['x']])) {
    $_REQUEST['x'] = 'spesa';
}