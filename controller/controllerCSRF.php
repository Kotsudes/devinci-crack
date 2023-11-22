<?php

class controllerCSRF
{
  // This is the parent of /csrf used to show the form
  public static function csrf()
  {

    // Start the session.
    session_start();

    // Generate a CSRF token if one doesn't exist for this session.
    if (empty($_SESSION["csrf_token"])) {
      $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    }

    // Check if the secure parameter is set.
    $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;


    require_once("view/header.php");
    require_once("view/csrf.php");
  }

  // These are the childs of /csrf used to show the results depending of the
  // security level
  public static function secure()
  {
    // Start the session.
    session_start();

    // Check if the secure parameter is set.
    $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;


    // Check if the CSRF token is valid.
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
      // Handle the error - token does not match or not set.
      // Show the header.php in case of error.
      require_once("view/header.php");
      die('CSRF token validation failed.');
    }

    require_once("view/header.php");
    require_once("view/csrf_update.php");
  }

  public static function unsecure()
  {
    $secure = false;

    // Check if the secure parameter is set.
    $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;


    require_once("view/header.php");
    require_once("view/csrf_malicious.php");
  }
}

?>