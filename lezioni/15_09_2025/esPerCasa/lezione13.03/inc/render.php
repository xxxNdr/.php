<?php

namespace render;

function r($template, $dati)
{
    $loader = new \Twig\Loader\FilesystemLoader('tpl');
    $twig = new \Twig\Environment($loader);
    $template = $twig->load($template);
    return $template->render($dati);
}
