<?php
require_once 'models/Evento.php';

class EventoController {
    private $evento;

    public function __construct() {
        $this->evento = new Evento();
    }

    public function obtenerEventos($id) {
        return $this->evento->obtenerEventos($id);
    }
}
?>
