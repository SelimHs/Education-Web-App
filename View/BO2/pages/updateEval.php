<?php
include_once '../../model/cours.php';
//include_once '../../controller/coursC.php';

$error = "";

// Check if form is submitted
if(isset($_POST['modifier'])) {
    // Get form data
    $idC = $_POST['idC'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $duree = $_POST['duree'];
    $prix = $_POST['prix'];
    $id_ini = $_POST['id_ini'];

    // Create an instance of the controller
    $coursC = new coursC();

    // Update course
    $coursC->updateCours($idC, $titre, $description, $date, $duree, $prix);
    //header('Location:tables.php');
}

// Fetch existing course data
$cours = null;
if(isset($_GET['idC'])) {
    $idC = $_GET['idC'];
    // Fetch course details based on ID and populate form fields
    // You should implement this logic in your coursC class
    // Example: $cours = $coursC->getCoursById($idC);
}
?>
<!-- Your HTML form -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier cours</title>
    <style>
        /* Styles CSS */
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ffc0cb; /* Pink border */
            border-radius: 5px;
            background-color: #f9f9f9; /* Light background color */
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #ff69b4; /* Pink color for labels */
        }
        input[type="text"],
        input[type="number"],
        textarea,
        input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #ff69b4; /* Pink color for buttons */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="reset"] {
            background-color: #ff1493; /* Darker pink for reset button */
        }
        .btn-primary:hover {
            background-color: #ff1493; /* Darker pink on hover */
        }
        .card-header {
            padding: 0;
            position: relative;
            margin: -20px -20px 20px -20px;
            border-radius: 5px 5px 0 0;
            background-color: #ffc0cb; /* Pink background */
        }
        .card-header h6 {
            color: #fff;
            padding: 10px 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card-header">
            <h6 class="text-white text-capitalize ps-3">Modifier cours</h6>
        </div>
        <form method="POST"> <!-- Replace process_form.php with your PHP processing file -->
            <div class="form-group">
                <label for="idC">ID:</label>
                <input type="text" id="idC" name="idC" value="<?= isset($idC) ? $idC : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="titre">Titre:</label>
                <input type="text" id="titre" name="titre" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="duree">Durée:</label>
                <input type="time" id="duree" name="duree" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="number" id="prix" name="prix" min="0" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="id_ini" value="<?= isset($idC) ? $idC : ''; ?>">
                <center><button type="submit" name="modifier" value="modifier" class="btn btn-primary">Modifier</button>
                <button type="reset" class="btn btn-primary">Reset</button></center>
            </div>
        </form>
    </div>
</body>
</html>


