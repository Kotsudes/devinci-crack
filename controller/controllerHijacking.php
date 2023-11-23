<?php

class controllerHijacking
{

    public static function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($username == 'admin' && $password == 'password') {
                $_SESSION['user'] = $username;
                if (!empty($_SESSION['secure'])) {
                    session_regenerate_id(true);
                }
                return true;
            } else {
                echo "Invalid credentials";
                return false;
            }
        }
        return false;
    }

    private static function validateSession($secure)
    {
        if ($secure === "true") {
            // Session token validation
            if (!isset($_COOKIE['session_token']) || $_COOKIE['session_token'] !== $_SESSION['session_token']) {
                self::invalidateSession("Token mismatch detected");
                return;
            }

            // IP and User-Agent validation
            if (!isset($_SESSION['ip']) || !isset($_SESSION['user_agent'])) {
                self::invalidateSession("Session data missing");
            } elseif ($_SESSION['ip'] !== $_SERVER['REMOTE_ADDR'] || $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
                self::invalidateSession("Session hijacking detected");
            }
        }
    }

    private static function invalidateSession($message)
    {
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;
        session_destroy();
        header("Location: routeur.php?controller=hijacking&action=blocked&secure=$secure");
        echo $message;
        exit;
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

        // Call the login method 
        if (self::login()) {
            require_once("view/header.php");
            require_once("view/hijacking_dashboard.php");
        } else {
            require_once("view/header.php");
            require_once("view/hijacking_login.php");
        }

    }

    public static function unsecure()
    {
        // Start the session.
        session_start();

        // Check if the secure parameter is set.
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;

        // Call the login method 
        if (self::login()) {
            require_once("view/header.php");
            require_once("view/hijacking_dashboard.php");
        } else {
            require_once("view/header.php");
            require_once("view/hijacking_login.php");
        }
    }

    public static function hijack_page()
    {
        // Check if the secure parameter is set.
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;

        // Validate the session if in secure mode
        if ($secure === "true") {
            echo "Secure Mode";
            self::validateSession($secure);
        } else {
            echo "Unsecure Mode";
        }

        // Attempt session hijacking
        if (isset($_GET['session_id'])) {
            session_id($_GET['session_id']);
            session_start(); // Start the session after validation
            if (isset($_SESSION['user'])) {
                require_once("view/header.php");
                echo "Attempted hijacking session of user: " . $_SESSION['user'];
            } else {
                echo "No active session found"; // Or redirect to a login page
            }
        } else {
            echo "Please provide a session_id";
        }
    }

    public static function blocked()
    {
        require_once("view/header.php");
        require_once("view/hijacking_blocked.php");
    }
}

?>