<?php

namespace render;

function r($template, $dati){
    $loader = new \Twig\Loader\FilesystemLoader('tpl');
    $twig = new \Twig\Environment($loader);
    return $twig->render($template, $dati);
}