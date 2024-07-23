<?php
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$user_id = $_SESSION["prawid_uzyt_id"];


$response = array();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Retrieve form data
	$email = $_POST['email'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$secondName = isset($_POST['secondname']) ? $_POST['secondname'] : '';

	$surname = $_POST['surname'];
	$phoneNumber = $_POST['phone_number'];
	$rodoAgreement = isset($_POST['rodoAgreement']) ? $_POST['rodoAgreement'] : '';

	$query = "select * from users where PatientEmail = '$email'";
	$result = $connection->query($query);

	if ($result && $result->num_rows > 0) {
		// User already exists
		$response['status'] = 'failure';
		$response['message'] = 'Użytkownik z podanym adresem email już istnieje.';
	} else {
		// User does not exist, proceed with registration

		// Retrieve form data
		
	

		// Perform registration logic here...

		// Example code to insert the user into the database
		$insertQuery = "INSERT INTO users (Owner, PatientEmail, Password) 
						VALUES ('$ownerLogin','$email', sha1('$password'))";
		$insertResult = $connection->query($insertQuery);

		if ($insertResult) {
			$insertedRowId = $connection->insert_id;

		}


		$patientfullname = $surname . " " . $name;

		if ($secondName)
			$patientfullname .= $secondName;

		$insertQuery2 = "insert into users_data (`PatientID`, `PatientFirstName`, `PatientSecondName`, `PatientSurName`, `PatientFullName`, `PhoneNr`, `CardID`) values ('$insertedRowId', '$name', '$secondName', '$surname', '$patientfullname','$phoneNumber', null)";
		$insertResult2 = $connection->query($insertQuery2);

		if ($insertResult2) {
			$response['status'] = 'success';
			$response['message'] = 'Registration successful!';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Registration failed. Please try again.';
		}


		

	}


}


// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

?>