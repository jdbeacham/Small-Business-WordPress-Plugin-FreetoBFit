<?php

//Get class info if set

if (isset($_POST['ftbf-class-title'])) {
    $ftfb_id = $_POST['ftbf-id'];
    $ftfb_events = $_POST['ftbf-events'];
    $ftbf_class_title = sanitize_text_field($_POST['ftbf-class-title']);
    $ftbf_class_link = esc_url( $_POST['ftbf-class-link'] );
    $ftbf_class_day = sanitize_text_field($_POST['ftbf-class-day']);
    $ftbf_start_time = $_POST['ftbf-start-time'];
    $ftbf_end_time = $_POST['ftbf-end-time'];
    $ftbf_instructor = sanitize_text_field($_POST['ftbf-instructor']);
    $ftbf_class_description = sanitize_textarea_field($_POST['ftbf-class-description']);
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}
    if ( $action != "update" || !isset($action) ) {

    FtbfDBClasses::dbInsert($ftfb_events, $ftbf_class_title, $ftbf_class_day, $ftbf_start_time, $ftbf_end_time, $ftbf_instructor, $ftbf_class_description, $ftbf_class_link);
}
else {
    
    FtbfDBClasses::dbUpdate($ftfb_id, $ftfb_events, $ftbf_class_title, $ftbf_class_day, $ftbf_start_time, $ftbf_end_time, $ftbf_instructor, $ftbf_class_description, $ftbf_class_link);
}

}

//Load Class to Edit

if (isset($_POST['title_check'])) {
    $title_check = $_POST['title_check'];

$ftbf_classlist = FtbfDBClasses::dbLoadClassInfo($title_check);

echo '<script>
setTimeout(ftbfEditClassContainerFunction, 1);
ftbfEditClassContainerFunction();
</script>';
}

//Delete Class

if (isset($_POST['title_check_delete'])) {
    $title_check_delete = $_POST['title_check_delete'];

$ftbf_classlist = FtbfDBClasses::ftbfDbDelete($title_check_delete);


echo '<script>
setTimeout(delayAfterDelete, 1);
function delayAfterDelete() {
ftbfDeleteBlocks();
ftbfButtonClassesFunction();
}
</script>';
}

//Delete Member

if (isset($_POST['delete-member'])) {
    $delete_member = $_POST ['delete-member'];
    $member_delete = FtbfDBClasses::ftbfLoadMember($delete_member);
    require_once 'deleteMemberPop.php';

    echo '<script>
    setTimeout(activateBodyHide, 1);
    function activateBodyHide() {
    hideBody();
    }</script>';
}

if (isset($_POST['delete-id'])) {
    $delete_id = $_POST['delete-id'];
    $member_delete = FtbfDBClasses::ftbfCommunityDelete($delete_id);

    echo '<script>
    setTimeout(activateCommunityPop, 1);
    function activateCommunityPop() {
    popCommunity();
    }
    </script>';
}


//Update member

//Get member info for update

if (isset($_POST['update-member'])) {
    $update_member = $_POST['update-member'];
    $member_update = FtbfDBClasses::ftbfLoadMember($update_member);
    require_once 'updatePop.php';

    echo '<script>
    setTimeout(activateBodyHide, 1);
    function activateBodyHide() {
    hideBody();
    }</script>';
}

//Change member info

