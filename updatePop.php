
<div id = "ftbf-member-wrapper">
<div class="ftbf-plugin-popup-x" onclick="ftbfX('member')">&#10006;</div>
    <div id = "ftbf-member-title">Update Member</div>
    <form method = "post" action = "#">
        <input class = "update-member-input" type = "text" name = "firstname" value = "<?php echo sanitize_text_field($member_update[0]->firstname); ?>">
        <input class = "update-member-input" type = "text" name = "lastname" value = "<?php echo sanitize_text_field($member_update[0]->lastname); ?>">
        <input class = "update-member-input" type = "text" name = "email" value = "<?php echo sanitize_text_field($member_update[0]->email); ?>">
        <input class = "update-member-input" type = "text" name = "phone" value = "<?php echo sanitize_text_field($member_update[0]->phone); ?>">
        <input type = "hidden" name = "update-id" value = "<?php echo $member_update[0]->contact_id ?>">
        <input class = "update-member-submit" type = "submit" value = "save">
</form>
    

</div>

