<?php
require '../broCodeCourse/config.php';
require '../broCodeCourse/evalModel.php';

    //get all evaluations from evalcours
     function getAllEval(){
        $db=config::getConnexion();
        try{
            $query=$db->prepare("SELECT * FROM evalCours");
            $rows=$db->query($query);
            return $rows;
        }
    catch(PDOException $e)
    { $e->getMessage();}
    }

    //add new eval to evalCours
     function ajouterEvalCours($evalCours){
        $db=config::getConnexion();
        $emailEleve=$evalCours->getEmailEleve();
        $satisfaction=$evalCours->getSatisfaction();
        $remarqEval=$evalCours->getRemarqEleve();
        try {
            $query=$db->prepare("INSERT INTO evalCours ( emailEleve, satisfaction, remarqEval)
            VALUES ('$emailEleve', '$satisfaction', '$remarqEval')");
            $query->execute();
        } catch(PDOException $e)
        {$e->getMessage();}
    }
    //get eval by id
    function getEval($idEval){
        $db=config::getConnexion();
        try{
        $query=$db->prepare("SELECT * FROM evalCours WHERE idEval='$idEval'");
        $query->execute();
        }catch (PDOException $e){
            $e->getMessage();
        }
    }

    //update eval by id
    function updateEval($idEval, $emailEleve, $satisfaction, $remarqEval){
        $db=config::getConnexion();
        try{
        $query=$db->prepare("UPDATE evalCours SET 
        emailEleve='$emailEleve'
        satisfaction = '$satisfaction'
        remarqEval = '$remarqEval'
        WHERE idEval='$idEval' ");
        $query->execute();
        }catch (PDOException $e){
            $e->getMessage();
        }
    }


    //delete eval by id
    function deleteEval($idEval){
        $db=config::getConnexion();
        try{
            $query=$db->prepare("DELETE FROM evalCours where id='$idEval'");
            $query->execute();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    
////////////////////////////////////////////////////
//get all results from resultat
     function getAllResultat(){
        $db=config::getConnexion();
        try{
            $query=$db->prepare("SELECT * FROM resultat");
            $rows=$db->query($query);
            return $rows;
        }
    catch(PDOException $e)
    { $e->getMessage();}
    }
//get resultat by id
    function getResultat($idResultat){
        $db=config::getConnexion();
        try{
        $query=$db->prepare("SELECT * FROM resultat WHERE idResultat='$idResultat'");
        $query->execute();
        }catch (PDOException $e){
            $e->getMessage();
        }
    }
//add resultat
    function ajouterResultat($resultat){
        $db=config::getConnexion();
        $idProf=$resultat->getIdProf();
        $noteCC=$resultat->getNoteCC();
        $noteExamen=$resultat->getNoteExamen();
        $appreciation=$resultat->getAppreciation();
        try {
        $query=$db->prepare("INSERT INTO resultat (idProf, noteCC, noteExamen, appreciation)
        VALUES ('$idProf', '$noteCC', '$noteExamen', '$appreciation')");
        $query->execute();
        } catch(PDOException $e)
        {$e->getMessage();}
}
//update resultat
    function updateResultat($idResultat, $idProf, $noteCC, $noteExamen, $appreciation){
        $db=config::getConnexion();
        try{
        $query=$db->prepare("UPDATE resultat SET 
        idProf='$idProf'
        noteCC = '$noteCC'
        noteExamen = '$noteExamen'
        WHERE idResultat='$idResultat' ");
        $query->execute();
        }catch (PDOException $e){
            $e->getMessage();
        }
    }

    //delete eval by id
    function deleteResultat($idResultat){
        $db=config::getConnexion();
        try{
            $query=$db->prepare("DELETE FROM resultat where id='$idResultat'");
            $query->execute();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }




?>