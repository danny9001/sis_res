<?php
// views/entrega_consumo.php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Encargado de Control de Entrega de Consumo') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $qr_code = $_POST['qr_code'];

    // Validar QR de consumo
    $stmt = $pdo->prepare("SELECT * FROM consumos WHERE qr_code = :qr_code AND estado = 'No utilizado'");
    $stmt->execute(['qr_code' => $qr_code]);
    $consumo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($consumo) {
        // Marcar el consumo como utilizado
        $update_stmt = $pdo->prepare("UPDATE consumos SET estado = 'Utilizado' WHERE id = :id");
        $update_stmt->execute(['id' => $consumo['id']]);
        echo "<p>Consumo registrado para mesa: " . $consumo['mesa_id'] . "</p>";
    } else {
        echo "<p>QR inválido o ya utilizado.</p>";
    }
}
?>

<h1>Registro de Consumo</h1>
<form method="post" action="entrega_consumo.php">
    <label>Escanear QR de Consumo:</label>
    <input type="text" name="qr_code" required>
    <button type="submit">Registrar Consumo</button>
</form>
