<?php
require_once '../../controller/formation.php';

// Vérifier si la méthode de la requête est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la connexion à la base de données
    $db = config::getConnexion();
    
    // Récupérer les valeurs du formulaire
    $type = $_POST['type'];
    $idS = $_POST['idS']; // Utilisation de idS pour identifier la formation à modifier
    $nomProf = $_POST['nomProf'];
    $code = $_POST['code'];
    $nbrE = $_POST['nbrE'];

    // Préparer la requête SQL de mise à jour
    $query = $db->prepare("UPDATE formation SET type = :type, nomProf = :nomProf, code = :code, nbrE = :nbrE WHERE idS = :idS");
    
    // Lier les paramètres
    $query->bindParam(':type', $type);
    $query->bindParam(':idS', $idS);
    $query->bindParam(':nomProf', $nomProf);
    $query->bindParam(':code', $code);
    $query->bindParam(':nbrE', $nbrE);

    // Exécuter la requête
    $query->execute();

    // Vérifier si la requête a réussi
    if ($query) {  
        header("Location: formation.html");
        exit();
    } else {
        header("Location: index.html");
    }
}
?>
