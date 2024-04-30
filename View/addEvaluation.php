<?php
require_once '../Controller/evalController.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db=config::getConnexion();
//temp value for IDs
//$idUser=100;
//$idProf=200;
$idProf= $_POST['idProf']; 
$nomCours= $_POST['nomCours']; 
$satisfaction= $_POST['satisfaction'];
$remarqEval= $_POST['remarqEval'];

$query=$db->prepare("INSERT INTO evalformation (idProf, nomCours, satisfaction, remarqEval)
VALUES ( '$idProf', '$nomCours', '$satisfaction', '$remarqEval')");
$query->execute();

}
?>