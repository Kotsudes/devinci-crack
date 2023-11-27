<?php

class controllerHome
{
  public static function home()
  {
    // Check if the secure parameter is set.
    $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;

    require_once("view/header.php");

  }
}

?>