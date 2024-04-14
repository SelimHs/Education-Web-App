<?php 
require_once '../config.php';
$conn = config::getConnexion();
  try {
    $query = $conn->prepare("SELECT * from resultat");
    $query->execute();
    $result = $query->fetchAll();
  } catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();
  }

  foreach ($result as $row) {
    echo 'ID Resultat:   ' . $row['idResultat'] .'  ||  Note CC:   ' . $row['noteCC'] . '  ||  Note Examen:   '. $row['noteExamen'] . '   ||   Appréciation:   '. $row['appreciation'];
    echo '<br>';
  }
  ?>