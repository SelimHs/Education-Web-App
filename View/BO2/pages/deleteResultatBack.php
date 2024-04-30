<?php
      require_once '../../../config.php';
      $db=config::getConnexion();
      $idResultat=$_GET['idResultat'];
      $query = $db->prepare("DELETE FROM resultat where idResultat=$idResultat");
      $query->execute();
    header('Location:resultatBack.php');
?>