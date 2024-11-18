<?php
require_once 'PHPQRCode/qrlib.php';

class QRController {
    public function generarQR($texto) {
        $qr = new QRcode();
        $qr->setText($texto);
        $qr->setPadding(2);
        $qr->setErrorCorrection('L');
        $qr->make();
        return $qr->writeString();
    }
}
?>
<?php
require_once 'PHPQRCode/qrlib.php';
require_once 'database.php';

class QRController {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function generarQR($texto) {
        $qr = new QRcode();
        $qr->setText($texto);
        $qr->setPadding(2);
        $qr->setErrorCorrection('L');
        $qr->make();
        $qrCode = $qr->writeString();

        // Guardar el código QR en la base de datos
        $sql = "INSERT INTO qrcodes (codigo, texto) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $qrCode, $texto);
        $stmt->execute();

        return $qrCode;
    }
}
?>
