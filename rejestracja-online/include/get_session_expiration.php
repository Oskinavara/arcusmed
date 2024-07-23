<?php
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$user_id = $_SESSION["prawid_uzyt_id"];
$response = array();

if ($session && $user_id) {
    // Session exists and the user_id is set
    $response['status'] = 'success';
} else {
    // Session does not exist or the user_id is not set
    $response['status'] = 'failure';
}

header('Content-Type: application/json');
echo json_encode($response);
?>