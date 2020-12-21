<?php // comme on est dans la vue : on doit partir de là où l'on est ==>> pour remonter dans l'arborescence : ../../  permet de le faire Cf. ci-dessous ...

require_once "../../Model/EleveModel.php";
require_once "../../Model/Classes_Model.php";
require_once "../../tools/outils__perso__jonas__.php";
require_once "../../config/db_connect.php";
require_once "../../Model/Model.php";
require_once "../../Entity/Classes.php";

$create_classes = new Classes_Model();

//pre_var_dump($one_eleve);

if(isset($_GET) && !empty($_GET) ){

    $id= $_GET['id_classes'];
    
    $eleve_model->delete_classes($id_classe);
    
    header ("Location: ../../../classes/index.php");
}