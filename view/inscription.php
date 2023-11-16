
<head>
    <meta charset="UTF-8">
    <title>SQL Simulation Page</title>

</head>
<body>
    <div class="container">
            <span>Attaque SQL</span>
        <form method="POST" action=<?php echo ($secure == "true")? "/devinci-cracks/sql/secure": "/devinci-cracks/sql/unsecure" ?>>
            <input type="text" name="nom" placeholder="LastName" />
            <input type="text" name="prenom" placeholder="FirstName" />
            <input type="text" name="profession" placeholder="Job"/>
            <input type="submit" value="Envoyer" />
        </form>

        <a href="routeur.php?controller=sql&action=allUser&secure=<?php echo $secure ?>">Voir les personnes</a>
    </div>
</body>