<?php

class controllerXSS
{

  // This is the parent of /xss used to show the form
  public static function xss()
  {
    if (isset($_GET["secure"])) {
      $secure = $_GET["secure"];
    } else {
      $secure = false;
    }

    require_once("view/header.php");
    require_once("view/xss.php");
  }

  // These are the childs of /xss used to show the results depending of the
  // security level
  public static function secure()
  {
    $secure = false;
    if (isset($_GET["secure"])) {
      $secure = $_GET["secure"];
    }
    $post = $_POST;

    // Convert special characters to HTML entities (to avoid XSS)
    $post["username"] = strip_tags(htmlentities($post["username"], ENT_QUOTES, 'UTF-8'));

    require_once("view/header.php");
    require_once("view/form_result.php");

  }

  public static function unsecure()
  {
    $secure = false;
    if (isset($_GET["secure"])) {
      $secure = $_GET["secure"];
    }
    $post = $_POST;

    require_once("view/header.php");
    require_once("view/form_result.php");
  }
}

?>