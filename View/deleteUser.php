<?php
require_once '../Controller/UtilisateurC.php';
$clientC = new UtilisateurC();
$clientC->deleteUser($_GET["id"]);
header('Location:listUser.php');
?>