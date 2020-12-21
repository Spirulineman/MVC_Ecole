<?php // comme on est dans la vue : on doit partir de là où l'on est ==>> pour remonter dans l'arborescence : ../../  permet de le faire Cf. ci-dessous ...

require_once "../../Model/EleveModel.php";
require_once "../../tools/outils__perso__jonas__.php";
require_once "../../config/db_connect.php";
require_once "../../Model/Model.php";
require_once "../../Entity/Eleve.php";

$eleve_model = new EleveModel();
//pre_var_dump($one_eleve);

if(isset($_GET) && !empty($_GET) ){

    $id= $_GET['id'];
    
    $eleve_model->delete_one_eleve($id);
    
    header ("Location: ../../index.php");
}