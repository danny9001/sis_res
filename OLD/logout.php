<?php
session_start(); // Inicia la sesión

// Verifica si hay una sesión activa
if (isset($_SESSION['user_id'])) {
    // Limpiar todas las variables de sesión
    $_SESSION = []; // Asignar un array vacío para limpiar las variables de sesión

    // Si se desea, se puede eliminar la cookie de sesión
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Destruir la sesión
    session_destroy();
}

// Redirigir al usuario a la página de inicio de sesión
header("Location: login.php");
exit;
?>