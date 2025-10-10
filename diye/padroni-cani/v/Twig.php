<?php

namespace v;

class Twig
{

    private $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('v/templates');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => false, // output modifica al template in tempo reale, bug più facili da trovare, + veloce
            'debug' => true, // abilita la modalità debug di Twig
            'auto_reload' => true // ricarica automaticamente i template se modificati
        ]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        // estensione che abilita i dump nei template 
    }

    public function render($tpl, $dati): string
    {
        return $this->twig->render($tpl, $dati);
    }
}
