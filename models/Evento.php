<?php
require_once 'database.php';

class Evento {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function obtenerEventos() {
        $sql = "SELECT * FROM eventos";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
<?php
require_once 'database.php';

class Evento {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function obtenerEvento($id) {
        $sql = "SELECT * FROM eventos WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
