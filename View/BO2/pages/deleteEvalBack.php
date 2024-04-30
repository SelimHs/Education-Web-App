<?php
      require_once '../../../config.php';
      $db=config::getConnexion();
      $idEval=$_GET['idEval'];
      $query = $db->prepare("DELETE FROM evalformation where idEval=$idEval");
      $query->execute();
    header('Location:evalBack.php');
?>