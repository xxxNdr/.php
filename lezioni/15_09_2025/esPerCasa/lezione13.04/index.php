<?php

require_once 'vendor/autoload.php';

foreach (glob('inc/*.php') as $file) {
    require_once $file;
}
foreach (glob('lib/*.php') as $file) {
    require_once $file;
}

echo render\r(
    $x['template'],
    $x['contenuto']
);
