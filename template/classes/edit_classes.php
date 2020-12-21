<?php // comme on est dans la vue : on doit partir de là où l'on est ... pour remonter dans l'arborescence : ../../  permet de le faire Cf. ci-dessous ...

require_once "../../Model/EleveModel.php";
require_once "../../tools/outils__perso__jonas__.php";
require_once "../../config/db_connect.php";
require_once "../../Model/Model.php";
require_once "../../Entity/Eleve.php";
require_once "../../Model/Classes_Model.php";
require_once "../../Entity/Classes.php";

$create_classes = new Classes_Model();

$one_classe = $classes_model->edit_classes($_GET['id_classes']);
//pre_var_dump($one_eleve);

if(isset($_POST)){

    $id_classes= $_POST['id_classes'];

    $classes_model->edit_classes($id_classes);
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFIER UNE CLASSES</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="nom" placeholder="NOM" value="<?php if (isset($one_eleve)) { echo $one_eleve->getNom(); } ?>" />
        <input type="text" name="prenom" placeholder="Prénom" value="<?php if (isset($one_eleve)) { echo $one_eleve->getPrenom(); } ?>" />
        <!-- <//?=pre_var_dump( $one_eleve->getPrenom())?> -->
        <input type="date" name="date_naissance" placeholder="Date de naissance" value="<?php if (isset($one_eleve)) { echo $one_eleve->getDateNaissance()->format("d/m/Y"); } ?>" />
        <input type="number" name="moyenne" placeholder="Moyenne / 20" value="<?php if (isset($one_eleve)) { echo $one_eleve->getMoyenne(); } ?>" />
        <textarea name="appreciation" placeholder="Appréciation"><?php if (isset($one_eleve)) { echo $one_eleve->getAppreciation(); } ?></textarea>
        <input type="hidden" name="id" value="<?php if (isset($one_eleve)) { echo $one_eleve->getId(); } ?>" />
        <input type="submit" value="Modifier la fiche"/>
    </form>
</body>
</html>