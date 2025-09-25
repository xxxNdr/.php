<?php

$form = render\r(
    'tpl/form.html',
    []
);

$x['body']['form'] = $form;
$x['body']['messaggio'] = $risultato;