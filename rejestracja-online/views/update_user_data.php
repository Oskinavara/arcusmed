<?php

session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$user_id = $_SESSION["prawid_uzyt_id"];

$response = array();

// Retrieve form data
$firstName = $_POST['firstname'];
$lastName = $_POST['surname'];
$secondName = $_POST['secondname'];
$phone = $_POST['phone'];



// Perform the update query
$query = "UPDATE users_data SET PatientFirstName='$firstName', PatientSurName='$lastName', PatientSecondName='$secondName', PhoneNr='$phone' WHERE PatientID='$user_id'";
$result = $connection->query($query);

if ($result) {
  $response['status'] = 'success';
  $response['message'] = 'User data updated successfully!';
} else {
  $response['status'] = 'failure';
  $response['message'] = 'Failed to update user data.';
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>