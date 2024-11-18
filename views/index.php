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
