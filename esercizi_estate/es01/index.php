<?php

include 'dati.php';

?>

<head>
    <title>Elenco Album Musicali</title>
    <link rel="stylesheet" href="s.css">
</head>

<body>
    <h1>Elenco Album Musicali</h1>
    <ul>
        <?php foreach ($albumz as $a): ?>
            <li>
                <div class="t">
                    <?= htmlspecialchars($a['titolo']) ?></div>
                <ul>
                    <li>Autore: <?= htmlspecialchars($a['autore']) ?></li>
                    <li>Anno: <?= htmlspecialchars($a['anno']) ?></li>
                    <li>Genere: <?= htmlspecialchars(implode(', ', $a['genere'])) ?></li><br>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</body>