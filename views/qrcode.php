<?php require_once 'header.php'; ?>

<h1>Código QR</h1>

<form action="" method="post">
    <label for="texto">Texto:</label>
    <input type="text" id="texto" name="texto"><br><br>
    <input type="submit" value="Generar QR">
</form>

<?php
if (isset($_POST['texto'])) {
    $qrController = new QRController();
    $qr = $qrController->generarQR($_POST['texto']);
    echo "<img src='data:image/png;base64," . base64_encode($qr) . "'>";
}
?>

<?php require_once 'footer.php'; ?>
