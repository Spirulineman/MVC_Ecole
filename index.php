<?php

require_once "tools/outils__perso__jonas__.php";
require_once "config/db_connect.php";

/* ********************************** MODEL ********************************* */

require_once "Model/Model.php";
require_once "Model/ClasseModel.php";
require_once "Model/Classes_Model.php";
require_once "Model/EleveModel.php";

/* ********************************* ENTITY ********************************* */

require_once "Entity/Classes.php";
require_once "Entity/Eleve.php";
require_once "Entity/Classe.php";





/* ************************************************************************** */
/*                                    LESS                                    */
/* ************************************************************************** */

require "lib/LessToCss/lessphp/lessc.inc.php";


$less = new lessc;

// echo $less->compileFile("test.less");

$less->checkedCompile("test.less", "test.css");

/* <link rel="stylesheet/less" type="text/css" href="test.less" />
<script src="JsDelivr.js" ></script> */

/* ******************************** FIN LESS ******************************** */

$eleve_model = new EleveModel(); //instanciation de l'objet EleveModel stocké dans la variable qui inclus par héritage (extends) la connexion BDD
$all_eleves = $eleve_model->get_all_eleves(); // appelle de la fonction qui est dans cet objet ...
//pre_var_dump($all_eleves);

/* *************************** AFFICHER LA CLASSE *************************** */

$classes = new Classes_Model();
$get_classe = $classes->get_classes();
/* ----------------------------------------  .  -------------------------------- */

$classe_model = new ClasseModel(); //classe pour calculer la moyenne 
$calc_moyenne = $classe_model->calc_moyenne();
//pre_var_dump($calc_moyenne);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--   less   -->
    <link rel="stylesheet/less" type="text/css" href="test.less" />
    <script src="lib\LessToCss\JsDelivr.js"></script>
    <!--  FIN less   -->

    <!--   TinyMCE   -->
    <script src="lib/jquery-3.5.1.min.js"></script>
    <script src="lib/tinymce/tinymce.min.js"></script>

    <script>
        //Ne s'exécute que lorsque la page est complètement chargée
        //Equivalent à document.ready

        tinymce.init({

            selector: 'textarea',

            height: 400,
            width: 1100,

            /* ***************************** CONTEXT TOOLBAR **************************** */

            setup: function(editor) {

                editor.ui.registry.addContextToolbar('imagealignment', {
                    predicate: function(node) {
                        return node.nodeName.toLowerCase() === 'img'
                    },
                    items: '',
                    position: 'node',
                    scope: 'node'
                });

                editor.ui.registry.addContextToolbar('textselection', {
                    predicate: function(node) {
                        return !editor.selection.isCollapsed();
                    },
                    items: 'bold italic underline | blockquote | alignleft aligncenter alignright',
                    position: 'selection',
                    scope: 'node'
                });
            },

            /* *************************  FIN CONTEXT TOOLBAR **************************** */

            plugins: 'lists, link, image, media',
            toolbar: 'undo redo | h1 h2 bold italic | underline strikethrough | blockquote bullist numlist forecolor backcolor | link image media | removeformat help', // https://www.tiny.cloud/docs-3x/reference/configuration/Configuration3x@formats/
            menubar: true,
            language: 'fr_FR',
            content_style: 'body { }', //à modifier ...
            content_css: 'dark; ../../test_2_.css', // CSS perso
            visual: true, // aide contextuelle
        });
    </script>
    <!--  FIN TinyMCE   -->

    <title>LA VRAIE ECOLE </title>
</head>

<body>

    <div>
        <textarea name="Tiny" id="Tiny"></textarea> <!-- appel pour afficher l'éditeur TinyMCE -->
    </div>
    <div>
        <br><!-- espace pour faire de la place -->
    </div>
    <div>
        <h3><a class="th_h3" href="template/eleve/create_eleve.php">Créer un élève</a></h3>
    </div>

    <table>
        <thead>

            <th id="th_1">Nombre d'élèves : </th>
            <th id="th_2"><?= count($all_eleves) ?></th>
            <th id="td_moy">Moyenne de la Classe :
            <th><b id="td_moy_number"><?= $calc_moyenne->getCalc_moyenne() ?></b></th>
            <!-- <th id="th_1">Classe : </th>
            <th><//?= $get_classe->get_classes($id_classes); ?></th> -->
        </thead>
        <thead id="thead_table">
            <tr id="tr">
                <!-- <th id="th">Classe</th> -->
                <th id="th">NOM</th>
                <th id="th">Prénom</th>
                <th id="th">Date de naissance</th>
                <th id="th">Moyenne</th>
                <th id="th">Appréciation</th>
                <th id="th">MODIFIER</th>
                <th id="th">SUPPRIMER</th>

            </tr>
        </thead>
        <tbody>

            <?php for ($i = 0; $i < count($all_eleves); $i++) { ?>
                <tr>
                    <!-- <td id="td_all_NOM"></?= $all_eleves[$i]->getNom() ?></td> -->
                    <td id="td_all_NOM"><?= $all_eleves[$i]->getNom() ?></td>
                    <td id="td_all_Prenom"><?= $all_eleves[$i]->getPrenom() ?></td>
                    <td id="td_all_Date"><?= $all_eleves[$i]->getDateNaissance()->format("d/m/Y") ?></td>
                    <td id="td_all_Moy"><?= $all_eleves[$i]->getMoyenne() ?></td>
                    <td id="td_all_App"><?= $all_eleves[$i]->getAppreciation() ?></td>
                    <td id="td_all_Modif"><a id="a_modif" href="template/eleve/edit_eleve.php?id=<?= $all_eleves[$i]->getId() ?>">MODIFIER => <?= $all_eleves[$i]->getNom() ?></a></td>
                    <td id="td_all_Delete"><a id="a_Delete" href="template/eleve/delete_eleve.php?id=<?= $all_eleves[$i]->getId() ?>">SUPPRIMER => <?= $all_eleves[$i]->getNom() ?></a></td>
                </tr>
            <?php } ?>

        </tbody>
        <tfoot>
            <th id="th_1">Nombre d'élèves : </th>
            <td id="th_2"><?= count($all_eleves) ?></td>
            <th id="td_moy">Moyenne de la Classe :
            <th><b id="td_moy_number"><?= $calc_moyenne->getCalc_moyenne() ?></b></td>
                </tr>
        </tfoot>
        <tfoot>
            <tr id="tr">
                <th id="th_foot">NOM</th>
                <th id="th_foot">Prénom</th>
                <th id="th_foot">Date de naissance</th>
                <th id="th_foot">Moyenne</th>
                <th id="th_foot">Appréciation</th>
                <th id="th_foot">MODIFIER</th>
                <th id="th">SUPPRIMER</th>
        </tfoot>

    </table>
</body>

</html>