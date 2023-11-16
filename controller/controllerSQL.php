<?php
require_once("model/Person.php");

class controllerSQL
{

  // This is the parent of /xss used to show the form
  public static function sql()
  {
    if (isset($_GET["secure"])) {
      $secure = $_GET["secure"];
    } else {
      $secure = false;
    }

    $users = Person::getAllUsers();

    require_once("view/header.php");
    require_once("view/inscription.php");

  }

  public static function allUser()
  {
    if (isset($_GET["secure"])) {
      $secure = $_GET["secure"];
    } else {
      $secure = false;
    }

    $users = Person::getAllUsers();

    require_once("view/header.php");
    require_once("view/sql.php");

  }


  // These are the childs of /xss used to show the results depending of the
  // security level
  public static function secure()
  {
    if (isset($_GET["secure"])) {
      $secure = $_GET["secure"];
    } else {
      $secure = false;
    }

    $post = $_POST;

    Person::insertUser($post["nom"], $post["prenom"], $post["profession"]);

    require_once("view/header.php");


  }

  public static function unsecure()
  {
    $secure = false;
    if (isset($_GET["secure"])) {
      $secure = $_GET["secure"];
    } else {
      $secure = false;
    }

    $post = $_POST;
    Person::insertUserUnsecure($post["nom"], $post["prenom"], $post["profession"]);

    require_once("view/header.php");
  }
}

?>