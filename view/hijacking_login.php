<!-- <?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

echo "1";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "2";
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['user'] = $username;
        echo "Session user set: " . $_SESSION['user']; // Debugging line

        if (!empty($_SESSION['secure'])) {
            session_regenerate_id(true);
        }
    } else {
        echo "Wrong username or password";
    }
}
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <span>Session Fixation Attack</span>
        <form method="POST" action=<?php echo ($secure == "true") ? "routeur.php?controller=hijacking&action=secure&secure=$secure" : "routeur.php?controller=hijacking&action=unsecure&secure=$secure" ?>>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>