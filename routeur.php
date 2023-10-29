<?php

// Gestionnaire des routes du site

// Étape 1 : on importe les contrôleurs
require_once("controller/controllerHome.php");
require_once("controller/controllerXSS.php");
require_once("controller/controllerCSRF.php");
require_once("controller/controllerSQL.php");

// Étape 2 : On récupère les fonctions des contrôleurs
$tableauDesMethodesHome = get_class_methods('controllerHome');
$tableauDesMethodesXSS = get_class_methods('controllerXSS');
$tableauDesMethodesCSRF = get_class_methods('controllerCSRF');
$tableauDesMethodesSQL = get_class_methods('controllerSQL');

// Étape 3 : On définit le comportemenet par défaut du site
$action = "home";
$controller = "home";
$secure = false;

// Étape 4 : On vérifie que l'action demandée existe
if (isset($_GET["action"])) {
        if(in_array($_GET["action"],$tableauDesMethodesHome) | in_array($_GET["action"],$tableauDesMethodesXSS) | in_array($_GET["action"],$tableauDesMethodesCSRF)| in_array($_GET["action"],$tableauDesMethodesSQL)){
            $action = $_GET["action"];
        } 
    } 


//Étape 5 : On vérifie que le contrôleur demandé existe puis on applique l'action demandée
if (isset($_GET["controller"])) {
    $controller = $_GET["controller"];
    switch ($controller) {

        case "xss":
            controllerXSS::$action();
            break;
        case "csrf":
            controllerCSRF::$action();
            break;
         case "sql":
            controllerSQL::$action();
            break;


        case "home":
            controllerHome::$action();
        default:
            break;
    }
} else {
    controllerHome::$action();
}


?>