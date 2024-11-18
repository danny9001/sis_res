<?php
require_once 'controllers/UsuarioController.php';
require_once 'database/database.php';

$db = new Database();
$usuarioController = new UsuarioController();

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $resultado = $usuarioController->login($usuario, $password);
    if ($resultado) {
        // Login correcto
    } else {
        // Login incorrecto
    }
}
require_once 'views/login.php';
?>
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
<?php
require_once 'controllers/ReservaController.php';

$reservaController = new ReservaController();

if (isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['usuario']) && isset($_POST['mesa'])) {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $usuario = $_POST['usuario'];
    $mesa = $_POST['mesa'];
    $resultado = $reservaController->crearReserva($fecha, $hora, $usuario, $mesa);
    if ($resultado) {
        // Reserva creada correctamente
    } else {
        // Error al crear reserva
    }
}
require_once 'views/reservas.php';
?>
<?php
require_once 'controllers/EventoController.php';

$eventoController = new EventoController();

if (isset($_POST['nombre']) && isset($_POST['fecha']) && isset($_POST['hora'])) {
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $resultado = $eventoController->crearEvento($nombre, $fecha, $hora);
    if ($resultado) {
        // Evento creado correctamente
    } else {
        // Error al crear evento
    }
}
require_once 'views/eventos.php';
?>
<?php
require_once 'controllers/InvitadoController.php';

$invitadoController = new InvitadoController();

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $resultado = $invitadoController->crearInvitado($nombre, $apellido, $correo);
    if ($resultado) {
        // Invitado creado correctamente
    } else {
        // Error al crear invitado
    }
}
require_once 'views/invitados.php';
?>
<?php
require_once 'controllers/QRController.php';

if (isset($_POST['texto'])) {
    $qrController = new QRController();
    $qr = $qrController->generarQR($_POST['texto']);
    require_once 'views/qrcode.php';
} else {
    require_once 'views/qrcode.php';
}
?>
