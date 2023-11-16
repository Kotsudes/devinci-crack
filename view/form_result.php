<div class="container">
    <span>
<?php 
// var_dump($_POST);
if (isset($post)) {
    $username = $post["username"];
    echo "Welcome, " . $username; 
}    
?>
</span>
</div>

