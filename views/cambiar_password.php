<?php
// cambiar_password.php
require_once 'config/database.php';
session_start();

// Verificar que el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPassword = $_POST['new_password'];
    $userId = $_SESSION['user_id'];

    if (strlen($newPassword) >= 8) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
        $stmt = $pdo->prepare("UPDATE usuarios SET password = :password, requiere_cambio_password = 0 WHERE id = :user_id");
        $stmt->execute(['password' => $hashedPassword, 'user_id' => $userId]);

        echo "<p>Contraseña cambiada exitosamente. Redirigiendo al dashboard...</p>";
        header("Refresh: 2; URL=dashboard.php");
        exit;
    } else {
        echo "<p>La nueva contraseña debe tener al menos 8 caracteres.</p>";
    }
}
?>

<h1>Cambiar Contraseña Temporal</h1>
<form method="post" action="cambiar_password.php">
    <label for="new_password">Nueva Contraseña:</label>
    <input type="password" name="new_password" id="new_password" required>
    <button type="submit">Cambiar Contraseña</button>
</form>

