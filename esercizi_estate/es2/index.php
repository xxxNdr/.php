<!DOCTYPE html>
<html>

<head>
    <title>Ricerca Album Musicali</title>
    <link rel="stylesheet" href="s.css">
</head>

<body>
    <h1>Ricerca Album Musicali</h1>

    <form action="index.php" method="post">
        <label for="gruppo">Band</label>
        <input type="text" id="gruppo" name="gruppo">
        <label for="data">Anno</label>
        <input type="number" id="data" name="data" min="1990" max="2025">
        <input type="submit" value="Cerca Album">
    </form>
    <p class="hint">Gruppi disponibili: Blur, Oasis, The Verve</p>
    <p class="hint">Periodo di tempo su cui fare ricerca: 1990 - 2025</p>



    <?php

    $data = (int)($_POST['data'] ?? 0);
    $gruppo = trim($_POST['gruppo'] ?? '');
    $anno = $data;
    $discografia = [
        'Blur' => [
            1991 => ['Leisure'],
            1993 => ['Modern Life Is Rubbish'],
            1994 => ['Parklife'],
            1995 => ['The Great Escape'],
            1997 => ['Blur'],
            1999 => ['13'],
            2003 => ['Think Tank'],
            2015 => ['The Magic Whip'],
            2023 => ['The Ballad of Darren']
        ],
        'Oasis' => [
            1994 => ['Definitely Maybe'],
            1995 => ['What\'s the Story) Morning Glory?'],
            1997 => ['Be Here Now'],
            2000 => ['Standing on the Shoulder of Giants'],
            2002 => ['Heathen Chemistry'],
            2005 => ['Don\'t Believe the Truth'],
            2008 => ['Dig Out Your Soul'],
        ],
        'The Verve' => [
            1993 => ['A Storm in Heaven'],
            1995 => ['A Northern Soul'],
            1997 => ['Urban Hymns'],
            2008 => ['Forth']
        ]
    ];

    if ($anno >= 1990 && $anno <= 2025 && $gruppo !== '' && $_POST) {

        /* $_POST nell'if serve per non produrre errore apena si atterra sulla pagina form perché
coi campi non compilati diventa vero che data è < 1990 e gruppo è stringa vuota */

        $bandTrovata = false;
        foreach ($discografia as $k => $v) {
            if (strcasecmp($k, $gruppo) === 0) {

                /* confronta le stringe $k e $gruppo ignorando maiuscole e minuscole,
strcasecmp restituisce 0 se le stringhe sono uguali(case-insensitive),
quindi l'utente può scrivere il nome del gruppo in minuscolo */

                $bandTrovata = true;
                if (isset($v[$anno])) {
                    echo '<ul>';
                    foreach ($v[$anno] as $album) {
                        echo "<li>$album</li>";
                    }
                    echo '</ul>';
                } else {
                    echo "<p>Nessun album trovato per l'anno $anno</p>";
                }
                break;
            }
        }
        if (!$bandTrovata) {
            echo "<p>Band non trovata</p>";
        }
    } else {
        echo "<p>Data inserita non disponibile</p>";
    }
    ?>
</body>

</html>
