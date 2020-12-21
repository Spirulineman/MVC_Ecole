<?php

require "Eleve.php";

class Classes extends Eleve {

    public $id_classe;


    /**
     * Get the value of id_classe
     */ 
    public function getId_classe()
    {
        return $this->id_classe;
    }

    /**
     * Set the value of id_classe
     *
     * @return  self
     */ 
    public function setId_classe($id_classe)
    {
        $this->id_classe = $id_classe;

        return $this;
    }
}