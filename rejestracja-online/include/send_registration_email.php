<?php

session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';
require 'mail_config.php';

$user_login = OWNER_LOGIN;
$page_name = PAGE_NAME;
$company_name = COMPANY_NAME;
$subdir = SUBDIR;

// Retrieve form data
$recipient = $_POST['recipient'];


$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$domain = $_SERVER['HTTP_HOST'];
$requestedURL = $_SERVER['REQUEST_URI'];

$completeURL = $protocol . $domain;

$page_name = ltrim($page_name, '/');

$token = bin2hex(random_bytes(32 / 2));
$verificationLink = $completeURL . $subdir ."/" . $page_name .  '?token=' . $token;

$subject = 'Weryfikacja Adresu E-mail';
$body = "<p>Dziękujemy za rejestrację!</p>
         <p>Aby dokończyć proces rejestracji, prosimy kliknąć w poniższy link w celu zweryfikowania swojego adresu e-mail:</p>
         <p><a href=\"$verificationLink\">Kliknij tutaj, aby zweryfikować adres e-mail</a></p>
         <p>Jeśli nie rejestrowałeś się na naszej stronie, zignoruj tę wiadomość.</p>
         <p>Pozdrawiamy,</p>
         <p>$company_name</p>";
                                                    $query = "UPDATE `users` SET `Token`='$token' WHERE  `PatientEmail`='$recipient'";
                                                    $result = $connection->query($query);



$response = array();


$result = sendCustomEmail($recipient, $subject, $body);




$stmt = $connection->prepare("SELECT * FROM notification WHERE Owner = ?");
$stmt->bind_param('s', $user_login);
$stmt->execute();
$result_new = $stmt->get_result();

if ($row = $result_new->fetch_assoc()) {
    $notify = $row['EnableNotification'];
    $notify_email = $row['NotificationEmail'];

    if ($notify != 0) {
        $email_title = "Nowa rejestracja użytkownika w systemie rezerwacji online!";

        // Treść e-maila sformatowana w HTML
        $email_message2 = "
      
            <p>Drogi administratorze,</p>
            <p>Mamy nowego użytkownika zarejestrowanego w naszym systemie rezerwacji online. Proszę sprawdzić panel administracyjny, aby zobaczyć więcej szczegółów.</p>
            
            <p>Z poważaniem,</p>
            <p>Twój system rezerwacji online</p>
      ";
        $result = sendCustomEmail($notify_email, $email_title, $email_message2);
    }
}



if ($result === true) {
    $response['status'] = 'success';
    $response['message'] = 'Wiadomość e-mail została wysłana pomyślnie!';
} else {
    $response['status'] = 'failure';
    $response['message'] = 'Nie udało się wysłać wiadomości e-mail: ' . $result;
}

// Zwracanie danych w formacie JSON
header('Content-Type: application/json');
echo json_encode($response);
?>