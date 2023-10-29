<?php

// Gestionnaire des routes du site

// Étape 1 : on importe les contrôleurs
require_once("controller/controllerHome.php");

// Étape 2 : On récupère les fonctions des contrôleurs
$tableauDesMethodesHome = get_class_methods('controllerHome');

// Étape 3 : On définit le comportemenet par défaut du site
$action = "home";
$controller = "home";

// Étape 4 : On vérifie que l'action demandée existe
if (isset($_GET["action"])) {
        if(in_array($_GET["action"],$tableauDesMethodesHome)){
            $action = $_GET["action"];
        } 
    } 


//Étape 5 : On vérifie que le contrôleur demandé existe puis on applique l'action demandée
if (isset($_GET["controller"])) {
    $controller = $_GET["controller"];
    switch ($controller) {
        case "home":
            controllerHome::$action();
        default:
            break;
    }
} else {
    controllerHome::$action();
}


?>