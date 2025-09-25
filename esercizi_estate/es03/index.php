<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scomposizione in fattori primi</title>
    <link rel="stylesheet" href="s.css">
</head>

<body>
    <h1 id="special">FATTORIALIZZAZIONE</h1>
    <h4>Inserisci un valore positivo</h4>

    <form action="index.php" method="post">
        <input type="number" placeholder="Valore" name="numero" min="1">
        <input type="submit" value="Calcola">
    </form>

</body>

</html>

<?php


include 'funzione.php';

if (isset($_POST['numero'])) {
    $numero = (int)$_POST['numero'];
    $risultato = primi($numero);

    if (isset($risultato['errore'])) {
        echo $risultato['errore'];
    } else {
        echo "<p>I fattori primi di $numero sono: " . implode(' × ', $risultato) . '</p>';
    }
}
