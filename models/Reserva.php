<?php
require_once 'database.php';

class Reserva {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function crearReserva($fecha, $hora, $usuario, $mesa) {
        $sql = "INSERT INTO reservas (fecha, hora, usuario, mesa) VALUES ('$fecha', '$hora', '$usuario', '$mesa')";
        return $this->db->query($sql);
    }

    public function obtenerReservas() {
        $sql = "SELECT * FROM reservas";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
