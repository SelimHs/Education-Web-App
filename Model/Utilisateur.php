<?php 

class Utilisateur
{
    public int $id;
    public string $email;
    public string $pwd;
    public string $nom;
    public string $prenom; 
    public string $adresse;
    public string $genre;
    public string $tel;
    public string $fonction;

    

    public function __construct($id,$email,$pwd,$nom,$prenom,$adresse,$genre,$tel,$fonction){
       $this->id=$id;
       $this->email=$email;
       $this->pwd=$pwd;
       $this->nom=$nom;
       $this->prenom=$prenom;
       $this->adresse=$adresse;
       $this->genre=$genre;
       $this->tel=$tel;
       $this->fonction=$fonction;
    }

public function getid()
    {
        return $this->id;
    }
    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }




    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email= $email;

        return $this;
    }
  
  
  
    public function getpwd()
    {
        return $this->pwd;
    }

    public function setpwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }


    
    public function getnom()
    {
        return $this->nom;
    }

    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    
    public function getprenom()
    {
        return $this->prenom;
    }

    public function setprenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }



    
    public function getadresse()
    {
        return $this->adresse;
    }

    public function setadresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }



    
    public function getgenre()
    {
        return $this->genre;
    }

    public function setgenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }



    
    public function gettel()
    {
        return $this->tel;
    }

    public function settel($tel)
    {
        $this->tel = $tel;

        return $this;
    }



    public function getfonction()
    {
        return $this->fonction;
    }

    public function setfonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }




}
?>