
<?php
require_once '../Controller/evalController.php';
require_once '../config.php';
$db=config::getConnexion();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
    $idEval=$_POST['idEval'];
    $query = $db->prepare("DELETE FROM evalformation where idEval=$idEval");
    $query->execute();
    echo $query->rowCount() . ' record deleted successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }
    ?>
