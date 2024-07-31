<?php
    require_once 'config.php';

    $ownerLogin = OWNER_LOGIN;

    $host = DB_SERVER;
    $user = DB_USER;
    $password = DB_PASSWORD;
    $database = DB_NAME;
    $port = DB_PORT;

    $connection = new mysqli($host, $user, $password, $database, $port);
    mysqli_query($connection, "SET NAMES 'utf8'");
    if ($connection->connect_error) {
        die('Błąd połączenia z bazą danych: ' . $connection->connect_error);
    }
?>
