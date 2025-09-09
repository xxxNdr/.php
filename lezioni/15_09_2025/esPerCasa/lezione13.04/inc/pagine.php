<?php


$sql = "SELECT * FROM pagine";
$stmt = mysqli_prepare(DB\conn(), $sql);
$exec = mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
/* prende lo statement e restituisce un oggetto che rappresenta
il risultato della query. Questo oggetto può essere utilizzato
con altre funzioni per estrarre dati
*/
$pagine = mysqli_fetch_all($res, MYSQLI_ASSOC);
/*
accetta come primo parametro il risultato di una query
recupera tutte le righe in un'unica chiamata
restituisce un array multidimensionale dove ogni riga è rappresentata
da un elemento
MYSQLI_ASSOC fa sì che ogni riga sia un array associativo e le chiavi siano 
i nomi delle colonne
*/

$x = in_array($x = $_REQUEST['x'] ?? '', array_column($pagine, 'url')) ? $x : 'index';
/*
1. $_REQUEST['x'] ?? '' - ottiene il parametro URL dalla richiesta, se vuoto usa stringa vuota
2. $x = ... - assegna temporaneamente questo valore a $x per poterlo riutilizzare nel ternario
3. array_column($pagine, 'url') - estrae tutti gli URL validi dal database delle pagine
4. in_array($x, ...) - controlla se l'URL richiesto esiste tra quelli disponibili
5. Operatore ternario: se l'URL è valido lo mantiene, altrimenti usa 'lista-persone' come fallback
Risultato: $x contiene sempre un URL sicuro e presente nel database
*/

foreach ($pagine as $k => $v) {
    $pagine[$k]['contenuto'] = json_decode($v['contenuto'], true) ?? [];
    /*
    sovrascrivi il contenuto json nell'array $pagine
    con la decodifica in array dello stesso contenuto json
    se fallisce la decodifica assegno array vuoto come fallback
    */
}

// prima di costruire il menu tutti i json sono decodificati

$menu = [];
foreach ($pagine as $k => $v) {
    $menu[] = [
        'url' => '?x=' . $v['url'],
        'label' => $v['contenuto']['h1']
    ];
    if ($x === $v['url']) {
        $x = $pagine[$k];
    }
}

$x['contenuto']['menu'] = $menu;

