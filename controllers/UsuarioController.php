<?php
class UsuarioController {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function login($usuario, $password) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password = ?");
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 0) {
            echo "Credenciales incorrectas";
        } else {
            // Inicia sesión
            $_SESSION['usuario'] = $usuario;
            header('Location: views/main.php');
        }
    }

    public function registro($usuario, $password, $nombre, $apellido) {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->db->prepare("INSERT INTO usuarios (usuario, password, nombre, apellido) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $usuario, $passwordHash, $nombre, $apellido);
        $stmt->execute();

        echo "Registro exitoso";
    }
}
?>
