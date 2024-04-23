<?php
class Paiement {
    private int $idP;
    private int $montant;
    private string $date_paiement;
    private string $methode_paiement;
    private int $id;

public function __construct($ip,$m,$dp,$mp,$id)
{
    $this->idP=$ip;
    $this->montant=$m;
    $this->date_paiement=$dp;
    $this->methode_paiement=$mp;
    $this->id=$id;
}

    /**
     * Get the value of idP
     */ 
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * Set the value of idP
     *
     * @return  self
     */ 
    public function setIdP($idP)
    {
        $this->idP = $idP;

        return $this;
    }

    /**
     * Get the value of montant
     */ 
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     *
     * @return  self
     */ 
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get the value of date_paiement
     */ 
    public function getDate_paiement()
    {
        return $this->date_paiement;
    }

    /**
     * Set the value of date_paiement
     *
     * @return  self
     */ 
    public function setDate_paiement($date_paiement)
    {
        $this->date_paiement = $date_paiement;

        return $this;
    }

    /**
     * Get the value of methode_paiement
     */ 
    public function getMethode_paiement()
    {
        return $this->methode_paiement;
    }

    /**
     * Set the value of methode_paiement
     *
     * @return  self
     */ 
    public function setMethode_paiement($methode_paiement)
    {
        $this->methode_paiement = $methode_paiement;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
