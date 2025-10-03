<?php

namespace v\cnfg;

class Twig
{
    private $twig;

    public function __construct($tpl = 'v/')
    {
        $opt = [
            'debug' => true,
            'cache' => false,
            'auto_reload' => true,
            'strict_variables' => true
            /* Twig genera un'eccezione nel caso in cui nel template venga usata
            una variabile che non esiste o un attributo non definito. */
        ];
        $loader = new \Twig\Loader\FilesystemLoader($tpl);
        $this->twig = new \Twig\Environment($loader, $opt);

        if ($opt['debug']) {
            $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        }

        $this->twig->addExtension(new \Twig\Extra\Intl\IntlExtension());
        $this->twig->getExtension(\Twig\Extension\CoreExtension::class)->setTimezone('Europe/Rome');
        setlocale(LC_TIME, 'it_IT'); // Imposta la localizzazione per la formattazione della data
    }
    public function render($tpl, $data)
    {
        return $this->twig->render($tpl, $data);
    }
}
