<?php
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

try {
  $workerID = $_GET["workerID"];
  $_SESSION['workerID'] = $workerID;

  $query = "SELECT DentistFullName, Title, AdditionalInfo FROM dentist WHERE DentistID = '" . $workerID . "'";
  $result = $connection->query($query);

  // Process employer data
  $employer = mysqli_fetch_assoc($result);

  $user = $result->fetch_assoc();
  $title = $employer['Title'];
  $workerFullName = $employer['DentistFullName'];
  $additionalInfo = $employer['AdditionalInfo'];
  ?>

  <div class="appointment-item">
    <div class="avatar">
      <i class="fas fa-user custom-size"></i>
    </div>
    <div class="info">
      <div class="title">
        <?php echo $title; ?>
        <?php echo $workerFullName; ?>
      </div>
      <div class="additional-info">
        <?php echo $additionalInfo; ?>
      </div>
    </div>
  </div>
  <div id="calendar"></div>
  <div class="appointments"></div>

  <?php
  $query = "SELECT DISTINCT(AppDate) as appdate, DentistID, Owner FROM freeappointments WHERE DentistID='" . $workerID . "' AND Owner='" . $ownerLogin . "' AND Status=0 AND appdate >='" . date("Y-m-d") . "' ORDER BY AppDate ASC";
  $result = $connection->query($query);

  // Create an array to store the selected dates
  $dates = array();

  // Fetch dates from the database result
  while ($row = $result->fetch_assoc()) {
    $dates[] = $row['appdate'];
  }

  // Encode the dates array into a JSON string
  $encodedDates = json_encode($dates);

  if (count($dates) == 0) {
    ?>
    <div class="box-warning">Brak wolnych terminów </div>
    <?php
  } else if (count($dates) > 0) {

    ?>

      <script>
        // Retrieve the encoded dates array from PHP
        var encodedDates = '<?php echo $encodedDates; ?>';

        // Parse the JSON string to get the dates array in JavaScript
        var dates = JSON.parse(encodedDates);

        // Convert the dates array to JavaScript Date objects
        var disabledDates = dates.map(function (dateString) {
          return new Date(dateString);
        });

        // Get the current month's days
        var currentDate = new Date();
        var currentMonth = currentDate.getMonth();
        var currentYear = currentDate.getFullYear();
        var daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();


        var allDates = [];

        for (var i = 1; i <= daysInMonth; i++) {
          var date = new Date(currentYear, currentMonth, i);

          // Check if the date is in the disabledDates array
          var isDisabled = disabledDates.some(function (disabledDate) {
            // Compare the dates while ignoring the time

            return isSameDate(date, disabledDate);
          });

          if (!isDisabled) {
            allDates.push(date);
          }
        }

        // Function to compare dates without considering the time
        function isSameDate(date1, date2) {
          return (
            date1.getFullYear() === date2.getFullYear() &&
            date1.getMonth() === date2.getMonth() &&
            date1.getDate() === date2.getDate()
          );
        }

        function DateChanged(date) {
          $.ajax({
            url: "views/free_visits.php",
            method: "POST",
            data: {
              appDate: date
            },
            dataType: "html",
            success: function (response) {

              $(".appointments").html(response);

            },
            error: function (xhr, status, error) {
              // Log the error details
              console.error("AJAX Error:", status, error);

              // Display an error message to the user
              $(".appointments").html("<p>Błąd wczytywania strony.</p>" + error);
            }
          });
        }


        // var html = '';
        // disabledDates.forEach(function(item) {
        //   html += '<li>' + item + '</li>';
        // });

        // $('.appointments').html(html);
        // Initialize the calendar

        var html = '';

        // Initialize the calendar with the 'disabledDates' option
        var calendar = $('#calendar').dxCalendar({
          value: new Date(),
          disabled: false,
          firstDayOfWeek: 1,
          showWeekNumbers: false,
          weekNumberRule: 'auto',
          width: '100%',
          height: 400,
          onValueChanged: function (e) {
            var currentDate = e.component.option('value');
            DateChanged(e.value);

          },
          onOptionChanged: function (data) {
            if (data.name === 'zoomLevel') {
              zoomLevel.option('value', data.value);
            }
          },
          disabledDates: function (args) {
            var currentDate = args.date;
            var isDisabled = true;
            var isDisabled = disabledDates.some(function (disabledDate) {
              // Compare the dates while ignoring the time

              return isSameDate(currentDate, disabledDate);
            });
            if (!isDisabled)
              return true;
            else
              return false;
          }
        }).dxCalendar('instance');
        Globalize.culture('cs');
        DateChanged(new Date());    </script>
      <?php
  }
} catch (Exception $e) {
  // Obsługa błędów, np. wyświetlanie komunikatu lub zapis do logów
  echo 'Wystąpił błąd: ' . $e->getMessage();
}
?>