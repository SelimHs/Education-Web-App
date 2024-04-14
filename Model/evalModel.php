<?php
class evalCours{
    private int $idEval;
    public string $emailEleve;
    public int $satisfaction;
    public string $remarqEval;

    public function _construct(int $idEval, string $emailEleve, int $satisfaction, string $remarqEval){
        $this->idEval=$idEval;
        $this->emailEleve=$emailEleve;
        $this->satisfaction=$satisfaction;
        $this->remarqEval=$remarqEval;
    }

    public function getIdEval():int{
        return $this->idEval;
    }
    public function setIdEval($idEval){
        $this->idEval=$idEval;
    }

    public function getEmailEleve():string{
        return $this->emailEleve;
    }
    public function setEmailEleve($emailEleve){
        $this->emailEleve=$emailEleve;
    }

    public function getSatisfaction():int{
        return $this->satisfaction;
    }
    public function setSatisfaction($satisfaction){
        $this->satisfaction=$satisfaction;
    }

    public function getRemarqEval():string{
        return $this->remarqEval;
    }
    public function setRemarqEval($remarqEval){
        $this->remarqEval=$remarqEval;
    }
}

class resultat{
    private int $idResultat=0;
    //private int $idProf;
    //private int $idUser;
    private float $noteCC=0;
    private float $noteExamen=0;
    private string $appreciation="";


    
   public function _construct(int $idResultat, float $noteCC, float $noteExamen, string $appreciation){
    $this->idResultat=$idResultat;
    $this->noteCC=$noteCC;
    $this->noteExamen=$noteExamen;
    $this->appreciation=$appreciation;
    }


    public function getIdResultat():float{
        return $this->idResultat;
    }
    public function setIdResultat($idResultat){
        $this->idResultat=$idResultat;
    }
///////////////
    /*public function getIdUser():float{
        return $this->idUser;
    }
    public function setIdUser($idUser){
        $this->idUser=$idUser;
    }
////////////////////

    public function getIdProf():int{
        return $this->idProf;
    }
    public function setIdProf($idProf){
        $this->idProf=$idProf;
    }*/

    public function getNoteCC():float{
        return $this->noteCC;
    }
    public function setNoteCC($noteCC){
        $this->noteCC=$noteCC;
    }

    public function getNoteExamen():float{
        return $this->noteExamen;
    }
    public function setNoteExamen($noteExamen){
        $this->noteExamen=$noteExamen;
    }

    public function getAppreciation():string{
        return $this->appreciation;
    }
    public function setAppreciation($appreciation){
        $this->appreciation=$appreciation;
    }
}
?>