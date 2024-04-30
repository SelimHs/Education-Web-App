    <?php
            require_once 'C:/xampp/htdocs/Wadha7li/config.php';
        try{
            $conn=config::getConnexion();
            $query = $conn->prepare("SELECT * from evalformation ORDER BY satisfaction");
            $query->execute();
            $result = $query->fetchAll();
     if($query){  
        foreach ($result as $row) {
                    echo 'ID Evaluation:   ' . $row['idEval'] .'  ||  Teacher ID:   ' . $row['idProf'] . '  ||  Course Name:   '. $row['nomCours'] . '   ||   Satisfaction:   '. $row['satisfaction'] .'   ||   Remarks:   '. $row['remarqEval'] ;
                    echo '<br>';
                  }
        }}
    catch(PDOException $e)
    { $e->getMessage();}    
        
    ?>