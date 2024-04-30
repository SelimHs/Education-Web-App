<?php
require_once '../../controller/presence.php';
require_once '../../config.php';

// Get database connection
$db = config::getConnexion();

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    try {
        // Get the ID of the session to delete
        $idP = $_GET['idP'];
        
        // Prepare the SQL statement to delete the session
        $query = $db->prepare("DELETE FROM presence WHERE idP=:idP");
        
        // Bind the ID parameter
        $query->bindParam(':idP', $idP);
        
        // Execute the query
        $query->execute();
        
        // Check if the query was successful
        echo $query->rowCount() . ' record deleted successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
