<?php

require_once "Model.php";

class EleveModel extends Model
{ // en appellant l'extension de la classe Model : je n'ai plus besoin de me connecter : c'est fait via ce biais ;-P 

    public function get_all_eleves()
    {

        $requete = "SELECT id, nom, prenom, date_naissance, moyenne, appreciation FROM eleve";
        $eleves = $this->Db_connect->prepare($requete);
        $eleves->setFetchMode(PDO::FETCH_CLASS, Eleve::class);
        $eleves->execute();
        $eleves = $eleves->fetchAll();


        return $eleves;
    }

    public function get_one_eleve($id)
    {

        $requete = "SELECT id, nom, prenom, date_naissance, moyenne, appreciation FROM eleve WHERE id= :id";
        $eleves = $this->Db_connect->prepare($requete);
        $eleves->setFetchMode(PDO::FETCH_CLASS, Eleve::class);
        $eleves->execute(array(":id" => $id));
        $eleves = $eleves->fetch();
        //pre_var_dump($eleves, NULL, true);
        return $eleves;
    }

    public function edit_one_eleve($id, $nom, $prenom, $date_naissance, $moyenne, $appreciation)
    {

        $requete = "UPDATE eleve SET nom= :nom, prenom= :prenom, date_naissance= :date_naissance, moyenne= :moyenne, appreciation= :appreciation WHERE id= :id";
        $eleves = $this->Db_connect->prepare($requete);
        $eleves->execute(array(

            ":id" => $id,
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":date_naissance" => $date_naissance,
            ":moyenne" => $moyenne,
            ":appreciation" => $appreciation

        ));
        //pre_var_dump($eleves, NULL, true);
        // les insert into et les updates n'ont pas besoin de return ...;
    }

    public function create_one_eleve($id, $nom, $prenom, $date_naissance, $moyenne, $appreciation)
    {

        $requete = "INSERT INTO eleve (id, nom, prenom, date_naissance, moyenne, appreciation) VALUES (:id, :nom, :prenom, :date_naissance, :moyenne, :appreciation)";
        $eleves = $this->Db_connect->prepare($requete);
        $eleves->execute(array(

            ":id" => $id,
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":date_naissance" => $date_naissance,
            ":moyenne" => $moyenne,
            ":appreciation" => $appreciation

        ));
        //pre_var_dump($eleves, NULL, true);
        // les insert into et les updates n'ont pas besoin de return ...;
    }

    public function delete_one_eleve($id){

        $requete = "DELETE FROM eleve WHERE id= :id";
        $eleves = $this->Db_connect->prepare($requete);
        //pre_var_dump($eleves, NULL, true);die;
        $eleves->execute(array(

            ":id" => $id,
        ));
        //pre_var_dump($eleves, NULL, true);

    }
}
