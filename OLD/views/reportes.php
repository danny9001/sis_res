<?php
// views/reportes.php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Personal Administrativo') {
    header("Location: login.php");
    exit;
}

// Obtener estadísticas
$total_reservas = $pdo->query("SELECT COUNT(*) AS total FROM reservas")->fetchColumn();
$total_asistentes = $pdo->query("SELECT COUNT(*) AS total FROM invitados WHERE estado_asistencia = 'Asistió'")->fetchColumn();
$reservas_pendientes = $pdo->query("SELECT COUNT(*) AS total FROM reservas WHERE estado = 'Pendiente'")->fetchColumn();
$reservas_confirmadas = $pdo->query("SELECT COUNT(*) AS total FROM reservas WHERE estado = 'Confirmada'")->fetchColumn();
?>

<h1>Reportes y Estadísticas</h1>
<p>Total de Reservas: <?= $total_reservas ?></p>
<p>Total de Asistentes: <?= $total_asistentes ?></p>
<p>Reservas Pendientes: <?= $reservas_pendientes ?></p>
<p>Reservas Confirmadas: <?= $reservas_confirmadas ?></p>
