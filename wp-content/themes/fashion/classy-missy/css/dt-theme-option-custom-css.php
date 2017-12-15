<?php
/* ---------------------------------------------------------------------------
 * Custom CSS from THeme option panel
 * --------------------------------------------------------------------------- */

if ( ! defined( 'ABSPATH' ) ) exit;

if( ($custom_css = classymissy_option('layout','customcss-content')) &&  classymissy_option('layout','enable-customcss')){
	echo stripcslashes( $custom_css )."\n";
}?>