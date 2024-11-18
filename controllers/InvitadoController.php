<?php
require_once 'models/Invitado.php';

class InvitadoController {
    private $invitado;

    public function __construct() {
        $this->invitado = new Invitado();
    }

    public function obtenerInvitados($idEvento) {
        return $this->invitado->obtenerInvitados($idEvento);
    }
}
?>
