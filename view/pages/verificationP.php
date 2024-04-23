<?php
require_once '../../model/paiement.php';
require_once '../../controller/paiementC.php';



    // Récupérer les données du formulaire
    $idP = $_POST['idP']; // Champ pour l'ID du paiement
    $montant = $_POST['montant']; // Champ pour le montant du paiement
    $date_paiement = $_POST['date_paiement']; // Champ pour la date du paiement
    $methode_paiement = $_POST['methode_paiement']; // Champ pour la méthode de paiement
    $id = $_POST['id']; // Autre champ pour l'ID

    // Créer une instance de la classe Paiement avec les données de paiement
    $paiement = new Paiement($idP, $montant, $date_paiement, $methode_paiement, $id);

    // Créer une instance de la classe PaiementC
    $paiementController = new paiementC();

    // Appeler la méthode pour ajouter le paiement
    $paiementController->ajouterPaiement($idP, $montant, $date_paiement, $methode_paiement, $id);
    header("Location: billing.php");

?>
