<?php

    require_once 'lib/render.php';
    require_once 'inc/array.php';


if ($_REQUEST['x'] == 'spesa'){
    include $pagine['spesa']['include'];
    $visualize = R\r($pagine['spesa']['template'], $pagine['spesa']['contenuto']);
        echo $visualize;
}

function l(){
    if(!file_exists('lista.txt')){
        return[];
    }else{
        return unserialize(file_get_contents('lista.txt'));
    }
}

function p($prodotto){
    $lista = l();
    $lista[]= [
        'prodotto' => $prodotto
    ];
    $handler = fopen('lista.txt', 'w+');
    if($handler === false){
        return false;
    }else{
        fwrite($handler, serialize($lista));
        fclose($handler);
        return true;
    }
}

if (isset($_POST['prodotto'])){
    p($_POST['prodotto']);
}

echo '<pre>';
print_r(l());
echo '</pre>';
