<?php
// views/control_puerta.php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Encargado de Control en Puerta') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $qr_code = $_POST['qr_code'];

    // Verificar el QR en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM invitados WHERE qr_code = :qr_code");
    $stmt->execute(['qr_code' => $qr_code]);
    $invitado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($invitado) {
        echo "<p>Acceso permitido para: " . $invitado['nombre'] . "</p>";
    } else {
        echo "<p>QR inválido o ya utilizado.</p>";
    }
}
?>

<h1>Control de Accesos en Puerta</h1>
<form method="post" action="control_puerta.php">
    <label>Escanear Código QR:</label>
    <input type="text" name="qr_code" required>
    <button type="submit">Verificar Acceso</button>
</form>
