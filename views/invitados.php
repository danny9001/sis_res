<?php
// views/invitados.php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Encargado de Reservas') {
    header("Location: login.php");
    exit;
}

$reserva_id = $_GET['reserva_id'];

// Obtener invitados de la reserva
$query = $pdo->prepare("SELECT * FROM invitados WHERE reserva_id = :reserva_id");
$query->execute(['reserva_id' => $reserva_id]);
$invitados = $query->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $ci = $_POST['ci'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $stmt = $pdo->prepare("INSERT INTO invitados (reserva_id, nombre, ci, fecha_nacimiento) VALUES (:reserva_id, :nombre, :ci, :fecha_nacimiento)");
    $stmt->execute([
        'reserva_id' => $reserva_id,
        'nombre' => $nombre,
        'ci' => $ci,
        'fecha_nacimiento' => $fecha_nacimiento
    ]);

    header("Location: invitados.php?reserva_id=$reserva_id");
    exit;
}
?>

<h1>Invitados de la Reserva</h1>
<form method="post" action="invitados.php?reserva_id=<?= $reserva_id ?>">
    <label>Nombre Completo:</label>
    <input type="text" name="nombre" required>
    <label>CI:</label>
    <input type="text" name="ci" required>
    <label>Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" required>
    <button type="submit">Agregar Invitado</button>
</form>

<h2>Lista de Invitados</h2>
<ul>
    <?php foreach ($invitados as $invitado): ?>
        <li><?= $invitado['nombre'] ?> - CI: <?= $invitado['ci'] ?> - Fecha Nacimiento: <?= $invitado['fecha_nacimiento'] ?></li>
    <?php endforeach; ?>
</ul>
