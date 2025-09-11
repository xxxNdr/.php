<?php

namespace render;

function r($template, $dati){
    $loader = new \Twig\Loader\FilesystemLoader('tpl');
    $twig = new \Twig\Environment($loader);
    return $twig->render($template, $dati);
    // la funzione di twig render carica e renderizza il template
    // quindi è inutile fare prima load poi render separatamente
    
}