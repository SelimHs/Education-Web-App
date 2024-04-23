<?php
// Vérifier si l'ID du paiement est défini dans la requête GET
if(isset($_GET["idP"])) {
    // Inclure le fichier du contrôleur PaiementC
    include '../../controller/paiementC.php';
    
    // Créer une instance du contrôleur PaiementC
    $paiementC = new PaiementC();
    
    try {
        // Appeler la méthode de suppression du paiement
        $paiementC->deletePaiement($_GET["idP"]);
        
        // Rediriger vers la page de facturation après la suppression
        header('Location: billing.php');
        exit; // Arrêter l'exécution du script après la redirection
    } catch (PDOException $e) {
        // En cas d'erreur lors de la suppression, afficher un message d'erreur
        echo "Erreur lors de la suppression du paiement : " . $e->getMessage();
    }
} else {
    // Si l'ID du paiement n'est pas défini dans la requête GET, afficher un message d'erreur
    echo "L'ID du paiement n'est pas spécifié.";
}
?>
