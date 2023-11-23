<?php

// Gestionnaire des routes du site

// Étape 1 : on importe les contrôleurs
require_once("controller/controllerHome.php");
require_once("controller/controllerXSS.php");
require_once("controller/controllerCSRF.php");
require_once("controller/controllerSQL.php");
require_once("controller/controllerRFI.php");
require_once("controller/controllerHijacking.php");

// Étape 2 : On récupère les fonctions des contrôleurs
$tableauDesMethodesHome = get_class_methods('controllerHome');
$tableauDesMethodesXSS = get_class_methods('controllerXSS');
$tableauDesMethodesCSRF = get_class_methods('controllerCSRF');
$tableauDesMethodesSQL = get_class_methods('controllerSQL');
$tableauDesMethodesRFI = get_class_methods('controllerRFI');
$tableauDesMethodesHijacking = get_class_methods('controllerHijacking');

// Étape 3 : On définit le comportemenet par défaut du site
$action = "home";
$controller = "home";
$secure = false;

// Étape 4 : On vérifie que l'action demandée existe
if (isset($_GET["action"])) {
    if (in_array($_GET["action"], $tableauDesMethodesHome) | in_array($_GET["action"], $tableauDesMethodesXSS) | in_array($_GET["action"], $tableauDesMethodesCSRF) | in_array($_GET["action"], $tableauDesMethodesSQL) | in_array($_GET["action"], $tableauDesMethodesRFI) | in_array($_GET["action"], $tableauDesMethodesHijacking)) {
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
        case "rfi":
            controllerRFI::$action();
            break;
        case "hijacking":
            controllerHijacking::$action();
            break;
        case "home":
            controllerHome::$action();
            break;
        default:
            break;
    }
} else {
    controllerHome::$action();
}


?>