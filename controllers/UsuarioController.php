<?php
require_once 'models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function login($usuario, $password) {
        return $this->usuario->login($usuario, $password);
    }

    public function registro($usuario, $password, $nombre, $apellido) {
        return $this->usuario->registro($usuario, $password, $nombre, $apellido);
    }
}
?>
