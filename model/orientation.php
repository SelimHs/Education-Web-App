<?php
class orientation{
    private int $id;
    private string $type;
    private string $date_reservation;
    private string $horaire_rdv;
    private int $num_salle;
    private int $prix;
    private string $nom_m;
    private string $nom_e;
    
    public function __construct($i,$t,$d,$h,$n,$p,$nm,$ne)
    {
        $this->id=$i; 
        $this->type=$t;
        $this->date_reservation=$d;
        $this->horaire_rdv=$h;
        $this->num_salle=$n;
        $this->prix=$p;
        $this->nom_m=$nm;
        $this->nom_e=$ne;


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

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of date_reservation
     */ 
    public function getDate_reservation()
    {
        return $this->date_reservation;
    }

    /**
     * Set the value of date_reservation
     *
     * @return  self
     */ 
    public function setDate_reservation($date_reservation)
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    /**
     * Get the value of horaire_rdv
     */ 
    public function getHoraire_rdv()
    {
        return $this->horaire_rdv;
    }

    /**
     * Set the value of horaire_rdv
     *
     * @return  self
     */ 
    public function setHoraire_rdv($horaire_rdv)
    {
        $this->horaire_rdv = $horaire_rdv;

        return $this;
    }

    /**
     * Get the value of num_salle
     */ 
    public function getNum_salle()
    {
        return $this->num_salle;
    }

    /**
     * Set the value of num_salle
     *
     * @return  self
     */ 
    public function setNum_salle($num_salle)
    {
        $this->num_salle = $num_salle;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of nom_m
     */ 
    public function getNom_m()
    {
        return $this->nom_m;
    }

    /**
     * Set the value of nom_m
     *
     * @return  self
     */ 
    public function setNom_m($nom_m)
    {
        $this->nom_m = $nom_m;

        return $this;
    }

    /**
     * Get the value of nom_e
     */ 
    public function getNom_e()
    {
        return $this->nom_e;
    }

    /**
     * Set the value of nom_e
     *
     * @return  self
     */ 
    public function setNom_e($nom_e)
    {
        $this->nom_e = $nom_e;

        return $this;
    }
}
 