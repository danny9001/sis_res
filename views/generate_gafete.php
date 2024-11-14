<?php
// generate_gafete.php
require_once 'libs/fpdf/fpdf.php';
require_once 'libs/phpqrcode/qrlib.php';
require_once 'config/database.php';

function generarGafetePDF($invitado) {
    // Configuración inicial del PDF
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();

    // Generación del código QR
    $qrContent = $invitado['nombre'] . "|" . $invitado['mesa'] . "|" . $invitado['sector'];
    $qrFilePath = 'temp_qr_' . $invitado['id'] . '.png';
    QRcode::png($qrContent, $qrFilePath, QR_ECLEVEL_H, 10);

    // Configurar el PDF
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Gafete de Evento');
    $pdf->Ln(20);
    $pdf->SetFont('Arial', '', 12);

    $pdf->Cell(40, 10, 'Nombre: ' . $invitado['nombre']);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Mesa: ' . $invitado['mesa']);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Sector: ' . $invitado['sector']);
    $pdf->Ln(20);

    // Insertar el código QR en el PDF
    $pdf->Image($qrFilePath, 10, 60, 50, 50);

    // Guardar el PDF
    $outputPath = 'gafetes/gafete_' . $invitado['id'] . '.pdf';
    $pdf->Output('F', $outputPath);

    // Eliminar el archivo temporal de QR
    unlink($qrFilePath);

    return $outputPath;
}
?>

