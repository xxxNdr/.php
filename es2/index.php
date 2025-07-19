<?php

/*Scrivere un programma che accetti in input il nome di un gruppo musicale e un anno compreso fra il 1960 e il 2000,
e scriva tutti gli album e i singoli pubblicati da quel gruppo in quell'anno (prendere i dati da Wikipedia).
Cambiare tramite CSS il colore di sfondo della pagina e il colore e il font utilizzati per il testo.*/

$data = $_POST['data'];
$gruppo = $_POST['gruppo'];

$anno = date()


















<?php
// Array con tutti i dati
$discografia = [
    'Beatles' => [
        1965 => ['Rubber Soul', 'Help!', 'Yesterday (singolo)'],
        1966 => ['Revolver', 'Yellow Submarine (singolo)'],
        1967 => ['Sgt. Pepper\'s Lonely Hearts Club Band', 'All You Need Is Love (singolo)'],
        1969 => ['Abbey Road', 'Come Together (singolo)']
    ],
    'Rolling Stones' => [
        1965 => ['Out of Our Heads', 'Satisfaction (singolo)'],
        1966 => ['Aftermath', 'Paint It Black (singolo)'],
        1969 => ['Let It Bleed', 'Honky Tonk Women (singolo)'],
        1971 => ['Sticky Fingers', 'Brown Sugar (singolo)']
    ],
    'Pink Floyd' => [
        1967 => ['The Piper at the Gates of Dawn'],
        1973 => ['The Dark Side of the Moon', 'Money (singolo)'],
        1975 => ['Wish You Were Here', 'Have a Cigar (singolo)'],
        1979 => ['The Wall', 'Another Brick in the Wall (singolo)']
    ],
    'Queen' => [
        1974 => ['Queen II', 'Seven Seas of Rhye (singolo)'],
        1975 => ['A Night at the Opera', 'Bohemian Rhapsody (singolo)'],
        1977 => ['News of the World', 'We Will Rock You (singolo)'],
        1980 => ['The Game', 'Another One Bites the Dust (singolo)']
    ]
];

// Prendi i dati dal form
$gruppo = $_POST['gruppo'] ?? '';
$data = $_POST['data'] ?? '';

// Estrai l'anno dalla data
$anno = date('Y', strtotime($data));

?>

<!DOCTYPE html>
<html>
<head>
    <title>Risultati Ricerca</title>
</head>

<body>
    <h1>Risultati Ricerca</h1>
    
    <?php
    // Condizione IF sulla data/anno
    if ($anno >= 1960 && $anno <= 2000) {
        
        // Cerca il gruppo nell'array
        foreach ($discografia as $nomeGruppo => $anni) {
            if ($nomeGruppo == $gruppo) {
                
                // Se trova l'anno, stampa gli album
                if (isset($anni[$anno])) {
                    echo "<p>Album di $nomeGruppo nel $anno:</p>";
                    echo "<ul>";
                    foreach ($anni[$anno] as $album) {
                        echo "<li>$album</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Nessun album trovato per $nomeGruppo nel $anno</p>";
                }
                break;
            }
        }
        
    } else {
        echo "<p>Anno non valido. Inserisci un anno tra 1960 e 2000.</p>";
    }
    ?>
    
    <a href="javascript:history.back()">Torna indietro</a>
</body>
</html>