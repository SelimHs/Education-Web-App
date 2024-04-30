<?php
// Require the configuration file and FPDF library
require_once '../../../config.php';
require('C:/xampp/licenses/fpdf186/fpdf.php');

// Function to generate PDF for Resultat class
function generateResultatPDF($data) {
    // Create a new FPDF object
    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Add a title
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Resultat Information', 0, 1, 'C');
    $pdf->Ln(10);
    
    // Add table headers
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(30, 10, 'ID Resultat', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Note CC', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Note Examen', 1, 0, 'C');
    $pdf->Cell(80, 10, 'Appreciation', 1, 1, 'C');
    
    // Add table data
    $pdf->SetFont('Arial', '', 12);
    foreach ($data as $row) {
        $pdf->Cell(30, 10, $row['idResultat'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['noteCC'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['noteExamen'], 1, 0, 'C');
        $pdf->Cell(80, 10, $row['appreciation'], 1, 1, 'C');
    }
    
    // Save the PDF to a file
    $pdfFilePath = 'resultat_information.pdf';
    $pdf->Output('F', $pdfFilePath);
    
    // Return the path of the generated PDF file
    return $pdfFilePath;
}

try {
    $conn = config::getConnexion();
    $query = $conn->prepare("SELECT * FROM resultat");
    $query->execute();
    $result = $query->fetchAll();
    $pdfFilePath = generateResultatPDF($result);
    
    echo "<iframe src='$pdfFilePath' width='100%' height='600px'></iframe>";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>