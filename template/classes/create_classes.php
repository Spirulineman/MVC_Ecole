<?php // comme on est dans la vue : on doit partir de là où l'on est ==>> pour remonter dans l'arborescence : ../../  permet de le faire Cf. ci-dessous ...

require_once "../../Model/EleveModel.php";
require_once "../../Model/Classes_Model.php";
require_once "../../tools/outils__perso__jonas__.php";
require_once "../../config/db_connect.php";
require_once "../../Model/Model.php";
require_once "../../Entity/Classes.php";

$create_classes = new Classes_Model();

//pre_var_dump($create_classes);

if (isset($_POST) && !empty($_POST)) {

    
    $id_classes = $_POST['id_classes'];

    $create_classes->create_classes($id_classes);
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
        <br><br>
        <textarea name="id_classes" placeholder="Numéro de classe" required></textarea>
        <br><br>
        <input type="submit" value="Créer la classe" />
    </form>
</body>

</html>