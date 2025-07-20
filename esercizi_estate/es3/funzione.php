<?php


//                                  INTRO

/*  Scomporre in fattori prima significa
    scrivere un numero come prodotto di
    numeri primi. Ad esempio:
    12 = 2 * 2 * 3
    (dove 2 e 3 sono numeri primi) */

//                              FUNZIONE

// La funzione restituisce sempre un array di fattori
// $numero è il valore inserito dall'utente
// #A, Primo divieto: no numeri negativi
// #B, Creo un array per i fattori primi trovati, i numeri che dividono $numero
// #C, Unico caso in cui 1 non ha fattori primi
// #D, Dividi per due finanto che è possbile
// #E, Aggiungo 2 ai fattori
// #F, Aggiorno $numero a fine ciclo, $numero = $numero / 2
/* #G, Dividi per tre e per step di 2 tutti i numeri primi che seguono, 3+2, 5+2, 7+2...

        $d * $d (ottimizzazione) sta a significare: cerca fino al punto dove il divisore moltiplicato 
        per se stesso non supera il numero, non serve cercarli tutti.
        
        Esempio senza ottimizzazione:
        // Questo controllerebbe TUTTI i numeri da 3 a 99!

        for ($d = 3; $d < $numero; $d += 2) {
        // 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31, 33, 35, 37, 39, 41, 43, 45, 47, 49, 51, 53, 55, 57, 59, 61, 63, 65, 67, 69, 71, 73, 75, 77, 79, 81, 83, 85, 87, 89, 91, 93, 95, 97, 99
        // = 49 controlli inutili!
        }

        Esempio con ottimizzazione:
        // Questo si ferma a 10 (perché 10×10 = 100)

        for ($d = 3; $d * $d <= $numero; $d += 2) {
        // 3, 5, 7, 9
        // = solo 4 controlli necessari!
        }

// #H, Dividere per il divisore corrente finché possibile
/* #I, Aggiungo il divisore ai fattori
/* #J, $numero si aggiorna, $numero uguale a $numero diviso $d (divisore)
        Es: 6 / 2 = 3, $nuemro si aggiorna a 3, avanti così finché non è più possibile dividere $numero*/
// #K, Se $numero è ancora maggiore di 1 è un fattore primo, lo aggiungo a $fattori
// #L, Restituisci $fattori, l'array pieno di numeri primi che hanno scomposto $numero


function primi($numero)
{
    if ($numero <= 0) return ['errore' => 'Non puoi inserire un numero negativo o ugale a zero'];   #A
    $fattori = [];   #B
    if ($numero == 1) return [1];   #C

    while($numero % 2 == 0){    #D
        $fattori[] = 2;     #E
        $numero /= 2;   #F
    }

    for($d = 3; $d * $d <= $numero; $d += 2){    #G
        while($numero % $d == 0){    #H
            $fattori[] = $d;    #I
            $numero /= $d;      #J
        }
    }

    if($numero > 1){    #K
        $fattori[] = $numero;
    }
    return $fattori;    #L
}

/************RECAP CORE ALGORITMO*******************

$numero = 15;
$fattori = [];

// Controlla il 2: 15 non è divisibile per 2, salta

// Controlla il 3: 
// 15 ÷ 3 = 5, aggiungi 3 → $fattori = [3]
// $numero diventa 5

// Controlla il 5:
// La condizione del for è: $i * $i <= $numero
// Cioè: 5 * 5 <= 5?
// 25 <= 5? NO! È falso!
// Quindi esce dal ciclo for

// $numero = 5 > 1 → aggiungi 5 → $fattori = [3, 5]

***************************************************/