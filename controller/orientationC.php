<?php
include "../config.php";
class OrientationC
{
    private $db;
public function showOrientation($orientation)
{
    echo' <table border=1 width="100%">
        <tr align="center" >
        <td> Id<td>
        <td> type</td>
        <td> date_reservation </td>
        <td> horarire_rdv </td>
        <td> num_salle</td>
        <td> prix</td>
        <td> nom_m</td>
        <td> nom_e</td>
        </tr>
        <tr>
        
        <td>'.$orientation->getId().'</td>
        <td>'.$orientation->getType().'</td>
        <td>'.$orientation->getDate_reservation().'</td>
        <td>'.$orientation->getHoraire_rdv().'</td>
        <td>'.$orientation->getNum_salle().'</td>
        <td>'.$orientation->getPrix().'</td>
        <td>'.$orientation->getNom_m().'</td>
        <td>'.$orientation->getNom_e().'</td>
        </tr>
        </table>';


}
public function ajouterOrientation($id, $type, $date_reservation, $horaire_rdv, $num_salle, $prix, $nom_m, $nom_e) {
    $db = Config::getConnexion();
    try {
        $requete = $db->prepare("INSERT INTO orientations (id, type, date_reservation, horaire_rdv, num_salle, prix, nom_m, nom_e) VALUES (:id, :type, :date_reservation, :horaire_rdv, :num_salle, :prix, :nom_m, :nom_e)");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':type', $type);
        $requete->bindParam(':date_reservation', $date_reservation);
        $requete->bindParam(':horaire_rdv', $horaire_rdv);
        $requete->bindParam(':num_salle', $num_salle);
        $requete->bindParam(':prix', $prix);
        $requete->bindParam(':nom_m', $nom_m);
        $requete->bindParam(':nom_e', $nom_e);

        $requete->execute();
    } catch (PDOException $e) {
        // Log or handle the error appropriately
        die('Error adding orientation: ' . $e->getMessage());
    }
}

function deleteOrientation($id) {
    $sql = "DELETE FROM orientations WHERE id=:id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    try {
        $req->execute();
    } catch(Exception $e) {
        die('Erreur: '. $e->getMessage());
    }
}


public function modifierOrientation($id, $type, $date_reservation, $horaire_rdv, $num_salle, $prix, $nom_m, $nom_e) {
    $db = Config::getConnexion();
    try {
        $requete = $db->prepare("UPDATE orientations SET type = :type, date_reservation = :date_reservation, horaire_rdv = :horaire_rdv, num_salle = :num_salle, prix = :prix, nom_m = :nom_m, nom_e = :nom_e WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':type', $type);
        $requete->bindParam(':date_reservation', $date_reservation);
        $requete->bindParam(':horaire_rdv', $horaire_rdv);
        $requete->bindParam(':num_salle', $num_salle);
        $requete->bindParam(':prix', $prix);
        $requete->bindParam(':nom_m', $nom_m);
        $requete->bindParam(':nom_e', $nom_e);
        $requete->execute();
    } catch (PDOException $e) {
        // Log or handle the error appropriately
        die('Error updating orientation: ' . $e->getMessage());
    }
}

public function listOrientation()
    {
        $sql = "SELECT * FROM orientations";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function getAllOrientations() {
        try {
            // Prepare the query
            $query = $this->db->prepare("SELECT * FROM orientations");

            // Execute the query
            $query->execute();

            // Fetch all orientations
            $orientations = $query->fetchAll(PDO::FETCH_ASSOC);

            return $orientations;
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
   
}
?>