
<?php

if (empty($member_delete[0]->firstname) && empty($member_delete[0]->lastname)) {
    $delete_name = "Are you sure you want to delete?";
}

if (empty($member_delete[0]->firstname) && !empty($member_delete[0]->lastname)) {
    $delete_name = "Are you sure you want to delete " . $member_delete[0]->lastname . "?";
}

if (!empty($member_delete[0]->firstname) && empty($member_delete[0]->lastname)) {
    $delete_name = "Are you sure you want to delete " . $member_delete[0]->firstname . "?";
}

if (!empty($member_delete[0]->firstname) && !empty($member_delete[0]->lastname)) {
    $delete_name = "Are you sure you want to delete " . $member_delete[0]->firstname . " " . $member_delete[0]->lastname . "?";
}

?>


<div id = "ftbf-delete-wrapper">
<div class="ftbf-plugin-popup-x" onclick="ftbfX('delete')">&#10006;</div>
<div style = "font-size: 1.2em;"><?php echo $delete_name ?></div>
<form method = "post" action = "#">
<input type = "hidden" name = "delete-id" value = "<?php echo $delete_member ?>">
<input class = "update-member-submit" type = "submit" value = "yes, delete">
</form>
</div>
