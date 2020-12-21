<?php

class Eleve {

    public $id;
    public $nom;
    public $prenom;
    public $dateNaissance;
    public $moyenne;
    public $appreciation;
    
   

    public function __construct()
    {
        
    }

    

/**
 * ------------------  GETTER    /   SETTER   -----------------------
 * 
 */

    /**
     *         ------------   GET -- the value of ==>  id
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
     *         ------------   GET -- the value of ==> nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     *         ------------   GET -- the value of ==>  prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     *         ------------   GET -- the value of ==>  dateNaissance
     */ 
    public function getDateNaissance()
    {
        return new DateTime($this->dateNaissance);
    }

    /**
     * Set the value of dateNaissance
     *
     * @return  self
     */ 
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     *         ------------   GET -- the value of ==>  moyenne
     */ 
    public function getMoyenne()
    {
        return $this->moyenne;
    }

    /**
     * Set the value of moyenne
     *
     * @return  self
     */ 
    public function setMoyenne($moyenne)
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    /**
     *         ------------   GET -- the value of ==>  appreciation
     */ 
    public function getAppreciation()
    {
        return $this->appreciation;
    }

    /**
     * Set the value of appreciation
     *
     * @return  self
     */ 
    public function setAppreciation($appreciation)
    {
        $this->appreciation = $appreciation;

        return $this;
    }
}