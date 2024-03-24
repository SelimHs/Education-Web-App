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
    private int $idResultat;
    private int $idProf;
    private float $noteCC;
    private float $noteExamen;
    private string $appreciation;

    public function getIdResultat():float{
        return $this->idResultat;
    }
    public function setIdResultat($idResultat){
        $this->idResultat=$idResultat;
    }

    public function getIdProf():int{
        return $this->idProf;
    }
    public function setIdProf($idProf){
        $this->idProf=$idProf;
    }

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