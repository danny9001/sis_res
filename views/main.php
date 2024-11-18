<?php
if (isset($_SESSION['usuario'])) {
    echo "Bienvenido, " . $_SESSION['usuario'];
} else {
    header('Location: ./views/login.php');
    exit;
}
?>
