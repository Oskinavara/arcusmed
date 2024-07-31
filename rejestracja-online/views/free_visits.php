<?php
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$tempappDate = $_POST["appDate"];

$workerID = $_SESSION["workerID"];
$user_login = $_SESSION["prawid_uzyt"];
$user_id = $_SESSION["prawid_uzyt_id"];

// Create a DateTime object from the date string
$date = DateTime::createFromFormat('D M d Y H:i:s e+', $tempappDate);

// Format the date to the desired format
$appDate = $date->format('Y-m-d');

$query = "SELECT DentistFullName, Title, AdditionalInfo FROM dentist WHERE DentistID = '" . $workerID . "'";
$result = $connection->query($query);

// Process employer data
$employer = mysqli_fetch_assoc($result);


$title = $employer['Title'];
$workerFullName = $employer['DentistFullName'];
$additionalInfo = $employer['AdditionalInfo'];

$query2 = "SELECT *, DATE_FORMAT(AppStartTime, '%H:%i') as start, DATE_FORMAT(AppEndTime, '%H:%i') as end " .
  "FROM freeappointments LEFT JOIN dentist ON dentist.DentistID=freeappointments.DentistID " .
  "WHERE AppDate = '" . $appDate . "'  AND freeappointments.DentistID = '" . $workerID . "' AND dentist.Owner ='" . $ownerLogin . "' ORDER BY start";

$result2 = $connection->query($query2);

// Create an array to store the selected dates
$freeappointments = array();

while ($row = $result2->fetch_assoc()) {
  $date = array(
    'start' => $row['start'],
    'end' => $row['end'],
    'AppDate' => $row['AppDate'],
    'AppID' => $row['AppID'],
    'Status' => $row['Status'],
    'PatientID' => $row['PatientID']
  );

  $freeappointments[] = $date;
}


if (count($freeappointments) == 0) {
  
  
  
  ?>
  <div>Brak wolnych terminów.</div>
  <?
} else { ?>


  <div class="modern-box-container">
    <?php foreach ($freeappointments as $appointment) { ?>

      <?php if ($appointment['Status'] == 0) { ?>
        <div class="modern-box">



          <div class="appointment-info">
            <div class="date-time">

              <div>
                <span class="date-label">Data</span> <span class="appointment-date">
                  <?php echo $appointment['AppDate']; ?>
                </span>
              </div>

              <div>
                <span class="date-label">Godzina</span>
                <?php echo $appointment['start'] . " - " . $appointment['end']; ?>
              </div>
            </div>
            <div class="status-and-button">
              <button class="book-visit-button" id="bookvisitButton_<?php echo $appointment['AppID']; ?>">Rezerwuj</button>
              <div class="appointment-status">Wolny termin</div>
            </div>
          </div>


          <script>


            $("#bookvisitButton_<?php echo $appointment['AppID']; ?>").dxButton({
              stylingMode: 'contained',
              text: 'Rezerwuj',
              type: 'success',
              width: 120,

              onClick: function () {

                $.ajax({
                  url: 'views/book_visit.php',
                  method: 'POST',
                  data: { appID: <?php echo $appointment["AppID"]; ?> },
                  dataType: 'json',
                  success: function (response) {
                    if (response.status === "success") {
                      DevExpress.ui.notify({
                        message: response.message,
                        width: 500,
                        position: {
                          my: "top",
                          at: "top",
                          of: "#container"
                        }
                      }, "success", 1500);




                      $.ajax({
                        url: "views/user_visits.php",
                        method: "GET",

                        dataType: "html",
                        success: function (response) {

                          $("#content").html(response);
                        },
                        error: function (xhr, status, error) {
                          // Log the error details
                          //console.error("AJAX Error:", status, error);

                          // Display an error message to the user
                          $("#content").html("<p>Błąd wczytywania strony.</p>" + error);
                        }
                      });


                    } else if (response.status === "failure") {
                      // Logowanie nieudane
                      DevExpress.ui.notify({
                        message: response.message,
                        width: 500,
                        position: {
                          my: "top",
                          at: "top",
                          of: "#container"
                        }
                      }, "error", 500);
                    }
                  },
                  error: function (xhr, status, error) {
                    DevExpress.ui.notify({
                      message: "Błąd serwera." + error,
                      width: 230,
                      position: {
                        my: "top",
                        at: "top",
                        of: "#container"
                      }
                    }, "error", 500);
                  }
                });
              }
            });
          </script>
        </div>

      <?php } ?>


      <?php if (($appointment['Status'] == 1 || $appointment['Status'] == 2) && $appointment['PatientID'] == $user_id) { ?>
        <div class="modern-box">



          <div class="appointment-info">
            <div class="date-time">

              <div>
                <span class="date-label">Data</span> <span class="appointment-date">
                  <?php echo $appointment['AppDate']; ?>
                </span>
              </div>

              <div>
                <span class="date-label">Godzina</span>
                <?php echo $appointment['start'] . " - " . $appointment['end']; ?>
              </div>
            </div>
            <div class="status-and-button">
              <button class="book-visit-button" id="cancelvisitButton_<?php echo $appointment['AppID']; ?>">Rezygnuj</button>
              <div class="appointment-status">Niepotwierdzona</div>
            </div>
          </div>


          <script>


            $("#cancelvisitButton_<?php echo $appid; ?>").dxButton({
              stylingMode: 'contained',
              text: 'Rezygnuj',
              type: 'danger',
              width: 120,

              onClick: function () {

                $.ajax({
                  url: 'views/cancelvisit.php',
                  method: 'POST',
                  data: { appID: <?php echo $appointment["AppID"]; ?> },
                  dataType: 'json',
                  success: function (response) {
                    if (response.status === "success") {
                      DevExpress.ui.notify({
                        message: response.message,
                        width: 500,
                        position: {
                          my: "top",
                          at: "top",
                          of: "#container"
                        }
                      }, "success", 1500);




                      $.ajax({
                        url: "views/user_visits.php",
                        method: "GET",

                        dataType: "html",
                        success: function (response) {

                          $("#content").html(response);
                        },
                        error: function (xhr, status, error) {
                          // Log the error details
                          //console.error("AJAX Error:", status, error);

                          // Display an error message to the user
                          $(".appointments").html("<p>Błąd wczytywania strony.</p>" + error);
                        }
                      });


                    } else if (response.status === "failure") {
                      // Logowanie nieudane
                      DevExpress.ui.notify({
                        message: response.message,
                        width: 500,
                        position: {
                          my: "top",
                          at: "top",
                          of: "#container"
                        }
                      }, "error", 500);
                    }
                  },
                  error: function (xhr, status, error) {
                    DevExpress.ui.notify({
                      message: "Błąd serwera.",
                      width: 230,
                      position: {
                        my: "top",
                        at: "top",
                        of: "#container"
                      }
                    }, "error", 500);
                  }
                });
              }
            });
          </script>
        </div>

      <?php } ?>

      <?php if ($appointment['Status'] == 3 && $appointment['PatientID'] == $user_id) { ?>
        <div class="modern-box">



          <div class="appointment-info">
            <div class="date-time">

              <div>
                <span class="date-label">Data</span> <span class="appointment-date">
                  <?php echo $appointment['AppDate']; ?>
                </span>
              </div>

              <div>
                <span class="date-label">Godzina</span>
                <?php echo $appointment['start'] . " - " . $appointment['end']; ?>
              </div>
            </div>
            <div class="status-and-button">
             
              <div class="appointment-status">Twoja rezerwacja - potwierdzona</div>
            </div>
          </div>


        </div>

      <?php } ?>


    <?php } ?>
  </div>


<?php } ?>