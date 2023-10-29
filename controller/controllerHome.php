<?php 

 class controllerHome{
     public static function home(){
            $secure = false;
            if(isset($_GET["secure"])){$secure = $_GET["secure"];}
            require_once("view/header.php");
        }
  }

?>