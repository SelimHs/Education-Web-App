<?php
require_once '../config.php';
require_once '../Model/formation.php';

// Get all formations from the database
function getAllFormation(){
    $db = config::getConnexion();
    try {
        $query = $db->prepare("SELECT * FROM formation");
        $rows = $db->query($query);
        return $rows;
    } catch(PDOException $e) {
        return $e->getMessage();
    }
}

// Add a new formation to the database
function ajouterFormation($formation){
    $db = config::getConnexion();
    $idS = $formation->getIdS();
    $nomProf = $formation->getNomProf();
    $code = $formation->getCode();
    $nbrE = $formation->getNbrE();
    $type = $formation->getType();
    try {
        $query = $db->prepare("INSERT INTO formation (idS, nomProf, code, nbrE, type)
            VALUES ('$idS', '$nomProf', '$code', '$nbrE', '$type')");
        $query->execute();
    } catch(PDOException $e) {
        return $e->getMessage();
    }
}

// Get a formation by its ID
function getFormation($idS){
    $db = config::getConnexion();
    try {
        $query = $db->prepare("SELECT * FROM formation WHERE idS='$idS'");
        $query->execute();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

// Update a formation by its ID
function updateFormation($idS, $nomProf, $code, $nbrE, $type){
    $db = config::getConnexion();
    try {
        $query = $db->prepare("UPDATE formation SET 
        nomProf = '$nomProf',
        code = '$code',
        nbrE = '$nbrE',
        type = '$type'
        WHERE idS='$idS'");
        $query->execute();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

// Delete a formation by its ID
function deleteFormation($idS){
    $db = config::getConnexion();
    try {
        $query = $db->prepare("DELETE FROM formation WHERE idS='$idS'");
        $query->execute();
    } catch(PDOException $e) {
        return $e->getMessage();
    }
}

?>
