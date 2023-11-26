<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    // Redirect to another page if session user is not set
    header("Location: routeur.php?controller=hijacking&action=hijacking&secure=$secure");
    exit;
}

// Display the text in HTML centered on the screen
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome Page</title>
</head>

<body>
    <div class="container">
        <h1>
            Welcome,
            <?php echo $_SESSION['user']; ?>
        </h1>
        <p>
            Your session ID is:
            <?php echo session_id(); ?>
        </p>
    </div>
</body>

</html>