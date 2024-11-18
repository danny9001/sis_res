<?php
// views/reservas.php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Administrador') {
    header("Location: login.php");
    exit;
}

// Obtener reservas
$query = $pdo->query("SELECT reservas.id, reservas.fecha, reservas.estado, usuarios.nombre AS encargado, mesas.numero AS mesa_num, sectores.nombre AS sector 
                      FROM reservas
                      JOIN usuarios ON reservas.usuario_id = usuarios.id
                      JOIN mesas ON reservas.mesa_id = mesas.id
                      JOIN sectores ON mesas.sector_id = sectores.id");
$reservas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Gestión de Reservas</h1>
<a href="nueva_reserva.php">Agregar Nueva Reserva</a>
<table>
    <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Encargado</th>
        <th>Mesa</th>
        <th>Sector</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($reservas as $reserva): ?>
    <tr>
        <td><?= $reserva['id'] ?></td>
        <td><?= $reserva['fecha'] ?></td>
        <td><?= $reserva['estado'] ?></td>
        <td><?= $reserva['encargado'] ?></td>
        <td><?= $reserva['mesa_num'] ?></td>
        <td><?= $reserva['sector'] ?></td>
        <td>
            <a href="editar_reserva.php?id=<?= $reserva['id'] ?>">Editar</a> |
            <a href="cancelar_reserva.php?id=<?= $reserva['id'] ?>" onclick="return confirm('¿Estás seguro de cancelar esta reserva?');">Cancelar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

