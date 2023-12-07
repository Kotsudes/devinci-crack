<div class="container">
    <span>RFI Attack</span>
    <form method="POST" action=<?php echo ($secure == "true") ? "/devinci-cracks/rfi/secure" : "/devinci-cracks/rfi/unsecure" ?>>
        <button type="submit">Submit</button>
    </form>
</div>