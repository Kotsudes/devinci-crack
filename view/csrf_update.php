<!DOCTYPE html>
<html>

<head>
    <title>Email Update Status</title>
    <link rel="stylesheet" href="style/base.css"> <!-- Ensure the path is correct -->
</head>

<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = htmlspecialchars($_POST["email"]);
            // Assume the user is authenticated and the user_id is 1
            $user_id = 1;
            // Simulate updating the email in the database
            ?>
            <h1>Email Update Status</h1>
            <p>Email updated successfully for user ID:
                <?php echo $user_id; ?> to:
                <?php echo $email; ?>
            </p>
            <?php
        }
        ?>
    </div>
</body>

</html>