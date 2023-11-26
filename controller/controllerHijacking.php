<?php


// **PREVENTING SESSION HIJACKING**
// Prevents javascript XSS attacks aimed to steal the session ID
ini_set('session.cookie_httponly', 1);

// **PREVENTING SESSION FIXATION**
// Session ID cannot be passed through URLs
ini_set('session.use_only_cookies', 1);

// Uses a secure connection (HTTPS) if possible
ini_set('session.cookie_secure', 1);

class controllerHijacking
{

    const ADMIN_USERNAME = 'admin';
    const ADMIN_PASSWORD = 'password';

    public static function login()
    {

        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the username and password from the form
            $username = $_POST['username'];
            $password = $_POST['password'];
            // Validate the credentials
            if (self::validateCredentials($username, $password)) {
                // Store the username in the session
                $_SESSION['user'] = $username;
                // Regenerate the session ID if secure
                if (!empty($_SESSION['secure'])) {
                    session_regenerate_id(true);
                }
                // Successful login
                return true;
            } else {
                // Invalid credentials
                throw new Exception("Invalid credentials");
            }
        }
        // Form not submitted
        return false;
    }

    private static function validateCredentials($username, $password)
    {
        return $username === self::ADMIN_USERNAME && $password === self::ADMIN_PASSWORD;
    }

    private static function validateSession($secure)
    {
        if ($secure == "true") {
            // Session token validation
            if (!isset($_COOKIE['session_token']) || $_COOKIE['session_token'] !== $_SESSION['session_token']) {
                self::invalidateSession("Token mismatch detected");
                return;
            }

            // IP and User-Agent validation
            if (!isset($_SESSION['ip']) || !isset($_SESSION['user_agent'])) {
                self::invalidateSession("Session data missing");
            }

            if ($_SESSION['ip'] !== $_SERVER['REMOTE_ADDR'] || $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
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
        // Include the header view.
        self::renderView("header");

        // Check if the secure parameter is set.
        $secure = isset($_GET["secure"]) ? $_GET["secure"] : false;
        $_GET['secure'] = $secure;

        // Validate the session if in secure mode
        if ($secure == "true") {
            echo "Secure Mode";
            self::validateSession($secure);
        }

        // Attempt session hijacking
        if (isset($_GET['session_id'])) {
            session_id($_GET['session_id']);
            session_start(); // Start the session after validation
            if (isset($_SESSION['user'])) {
                self::renderView("hijacking_hijack");
            } else {
                echo "<div class='container'><h1>No active session found</h1></div>";
            }
        } else {
            echo "<div class='container'><h1>Please provide a session_id</h1></div>";
        }
    }

    public static function renderView($viewName)
    {
        require_once("view/{$viewName}.php");
    }

    public static function blocked()
    {
        require_once("view/header.php");
        require_once("view/hijacking_blocked.php");
    }
}

?>