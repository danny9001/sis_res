<?php
// views/login.php
session_start();
require_once '../config/database.php';

// login.php (Modificado para forzar el cambio de contraseña si es temporal)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        
        if ($user['requiere_cambio_password']) {
            header("Location: cambiar_password.php");
            exit;
        }

        header("Location: dashboard.php");
        exit;
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<form method="post" action="login.php">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Contraseña:</label>
    <input type="password" name="password" required>
    <button type="submit">Iniciar Sesión</button>
</form>


