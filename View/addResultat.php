<?php
require_once '../Controller/evalController.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db=config::getConnexion();
//temp value for IDs
//$idUser=100;
//$idProf=200;
$noteCC= $_POST['noteCC'];
$noteExamen= $_POST['noteExamen'];
$appreciation= $_POST['appreciation']; 

$query=$db->prepare("INSERT INTO resultat (noteCC, noteExamen, appreciation)
VALUES ( '$noteCC', '$noteExamen', '$appreciation')");
$query->execute();
if($query){  
header("Location: contactProf.html");
    exit();
} else {
    header("Location: index.html");
}
}
?>