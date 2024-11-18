<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'eventos_user');
define('DB_PASSWORD', '+J3tD4taBaS3R3serv4**');
define('DB_NAME', 'eventos');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
