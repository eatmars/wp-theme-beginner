<?php
function julia_enqueue_styles() {
    wp_enqueue_style( 'julia-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'julia-child-style', get_stylesheet_uri(), array( 'julia-parent-style' ) );
}
add_action( 'wp_enqueue_scripts', 'julia_enqueue_styles' );
/* ------------------------------------------------------------------------
Please don't remove above code 
-----------------------------------------------------------------------------*/
/* 
function globel_remove_scrips(){
    wp_deregister_script('jquery-custom');
	wp_enqueue_script('child-query-custom', get_stylesheet_directory_uri() .'/js/query-custom.php',array(),'', true);
}
add_action('wp_enqueue_scripts', 'globel_remove_scrips');
*/
?>