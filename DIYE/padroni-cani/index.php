<?php


require_once 'vendor/autoload.php';

$twig = new \v\Twig();

$db = new m\Db('localhost', 'root', '', 'padroni_cani3');

$cntrPdr = new \c\Padroni($db);
$cntrCn = new \c\Cani($db);
$pagine = new \m\Pagine($db);
$padroni = new \m\Padroni($db);
$cani = new \m\Cani($db);

$pagina = $_GET['x'] ?? 'homepage';
$azione = $_POST['azione'] ?? '';
$id = $_POST['id'] ?? '';

$menu = $pagine->listaPagine();
$listaPadroni = $padroni->lista();
$listaCani = $cani->lista();
$paginaCorrente = $pagine->menu($pagina);



$dati = [
    'titolo' => $paginaCorrente['contenuto']['titolo'] ?? '',
    'messaggio' => '',
    'successo' => null,
    'padroni' => $listaPadroni,
    'cani' => $listaCani,
    'padrone' => null,
    'cane' => null,
    'modifica' => false,
    'menu' => $menu,
    'pagina_corrente' => $menu[$pagina] ?? null,
];

if (!isset($menu[$pagina])) {
    $_GET['x'] = 'homepage';
}

// renderizza PRIMA l'azione poi la pagina così da vedere i dati aggiornati e non resettati
$risultato = null;
switch ($azione) {
    case 'aggiungi':
        $nome = $_POST['nome'];
        $telefono = $_POST['telefono'];
        $risultato = $cntrPdr->aggiungi($nome, $telefono);
        $dati['messaggio'] = $risultato['messaggio'];
        $dati['successo'] = $risultato['successo'];
        $dati['padroni'] = $padroni->lista();
        break;
    case 'modifica':
        if (!empty($_POST['nome']) && !empty($_POST['telefono'])) {
            $padrone = ['nome' => $_POST['nome'], 'telefono' => $_POST['telefono']];
            $risultato = $cntrPdr->caricaDatieModifica($id, $padrone);
            $dati['messaggio'] = $risultato['messaggio'];
            $dati['successo'] = $risultato['successo'];
        } else {
            $risultato = $cntrPdr->caricaDatieModifica($id);
            if ($risultato['successo']) {
                $dati['padrone'] = $risultato['padrone'];
                $dati['modifica'] = true;
            }
        }
        $dati['padroni'] = $padroni->lista();
        break;
    case 'elimina':
        $risultato = $cntrPdr->elimina($id);
        $dati['messaggio'] = $risultato['messaggio'];
        $dati['successo'] = $risultato['successo'];
        $dati['padroni'] = $padroni->lista();
        break;
}

switch ($pagina) {
    case 'homepage':
        echo $twig->render('homepage.twig', $dati);
        break;
    case 'lista-padroni':
        echo $twig->render('formPadroni.twig', $dati);
        break;
    case 'lista-cani':
        echo $twig->render('formCani.twig', $dati);
        break;
    default:
        echo $twig->render('homepage.twig', $dati);
        break;
}
