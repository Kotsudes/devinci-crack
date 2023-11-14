<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header("Location: routeur.php?controller=hijacking&action=hijacking&secure=$secure");
    exit;
}
echo "Welcome, " . $_SESSION['user'];
echo "<br>Your session ID is: " . session_id();
?>