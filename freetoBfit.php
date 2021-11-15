<?php


/**
* Plugin Name: freetoBfit
*/


// add main admin page and menu links for main admin page

function mtry_admin_page_add() {
add_menu_page( 'freetoBfitAdmin', 'freetoBfit', 'administrator', 'adminpage', 'mtry_add_adminpage_file');
}
add_action ( 'admin_menu', 'mtry_admin_page_add');

function mtry_add_adminpage_file() {
    require_once dirname(__FILE__) . "/adminpage/adminpage.php";
}

add_action('admin_bar_menu', 'add_toolbar_items', 100);
function add_toolbar_items($admin_bar){
    $admin_bar->add_menu( array(
        'id'    => 'my-item',
        'title' => 'freetoBfit',
        'href'  => 'https://freetobfit.com/wp-admin/admin.php?page=adminpage'        
        )
    );
}

//Load loader
require_once dirname(__FILE__) . "/freetoBfit_loads/freetoBfit_loads.php";

//Loader

freetoBfitLoads::load();

//Load Scripts

function ftbLoadScripts($hook) {

    if ( $hook == 'toplevel_page_adminpage' ) {
    wp_enqueue_style( 'freetoBfitAdmin' , plugin_dir_url( __FILE__ ) . '/css/freetoBfit_admin.css');
}}

add_action( 'admin_enqueue_scripts', 'ftbLoadScripts');

function ftbfLoadJs($hook) {
    if ( $hook == 'toplevel_page_adminpage') {
    wp_enqueue_script( 'ftbf-main' , plugin_dir_url( __FILE__ ) . '/js/ftbf_main.js' );
    }
}

add_action( 'admin_enqueue_scripts', 'ftbfLoadJs');

//Change email settings to SMTP



    







