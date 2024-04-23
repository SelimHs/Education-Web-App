<?php
require_once '../../model/orientation.php';
require_once '../../controller/orientationC.php';

// Retrieve data from the form
$id = intval($_POST['id']); // Convert to integer
$type = $_POST['type'];
$date_reservation = $_POST['date_reservation'];
$horaire_rdv = $_POST['horaire_rdv'];
$num_salle = intval($_POST['num_salle']); // Convert to integer
$prix = intval($_POST['prix']); // Convert to integer
$nom_m = $_POST['nom_m'];
$nom_e = $_POST['nom_e'];

// Create an instance of Orientation class with the retrieved data
$orientation = new Orientation($id, $type, $date_reservation, $horaire_rdv, $num_salle, $prix, $nom_m, $nom_e);

// Create an instance of OrientationC class
$orientationController = new OrientationC();

// Call the method to add the orientation
$orientationController->ajouterOrientation($id, $type, $date_reservation, $horaire_rdv, $num_salle, $prix, $nom_m, $nom_e);
$orientationController->showOrientation($orientation);

// Redirect after adding orientation

?>
