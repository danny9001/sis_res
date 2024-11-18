<?php
// dashboard.php
require_once 'config/database.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Obtener el rol del usuario
$role = $_SESSION['role'];

// Consultas para mostrar estadísticas rápidas
$totalReservas = $pdo->query("SELECT COUNT(*) FROM reservas")->fetchColumn();
$totalInvitados = $pdo->query("SELECT COUNT(*) FROM invitados")->fetchColumn();
$totalMesasDisponibles = $pdo->query("SELECT COUNT(*) FROM mesas WHERE disponible = 1")->fetchColumn();
$eventosProximos = $pdo->query("SELECT * FROM eventos WHERE fecha > NOW() ORDER BY fecha ASC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal - Gestión de Eventos</title>
    <link rel="stylesheet" href="styles/dashboard.css">
</head>
<body>
    <header>
        <h1>Bienvenido al Sistema de Gestión de Eventos y Reservas</h1>
        <p>Usuario: <?= htmlspecialchars($_SESSION['username']) ?> | Rol: <?= htmlspecialchars($role) ?></p>
        <nav>
            <a href="reservas.php">Reservas</a> |
            <a href="invitados.php">Invitados</a> |
            <a href="reportes.php">Reportes</a> |
            <?php if ($role === 'Administrador'): ?>
                <a href="administracion_usuarios.php">Administración de Usuarios</a> |
            <?php endif; ?>
            <a href="logout.php">Cerrar Sesión</a>
        </nav>
    </header>

    <main>
        <section id="estadisticas">
            <h2>Resumen Rápido</h2>
            <div class="stat">
                <p>Total de Reservas</p>
                <span><?= $totalReservas ?></span>
            </div>
            <div class="stat">
                <p>Total de Invitados Confirmados</p>
                <span><?= $totalInvitados ?></span>
            </div>
            <div class="stat">
                <p>Mesas Disponibles</p>
                <span><?= $totalMesasDisponibles ?></span>
            </div>
        </section>

        <section id="eventos_proximos">
            <h2>Próximos Eventos</h2>
            <?php if (!empty($eventosProximos)): ?>
                <ul>
                    <?php foreach ($eventosProximos as $evento): ?>
                        <li>
                            <strong><?= htmlspecialchars($evento['nombre']) ?></strong> - <?= date("d-m-Y H:i", strtotime($evento['fecha'])) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hay eventos próximos programados.</p>
            <?php endif; ?>
        </section>

        <section id="acciones_rapidas">
            <h2>Acciones Rápidas</h2>
            <div class="acciones">
                <a href="nueva_reserva.php" class="btn">Crear Nueva Reserva</a>
                <a href="gestionar_evento.php" class="btn">Gestionar Eventos</a>
                <a href="estadisticas_eventos.php" class="btn">Ver Estadísticas</a>
                <?php if ($role === 'Administrador'): ?>
                    <a href="administracion_usuarios.php" class="btn">Administrar Usuarios</a>
                <?php endif; ?>
            </div>
        </section>
    </main>
    
    <footer>
        <p>Sistema de Gestión de Eventos y Reservas &copy; 2024</p>
    </footer>
</body>
</html>

