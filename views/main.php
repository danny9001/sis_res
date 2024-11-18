<?php
if (isset($_SESSION['usuario'])) {
    echo "Bienvenido, " . $_SESSION['usuario'];
} else {
    echo "Inicia sesión o regístrate";
}
?>
