<?php
require_once '../controller/formation.php';
require_once '../config.php';

// Get database connection
$db = config::getConnexion();

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Get the ID of the session to update
        $idS = $_POST['idS'];
        
        // Get other attributes
        $type = $_POST['type'];
        $nomProf = $_POST['nomProf'];
        $code = $_POST['code'];
        $nbrE = $_POST['nbrE'];
        
        // Prepare the SQL statement to update the session
        $query = $db->prepare("UPDATE `formation` 
                                SET `type` = :type, `nomProf` = :nomProf, `code` = :code, `nbrE` = :nbrE
                                WHERE `idS` = :idS");
        
        // Bind parameters
        $query->bindParam(':idS', $idS);
        $query->bindParam(':type', $type);
        $query->bindParam(':nomProf', $nomProf);
        $query->bindParam(':code', $code);
        $query->bindParam(':nbrE', $nbrE);
        
        // Execute the query
        $query->execute();
        
        // Check if the query was successful
        echo $query->rowCount() . ' record updated successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
