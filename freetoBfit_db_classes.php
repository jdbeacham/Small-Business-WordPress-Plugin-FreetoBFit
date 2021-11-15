<?php

//Database Functions

class FtbfDBClasses {

    //Insert new class info

    static function dbInsert($event, $title, $day, $start_time, $end_time, $instructor, $description, $link) {

        global $wpdb;
        
            $wpdb->insert('wp_ftbf_classes', array(
            'ftfb_events' => $event,
            'class_title' => $title,
            'class_day' => $day,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'class_instructor' => $instructor,
            'class_description' => $description,
            'link' => $link
        ));
    
    }

    //Update class info

    static function dbUpdate($id, $event, $title, $day, $start_time, $end_time, $instructor, $description, $link) {

        global $wpdb;

        $wpdb->update('wp_ftbf_classes', array(
            'ftfb_events' => $event,
            'class_title' => $title,
            'class_day' => $day,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'class_instructor' => $instructor,
            'class_description' => $description,
            'link' => $link),
        array( 
            'class_id' => $id)
    );
    }

    //Load member info
 
    static function ftbfLoadMember($get_member) {
    
    global $wpdb;

    $query = $wpdb->prepare("SELECT * FROM ftbf_contact WHERE contact_id = %d", $get_member);
    $memberinfos = $wpdb->get_results( $query );
    return $memberinfos;
    }
    
    //Update member info
 
    static function ftbfUpdateMember($updateThisMemberYo, $firstname, $lastname, $email, $phone) {

    global $wpdb;

    $wpdb->update('ftbf_contact', array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'phone' => $phone,
    ), array (
        'contact_id' => $updateThisMemberYo
    )
);


    }

    //DB deletes

    static function ftbfDbDelete($mojo_elvis) {

        global $wpdb;
        $wpdb->delete('wp_ftbf_classes', array(
            'class_id' => $mojo_elvis)
        );

    }

    static function ftbfCommunityDelete($member_delete) {

        global $wpdb;
        $wpdb->delete('ftbf_contact', array(
            'contact_id' => $member_delete)
        );

    }


    //Load Class Info for Edit

    static function dbLoadClassInfo($title_check) {

        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM wp_ftbf_classes WHERE class_title = %s", $title_check);
        $class_infos = $wpdb->get_results( $query );
        return $class_infos;
    }
}


?>