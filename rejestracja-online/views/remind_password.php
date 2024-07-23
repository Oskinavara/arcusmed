<?php
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$email = $_POST['email'];

try {

    function generateRandomPassword($wordCount = 2)
    {
        // List of common words
        $words = ['apple', 'banana', 'cat', 'dog', 'elephant', 'flower', 'guitar', 'happy', 'jungle', 'koala', 'lemon', 'monkey', 'napkin', 'ocean', 'piano', 'queen', 'rabbit', 'sun', 'tiger', 'umbrella', 'volcano', 'watermelon', 'xylophone', 'yoga', 'zebra'];

        // Generate the password by randomly selecting words and inserting numbers
        $password = '';
        for ($i = 0; $i < $wordCount; $i++) {
            $randomIndex = rand(0, count($words) - 1);
            $word = $words[$randomIndex];

            // Insert a random number at a random position within the word
            $number = rand(0, 9);
            $randomPosition = rand(0, strlen($word));
            $word = substr_replace($word, $number, $randomPosition, 0);

            $password .= $word;
           
        }

        return $password;
    }

    $nowe_haslo = generateRandomPassword();

    $query = "UPDATE users SET Password = SHA1('$nowe_haslo') WHERE PatientEmail = '$email'";
    $result = $connection->query($query);

    if (!$result) {
        $response['status'] = 'failure';
        $response['message'] = 'Zmiana hasła nie powiodła się.';
    } else {
        $response['status'] = 'success';
        $response['message'] = 'Wygenerowanie nowego hasła';
        $response['newpassword'] = $nowe_haslo;
    }
    
    // Zwracanie danych w formacie JSON
    header('Content-Type: application/json');
    echo json_encode($response);





} catch (Exception $e) {
    $response['status'] = 'failure';
    $response['message'] = 'Wystąpił błąd.';

    // Zwracanie danych w formacie JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>