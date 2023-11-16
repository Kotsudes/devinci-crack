<form method="POST" action=<?php echo ($secure == "true")? "/devinci-cracks/sql/secure": "/devinci-cracks/sql/unsecure" ?>>
    <input type="text" name="nom" placeholder="LastName" />
    <input type="text" name="prenom" placeholder="FirstName" />
    <input type="text" name="profession" placeholder="Job"/>
    <input type="submit" value="send" />
</form>
<p>
    <a href="routeur.php?controller=sql&action=allUser&secure=<?php echo $secure ?>">Voir les personnes</a>
</p>