<?php

require_once 'db.php';

function aggiungi(array $distanze)
{
    /* Il parametro $distanze è un array contenente tutti i valori delle distanze
       inviati tramite form. L'obiettivo è inserire ogni distanza come nuovo record
       nella tabella 'tappe' per consentire il calcolo del tragitto totale. */

    global $conn;
    /* $conn è la connessione effettuata al database MySQL.
       Poiché è definita esternamente allo script, dentro la funzione viene richiamata
       come variabile globale per poter essere utilizzata. */

    $query = "INSERT INTO tappe (distanza) VALUES (?)";
    /* La query contiene un segnaposto '?' per la distanza.
       L'uso del segnaposto permette di evitare SQL Injection e di eseguire
       query preparate con valori differenti */

    $stmt = mysqli_prepare($conn, $query);
    /* mysqli_prepare prepara la query in modo sicuro,
       lasciando da associare solo i valori reali più avanti */

    if (!$stmt) {
        die("Fallimento nella preparazione della query: " . mysqli_error($conn));
        /* Se la query non può essere preparata (ad esempio per errore sintattico,
           problema di connessione, ecc), interrompe l'esecuzione mostrando il messaggio di errore */
    }

    foreach ($distanze as $d) {
        $d = (int)$d;
        /* Casting a intero per garantire che si inseriscano solo numeri interi.
           Questo previene l'inserimento di valori errati. */

        if ($d > 0) {
            /* Store di valori maggiori di zero (escludo zeri e valori negativi) */

            /*
             * mysqli_stmt_bind_param associa il valore $d al segnaposto '?' nella query.
             * Specificando 'i' indichiamo che il valore è un intero.
             */
            mysqli_stmt_bind_param($stmt, 'i', $d);

            if (!mysqli_stmt_execute($stmt)) {
                /* Se l'esecuzione fallisce, scrivo l'errore nel file di log.
                   In questo modo l'utente non riceve un messaggio di errore diretto,
                   ma lo sviluppatore può investigare leggendo il log. */

                // Qui si registra l'errore nel file log configurato nel PHP/Apache
                error_log("Errore nell'esecuzione della query: " . mysqli_stmt_error($stmt));

                /*
                 * In ambiente XAMPP, i file di log errori si trovano generalmente in:
                 * - Per Apache:  C:\xampp\apache\logs\error.log
                 * - Per PHP:     C:\xampp\php\logs\php_error_log
                 *
                 * Lo sviluppatore può aprire questi file per leggere i messaggi di errore
                 * e capire cosa è andato storto durante l'esecuzione della query.
                 */
            }
        }
    }

    mysqli_stmt_close($stmt);
    /* Dopo aver eseguito tutti gli inserimenti, chiudo lo statement
       per liberare risorse nel server MySQL */
}


// Se è stato inviato tramite POST un array 'distanza',
// e questo è non vuoto e realmente un array, chiamo la funzione aggiungi
if (!empty($_POST['distanza']) && is_array($_POST['distanza'])) {
    aggiungi($_POST['distanza']);
}


// Se l'utente preme il pulsante 'reset' (presenza di 'reset' nel POST),
// svuoto la tabella tappe e resetto l'auto_increment a 1
if (isset($_POST['reset'])) {

    // Cancello tutti i record nella tabella 'tappe'
    mysqli_query($conn, "DELETE FROM tappe");

    // Resetto il valore dell'auto_increment a 1 così il prossimo record avrà id 1
    mysqli_query($conn, "ALTER TABLE tappe AUTO_INCREMENT = 1");

    /*
     * Eseguo il redirect HTTP verso 'index.php' usando l’header Location.
     * 
     * Cos’è un redirect?
     * - È un comando inviato al browser per farlo caricare una nuova pagina (in questo caso index.php).
     * 
     * Perché serve qui?
     * - Dopo aver cancellato i dati e resettato l’auto_increment,
     *   vogliamo che la pagina si ricarichi pulita senza ripetere la cancellazione nel caso
     *   di refresh (premendo F5).
     * 
     * Come funziona tecnicamente:
     * - L’header HTTP Location "Location: index.php" dice al browser di fare una nuova richiesta GET,
     *   evitando cosi che il form POST venga inviato di nuovo (che causerebbe
     *   la ripetizione dell’operazione di reset).
     * 
     * Nota importante:
     * - Dopo aver inviato un header di redirect, *devi* terminare lo script con exit;
     *   altrimenti PHP continuerebbe ad eseguire il codice sottostante, cosa non desiderata.
     */
    header("Location: index.php");
    exit;
}


// Inizializzo la variabile che conterrà il totale delle distanze a zero
$tot = 0;

// Eseguo la query per calcolare la somma di tutti i valori presenti nella colonna distanza
$ris = mysqli_query($conn, "SELECT SUM(distanza) tot FROM tappe");

if ($ris) {
    $record = mysqli_fetch_assoc($ris);
    /* Prendo la riga di risultato (con un solo campo 'tot')
       e la salvo in array associativo */

    $totale = (int)($record['tot'] ?? 0);
    // Assegno la somma calcolata o 0 se non ci sono record

    mysqli_free_result($ris);
    // Libero la memoria utilizzata dal risultato della query
}


// Creo una stringa vuota che conterrà tutte le righe HTML della tabella
$rows = "";

$queryTappe = mysqli_query($conn, "SELECT id, distanza, data_inserimento FROM tappe ORDER BY id");

if ($queryTappe && mysqli_num_rows($queryTappe) > 0) {
    while ($row = mysqli_fetch_assoc($queryTappe)) {
        /* Ciclo sulle righe restituite dalla query:
           per ogni riga genero una riga html da inserire nella tabella */

        $rows .= '<tr>';
        $rows .= '<td>' . $row['id'] . '</td>';
        $rows .= '<td>' . $row['distanza'] . '</td>';
        $rows .= '<td>' . $row['data_inserimento'] . '</td>';
        $rows .= '</tr>';
    }

    mysqli_free_result($queryTappe);
} else {
    $rows = "<tr><td colspan='3'>Nessuna Tappa Inserita</td></tr>";
    /* Se non ci sono righe nella tabella,
       preparo una riga unica con messaggio di assenza dati */
}
