<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>XSS Simulation Page</title>

</head>

<body>

    <div class="container">
        <span>Attaque XSS</span>
        <form method="post" action=<?php echo ($secure == "true") ? "/devinci-cracks/xss/secure" : "/devinci-cracks/xss/unsecure" ?>>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <input type="submit" value="Submit">
        </form>
    </div>

</body>

</html>