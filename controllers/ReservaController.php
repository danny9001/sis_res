<?php
require_once 'models/Reserva.php';

class ReservaController {
    private $reserva;

    public function __construct() {
        $this->reserva = new Reserva();
    }

    public function crearReserva($fecha, $hora, $usuario, $mesa) {
        return $this->reserva->crearReserva($fecha, $hora, $usuario, $mesa);
    }

    public function obtenerReservas() {
        return $this->reserva->obtenerReservas();
    }
}
?>
