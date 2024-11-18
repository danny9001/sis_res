<?php
require_once 'database.php';

class Invitado {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function obtenerInvitadosPorEvento($idEvento) {
        $sql = "SELECT * FROM invitados WHERE id_evento = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idEvento);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
