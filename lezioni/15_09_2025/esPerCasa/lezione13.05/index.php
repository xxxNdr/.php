<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'vendor/autoload.php';

foreach (glob('inc/*.php') as $file) {
    require_once $file;
}
foreach (glob('lib/*.php') as $file) {
    require_once $file;
}
foreach (glob('mvc/*.mod.php') as $file) {
    require_once $file;
}
foreach (glob('mvc/*.ctrl.php') as $file) {
    require_once $file;
}

echo render\r(
    $x['template'],
    $x['contenuto']
);
