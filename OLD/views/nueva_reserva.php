<?php
// views/nueva_reserva.php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Administrador') {
    header("Location: login.php");
    exit;
}

// Obtener encargados de reservas y mesas
$encargados = $pdo->query("SELECT id, nombre FROM usuarios WHERE rol = 'Encargado de Reservas'")->fetchAll(PDO::FETCH_ASSOC);
$mesas = $pdo->query("SELECT mesas.id, mesas.numero, sectores.nombre AS sector FROM mesas JOIN sectores ON mesas.sector_id = sectores.id")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_POST['usuario_id'];
    $mesa_id = $_POST['mesa_id'];
    $fecha = $_POST['fecha'];

    $stmt = $pdo->prepare("INSERT INTO reservas (usuario_id, mesa_id, fecha, estado) VALUES (:usuario_id, :mesa_id, :fecha, 'Pendiente')");
    $stmt->execute(['usuario_id' => $usuario_id, 'mesa_id' => $mesa_id, 'fecha' => $fecha]);

    header("Location: reservas.php");
    exit;
}
?>

<h1>Agregar Nueva Reserva</h1>
<form method="post" action="nueva_reserva.php">
    <label>Encargado de Reservas:</label>
    <select name="usuario_id">
        <?php foreach ($encargados as $encargado): ?>
            <option value="<?= $encargado['id'] ?>"><?= $encargado['nombre'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Mesa y Sector:</label>
    <select name="mesa_id">
        <?php foreach ($mesas as $mesa): ?>
            <option value="<?= $mesa['id'] ?>">Mesa <?= $mesa['numero'] ?> (Sector: <?= $mesa['sector'] ?>)</option>
        <?php endforeach; ?>
    </select>

    <label>Fecha:</label>
    <input type="date" name="fecha" required>

    <button type="submit">Crear Reserva</button>
</form>

