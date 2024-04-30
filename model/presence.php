<?php
class presence{
    private int $idP;
    //private int $idE;
    private int $idS;
    private string $statut;
    private string $heureA;


    
   public function _construct(int $idP, int $idS,string $statut,string $heureA){
    $this->idP=$idP;
    $this->statut=$statut;
    $this->heureA=$heureA;
    $this->idS=$idS;
    }


    public function getIdP():float{
        return $this->idP;
    }
    public function setIdP($idP){
        $this->idP=$idP;
    }
    public function getIdS():float{
        return $this->idS;
    }
    public function setIdS($idS){
        $this->idS=$idS;
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

  

    public function getStatut():string{
        return $this->statut;
    }
    public function setStatut($statut){
        $this->statut=$statut;
    }
    public function getHeureA():string{
        return $this->heureA;
    }
    public function setHeureA($heureA){
        $this->heureA=$heureA;
    }
}
?>
