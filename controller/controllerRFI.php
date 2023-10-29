<?php

class controllerRFI
{
    // This is the parent of /rfi used to show the form
    public static function rfi()
    {
        // Check if the secure parameter is set.
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;

        require_once("view/header.php");
        require_once("view/rfi_button.php");
    }

    // These are the childs of /rfi used to show the results depending of the
    // security level
    public static function secure()
    {
        // Check if the secure parameter is set.
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;

        require_once("view/header.php");
        require_once("view/rfi_secure.php");
    }

    public static function unsecure()
    {
        // Check if the secure parameter is set.
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;

        require_once("view/header.php");
        require_once("view/rfi_unsecure.php");
    }
}

?>