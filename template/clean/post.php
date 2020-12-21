<?php

require_once "../../Model/Model.php";

class Clean extends Model{

    function assainit_texte($cle) {
        if (isset($_POST[$cle])) {
            return htmlspecialchars(trim(strip_tags($_POST[$cle])));
        }
        return "";
    }
    
    function assainit_entier($cle) {
        if (isset($_POST[$cle])) {
            return intval($_POST[$cle]);
        }
        return 0;
    }

public function getNomMajuscule() {
    return strtoupper($this->nom);
}

public function getDateFormatSql() {
    return $this->date_naissance->format("Y-m-d");
}

public function setNom($nom) {
        $this-$nom = assainit_texte($nom);
}

public function setPrenom($prenom) {
    $this-$prenom = assainit_texte($prenom);
}

public function setDateNaissance($date_naissance) {
        $this->date_naissance = new DateTime(assainit_texte($date_naissance));
}

public function setAppreciation($appreciation) {
        $this->appreciation = assainit_texte($appreciation);
}

public function setMoyenne($moyenne) {
        $this->moyenne = assainit_entier($moyenne);
}

public function setId($id) {
        $this->id = assainit_entier($id);
}
}