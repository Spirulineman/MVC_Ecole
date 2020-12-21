<?php
require_once "Model.php";

class ClasseModel extends Model {

    public function calc_moyenne(){

        $requete = "SELECT ROUND(AVG(moyenne)) As calc_moyenne FROM eleve";
        $calc_moyenne = $this->Db_connect->prepare($requete);
        $calc_moyenne->setFetchMode(PDO::FETCH_CLASS, Classe::class);
        $calc_moyenne->execute();
        $calc_moyenne = $calc_moyenne->fetch();
        
        return $calc_moyenne;
        
    }

}