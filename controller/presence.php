<?php
require_once '../../config.php';
require_once '../../Model/presence.php';

// Get all presences from the database
function getAllPresence(){
    $db = config::getConnexion();
    try {
        // No need to prepare the query again, just directly query it
        $rows = $db->query("SELECT * FROM presence");
        return $rows;
    } catch(PDOException $e) {
        return $e->getMessage();
    }
}

// Add a new presence to the database
function ajouterPresence($presence){
    $db = config::getConnexion();
    $idP = $presence->getIdP();
    $idS = $presence->getIdS();
    $statut = $presence->getStatut();
    $heureA = $presence->getHeureA();
    try {
        $query = $db->prepare("INSERT INTO presence (idP, idS, idE, statut, heureA)
            VALUES ('$idP', '$idS', '$statut', '$heureA')");
        $query->execute();
    } catch(PDOException $e) {
        return $e->getMessage();
    }
}

// Get a presence by its ID
function getPresence($idP){
    $db = config::getConnexion();
    try {
        $query = $db->prepare("SELECT * FROM presence WHERE idP='$idP'");
        $query->execute();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

// Update a presence by its ID
function updatePresence($idP, $idS, $statut, $heureA){
    $db = config::getConnexion();
    try {
        $query = $db->prepare("UPDATE presence SET 
        idS = '$idS',
        statut = '$statut',
        heureA = '$heureA'
        WHERE idP='$idP'");
        $query->execute();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

// Delete a presence by its ID
function deletePresence($idP){
    $db = config::getConnexion();
    try {
        $query = $db->prepare("DELETE FROM presence WHERE idP='$idP'");
        $query->execute();
    } catch(PDOException $e) {
        return $e->getMessage();
    }
}

?>
