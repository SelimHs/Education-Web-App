<?php
class formation {
    private int $idS;
    public string $nomProf;
    public int $code;
    public int $nbrE;
    public string $type;
    
    // Constructor
    public function __construct(int $idS, string $nomProf, int $code, int $nbrE, string $type) {
        $this->idS = $idS;
        $this->nomProf = $nomProf;
        $this->code = $code;
        $this->nbrE = $nbrE;
        $this->type = $type;
    }

    // Getter and setter methods
    public function getIdS(): int {
        return $this->idS;
    }
    
    public function setIdS($idS) {
        $this->idS = $idS;
    }

    public function getNomProf(): string {
        return $this->nomProf;
    }
    
    public function setNomProf($nomProf) {
        $this->nomProf = $nomProf;
    }

    public function getCode(): int {
        return $this->code;
    }
    
    public function setCode($code) {
        $this->code = $code;
    }

    public function getNbrE(): int {
        return $this->nbrE;
    }
    
    public function setNbrE($nbrE) {
        $this->nbrE = $nbrE;
    }

    public function getType(): string {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
    }
}
?>
