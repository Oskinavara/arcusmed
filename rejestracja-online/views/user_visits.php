<?php
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$user_id = $_SESSION["prawid_uzyt_id"];

if (isset($user_id)) {



	?>

	<h3>Twoje terminy</h3>

	<div class="sc-grid ">
		<?php

		$query2 = "SELECT *, DATE_FORMAT(AppStartTime, '%H:%i') as start, DATE_FORMAT(AppEndTime, '%H:%i') as end " .
			"FROM freeappointments " .
			"WHERE Status>0 AND Status<5 AND PatientID = '" . $user_id . "' ORDER BY AppDate ASC";
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
				'Reason' => $row['Reason'],
				'Info' => $row['Info'],
				'DoctorInfo' => $row['DoctorInfo']
			);

			$freeappointments[] = $date;
		}



		if (count($freeappointments) == 0) {
			echo "<p>Brak rezerwacji</p>";
		} else { ?>
			<div class="modern-box-container">
				<?php foreach ($freeappointments as $appointment) {
					$appdate = $appointment['AppDate'];
					$start = $appointment['start'];
					$end = $appointment['end'];
					$appid = $appointment['AppID'];
					$status = $appointment['Status'];
					$reason = $appointment['Reason'];
					$info = $appointment['Info'];
					$doctorinfo = $appointment['DoctorInfo'];


					if ($status == 1) {
						?>
						<div class="modern-box-user-apps">
							<div class="appointment-info">
								<div class="date-time">


									<div>
										<span class="date-label">Data</span> <span class="appointment-date">
											<?php echo $appdate; ?>
										</span>
									</div>

									<div>
										<span class="date-label">Godzina</span>
										<?php echo $start . " - " . $end; ?>
									</div>
								</div>
								<div class="appointment-status">Niepotwierdzona</div>
							</div>
							<button class="book-visit-button" id="cancelvisitButton_<?php echo $appid; ?>">Anuluj</button>

						</div>
					<?php }

					if ($status == 2) {
						?>
						<div class="modern-box-user-apps">
							<div class="appointment-info">
								<div class="date-time">


									<div>
										<span class="date-label">Data</span> <span class="appointment-date">
											<?php echo $appdate; ?>
										</span>
									</div>

									<div>
										<span class="date-label">Godzina</span>
										<?php echo $start . " - " . $end; ?>
									</div>
								</div>
								<div class="appointment-status">Niepotwierdzona</div>
							</div>
							<button class="book-visit-button" id="cancelvisitButton_<?php echo $appid; ?>">Anuluj</button>
						</div>

						<?php
					}

					if ($status == 3) {
						?>
						<div class="modern-box-user-apps">
							<div class="appointment-info">
								<div class="date-time">


									<div>
										<span class="date-label">Data</span> <span class="appointment-date">
											<?php echo $appdate; ?>
										</span>
									</div>

									<div>
										<span class="date-label">Godzina</span>
										<?php echo $start . " - " . $end; ?>
									</div>
								</div>
								<div class="appointment-status">Potwierdzona</div>


							</div>
							

						</div>
						<?php
					}

					if ($status == 4) {
						?>

						<div class="modern-box-user-apps">
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
									<div class="appointment-status">Odmówiona</div>
								</div>
							</div>
							<div class="appointment-details">
								
								<div>
									<strong>Informacje od lekarza:&nbsp;</strong>
									<?php echo $doctorinfo; ?>
								</div>
							</div>
						</div>



						<?php
					} ?>


				<script>


					$("#cancelvisitButton_<?php echo $appid; ?>").dxButton({
						stylingMode: 'contained',
						text: 'Rezygnuj',
						type: 'danger',
						width: 120,

						onClick: function () {

							$.ajax({
								url: 'views/cancel_visit.php',
								method: 'POST',
								data: { appID: <?php echo $appointment["AppID"]; ?> },
								dataType: 'json',
								success: function (response) {
									if (response.status === "success") {
										DevExpress.ui.notify({
											message: response.message,
											width: 500,
											position: {
												my: "center",
												at: "center",
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
												my: "center",
												at: "center",
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
											my: "center",
											at: "center",
											of: "#container"
										}
									}, "error", 500);
								}
							});
						}
					});
				</script>


			<?php } ?>
			</div>
			<?
		}
		?>
	</div>












	<?php
} else { ?>



	<?php
}
?>