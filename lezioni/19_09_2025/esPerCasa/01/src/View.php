<?php


namespace App;

class View
{
    private \Twig\Environment $twig;

    public function __construct($dir = 'tpl')
    {
        $loader = new \Twig\Loader\FilesystemLoader($dir);
        $this->twig = new \Twig\Environment($loader);
    }

    public function render($template, $data = [])
    {
        return $this->twig->render($template, $data);
    }
}
