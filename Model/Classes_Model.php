<?php

require_once "Model.php";
require_once "EleveModel.php";
require_once "Entity/Classes.php";

class Classes_Model extends EleveModel
{ // en appellant l'extension de la classe Model : je n'ai plus besoin de me connecter : c'est fait via ce biais ;-P 

    public function get_classes()
    {

        $requete = "SELECT * FROM eleve WHERE id_classe= 1";
        $classes = $this->Db_connect->prepare($requete);
        $classes->setFetchMode(PDO::FETCH_CLASS, Classes::class);
        //pre_var_dump($classes);
        $classes->execute();
        //pre_var_dump($classes->execute());
        $classes = $classes->fetchAll();
        //pre_var_dump($classes);

        return $classes;
    }

    public function edit_classes($id_classe)
    {

        $requete = "UPDATE eleve SET id_classe= :id_classe WHERE id_classe= :id_classe";
        $classes = $this->Db_connect->prepare($requete);
        $classes->execute(array(

            ":id_classe" => $id_classe,
         ));
        //pre_var_dump($classes, NULL, true);
        // les insert into et les updates n'ont pas besoin de return ...;
    }

    /* public function create_classes($id, $nom, $prenom, $date_naissance, $moyenne, $appreciation, $id_classe)
    {

        $requete = "INSERT INTO eleve (id, nom, prenom, date_naissance, moyenne, appreciation, id_classe) VALUES (:id, :nom, :prenom, :date_naissance, :moyenne, :appreciation, :id_classe)";
        $classes = $this->Db_connect->prepare($requete);
        $classes->execute(array(

            ":id" => $id,
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":date_naissance" => $date_naissance,
            ":moyenne" => $moyenne,
            ":appreciation" => $appreciation,
            ":id_classe" => $id_classe
            
        ));
        //pre_var_dump($classes, NULL, true);
        // les insert into et les updates n'ont pas besoin de return ...;
    } */

    public function create_classes($id_classes)
    {

        $requete = "INSERT INTO classes (id, id_classes) VALUES (NULL, :id_classes)";
        $classes = $this->Db_connect->prepare($requete);
        $classes->execute(array(

            ":id_classes" => $id_classes

        ));
    pre_var_dump($classes);
        // les insert into et les updates n'ont pas besoin de return ...;
    }

    public function delete_classes($id_classe)
    {

        $requete = "DELETE FROM classes WHERE id_classe= :id_classe";
        $classes = $this->Db_connect->prepare($requete);
        //pre_var_dump($classes, NULL, true);die;
        $classes->execute(array(

            ":id_classes" => $id_classe,
        ));
        //pre_var_dump($classes, NULL, true);

    }
}
