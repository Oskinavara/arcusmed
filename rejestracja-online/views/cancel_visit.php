<?php
try {
    session_start(); // Starting Session

    require_once '../db_connect.php';
	require_once '../config.php';

	$ownerLogin = OWNER_LOGIN;

    $user_id = $_SESSION["prawid_uzyt_id"];

    // Get the appID from the POST data
    $appID = $_POST['appID'];

    $response = array();



    if (isset($user_id)) {



        $query = "UPDATE freeappointments SET Status=0,  PatientID = null, Reason = '', Info = '' WHERE AppID='" . $appID . "'";
        $result = $connection->query($query);

        if (!$result) {
            $response['status'] = 'failure';
            $response['message'] = 'Wystąpił błąd zapytania';
        } else {

            $response['status'] = 'success';
            $response['message'] = 'Wizyta została anulowana.';


        }





    } else {


        $response['status'] = 'failure';
        $response['message'] = 'Aby anulować termin, musisz być zalogowany w systemie rezerwacji online. Jeżeli nie masz jeszcze konta - zarejestruj się.';
    }


    // Zwracanie danych w formacie JSON
    header('Content-Type: application/json');
    echo json_encode($response);

} catch (Exception $e) {

    // Logowanie nieudane
    $response['status'] = 'failure';
    $response['message'] = 'Wystąpił błąd: ' + $e->getMessage();

    // Zwracanie danych w formacie JSON
    header('Content-Type: application/json');
    echo json_encode($response);

}
?>