<?php
// reset_password.php
require_once 'config/database.php';
session_start();

// Verificar que el usuario tiene permiso de administrador
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Administrador') {
    header("Location: login.php");
    exit;
}

// Si se hace clic en el botón de restablecimiento de contraseña
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];
    $newPassword = password_hash('Contraseña123!', PASSWORD_DEFAULT); // Contraseña temporal

    $stmt = $pdo->prepare("UPDATE usuarios SET password = :password, requiere_cambio_password = 1 WHERE id = :user_id");
    $stmt->execute(['password' => $newPassword, 'user_id' => $userId]);

    echo "<p>Contraseña restablecida. El usuario deberá cambiarla en el próximo inicio de sesión.</p>";
}

// Obtener la lista de usuarios
$usuarios = $pdo->query("SELECT id, nombre FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>Restablecer Contraseña</h1>
<table>
    <tr>
        <th>Nombre de Usuario</th>
        <th>Acción</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?= htmlspecialchars($usuario['nombre']) ?></td>
        <td>
            <form method="post" action="reset_password.php">
                <input type="hidden" name="user_id" value="<?= $usuario['id'] ?>">
                <button type="submit">Restablecer Contraseña</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="dashboard.php">Volver al Dashboard</a>
