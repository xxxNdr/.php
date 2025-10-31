<?php

// header
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// conn a db
require_once '../conn.php';

// catturo il metodo HTTP usato
$method = $_SERVER['REQUEST_METHOD'];
$message = [];

// switch in base al metodo
switch ($method) {
    case 'GET':

        // se nel json c'è il nome
        if (isset($_GET['nome']) && !empty($_GET['nome'])) {

            // seleziono
            $nome = $_GET['nome'];

            // preparo
            $stmt = mysqli_prepare($conn, "SELECT * FROM cani WHERE nome = ?");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 's', $nome);
                mysqli_stmt_execute($stmt);
                $res = mysqli_stmt_get_result($stmt);
                $message = mysqli_fetch_all($res, MYSQLI_ASSOC);
                mysqli_stmt_close($stmt);
                if (empty($message)) {
                    $sql = mysqli_query($conn, "SELECT * FROM cani");
                    $message = mysqli_fetch_all($sql, MYSQLI_ASSOC);
                    mysqli_free_result($sql);
                }
            }
        }

        break;

    case 'POST':

        // decodifico il json ricevuto
        $input = json_decode(file_get_contents('php://input'), true);

        // se nel json che ricevo c'è il nome e data nascita
        if (isset($input['nome']) && isset($input['data_nascita'])) {

            // seleziono
            $nome = $input['nome'];
            $data_nascita = $input['data_nascita'];

            //preparo
            $stmt = mysqli_prepare($conn, "INSERT INTO cani (nome, data_nascita) VALUES (?,?)");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'ss', $nome, $data_nascita);
                $res = mysqli_stmt_execute($stmt);

                if ($res) {
                    $message = [
                        'successo' => "$nome aggiunto"
                    ];
                } else {
                    $message = [
                        'errore' => "$nome non è stato aggiunto al database: " . mysqli_stmt_error($stmt)
                    ];
                }

                mysqli_stmt_close($stmt);
            } else {
                $message = [
                    'errore' => 'errore nella preparazione dello stmt: ' . mysqli_error($conn)
                ];
            }
        } else {
            $message = [
                'errore' => 'datai mancanti, nome e data di nascita sono obbligatori'
            ];
        }
        break;

    case 'PUT':

        // implementare
        $message = ["metodo" => "PUT"];

        break;

    case 'DELETE':

        // implementare
        $message = ["metodo" => "DELETE"];

        break;

    default:

        // metodo non supportato
        http_response_code(405); // Method Not Allowed
        die(json_encode(["error" => "Metodo non supportato"]));

        break;
}

echo json_encode($message);