if (isset($_POST['update-id'])) {
    $finish_update = $_POST['update-id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    FtbfDBClasses::ftbfUpdateMember($finish_update, $firstname, $lastname, $email, $phone);

    echo '<script>
    setTimeout(activateCommunityPop, 1);
    function activateCommunityPop() {
    popCommunity();
    }
    </script>';
}

//Email member

//Get member info for e-mail

if (isset($_POST['email-member'])) {
    $member_email = $_POST['email-member'];
    $email_member = FtbfDBClasses::ftbfLoadMember($member_email);
    require_once 'emailPop.php';

    echo '<script>
    setTimeout(activateBodyHide, 1);
    function activateBodyHide() {
    hideBody();
    }</script>';
}

//Email member

if (isset($_POST['email-id'])) {
    $email = $_POST['email-id'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $actualEmail = sanitize_email($_POST['actualEmail']);

    $checkMail = wp_mail( $actualEmail , $subject, $message );
    
}

//Get class list


global $wpdb;
$class_titles_delete = $wpdb->get_results("SELECT class_title, class_id FROM wp_ftbf_classes");
foreach($class_titles_delete as $x) {
    $x = sanitize_text_field( $x );
}

global $wpdp;
$class_titles = $wpdb->get_results("SELECT class_title FROM wp_ftbf_classes");
foreach($class_titles as $x) {
    $x = sanitize_text_field( $x );
}



?>

<! -- Top Nav Button -->

<div id="ftbf-body">
    <img src="<?php echo get_template_directory_uri();?>/FTBFheaderlogo5.png" style="width: 300px; position: relative; left: -20px;">
<h1>Administration</h1>


<div id="ftbf-container-admin">
<div id="ftbf-buttonrow-admin">
<div id="ftbfButtonClasses" class="ftbf-button" onclick="ftbfButtonClassesFunction()">Events</div>
<div id="ftbfRevealCL" class="ftbf-button" onclick="ftbfRevealCL()">Community&nbsp;List</div>
</div>

<?php
global $wpdb;
$communityList = $wpdb->get_results("SELECT * FROM ftbf_contact");
?>

<div id="ftbf-switch-admin-panel-two">
    <div id="ftbf-list-row">
    <div>Name</div><div>e-mail</div><div>phone</div><div>free</div><div>pt</div><div>info</div><div>client</div><div>update</div><div>mail</div><div>delete</div>
</div>
<?php
for ($i=0; $i < count($communityList); $i++) { ?>
<div class="ftbf-community-row">
<div class="ftbf-community-fname"><?php echo sanitize_text_field($communityList[$i]->firstname) . " " . sanitize_text_field($communityList[$i]->lastname)?></div>

<div class="ftbf-community-email"><?php echo sanitize_text_field($communityList[$i]->email) ?></div>
<div class="ftbf-community-phone"><?php echo sanitize_text_field($communityList[$i]->phone) ?></div>

<?php if ($communityList[$i]->free == "free") { ?>
<div class="ftbf-community-free"><?php echo " &#10003"; ?></div> <?php }
else {echo '<div class="ftbf-community-free"> </div>';} ?>


<?php if ($communityList[$i]->pt == "pt") { ?>
<div class="ftbf-community-pt"><?php echo " &#10003"; ?></div> <?php } 
else {echo '<div class="ftbf-community-pt"> </div>';}?>


<?php if ($communityList[$i]->info == "info") { ?>
<div class="ftbf-community-info"><?php echo " &#10003"; ?></div> <?php } 
else {echo '<div class="ftbf-community-info"> </div>';}?>

<?php if ($communityList[$i]->client == "client") { ?>
<div class="ftbf-community-client"><?php echo " &#10003"; ?></div> <?php } 
else {echo '<div class="ftbf-community-client"> </div>';}?>

<div class="ftbf-community-update">
    <center>
<form method="post" action="#">
    <input type="hidden" name="update-member" value="<?php echo $communityList[$i]->contact_id ?>">
    <input type="submit" value="&#127803;">
</form>
</center>
</div>

<?php if (!empty($communityList[$i]->email)) { ?>

<div class="ftbf-community-email">
    <center>
<form method="post" action="#">
    <input type="hidden" name="email-member" value="<?php echo $communityList[$i]->contact_id ?>">
    <input type="submit" value="&#9993;" style="color: #AD0000; font-size: 1.1em">
</form>
</center>
</div>

<?php } else { ?>

    <div class="ftbf-community-email"></div> 

<?php } ?>



<div class="ftbf-community-x">
    <center>
<form method="post" action="#">
    <input type="hidden" name="delete-member" value="<?php echo $communityList[$i]->contact_id ?>">
    <input type="submit" value="&#10006;">
</form>
</center>
</div>

</div>

<?php } ?>

</div>

<div id="ftbf-switch-admin-panel">

<?php

if (isset($_POST['newNewClass'])) {
    $newNewClass = $_POST['newNewClass'];
    if ($newNewClass == "switched") {
        echo '<script>
setTimeout(ftbfEditClassContainerFunction, 1);
ftbfEditClassContainerFunction();
</script>';
    }
}

?>

<div id="ftbf-buttonrow-admin-two">
    <?php if (isset($_POST['title_check'])) {?>
    <form action="#" method="post">
        <input type="submit" class="ftbf-button-reverse" value="New Event" name="newClassSwitch">
        <input type="hidden" name="newNewClass" value="switched">
    </form>
    <?php 
} 

else { ?>
<div class="ftbf-button-reverse" onclick="ftbfEditClassContainerFunction()">New&nbsp;Event</div>
<?php } ?>
<div class="ftbf-button-reverse" onclick="ftbfListClassesContainerFunction()">Edit&nbsp;Events</div>
<div class="ftbf-button-reverse" onclick="ftbfDeleteBlocks()">Delete&nbsp;Event</div>

</div>
<! -- List Fitness Classes -->



<?php


echo '<div id="ftbf-delete-blocks">';
        for ($i = 0; $i < count($class_titles_delete); $i++) {
            echo '<div class="ftfb-class-title">';
            echo '<form method="post" action= "#">';
            echo '<input type="hidden" name="title_check_delete" value="' . sanitize_text_field($class_titles_delete[$i]->class_id) . '">';
            echo '<input type="submit" value="' . sanitize_text_field($class_titles_delete[$i]->class_title) . '"><br>';
            echo '<input type="submit" class="ftfb-delete-x" value="&#10006;&nbsp;delete">';
            echo '</form>';
            echo '</div>';
            }
            echo '</div>';
    
            echo '<div id="ftbf-update-blocks">';
        for ($i = 0; $i < count($class_titles); $i++) {
            
            echo '<div class="ftfb-class-title">';
            echo '<form method="post" action= "#">';
            echo '<input type="hidden" name="title_check" value="' . sanitize_text_field($class_titles[$i]->class_title) . '">';
            echo '<input type="submit" value="' . sanitize_text_field($class_titles[$i]->class_title) . '">';
            echo '</form>';
            echo '</div>';
            }
    echo '</div>';

?>


<! -- Edit Fitness Classes and Events -->
<div id="ftbf-edit-class-container">
    <?php if (isset($title_check)) { ?>
    <h1 style="margin-top: 10px;">Edit Event</h1>
    <?php }
    else { ?>
    <h1 style="margin-top: 10px;">New Event</h1>
    <?php } ?>

        <form method="post" action="#">
            <input type="hidden" name="action" <?php if (isset($ftbf_classlist)){
                echo 'value="update"';
            } ?>>
            <input type="hidden" name="ftbf-id" value="<?php if (isset($ftbf_classlist)){
                echo sanitize_text_field($ftbf_classlist[0]->class_id);
            }?>">

            <?php if (isset($ftbf_classlist) && $ftbf_classlist[0]->ftfb_events == "event") { ?>
            <select name="ftbf-events" id="ftbf-events-menu">
                <option value="event" selected>event</option>
                <option value="class">class</option>
        </select>
        <?php } 

 elseif (isset($ftbf_classlist) && $ftbf_classlist[0]->ftfb_events == "class") { ?>
            <select name="ftbf-events" id="ftbf-events-menu">
                <option value="event">event</option>
                <option value="class" selected>class</option>
        </select>
        <?php }

        else { ?>

<select name="ftbf-events" id="ftbf-events-menu">
                <option value="event">event</option>
                <option value="class">class</option>
        </select>

<?php  } ?>


            <input type="text" name="ftbf-class-title" <?php 
            if (isset($ftbf_classlist)) { echo 'value="' . sanitize_text_field($ftbf_classlist[0]->class_title) . '"'; } 
            else { echo ' value="Title" ';}
            ?>>
            <input type="text" name="ftbf-class-link" <?php 
            if ( isset($ftbf_classlist[0]->link) && $ftbf_classlist[0]->link != null ) { echo 'value="' . esc_url($ftbf_classlist[0]->link) . '"'; } 
            else { echo ' value="Link" ';}
            ?>>
            <input type="text" name="ftbf-class-day" <?php 
            if (isset($ftbf_classlist)) { echo 'value="' . sanitize_text_field($ftbf_classlist[0]->class_day) . '"'; } 
            else { echo ' value="Day/Date" ';}
            ?>>
            <label>Start Time</label>
            <input type="time" name="ftbf-start-time" 
            <?php 
            if (isset($ftbf_classlist)) { echo 'value="' . sanitize_text_field($ftbf_classlist[0]->start_time) . '"'; } 
            else { echo ' value="Start Time" ';}
            ?>>
            <label>End Time</label>
            <input type="time" name="ftbf-end-time"
            <?php 
            if (isset($ftbf_classlist)) { echo 'value="' . sanitize_text_field($ftbf_classlist[0]->end_time) . '"'; } 
            else { echo ' value="End Time" ';}
            ?>>
            <input type="text" name="ftbf-instructor"
            
            <?php 
            if (isset($ftbf_classlist)) { echo 'value="' . sanitize_text_field($ftbf_classlist[0]->class_instructor) . '"'; } 
            else { echo ' value="Instructor" ';}
            ?>>
            <textarea name="ftbf-class-description" rows="15" cols="80"><?php 
            if (isset($ftbf_classlist)) { echo sanitize_textarea_field($ftbf_classlist[0]->class_description) . '</textarea>'; } 
            else { echo 'Class Description!</textarea>';}
            ?>
    
            <input type="submit" value="Save">
  
</form>
</div>
</div>
</div>







