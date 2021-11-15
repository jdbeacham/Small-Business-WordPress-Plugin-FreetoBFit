<div id = "ftbf-email-wrapper">
<div class="ftbf-plugin-popup-x" onclick="ftbfX('email')">&#10006;</div>
    <div id = "ftbf-email-title">E-mail <?php echo $email_member[0]->firstname;?> <?php echo $email_member[0]->lastname;?></div>
    <form method = "post" action = "#">
        <input class = "email-member-input" type = "text" name = "subject" placeholder = "Subject">
        <textarea id = "message" name = "message" rows = "10" cols = "40">Message</textarea><br>
        <input type = "hidden" name = "email-id" value = "<?php echo $email_member[0]->contact_id ?>">
        <input type = "hidden" name = "actualEmail" value = "<?php echo $email_member[0]->email ?>">
        <input class = "email-member-submit" type = "submit" value = "e-mail">
</form>
</div>