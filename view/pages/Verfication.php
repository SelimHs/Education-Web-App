<?php
require_once '../../model/orientation.php';
require_once '../../controller/orientationC.php';


// Retrieve data from the form
$id = $_POST['id'];
$type = $_POST['type'];
$date_reservation = $_POST['date_reservation'];
$horaire_rdv = $_POST['horaire_rdv'];
$num_salle = $_POST['num_salle'];
$prix = $_POST['prix'];
$nom_m = $_POST['nom_m'];
$nom_e = $_POST['nom_e'];

// Create an instance of Orientation class with the retrieved data
$orientation = new Orientation($id, $type, $date_reservation, $horaire_rdv, $num_salle, $prix, $nom_m, $nom_e);

// Create an instance of OrientationC class
$orientationController = new OrientationC();

// Call the method to add the orientation
$orientationController->ajouterOrientation($id, $type, $date_reservation, $horaire_rdv, $num_salle, $prix, $nom_m, $nom_e);
header("Location: tables.php");
?>
