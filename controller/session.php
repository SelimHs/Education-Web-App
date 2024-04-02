ii
<?php

require_once '../Model/session.php';
require_once '../config.php';

class session {
    public function afficherListesession() {
        try {
            $conn = config::getConnexion();
            $requete = $conn->query("SELECT * FROM sessions");
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des sessions : " . $e->getMessage();
        }
    }

    










