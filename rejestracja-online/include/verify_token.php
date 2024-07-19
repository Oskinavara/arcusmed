<?
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$response = array();

// Retrieve form data
$token = $_GET['token'];

// Check if the token matches and update the database
$query = "UPDATE `users` SET `TokenVerified` = True WHERE `Token` = '$token'";
$result = $connection->query($query);

if ($result) {
    $response['status'] = 'success';
    $response['message'] = 'Twój adres email został poprawnie zweryfikowany!';
} else {
    $response['status'] = 'failure';
    $response['message'] = 'Nie udało się zweryfikować Twojego adresu email.';
}
 echo $response['message'];
?>