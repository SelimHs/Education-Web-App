
<?php
require_once '../Controller/evalController.php';
require_once '../config.php';
$db=config::getConnexion();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
    $idResultat=$_POST['idResultat'];
    $noteCC= $_POST['noteCC'];
    $noteExamen= $_POST['noteExamen'];
    $appreciation= $_POST['appreciation']; 
    $query= $db->prepare("UPDATE `resultat` 
    SET `noteCC` = '$noteCC',`noteExamen` = '$noteExamen',`appreciation` = '$appreciation'
    WHERE `resultat`.`idResultat` = $idResultat;");
    $query->execute();
    echo $query->rowCount() . ' record updated successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }
    ?>
