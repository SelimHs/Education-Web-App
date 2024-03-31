<?php

require_once '../Model/Utilisateur.php';
require_once '../config.php';

class UtilisateurC {
    public function afficherListeUtilisateurs() {
        try {
            $conn = config::getConnexion();
            $requete = $conn->query("SELECT * FROM utilisateurs");
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des utilisateurs : " . $e->getMessage();
        }
    }

    









    public function ajouterUtilisateur() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $id = $_POST['id'];
                $email = $_POST['email'];
                $pwd = $_POST['pwd'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $adresse = $_POST['adresse'];
                $genre = $_POST['genre'];
                $tel = $_POST['tel'];
                $fonction = $_POST['fonction'];

                $conn = config::getConnexion();

                $requette = $conn->prepare("INSERT INTO utilisateurs(id, nom, prenom, pwd, adresse, genre, email, tel, fonction) VALUES (:id, :nom, :prenom, :pwd, :adresse, :genre, :email, :tel, :fonction)");

                $requette->bindParam(':id', $id);
                $requette->bindParam(':nom', $nom);
                $requette->bindParam(':prenom', $prenom);
                $requette->bindParam(':pwd', $pwd);
                $requette->bindParam(':adresse', $adresse);
                $requette->bindParam(':genre', $genre);
                $requette->bindParam(':email', $email);
                $requette->bindParam(':tel', $tel);
                $requette->bindParam(':fonction', $fonction);

                $requette->execute();

                echo 'Utilisateur ajouté avec succès';
            } catch (PDOException $e) {
                echo 'Échec lors de l\'ajout de l\'utilisateur : ' . $e->getMessage();
            }
        }
    }






    public function supprimerUtilisateur($id) {
        try {
            // Vérifier si l'ID est défini et s'il n'est pas vide
            if (!empty($id)) {
                $conn = config::getConnexion();
                $query = $conn->prepare("DELETE FROM utilisateurs WHERE id = :id");
                $query->execute(['id' => $id]);
                return true; // Succès de la suppression
            } else {
                throw new Exception('ID d\'utilisateur non valide.');
            }
        } catch (PDOException $e) {
            // Gérer l'erreur
            echo 'Erreur lors de la suppression de l\'utilisateur : ' . $e->getMessage();
            return false; // Échec de la suppression
        }
    }
    


















}

?>
