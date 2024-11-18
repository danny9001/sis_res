<?php
// views/asignar_permisos.php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Administrador') {
    header("Location: login.php");
    exit;
}

// Obtener usuarios y permisos disponibles
$usuarios = $pdo->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
$permisos = ['Control de Puerta', 'Control de Pagos', 'Reportes', 'Reserva', 'Administración'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $permisos_asignados = $_POST['permisos'];

    // Actualizar permisos del usuario
    $pdo->prepare("DELETE FROM user_permissions WHERE user_id = :user_id")->execute(['user_id' => $user_id]);
    foreach ($permisos_asignados as $permiso) {
        $pdo->prepare("INSERT INTO user_permissions (user_id, permiso) VALUES (:user_id, :permiso)")
            ->execute(['user_id' => $user_id, 'permiso' => $permiso]);
    }
    echo "Permisos actualizados para el usuario ID $user_id.";
}
?>

<h1>Asignación de Permisos</h1>
<form method="post" action="asignar_permisos.php">
    <label>Seleccionar Usuario:</label>
    <select name="user_id">
        <?php foreach ($usuarios as $usuario): ?>
            <option value="<?= $usuario['id'] ?>"><?= $usuario['nombre'] ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <label>Seleccionar Permisos:</label><br>
    <?php foreach ($permisos as $permiso): ?>
        <input type="checkbox" name="permisos[]" value="<?= $permiso ?>"> <?= $permiso ?><br>
    <?php endforeach; ?>
    <br>
    <button type="submit">Actualizar Permisos</button>
</form>

