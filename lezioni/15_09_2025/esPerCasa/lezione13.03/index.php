<?php

require_once 'vendor/autoload.php';

foreach (glob('inc/*.php') as $file) {
    require_once $file;
}

// $x['body']['menu'] = $menu;

echo \render\r(
    $x['template'],
    array_merge($x['body'], ['menu' => $menu])
);
