<?php 

class controllerCSRF {
  
  // This is the parent of /csrf used to show the form
  public static function csrf() {
    if(isset($_GET["secure"])) {
        $secure = $_GET["secure"];
    } else {
        $secure = false;
    }
    
    require_once("view/header.php");
    require_once("view/csrf.php");
  }
  
  // These are the childs of /csrf used to show the results depending of the
  // security level
  public static function secure() {
    $secure = false;

    if(isset($_GET["secure"])) {
        $secure = $_GET["secure"];
    } else {
        $secure = false;
    }

    $post = $_POST;

    require_once("view/header.php");
    require_once("view/csrf_update.php");
  }

  public static function unsecure() {
    $secure = false;
    
    if(isset($_GET["secure"])) {
        $secure = $_GET["secure"];
    } else {
        $secure = false;
    }
    $post = $_POST;

    require_once("view/header.php");
    require_once("view/csrf_malicious.php");
  }
}

?>