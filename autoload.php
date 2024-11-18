<?php
spl_autoload_register(function ($class) {
    require_once __DIR__ . '/' . $class . '.php';
});

// o

require_once __DIR__ . '/database/Database.php';
require_once __DIR__ . '/controllers/UsuarioController.php';
?>
