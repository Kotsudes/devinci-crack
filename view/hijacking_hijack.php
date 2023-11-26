<!DOCTYPE html>
<html>

<head>
    <title>Hijack Page</title>
</head>

<body>
    <div class="container">
        <h1>
            Hijacked user :
            <?php echo $_SESSION['user']; ?>
        </h1>
        <p>
            Don't click on silly links...
        </p>
    </div>
</body>

</html>