<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == 'password') {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        if (!empty($_SESSION['secure'])) {
            session_regenerate_id(true);
        }
        $_SESSION['user'] = $username;
    } else {
        echo "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <span>Attaque Session</span>
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