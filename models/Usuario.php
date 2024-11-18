<?php
require_once 'database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($usuario, $password) {
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function registro($usuario, $password, $nombre, $apellido) {
        $sql = "INSERT INTO usuarios (usuario, password, nombre, apellido) VALUES ('$usuario', '$password', '$nombre', '$apellido')";
        return $this->db->query($sql);
    }
}
?>
