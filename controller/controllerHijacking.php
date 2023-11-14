<?php

class controllerHijacking
{
    // This function checks if the session is valid (IP and user agent match)
    private static function validateSession()
    {
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;

        if (!isset($_SESSION['ip']) || !isset($_SESSION['user_agent'])) {
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        } else {
            if ($_SESSION['ip'] !== $_SERVER['REMOTE_ADDR'] || $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
                // Suspicious activity
                session_destroy(); // Destroy the session
                echo "Session hijacking detected";
                header("Location: routeur.php?controller=hijacking&action=hijacking&secure=$secure"); // Redirect to login or error page
                exit;
            }
        }
    }

    public static function hijacking()
    {
        // Start the session.
        session_start();

        // Check if the secure parameter is set.
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;

        require_once("view/header.php");
        require_once("view/hijacking_login.php");
    }

    public static function secure()
    {
        // Start the session.
        session_start();

        // Check if the secure parameter is set.
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;

        // Check if the session is valid
        self::validateSession();

        require_once("view/header.php");
        require_once("view/hijacking_dashboard.php");
    }

    public static function unsecure()
    {
        // Start the session.
        session_start();

        // Check if the secure parameter is set.
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;

        // We don't check if the session is valid

        require_once("view/header.php");
        require_once("view/hijacking_dashboard.php");
    }

    public static function hijack_page()
    {
        // Check if the secure parameter is set.
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;

        if (isset($_GET['session_id'])) {
            session_id($_GET['session_id']);
            session_start();
            if (isset($_SESSION['user'])) {
                require_once("view/header.php");
                // Display hijacked session details
                echo "Hijacked session of user: " . $_SESSION['user'];
            }
        } else {
            echo "Please provide a session_id";
        }
    }

}

?>