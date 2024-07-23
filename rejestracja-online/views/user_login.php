<?php
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$user_id = $_SESSION["prawid_uzyt_id"];

// Pobranie danych z formularza logowania
$email = $_POST["email"];
$password = $_POST["password"];

$response = array();

if ($email && $password) {	

    // Zapytanie do bazy danych w celu uwierzytelnienia użytkownika
    $query = "SELECT * FROM users WHERE PatientEmail = '$email' AND Password = sha1('$password') AND TokenVerified = True";
    $result = $connection->query($query);

    // Sprawdzenie wyników zapytania
    if ($result->num_rows == 1) {
		// Pobranie danych użytkownika
        $user = $result->fetch_assoc();
		// Przypisanie wartości do sesji

        $_SESSION["prawid_uzyt_id"] = $user['PatientID'];
        $_SESSION["prawid_uzyt_email"] = $user['PatientEmail'];

       
        // Logowanie zakończone sukcesem
        $response['status'] = 'success';
		$response['message'] = 'Użytkownik został zalogowany.';
    } else {
        // Logowanie nieudane
        $response['status'] = 'failure';
        $response['message'] = 'Nieprawidłowy login lub hasło lub Twój adres email nie został zweryfikowany. Spróbuj ponownie.';
		
    }
} else {
    $response['status'] = 'failure';
    $response['message'] = 'Podaj adres email i hasło.';
}

// Zamknięcie połączenia z bazą danych
$connection->close();

// Zwracanie danych w formacie JSON
header('Content-Type: application/json');
echo json_encode($response);
?>