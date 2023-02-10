<!-- this is the place where we can override wordpress functionality -->
<?php

function samplesite_themesupport(){
    // This add dynamic title tag support - wordpress will manage the title tags itself. 
    add_theme_support('title-tag');
}

add_action('after_setup_theme', "samplesite_themesupport");


// Within wordpress you can set up menu locations (footer/menu/mobile placement/etc)
// This will add menu option to the wordpress back end where you can create the menus within wordpress itself
function samplesite_menus(){

    $locations = array(
        'primary' => "Desktop Primary Left Sidebar", 
        'footer' => "General Footer Menu", 
    );
    // register all of our established menu locations
    register_nav_menus($locations);
}


add_action('init', 'samplesite_menus');


function samplesite_registerstyles(){

    $version = wp_get_theme()->get( 'Version');
    wp_enqueue_style('samplesite-style', get_template_directory_uri() . "/style.css", array('samplesite-bootstrap'), $version, 'all');
    wp_enqueue_style('samplesite-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('samplesite-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.12.0', 'all');
}

add_action('wp_enqueue_scripts', 'samplesite_registerstyles');

function samplesite_registerscripts(){
    $version = wp_get_theme()->get( 'Version');

    wp_enqueue_script('samplesite-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('samplesite-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.1', true);
    wp_enqueue_script('samplesite-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script('samplesite-main', get_template_directory_uri() . "/assets/js/main.js", array(), $version, true);

}

add_action('wp_enqueue_scripts', 'samplesite_registerscripts');


?>