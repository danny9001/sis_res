<?php
// views/login.php
session_start();
require_once '../config/database.php';

// login.php (Modificado para forzar el cambio de contraseña si es temporal)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email']; // Cambié 'username' a 'email' para que coincida con el formulario.
    $password = $_POST['password'];

    // Preparar y ejecutar la consulta para buscar el usuario por email
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($user && password_verify($password, $user['contrasena'])) { // Cambié 'password' a 'contrasena' para que coincida con la estructura de la base de datos.
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['rol']; // Cambié 'role' a 'rol' para que coincida con la estructura de la base de datos.
        
        // Redirigir al usuario si requiere cambiar la contraseña
        if ($user['requiere_cambio_password']) {
            header("Location: cambiar_password.php");
            exit;
        }

        // Redirigir al dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        // Manejo de errores: credenciales incorrectas
        $error = "Credenciales incorrectas.";
    }
}
?>

<!-- Formulario de inicio de sesión -->
<form method="post" action="login.php">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Contraseña:</label> <!-- Corregido el texto de la etiqueta -->
    <input type="password" name="password" required>
    <button type="submit">Iniciar Sesión</button> <!-- Corregido el texto del botón -->
</form>

<?php
// Mostrar mensaje de error si existe
if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>