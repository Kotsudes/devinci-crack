<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Devinci Cracks</title>
  <link rel="stylesheet" href="/devinci-cracks/style/base.css" />
  <link rel="icon" href="./favicon.ico" type="image/x-icon" />
</head>

<body>
  <main>
    <div class="header">
      <h1 class="text-heading">Devinci Crack</h1>
      <!--NAVIGATION-->
      <div class="navigation">
        <div class="item text-subheading"><a href=<?php echo (isset($_GET["secure"])) ? "/devinci-cracks/routeur.php?controller=home&action=home&secure=true" : "routeur.php?controller=home&action=home&secure=false" ?>>Home</div>
        <div class="item text-subheading"><a href=<?php echo (isset($_GET["secure"])) ? "/devinci-cracks/routeur.php?controller=sql&action=sql&secure=true" : "routeur.php?controller=sql&action=sql&secure=false" ?>>SQL</a></div>
        <div class="item text-subheading"><a href=<?php echo (isset($_GET["secure"])) ? "/devinci-cracks/routeur.php?controller=xss&action=xss&secure=true" : "routeur.php?controller=xss&action=xss&secure=false" ?>>XSS</a></div>
        <div class="item text-subheading"><a href=<?php echo (isset($_GET["secure"])) ? "/devinci-cracks/routeur.php?controller=rfi&action=rfi&secure=true" : "routeur.php?controller=rfi&action=rfi&secure=false" ?>>RFI</a></div>
        <div class="item text-subheading"><a href=<?php echo (isset($_GET["secure"])) ? "/devinci-cracks/routeur.php?controller=csrf&action=csrf&secure=true" : "routeur.php?controller=csrf&action=csrf&secure=false" ?>>CSRF</a></div>
        <div class="item text-subheading"><a href=<?php echo (isset($_GET["secure"])) ? "/devinci-cracks/routeur.php?controller=hijacking&action=hijacking&secure=true" : "routeur.php?controller=hijacking&action=hijacking&secure=false" ?>>Hijacking</a></div>
      </div>
      <!-- FIN NAVIGATION -->
      <a class="text" href=<?php echo ($secure == "true") ? "/devinci-cracks/routeur.php?controller={$_GET['controller']}&action={$_GET['action']}&secure=false" : "/devinci-cracks/routeur.php?controller={$_GET['controller']}&action={$_GET['action']}&secure=true"; ?>>
        <?php echo ($secure == "true") ? "Go to Unsecure" : "Go to Secure"; ?>
      </a>
    </div>
    <div class="text-subheading">Bienvenue sur le site de Devinci Crack</div>
    <div class="text-subheading">Vous trouverez ici des failles de sécurité</div>
  </main>
</body>

</html>