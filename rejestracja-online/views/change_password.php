<?php
session_start(); // Rozpoczynanie sesji

require_once '../db_connect.php'; // Łączenie z bazą danych
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$user_id = $_SESSION["prawid_uzyt_id"]; // Identyfikator użytkownika

if (isset($user_id)) {
  $currentPassword = $_POST['currentPassword']; // Obecne hasło
  $newPassword = $_POST['newPassword']; // Nowe hasło
  $confirmPassword = $_POST['confirmPassword']; // Potwierdzenie hasła

  if ($currentPassword && $newPassword && $confirmPassword && $newPassword === $confirmPassword) {
    $query = "SELECT Password FROM users WHERE PatientID = $user_id"; // Zapytanie do bazy danych
    $result = $connection->query($query);

    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $hashedPassword = $row['Password'];

      if (sha1($currentPassword) === $hashedPassword) {
        $hashedNewPassword = sha1($newPassword);

        $updateQuery = "UPDATE users SET Password = '$hashedNewPassword' WHERE PatientID = $user_id"; // Aktualizacja hasła
        $updateResult = $connection->query($updateQuery);

        if ($updateResult) {
          $response['status'] = 'success';
          $response['message'] = 'Hasło zostało zmienione pomyślnie!'; // Hasło zostało zmienione
        } else {
          $response['status'] = 'failure';
          $response['message'] = 'Nie udało się zaktualizować hasła.'; // Aktualizacja nie powiodła się
        }
      } else {
        $response['status'] = 'failure';
        $response['message'] = 'Nieprawidłowe obecne hasło.'; // Nieprawidłowe hasło
      }
    } else {
      $response['status'] = 'failure';
      $response['message'] = 'Nie udało się pobrać obecnego hasła.'; // Nie udało się pobrać hasła
    }
  } else {
    $response['status'] = 'failure';
    $response['message'] = 'Nieprawidłowe dane formularza.'; // Błędne dane
  }
} else {
  $response['status'] = 'failure';
  $response['message'] = 'Zaloguj się, aby zmienić hasło.'; // Brak zalogowania
}

header('Content-Type: application/json'); // Zwrócenie odpowiedzi jako JSON
echo json_encode($response); // Konwersja odpowiedzi na JSON
?>
