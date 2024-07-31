<?php
try {
    
    session_start(); // Starting Session

    require_once '../db_connect.php';
    require_once '../include/mail_config.php';
	require_once '../config.php';

	$ownerLogin = OWNER_LOGIN;
	
    $user_id = $_SESSION["prawid_uzyt_id"];

    $response = array();

    // Get the appID from the POST data
    $appID = $_POST['appID'];


    if (isset($user_id)) {



        $query = "SELECT * FROM freeappointments WHERE AppID = '$appID'";
        $result = $connection->query($query);

        if (!$result) {
            $response['status'] = 'failure';
            $response['message'] = 'Wystąpił błąd zapytania';
        }



        $freeappointment = mysqli_fetch_assoc($result);
        $status = $freeappointment['Status'];
        $patientId = $freeappointment['PatientID'];

        if ($status == 1 && $patientId != $user_id) {
            $response['status'] = 'failure';
            $response['message'] = 'Przepraszamy, podana rezerwacja została już zarezerwowana przez innego użytkownika.';

        }

        if ($status == 1 && $patientId == $user_id) {
            $response['status'] = 'failure';
            $response['message'] = 'Ten termin został już przez Ciebie zarezerwowany.';

        }

        $updateQuery = "UPDATE freeappointments SET Status = 1, PatientID = $user_id WHERE AppID = '$appID'";
        $updateResult = $connection->query($updateQuery);

        if (!$updateResult) {
            $response['status'] = 'failure';
            $response['message'] = 'Rezerwacja zakończona niepowodzeniem. Proszę spróbować ponownie.' . $connection->error . $updateQuery;

        } else {
            $response['status'] = 'success';
            $response['message'] = 'Wizyta została zarezerwowana.';

            $stmt = $connection->prepare("SELECT * FROM notification WHERE Owner = ?");
            $stmt->bind_param('s', $user_login);
            $stmt->execute();
            $result_new = $stmt->get_result();

            if ($row = $result_new->fetch_assoc()) {
                $notify = $row['EnableNotification'];
                $notify_email = $row['NotificationEmail'];

                if ($notify != 0) {
                    $email_title = "Nowa wizyta zarezerwowana w systemie rezerwacji online!";

                    // HTML formatted email content
                    $email_message2 = "
    
            <p>Drogi administratorze,</p>
            <p>Mamy nową wizytę zarezerwowaną w systemie rezerwacji online. Proszę potwierdzić rezerwację wizyty w programie SmartDental.</p>
           <p>Z poważaniem,</p><p>Twój system rezerwacji online</p>";

                    $result = sendCustomEmail($notify_email, $email_title, $email_message2);
                }
            }



        }

    } else {


        $response['status'] = 'failure';
        $response['message'] = 'Aby zarezerwować termin, musisz być zalogowany w systemie rezerwacji online. Jeżeli nie masz jeszcze konta - zarejestruj się.';
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