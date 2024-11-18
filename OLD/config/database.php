<?php
// config/database.php

// Definir constantes para la configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'sistema_reservas');
define('DB_USER', 'usuario_reservas');
define('DB_PASS', '+J3tD4taBaS3R3serv4**');

try {
    // Crear una nueva conexión PDO
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);

    // Configurar el manejo de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Establecer el modo de fetch por defecto

} catch (PDOException $e) {
    // Manejo de errores más robusto
    error_log("Error en la conexión: " . $e->getMessage(), 0); // Loguear el error
    throw new Exception("No se pudo conectar a la base de datos."); // Lanzar una excepción más genérica
}
?>