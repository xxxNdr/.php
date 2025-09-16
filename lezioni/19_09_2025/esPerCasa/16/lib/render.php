<?php


require_once 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

function getTwig(): Environment
{
    $loader = new FilesystemLoader('tpl');
    $twig = new Environment($loader);
    return $twig;
}
