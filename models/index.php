<?php
require_once 'controllers/UsuarioController.php';

$usuarioController = new UsuarioController();

if (isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['nombre']) && isset($_POST['apellido'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $resultado = $usuarioController->registro($usuario, $password, $nombre, $apellido);
    if ($resultado) {
        // Registro correcto
    } else {
        // Registro incorrecto
    }
}
require_once 'views/registro.php';
?>
