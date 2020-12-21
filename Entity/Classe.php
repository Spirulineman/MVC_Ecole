<?php

require_once "Eleve.php";

class Classe {

    public $calc_moyenne;

/**
     * Get the value of calc_moyenne
     */ 
    public function getCalc_moyenne()
    {
        return $this->calc_moyenne;
    }

    /**
     * Set the value of calc_moyenne
     *
     * @return  self
     */ 
    public function setCalc_moyenne($calc_moyenne)
    {
        $this->calc_moyenne = $calc_moyenne;

        return $this;
    }

}