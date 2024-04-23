<?php
require_once '../../controller/formation.php';
require_once '../../config.php';

// Get database connection
$db = config::getConnexion();

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    try {
        // Get the ID of the session to delete
        $idS = $_GET['idS'];
        
        // Prepare the SQL statement to delete the session
        $query = $db->prepare("DELETE FROM formation WHERE idS=:idS");
        
        // Bind the ID parameter
        $query->bindParam(':idS', $idS);
        
        // Execute the query
        $query->execute();
        
        // Check if the query was successful
        echo $query->rowCount() . ' record deleted successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
