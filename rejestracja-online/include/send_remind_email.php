<?php

session_start(); // Starting Session

require_once '../db_connect.php';
require 'mail_config.php';
require_once '../config.php';

$company_name = COMPANY_NAME;

// Retrieve form data
$recipient = $_POST['recipient'];

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



        // Check if user exists
        $user_check_stmt = $connection->prepare("SELECT * FROM users WHERE PatientEmail = ? LIMIT 1");
        $user_check_stmt->bind_param("s", $recipient);

        if($user_check_stmt->execute()) {
            $user_check_result = $user_check_stmt->get_result();
            if($user_check_result->num_rows > 0) {
                // User exists, proceed with the rest of the process
                
              
                $nowe_haslo = generateRandomPassword();

                $query = "UPDATE users SET Password = SHA1('$nowe_haslo') WHERE PatientEmail = '$recipient'";
                $result = $connection->query($query);
            
                if (!$result) {
                    $response['status'] = 'failure';
                    $response['message'] = 'Zmiana hasła nie powiodła się.';
                } else {
                    $response['status'] = 'success';
                    $response['message'] = 'Wygenerowanie nowego hasła';
                    $response['newpassword'] = $nowe_haslo;
                }
            
            
            
                $subject = "Wygenerowanie nowego hasła";
                $body = "Cześć,<br><br>Twoje hasło do naszej strony rezerwacji online zostało zresetowane.<br>Oto Twoje nowe hasło: " . $nowe_haslo . "<br>Zalecamy zmianę tego hasła na coś, co łatwo zapamiętasz, po zalogowaniu się do swojego konta.<br>Jeśli nie inicjowałeś prośby o resetowanie hasła, skontaktuj się z nami natychmiast.<br><br>Dziękujemy za korzystanie z naszej strony rezerwacji online.<br><br>Z poważaniem,<br>" . $company_name;
                                                                
                
                
                $response = array();
                
                
                $result = sendCustomEmail($recipient, $subject, $body);
                
                if ($result === true) {
                    $response['status'] = 'success';
                    $response['message'] = 'Wiadomość e-mail została wysłana pomyślnie!';
                } else {
                    $response['status'] = 'failure';
                    $response['message'] = 'Nie udało się wysłać wiadomości e-mail: ' . $result;
                }
            


                
               
                
            } else {
                $response['status'] = 'failure';
                $response['message'] = 'Podany użytkownik nie istnieje.';
            }
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