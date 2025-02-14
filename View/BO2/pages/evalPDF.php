<?php
// Require the configuration file and FPDF library
require_once '../../../config.php';
require('C:/xampp/licenses/fpdf186/fpdf.php');

// Function to generate PDF
function generatePDF($data) {
    // Create a new FPDF object
    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Add a title
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Evaluation Formations', 0, 1, 'C');
    $pdf->Ln(10);
    
    // Add table headers
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(30, 10, 'ID Evaluation', 1, 0, 'C');
    $pdf->Cell(30, 10, 'ID Prof', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Course Name', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Satisfaction', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Remarks', 1, 1, 'C');
    
    // Add table data
    $pdf->SetFont('Arial', '', 12);
    foreach ($data as $row) {
        $pdf->Cell(30, 10, $row['idEval'], 1, 0, 'C');
        $pdf->Cell(30, 10, $row['idProf'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['nomCours'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['satisfaction'], 1, 0, 'C');
        $pdf->Cell(50, 10, $row['remarqEval'], 1, 1, 'C');
    }
    
    // Save the PDF to a file
    $pdfFilePath = 'evaluation_formations.pdf';
    $pdf->Output('F', $pdfFilePath);
    
    // Return the path of the generated PDF file
    return $pdfFilePath;
}

try {
    $conn = config::getConnexion();
    $query = $conn->prepare("SELECT * FROM evalformation");
    $query->execute();
    $result = $query->fetchAll();
    $pdfFilePath = generatePDF($result);
    
    echo "<iframe src='$pdfFilePath' width='100%' height='600px'></iframe>";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>