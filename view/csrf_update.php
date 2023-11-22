<div class="container">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    // Assume the user is authenticated and the user_id is 1
    $user_id = 1;
    // Simulate updating the email in the database
    echo "Email updated successfully for user ID: " . $user_id . " to: " . $email;
}
?>
    </span>
</div>

