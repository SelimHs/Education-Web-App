<?php
include "../../config.php";
class paiementC
{
    private $db;

    public function showPaiement($paiement)
    {
        echo '<table border="1" width="100%">
        <tr align="center">
            <td>Id</td>
            <td>Montant</td>
            <td>Date de paiement</td>
            <td>Méthode de paiement</td>
            <td>Id Orientation</td>
        </tr>
        <tr>
            <td>' . $paiement->getIdP() . '</td>
            <td>' . $paiement->getMontant() . '</td>
            <td>' . $paiement->getDatePaiement() . '</td>
            <td>' . $paiement->getMethodePaiement() . '</td>
            <td>' . $paiement->getId() . '</td>
        </tr>
    </table>';

    }

    public function ajouterPaiement($idP, $montant, $date_paiement, $methode_paiement, $id) {
        $db = Config::getConnexion();
        try {
            $requete = $db->prepare("INSERT INTO paiements (idP, montant, date_paiement, methode_paiement, id) VALUES (:idP, :montant, :date_paiement, :methode_paiement, :id)");
            $requete->bindParam(':idP', $idP);
            $requete->bindParam(':montant', $montant);
            $requete->bindParam(':date_paiement', $date_paiement);
            $requete->bindParam(':methode_paiement', $methode_paiement);
            $requete->bindParam(':id', $id);

            $requete->execute();
        } catch (PDOException $e) {
            // Log or handle the error appropriately
            die('Error adding paiement: ' . $e->getMessage());
        }
    }

    function deletePaiement($idP) {
        $sql = "DELETE FROM paiements WHERE idP=:idP";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idP', $idP);
        try {
            $req->execute();
        } catch(Exception $e) {
            die('Erreur: '. $e->getMessage());
        }
    }

    public function modifierPaiement($idP, $montant, $date_paiement, $methode_paiement, $id) {
        $db = Config::getConnexion();
        try {
            $requete = $db->prepare("UPDATE paiements SET montant = :montant, date_paiement = :date_paiement, methode_paiement = :methode_paiement, id = :id WHERE idP = :idP");
            $requete->bindParam(':idP', $idP);
            $requete->bindParam(':montant', $montant);
            $requete->bindParam(':date_paiement', $date_paiement);
            $requete->bindParam(':methode_paiement', $methode_paiement);
            $requete->bindParam(':id', $id);
            $requete->execute();
        } catch (PDOException $e) {
            // Log or handle the error appropriately
            die('Error updating paiement: ' . $e->getMessage());
        }
    }

    public function listPaiement()
    {
        $sql = "SELECT * FROM paiements";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function getAllPaiements() {
        try {
            // Prepare the query
            $query = $this->db->prepare("SELECT * FROM paiements");

            // Execute the query
            $query->execute();

            // Fetch all paiements
            $paiements = $query->fetchAll(PDO::FETCH_ASSOC);

            return $paiements;
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
