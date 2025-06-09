<?php


    require_once 'lib/render.php';

    require_once 'inc/pagine.php';

    echo render(
        $pagine[$_REQUEST['x']]['template'],
        $pagine[$_REQUEST['x']]['dati']
    );