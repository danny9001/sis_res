<?php
require_once 'models/Usuario.php';

class UsuarioController {// controllers/UsuarioController.php
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function login($usuario, $password) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password = ?");
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows === 0) {
            throw new Exception("Credenciales incorrectas");
        }
        
        // ...
    }
    
    public function registro($usuario, $password, $nombre, $apellido) {
        if (empty($usuario) || empty($password) || empty($nombre) || empty($apellido)) {
            throw new Exception("Todos los campos son requeridos");
        }
        
        if (!filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("El usuario debe ser un correo electrónico válido");
        }
        
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        
        $stmt = $this->db->prepare("INSERT INTO usuarios (usuario, password, nombre, apellido) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $usuario, $passwordHash, $nombre, $apellido);
        $stmt->execute();
        
        // ...
    }
}
?>
