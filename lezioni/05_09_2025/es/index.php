<?php

require_once 'lib/ext/autoload.php';

$l = new \Twig\Loader\FilesystemLoader('tpl');
$t = new \Twig\Environment($l);
$tpl = $t->load('index.twig');
echo $tpl->render(
    [
        'lista' => [
            ['nome' => 'Tenerino ', 'tel' => 'tel: 3285410953'],
            ['nome' => 'Pera ', 'tel' => 'tel: 3334050100'],
            ['nome' => 'Gino ', 'tel' => 'tel: 3284002020']
        ]
    ]
);
