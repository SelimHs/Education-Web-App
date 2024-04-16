<?php
include_once '../model/orientation.php';
include_once '../controller/orientationC.php';

$error = "";

// create orientation
$orientation = null;

// create an instance of the controller
$orientationC = new orientationC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["id"]) &&
        isset($_POST["type"]) &&      
        isset($_POST["date_reservation"]) &&
        isset($_POST["horaire_rdv"]) && 
        isset($_POST["num_salle"]) &&
        isset($_POST["prix"]) &&
        isset($_POST["nom_m"]) &&
        isset($_POST["nom_e"])
    ) {
        if (
            !empty($_POST["id"]) && 
            !empty($_POST['type']) &&
            !empty($_POST["date_reservation"]) && 
            !empty($_POST["horaire_rdv"]) && 
            !empty($_POST["num_salle"]) &&
            !empty($_POST["prix"]) &&
            !empty($_POST["nom_m"]) &&
            !empty($_POST["nom_e"])
        ) {
            $id = $_POST['id'];
            $type = $_POST['type'];
            $date_reservation = $_POST['date_reservation']; 
            $horaire_rdv = $_POST['horaire_rdv'];
            $num_salle = $_POST['num_salle'];
            $prix = $_POST['prix'];
            $nom_m = $_POST['nom_m'];
            $nom_e = $_POST['nom_e'];

            $orientation = new Orientation($id, $type, $date_reservation, $horaire_rdv, $num_salle, $prix, $nom_m, $nom_e);
            $orientationC->modifierOrientation($id, $type, $date_reservation, $horaire_rdv, $num_salle, $prix, $nom_m, $nom_e);
            header('Location: showOrientation.php');
        } else {
            $error = "Tous les champs sont requis";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier une orientation</title>
</head>
<body>
    <h2>Modifier une orientation</h2>

    <form method="POST">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" required><br>

        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type" required><br>

        <label for="date_reservation">Date de réservation:</label><br>
        <input type="text" id="date_reservation" name="date_reservation" required><br>

        <label for="horaire_rdv">Horaire RDV:</label><br>
        <input type="text" id="horaire_rdv" name="horaire_rdv" required><br>

        <label for="num_salle">Numéro de salle:</label><br>
        <input type="text" id="num_salle" name="num_salle" required><br>

        <label for="prix">Prix:</label><br>
        <input type="text" id="prix" name="prix" required><br>

        <label for="nom_m">Nom du modèle:</label><br>
        <input type="text" id="nom_m" name="nom_m" required><br>

        <label for="nom_e">Nom de l'événement:</label><br>
        <input type="text" id="nom_e" name="nom_e" required><br>

        <input type="submit" name="modifier" value="Modifier">  
    </form>
</body>
</html>
