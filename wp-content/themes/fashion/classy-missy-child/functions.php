<?php
add_action( 'wp_enqueue_scripts', 'classymissy_child_enqueue_styles');
function classymissy_child_enqueue_styles() {
	
	wp_enqueue_style( 'classy-missy-parent', get_template_directory_uri().'/style.css', false, null, 'all' );
}