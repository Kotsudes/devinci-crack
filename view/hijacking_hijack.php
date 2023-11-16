<?php
if (isset($_GET['session_id'])) {
    session_id($_GET['session_id']);
    session_start();
    if (isset($_SESSION['user'])) {
        echo "Hijacked session of user: " . $_SESSION['user'];
    } else {
        echo "Failed to hijack session";
    }
} else {
    echo "Please provide a session_id";
}
?>