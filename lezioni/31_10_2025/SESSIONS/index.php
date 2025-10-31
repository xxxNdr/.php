<?php

session_start();

if (isset($_POST['animale']) && !empty($_POST['animale'])) {
    $_SESSION['animale'] = $_POST['animale'];
    echo "Il tuo animale preferito è: " . htmlspecialchars($_SESSION['animale']);
    echo '<br><a href="index.php?reset=1">Cancella Sessione</a>';
}

if (isset($_POST['reset'])) {
    session_unset();
    session_destroy();
}
