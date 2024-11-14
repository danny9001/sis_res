<?php
// views/calendario_eventos.php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Administrador') {
    header("Location: login.php");
    exit;
}

// Obtener eventos
$query = $pdo->query("SELECT * FROM eventos ORDER BY fecha");
$eventos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Calendario de Eventos</h1>
<table>
    <tr>
        <th>Fecha</th>
        <th>Nombre del Evento</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($eventos as $evento): ?>
    <tr>
        <td><?= $evento['fecha'] ?></td>
        <td><?= $evento['nombre'] ?></td>
        <td>
            <a href="editar_evento.php?id=<?= $evento['id'] ?>">Editar</a> |
            <a href="eliminar_evento.php?id=<?= $evento['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar este evento?');">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="nuevo_evento.php">Agregar Nuevo Evento</a>
