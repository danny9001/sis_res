<nav>
    <a href="dashboard.php">Inicio</a> |
    <a href="reservas.php">Reservas</a> |
    <a href="asignar_permisos.php">Asignar Permisos</a> |
    <?php if ($_SESSION['role'] === 'Administrador'): ?>
        <a href="reset_password.php">Restablecer Contraseña</a> |
    <?php endif; ?>
    <a href="reportes.php">Reportes</a> |
    <a href="logout.php">Cerrar Sesión</a>
</nav>

