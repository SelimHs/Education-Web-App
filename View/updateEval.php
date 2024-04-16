
<?php
require_once '../Controller/evalController.php';
require_once '../config.php';
$db=config::getConnexion();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
    $idEval= $_POST['idEval'];
    $idProf= $_POST['idProf']; 
    $nomCours= $_POST['nomCours']; 
    $satisfaction= $_POST['satisfaction'];
    $remarqEval= $_POST['remarqEval'];   
    $query= $db->prepare("UPDATE `evalformation` 
    SET `idProf` = '$idProf',`nomCours` = '$nomCours',`satisfaction` = '$satisfaction', `remarqEval` = '$remarqEval'
    WHERE `evalformation`.`idEval` = $idEval;");
    $query->execute();
    echo $query->rowCount() . ' record updated successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }
    ?>
