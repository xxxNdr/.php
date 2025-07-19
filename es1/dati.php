<?php

/*es_01

Scrivere una pagina che rappresenti il contenuto di un array associativo strutturato in modo da contenere un elenco di album musicali
con anno, autore e genere; la pagina deve mostrare il contenuto dell'array in forma di elenco puntato,
con i dettagli di ogni album rappresentati come sotto punti del titolo.
Utilizzare i CSS per aggiungere stile all'elenco e modificare il colore del testo.*/



$albumz = [
    [
        'titolo' => '13',
        'autore' => 'Blur',
        'anno' => 1999,
        'genere' => [
            'Britpop', 'Indie Rock', 'Post-Rock'
        ]
    ],
    [
        'titolo' => "(What's the Story) Morning Glory?",
        'autore' => 'Oasis',
        'anno' => 1995,
        'genere' => [
            'Britpop', 'Indie Rock'
        ]
    ],
    [
        'titolo' => 'Urban Hymns',
        'autore' => 'The Verve',
        'anno' => 1997,
        'genere' => [
            'Britpop', 'Indie Rock', 'Post-Britpop'
        ]
    ]
];  