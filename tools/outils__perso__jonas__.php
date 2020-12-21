<?php

/**
 * var_dump avec < pre >< / pre > pour le debogage de code
 * 
 * @param mixed $param1 - Tous les types de param sont accepter
 * @param mixed $param2 - (facultative) Tous les types de param sont accepter
 * @param bool $param3  - activer ou pas, la function die()
 * 
 * @return void - retourn la valeur de var_dump
 */
function pre_var_dump($param1, $param2 = null, $param3 = false) : void // CONFERE ci dessus !! :  IL EST POSSIBLE D4INVERSER L'ORDRE param1 & param2 pour avoir la ligne par exemple ('index.php =>ligne 11') 

// param1 : var_dump  // param2 : optionnel : permet de mettre un deuxième parmètre : 'index.php =>ligne 11' // param3 : true : permet de faire un die sur lecode => arréter pour éviter erreur dans php / html !! 
{
    if ($param3 === false) {
        
        if ($param2 === null) {
            echo '<pre>';
            var_dump($param1);
            echo '</pre>';
        }
        else{
            echo '<pre>';
            var_dump($param1, $param2);
            echo '</pre>';
        }
    }else{
        if ($param2 === null) {
            echo '<pre>';
            var_dump($param1);die;
            echo '</pre>';
        }
        else{
            echo '<pre>';
            var_dump($param1, $param2);die;
            echo '</pre>';
        }
    }
}