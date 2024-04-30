<?php
require_once '../../controller/formation.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get database connection
    $db = config::getConnexion();
    
    // Get values from the form
    $type = $_POST['type'];
    $idS = $_POST['idS'];
    $nomProf = $_POST['nomProf'];
    $code = $_POST['code'];
    $nbrE = $_POST['nbrE'];

    // Prepare the SQL statement
    $query = $db->prepare("INSERT INTO formation (type, idS, nomProf, code, nbrE) VALUES (:type, :idS, :nomProf, :code, :nbrE)");
    
    // Bind parameters
    $query->bindParam(':type', $type);
    $query->bindParam(':idS', $idS);
    $query->bindParam(':nomProf', $nomProf);
    $query->bindParam(':code', $code);
    $query->bindParam(':nbrE', $nbrE);

    // Execute the query
    $query->execute();

    // Check if the query was successful
    if ($query) {  
        header("Location: formation.html");
        exit();
    } else {
        header("Location: index.html");
    }
}
?>
