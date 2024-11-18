<?php require_once 'header.php'; ?>

<h1>Detalle del Evento</h1>

<?php
$eventoController = new EventoController();
$evento = $eventoController->obtenerEvento($_GET['id']);
?>

<h2><?php echo $evento['nombre']; ?></h2>
<p>Fecha: <?php echo $evento['fecha']; ?></p>
<p>Hora: <?php echo $evento['hora']; ?></p>

<h3>Invitados</h3>
<ul>
    <?php
    $invitadoController = new InvitadoController();
    $invitados = $invitadoController->obtenerInvitadosPorEvento($_GET['id']);
    foreach ($invitados as $invitado) {
        echo "<li>$invitado[nombre] $invitado[apellido]</li>";
    }
    ?>
</ul>

<h3>Código QR</h3>
<img src="data:image/png;base64,<?php echo $qrController->generarQR($evento['id']); ?>">

<?php require_once 'footer.php'; ?>
