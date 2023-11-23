<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Devinci Cracks</title>
  <link rel="stylesheet" href="/devinci-cracks/style/header.css" />
  <link rel="stylesheet" href="/devinci-cracks/style/base.css" />
  <link rel="icon" href="./favicon.ico" type="image/x-icon" />
</head>

<body>
  <header>
    <div class="header">
      <a href="/devinci-cracks/routeur.php?controller=home&action=home&secure=true">
        <spam class="logo">Devinci Cracks</spam>
      </a>
      <a href=<?php echo ($secure == "true") ? "/devinci-cracks/routeur.php?controller={$_GET['controller']}&action={$_GET['action']}&secure=false" : "/devinci-cracks/routeur.php?controller={$_GET['controller']}&action={$_GET['action']}&secure=true"; ?>>
        <img class="lock" src=<?php echo ($secure == "true") ? "/devinci-cracks/assets/lock.svg" : "/devinci-cracks/assets/unlock.svg"; ?> alt="logo" />
      </a>
      <div class="menu">
        <div class="item">
          <a href=<?php echo (isset($_GET["secure"])) ? "/devinci-cracks/routeur.php?controller=sql&action=sql&secure=true" : "routeur.php?controller=sql&action=sql&secure=false" ?>>
            <spam>SQL</spam>
          </a>
        </div>
        <div class="item">
          <a href=<?php echo (isset($_GET["secure"])) ? "/devinci-cracks/routeur.php?controller=xss&action=xss&secure=true" : "routeur.php?controller=xss&action=xss&secure=false" ?>>
            <spam>XSS</spam>
          </a>
        </div>
        <div class="item">
          <a href=<?php echo (isset($_GET["secure"])) ? "/devinci-cracks/routeur.php?controller=hijacking&action=hijacking&secure=true" : "routeur.php?controller=hijacking&action=hijacking&secure=false" ?>>
            <spam>Session</spam>
          </a>
        </div>
        <div class="item">
          <a href=<?php echo (isset($_GET["secure"])) ? "/devinci-cracks/routeur.php?controller=csrf&action=csrf&secure=true" : "routeur.php?controller=csrf&action=csrf&secure=false" ?>>
            <spam>CSRF</spam>
          </a>
        </div>
        <div class="item">
          <a href=<?php echo (isset($_GET["secure"])) ? "/devinci-cracks/routeur.php?controller=rfi&action=rfi&secure=true" : "routeur.php?controller=rfi&action=rfi&secure=false" ?>>
            <spam>RFI</spam>
          </a>
        </div>
      </div>
    </div>
  </header>
</body>

</html>