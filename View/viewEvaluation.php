<?php 
require_once '../config.php';
$conn = config::getConnexion();
  try {
    $query = $conn->prepare("SELECT * from evalformation");
    $query->execute();
    $result = $query->fetchAll();
  } catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();
  }
  foreach ($result as $row) {
    echo 'ID Evaluation:   ' . $row['idEval'] .'  ||  Teacher ID:   ' . $row['idProf'] . '  ||  Course Name:   '. $row['nomCours'] . '   ||   Satisfaction:   '. $row['satisfaction'] .'   ||   Remarks:   '. $row['remarqEval'] ;
    echo '<br>';
  }
  ?>