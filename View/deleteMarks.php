
<?php
require_once '../Controller/evalController.php';
require_once '../config.php';
$db=config::getConnexion();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
    $idResultat=$_POST['idResultat'];
    $query = $db->prepare("DELETE FROM resultat where idResultat=$idResultat");
    $query->execute();
    echo $query->rowCount() . ' record deleted successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }
    ?>
