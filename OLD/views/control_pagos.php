<?php
// views/control_pagos.php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Encargado de Control de Pagos') {
    header("Location: login.php");
    exit;
}

// Obtener todas las reservas y verificar pagos
$query = $pdo->query("SELECT reservas.id, reservas.estado, reservas.fecha, usuarios.nombre AS encargado, pagos.estado AS estado_pago
                      FROM reservas
                      JOIN usuarios ON reservas.usuario_id = usuarios.id
                      LEFT JOIN pagos ON reservas.id = pagos.reserva_id");
$reservas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Control de Pagos</h1>
<table>
    <tr>
        <th>ID Reserva</th>
        <th>Fecha</th>
        <th>Encargado</th>
        <th>Estado de Pago</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($reservas as $reserva): ?>
    <tr>
        <td><?= $reserva['id'] ?></td>
        <td><?= $reserva['fecha'] ?></td>
        <td><?= $reserva['encargado'] ?></td>
        <td><?= $reserva['estado_pago'] == 'Completado' ? 'Pagado' : 'Pendiente' ?></td>
        <td>
            <?php if ($reserva['estado_pago'] !== 'Completado'): ?>
                <a href="confirmar_pago.php?id=<?= $reserva['id'] ?>">Confirmar Pago</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
