<?php
// Require the configuration file and FPDF library
require_once '../../config.php';
require('C:/xampp/licenses/fpdf/fpdf.php');

// Function to generate PDF
function generatePDF($data) {
    // Create a new FPDF object
    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Add a title
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Informations', 0, 1, 'C');
    $pdf->Ln(10);
    
    // Add table headers
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(30, 10, 'ID Session', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Type', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Nom Prof', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Code', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Nombre etudiant', 1, 1, 'C');
    
    // Add table data
    $pdf->SetFont('Arial', '', 12);
    foreach ($data as $row) {
        $pdf->Cell(30, 10, $row['idS'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['type'], 1, 0, 'C');
        $pdf->Cell(50, 10, $row['nomProf'], 1, 0, 'C');
        $pdf->Cell(30, 10, $row['code'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['nbrE'], 1, 1, 'C');
    }
    
    // Save the PDF to a file
    $pdfFilePath = 'informations.pdf';
    $pdf->Output('F', $pdfFilePath);
    
    // Return the path of the generated PDF file
    return $pdfFilePath;
}

try {
    // Establish database connection
    $conn = config::getConnexion();
    
    // Prepare and execute the SQL query to select all records from the 'formation' table
    $query = $conn->prepare("SELECT * FROM formation");
    $query->execute();
    
    // Fetch all records as an associative array
    $result = $query->fetchAll();
    
    // Call the generatePDF function with the fetched data
    $pdfFilePath = generatePDF($result);
    
    // Embed the PDF file using an HTML iframe
    echo "<iframe src='$pdfFilePath' width='100%' height='600px'></iframe>";
} catch (PDOException $e) {
    // Catch any exceptions related to database connection
    echo 'Connection failed: ' . $e->getMessage();
}
?>