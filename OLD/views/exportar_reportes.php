<?php
// exportar_reportes.php
require_once 'config/database.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="reportes_eventos.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Fecha', 'Encargado', 'Estado']);

$results = $pdo->query("SELECT id, fecha, encargado_id, estado FROM reservas");

while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, $row);
}

fclose($output);
exit;
?>
