<?php
require_once '../../config.php';
require_once '../../controller/presence.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get database connection
    $db = config::getConnexion();
    
    $heureA = $_POST['heureA']; // New attribute
    $idP = $_POST['idP']; // New attribute
    $idS = $_POST['idS']; // New attribute
    $statut = $_POST['statut']; // New attribute

    // Prepare the SQL statement
    $query = $db->prepare("INSERT INTO presence ( heureA, idP, idS, statut) VALUES ( :heureA, :idP, :idS, :statut)");
    
    // Bind parameters
    $query->bindParam(':heureA', $heureA); // New attribute
    $query->bindParam(':idP', $idP); // New attribute
    $query->bindParam(':idS', $idS); // New attribute
    $query->bindParam(':statut', $statut); // New attribute

    // Execute the query
    $query->execute();

    // Check if the query was successful
    if ($query) {  
        header("Location: billing.php");
        exit();
    } else {
        header("Location: index.html");
    }
}
?>
