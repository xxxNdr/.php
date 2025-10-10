<?php


require_once 'vendor/autoload.php';

// istanza twig
$twig = new \v\cnfg\Twig();

// menu
$P = new \m\Pagine();
$pagine = $P->all();

//routing
$request = $_REQUEST['x'] ?? 'index';

switch ($request) {
    case 'index':
        $data = [
            'title' => 'Homepage',
            'name' => 'Rivistas',
            'menu' => $pagine,
        ];
        echo $twig->render('home.twig', $data);
        break;
    case 'articoli':
        $C = new \c\Impaginazione();
        $articoliSelezionati = $C->random();
        $data = [
            'title' => 'Articoli',
            'name' => 'Rivistas',
            'articoli' => $articoliSelezionati,
            'menu' => $pagine,
        ];
        echo $twig->render('impaginazione.twig', $data);
        break;
    default:
        http_response_code(404);
        $data = [
            'title' => '404',
            'name' => 'Rivistas',
            'menu' => $pagine,
        ];
        echo $twig->render('404.twig', $data);
}
