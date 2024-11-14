<?php
// views/historial_reservas.php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] === 'Administrador') {
    header("Location: login.php");
    exit;
}

// Obtener historial de reservas
$query = $pdo->query("SELECT reservas.id, reservas.fecha, reservas.estado, usuarios.nombre AS encargado FROM reservas JOIN usuarios ON reservas.usuario_id = usuarios.id");
$reservas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Historial de Reservas</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Encargado</th>
        <th>Estado</th>
    </tr>
    <?php foreach ($reservas as $reserva): ?>
    <tr>
        <td><?= $reserva['id'] ?></td>
        <td><?= $reserva['fecha'] ?></td>
        <td><?= $reserva['encargado'] ?></td>
        <td><?= $reserva['estado'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
