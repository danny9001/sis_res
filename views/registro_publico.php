<?php
// views/registro_publico.php
require_once '../config/database.php';
require_once '../libs/phpqrcode/qrlib.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $ci = $_POST['ci'];

    // Insertar datos de registro
    $stmt = $pdo->prepare("INSERT INTO invitados_publicos (nombre, ci) VALUES (:nombre, :ci)");
    $stmt->execute(['nombre' => $nombre, 'ci' => $ci]);
    $registro_id = $pdo->lastInsertId();

    // Generar código QR para el asistente
    $qrContent = "ID: " . $registro_id . " | Nombre: " . $nombre;
    $qrFilePath = "qrs_publicos/qr_" . $registro_id . ".png";
    QRcode::png($qrContent, $qrFilePath, QR_ECLEVEL_H, 10);

    echo "<p>Registro exitoso. Su código QR está listo.</p>";
    echo "<img src='" . $qrFilePath . "' alt='QR de Asistencia'>";
}
?>

<h1>Registro Público</h1>
<form method="post" action="registro_publico.php">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label>Cédula de Identidad:</label>
    <input type="text" name="ci" required>
    <br><br>
    <button type="submit">Registrarse y Generar QR</button>
</form>

