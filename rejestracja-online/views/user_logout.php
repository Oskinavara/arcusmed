<?php


session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

unset($_SESSION['prawid_uzyt']);
unset($_SESSION['prawid_uzyt_id']);


$response = array();
$response['status'] = 'success';
$response['message'] = 'Użytkownik został wylogowany.';
// Zwracanie danych w formacie JSON
header('Content-Type: application/json');
echo json_encode($response);
?>