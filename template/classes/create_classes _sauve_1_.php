<?php // comme on est dans la vue : on doit partir de là où l'on est ==>> pour remonter dans l'arborescence : ../../  permet de le faire Cf. ci-dessous ...

require_once "../../Model/Classes_Model.php";
require_once "../../tools/outils__perso__jonas__.php";
require_once "../../config/db_connect.php";
require_once "../../Model/Model.php";
require_once "../../Entity/Classes.php";

$create_classes = new Classes_Model();

//pre_var_dump($create_classes);

if (isset($_POST) && !empty($_POST)) {

    $id = NULL;
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    //pre_var_dump($_POST['prenom'],NULL,true);
    $date_naissance = $_POST['date_naissance'];
    $moyenne = $_POST['moyenne'];
    $appreciation = $_POST['appreciation'];
    $id_classe = $_POST['id_classe'];

    $create_classes->create_classes($id, $nom, $prenom, $date_naissance, $moyenne, $appreciation, $id_classe);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../lib/jquery-3.5.1.min.js"></script>
    <script src="../../lib/jquery.validate.min.js"></script>
    <script src="../../JS/Jqvalidation.js"></script>

    <title>CREER UNE CLASSE</title>
</head>

<body>
    <div class="error"><span></span></div><br>
    <form method="POST" id="Validate_form">
        <input type="text" name="nom" placeholder="NOM" required />
        <br><br>
        <input type="text" name="prenom" placeholder="Prénom" required />
        <br><br>
        <!-- </?=pre_var_dump($create_classes->getPrenom())?> -->
        <input type="date" name="date_naissance" placeholder="Date de naissance" required />
        <br><br>
        <input type="number" name="moyenne" placeholder="Moyenne / 20" required />
        <br><br>
        <textarea name="appreciation" placeholder="Appréciation" required></textarea>
        <br><br>
        <br><br>
        <textarea name="id_classe" placeholder="Numéro de classe" required></textarea>
        <br><br>
        <input type="submit" value="Créer la classe" />
    </form>
</body>

</html>