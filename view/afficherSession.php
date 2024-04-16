<?php 
require_once '../config.php';
$conn = config::getConnexion();
try {
    // Prepare and execute the SQL query to select all records from the 'formation' table
    $query = $conn->prepare("SELECT * FROM formation");
    $query->execute();
    // Fetch all records as an associative array
    $result = $query->fetchAll();
} catch (PDOException $e) {
    // Catch any exceptions and display an error message
    echo 'Connection failed: ' . $e->getMessage();
}

// Iterate through the fetched results and display them
foreach ($result as $row) {
    echo 'ID Session:   ' . $row['idS'] .'  ||  Type:   ' . $row['type'] . '  ||  Nom Prof:   '. $row['nomProf'] . '   ||   Code:   '. $row['code'] . '   ||   Nombre d\'étudiants:   '. $row['nbrE'];
    echo '<br>';
}
?>
