<?php

function ftbf_signup_shortcode() {
    ob_start();

    

    ?>
        <div id="ftbf-signup-body">
        <div id="ftbf-signup-container">
        <div id="ftbf-signup-title">Sign-up with FreetoBFit</div>
        <form action="https://freetobfit.com/wp-admin/admin-post.php" method="post" id="ftbf-signup-form-container">
        <input type="text" name="firstname" placeholder="First Name" class="ftbf-signup-fields">
        <input type="text" name="lastname" placeholder="Last Name" class="ftbf-signup-fields">
        <input type="text" name="email" placeholder="E-mail" class="ftbf-signup-fields">
        <input type="text" name="phone" placeholder="Phone #" class="ftbf-signup-fields">
        <input type="checkbox" name="free" valuer="free" class="ftbf-checkboxes">
        <label class="ftbf-form-label">I am interested in a free class</label><br>
        <input type="checkbox" name="pt" value="pt" class="ftbf-checkboxes">
        <label class="ftbf-form-label">I am interested in personal training</label><br>
        <input type="checkbox" name="info" value="info" class="ftbf-checkboxes">
        <label class="ftbf-form-label">I am want more info about what FreetoBFit has to offer</label><br>
        <input type="checkbox" name="client" value="client" class="ftbf-checkboxes">
        <label class="ftbf-form-label">I am already a client</label><br>
        <input type="submit" value="Join the Movement!" id="ftbf-signup-button">
        <input type="hidden" name="action" value="ftbf_signup">
        <input type="hidden" name="data" value="ftbf_data">
        </form>
        </div>
        </div>








    <?php
    $myTryContent = ob_get_contents();
    ob_end_clean();
    return $myTryContent;
}

add_shortcode( 'sign-up', 'ftbf_signup_shortcode' );
?>