<?php
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$user_id = $_SESSION["prawid_uzyt_id"];
$user_login = $_SESSION["user_login"];

try {
	$query = "SELECT * FROM dentist WHERE Owner='" . $ownerLogin . "' ORDER BY dentist.Order ASC";
	$result = $connection->query($query);

	if (!$result) {
		throw new Exception('Błąd zapytania');
	}

	$rows = $result->num_rows;

	if ($rows > 0) {
		?>
		<p>Wybierz osobę, do której chcesz się umówić na wizytę:</p>
		<?php
		while ($row = $result->fetch_assoc()) {
			$workerID = $row["DentistID"];
			?>
			<div class="calendar-item">
				<div class="calendar-link">
					<a href="#" data-worker="<?php echo $workerID; ?>">
					<i class="fas fa-user custom-size"></i>
					</a>
					<script>
							$(document).ready(function () {
								$('.calendar-link').click(function (e) {
									e.preventDefault();
									var workerID = $(this).data('worker');
									$.ajax({
										url: 'views/show_calendar.php',
										method: 'GET',
										data: {
											workerID: workerID
										},
										success: function (response) {
											// Tutaj możesz manipulować otrzymanymi danymi, np. wyświetlić wynik w określonym elemencie na stronie
											$("#content").html(response);
										},
										error: function (xhr, status, error) {
											// Obsługa błędów
											$("#content").html(xhr);
										}
									});
								});
							});
						</script>
				</div>
				<div class="calendar-details">
					<a href="#" class="calendar-link" data-worker="<?php echo $workerID; ?>">
						<?php echo $row["Title"]; ?> 			<?php echo $row["DentistFullName"]; ?>
					</a>
					<span class="additional-info">
						<?php echo $row["AdditionalInfo"]; ?>
					</span>
				</div>
			</div>




			
			<?php
		}
	} else {
		?>
		<span class="sc-text-warning">Brak dostępnych pracowników.</span>
		<?php
	}
} catch (Exception $e) {
	// Obsługa błędów, np. wyświetlanie komunikatu lub zapis do logów
	echo 'Wystąpił błąd: ' . $e->getMessage();
}
?>