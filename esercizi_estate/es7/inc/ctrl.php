<?php

require_once 'db.php';

function aggiungi(array $distanze)
{
    /* $distanze è un array che conterrà tutte le distanze
        inviate tramite form che poi alla fine verranno sommate
        per calcolare la distanza totale del tragitto */

    global $conn;
    /* $conn è la connessione al database ed è una variabile globale
        ma dentro le funzioni va richiamata */

    $query = "INSERT INTO tappe (distanza) VALUES (?)";
    // scrivo la query coi segnaposto per evitare SQL injecion

    $stmt = mysqli_prepare($conn, $query);
    /* mysqli prepare invia al database la query in forma preparata, senza
        inserire ancora i valori */

    if (!$stmt) {
        die("Fallimento nella preparazione della query: " . mysqli_error($conn));
        // die interrompe lo script se fallisce $stmt mostrando un messaggio
    }

    foreach ($distanze as $d) {
        $d = (int)$d;
        /* ora per sicurezza ogni valore passato lo trasformo in intero */

        if ($d > 0) {
            mysqli_stmt_bind_param($stmt, 'i', $d);
            /* inoltre controllo sia sempre maggiore di 0 prima di
    associare il valore reale al segnaposto con stmt bind param.
    Passo a bind param lo statement precompilato, gli dico di sostituire
    il ? con un intero, che è il terzo parametro, $d, della funzione */

            /* ora sono pronto a fare eseguire la query al database col valore legato
    al placeholder */

            if (!mysqli_stmt_execute($stmt)) {
                error_log("Errore nell'esecuzione della query: " . mysqli_stmt_error($stmt));
                /* stmt_execute esegue la query e se fallisce registra l'errore nei file di log. Questo non è
    un messaggio che vede l'utente a differenza di die, ma un messaggio che legge lo
    sviluppatore accedendo a \xampp\apache\logs\error.log
    oppure a \xampp\php\logs\php_error_log */
            }
        }
    }
    mysqli_stmt_close($stmt);
    /* una volta inseriti tutti i valori chiudo lo statement così da liberare le risorse
     occupate precedentemente */
}

if (!empty($_POST['distanza']) && is_array($_POST['distanza'])) {
    /* la funzione aggiungi si apsetta un array e per sicurezza aggiungo in questo if
    di eseguire la funzione non solo se è inviato il dato ma se è anche array */

    aggiungi($_POST['distanza']);
    // se il form è stato inviato aggiungi i dati inviati al database
}

if (isset($_POST['reset'])) {
    // se l'utente preme il pilsante reset

    mysqli_query($conn, "DELETE FROM tappe");
    // la query cancella tutti i record dalla tabella

    mysqli_query($conn, "ALTER TABLE tappe AUTO_INCREMENT = 1");
    // resetto a 1 il contatore dell'id
    // il prossimo record avrà id 1

    header("Location: index.php");
    /* php dice al browser vai a index.php
    il browser fa una nuova richiesta GET
    php calcola il totale a 0
    se utente preme F5 non ripete il reset ma
    ricarica solo la pagina
    */

    exit;
    // il resto del codice php non viene eseguito
}

// ora sono pronto a calcolare la somma delle distanze

$tot = 0;
// inizializzo il totale a 0

$ris = mysqli_query($conn, "SELECT SUM(distanza) tot FROM tappe");
// preparo la query che somma le distanze (somma di righe nel DB)
// calcola la somma di tutti i valori della colonna distanza nella tabella tappe

if ($ris) {
    $record = mysqli_fetch_assoc($ris);
    /* questa funzione prende la riga del risultato della query e la converte
    in array associativo.
    Nel mio caso l'unica chiave sarà tot che contiene la somma calcolata.
    tot è l'alias che ho dato nella query scritta sopra quando calcolo la somma.
    Quindi l'array ha questo aspetto:
    $record = ['tot' => somma delle distanze] */

    $totale = (int)($record['tot'] ?? 0);
    // ?? 0 = se il record non esiste o è null usa 0 come valore di default
    // PHP è in grado da solo di convertire stringa in intero
    // ma per siurezza lo faccio io

    mysqli_free_result($ris);
    // libero la memoria usata dal risultato della query
    // buona prassi dopo aver usato SELECT 
}

$rows = "";
// stringa vuota che servirà a contenere tutte le righe della tabella

$queryTappe = mysqli_query($conn, "SELECT id, distanza, data_inserimento FROM tappe ORDER BY id");
/* salvo nella variabile il risultato della query, che è un oggetto speciale
non un array */

if ($queryTappe && mysqli_num_rows($queryTappe) > 0) {
    // controllo che la query sia riuscita e abbia almeno una riga

    while ($row = mysqli_fetch_assoc($queryTappe)) {
        /* fetch_assoc prende una riga alla volta dal risultato come array associativo,
        le chiavi corrispondo ai nomi delle colonne
        il while continua finché ci sono righe */

        $rows .= '<tr>';
        $rows .= '<td>' . $row['id'] . '</td>';
        $rows .= '<td>' . $row['distanza'] . '</td>';
        $rows .= '<td>' . $row['data_inserimento'] . '</td>';
        $rows .= '</tr>';
        /* per ogni riga del database costruisco una riga html,
        all'interno della riga ci sono tre celle con i valori delle colonne */
    }
    mysqli_free_result($queryTappe);
} else {
    $rows = "<tr><td colspan='3'>Nessuna Tappa Inserita</td></tr>";
    /* se la query è fallita allora in $rows si salva una riga con un
    solo td allragato a 3 celle col messaggio nessuna tappa inserita */
}
