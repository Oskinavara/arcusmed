<?php
session_start(); // Starting Session
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$userID = $_SESSION["prawid_uzyt_id"];

$response = array();

if (isset($userID)):
	$response['isLoggedIn'] = true;
else:	
	$response['isLoggedIn'] = false;
endif; 

header('Content-Type: application/json');
echo json_encode($response);

?>
