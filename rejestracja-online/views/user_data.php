<?php

session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$user_id = $_SESSION["prawid_uzyt_id"];

if (isset($user_id)) {

  $query = "SELECT * FROM users_data WHERE PatientID='" . $user_id . "'";
  $result = $connection->query($query);


  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $firstName = $row['PatientFirstName'];
    $secondName = $row['PatientSecondName'];
    $lastName = $row['PatientSurName'];
    $phone = $row['PhoneNr'];
    ?>


    <div id="userDataForm"></div>

    <script>
      $(function () {
        var userDataForm = $("#userDataForm").dxForm({
          formData: {
            firstname: "<?php echo $firstName; ?>",
            surname: "<?php echo $lastName; ?>",
            secondname: "<?php echo $secondName; ?>",
            phone: "<?php echo $phone; ?>"
          },
          colCount: 1,
          labelLocation: "top",
          items: [
            {
              dataField: "firstname",
              label: { text: "Imię" },
              editorType: "dxTextBox"
            },
            {
              dataField: "surname",
              label: { text: "Nazwisko" },
              editorType: "dxTextBox"
            },
            {
              dataField: "secondname",
              label: { text: "Drugie imię" },
              editorType: "dxTextBox"
            },
            {
              dataField: "phone",
              label: { text: "Telefon kontaktowy" },
              editorType: "dxTextBox"
            },
            {
              itemType: "button",
              horizontalAlignment: "left",
              buttonOptions: {
                text: "Uaktualnij dane",
                type: "success",
                onClick: function (e) {
                  var formData = userDataForm.option("formData");


                  $.ajax({
                    type: 'POST',
                    url: 'views/update_user_data.php',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {

                      DevExpress.ui.notify('Aktualizacja zakończona sukcesem!', 'success', 5000);


                    },
                    error: function (xhr, status, error) {
                      var errorMessage = xhr.responseText; // Retrieve the error message from the response


                      DevExpress.ui.notify('Wystąpił błąd podczas aktualizacji.' + errorMessage + ' Proszę spróbować ponownie.', 'error', 222000);
                    }
                  });


                }
              }
            }
          ]
        }).dxForm("instance");
      });
    </script>


  <?php } else {
    // No matching row found
    // Handle the case where the user ID does not exist in the table
  }





} else {
  echo 'Twoja sesja wygasła, zaloguj się ponownie.';
  ?>

  
<?php
}
?>