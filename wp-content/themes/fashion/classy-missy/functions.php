<?php
/**
 * Theme Functions
 *
 * @package DTtheme
 * @author DesignThemes
 * @link http://wedesignthemes.com
 */

define( 'CLASSYMISSY_THEME_DIR', get_template_directory() );
define( 'CLASSYMISSY_THEME_URI', get_template_directory_uri() );
define( 'CLASSYMISSY_CORE_PLUGIN', WP_PLUGIN_DIR.'/designthemes-core-features' );
define( 'CLASSYMISSY_SETTINGS', 'classymissy-opts' );
global $classymissyoptions;
$classymissyoptions = get_option(CLASSYMISSY_SETTINGS);

if (function_exists ('wp_get_theme')) :
	$themeData = wp_get_theme();
	define( 'THEME_NAME', $themeData->get('Name'));
	define( 'THEME_VERSION', $themeData->get('Version'));
endif;

define( 'CLASSYMISSY_LANG_DIR', CLASSYMISSY_THEME_DIR. '/languages' );

/* ---------------------------------------------------------------------------
 * Loads Theme Textdomain
 * ---------------------------------------------------------------------------*/ 
load_theme_textdomain( 'classy-missy', CLASSYMISSY_LANG_DIR );

/* ---------------------------------------------------------------------------
 * Loads the Admin Panel Scripts
 * ---------------------------------------------------------------------------*/
function classymissy_admin_scripts() {

	wp_enqueue_style('classy-missy-admin', CLASSYMISSY_THEME_URI .'/framework/theme-options/style.css');
	wp_enqueue_style('chosen', CLASSYMISSY_THEME_URI .'/framework/theme-options/css/chosen.css');
	wp_enqueue_style('wp-color-picker');

	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-slider');
	wp_enqueue_script('wp-color-picker');
	
	wp_enqueue_script('jquery-tools', CLASSYMISSY_THEME_URI . '/framework/theme-options/js/jquery.tools.min.js');
	wp_enqueue_script('jquery-chosen', CLASSYMISSY_THEME_URI . '/framework/theme-options/js/chosen.jquery.min.js');
	wp_enqueue_script('classymissy-dttheme', CLASSYMISSY_THEME_URI . '/framework/theme-options/js/dttheme.admin.js');
	wp_enqueue_media();

	wp_localize_script('classymissy-dttheme', 'objectL10n', array(
		'saveall' => esc_html__('Save All', 'classy-missy'),
		'saving' => esc_html__('Saving ...', 'classy-missy'),
		'noResult' => esc_html__('No Results Found!', 'classy-missy'),
		'resetConfirm' => esc_html__('This will restore all of your options to default. Are you sure?', 'classy-missy'),
		'importConfirm' => esc_html__('You are going to import the dummy data provided with the theme, kindly confirm?', 'classy-missy'),
		'backupMsg' => esc_html__('Click OK to backup your current saved options.', 'classy-missy'),
		'backupSuccess' => esc_html__('Your options are backuped successfully', 'classy-missy'),
		'backupFailure' => esc_html__('Backup Process not working', 'classy-missy'),
		'disableImportMsg' => esc_html__('Importing is disabled.. :), Please select atleast import type','classy-missy'),
		'restoreMsg' => esc_html__('Warning: All of your current options will be replaced with the data from your last backup! Proceed?', 'classy-missy'),
		'restoreSuccess' => esc_html__('Your options are restored from previous backup successfully', 'classy-missy'),
		'restoreFailure' => esc_html__('Restore Process not working', 'classy-missy'),
		'importMsg' => esc_html__('Click ok import options from the above textarea', 'classy-missy'),
		'importSuccess' => esc_html__('Your options are imported successfully', 'classy-missy'),
		'importFailure' => esc_html__('Import Process not working', 'classy-missy')));
}
add_action( 'admin_enqueue_scripts', 'classymissy_admin_scripts' );

/* ---------------------------------------------------------------------------
 * Loads the Options Panel
 * ---------------------------------------------------------------------------*/ 
require_once( CLASSYMISSY_THEME_DIR .'/framework/utils.php' );
require_once( CLASSYMISSY_THEME_DIR .'/framework/fonts.php' );
require_once( CLASSYMISSY_THEME_DIR .'/framework/theme-options/init.php' );

/* ---------------------------------------------------------------------------
 * Loads Theme Functions
 * ---------------------------------------------------------------------------*/ 

// Functions --------------------------------------------------------------------
require_once( CLASSYMISSY_THEME_DIR .'/framework/register-functions.php' );

// Header -----------------------------------------------------------------------
require_once( CLASSYMISSY_THEME_DIR .'/framework/register-head.php' );

// Meta box ---------------------------------------------------------------------
require_once( CLASSYMISSY_THEME_DIR .'/framework/theme-metaboxes/post-metabox.php' );
require_once( CLASSYMISSY_THEME_DIR .'/framework/theme-metaboxes/page-metabox.php' );

// Tribe Events -----------------------------------------------------------------
if ( class_exists( 'Tribe__Events__Main' ) )
	require_once( CLASSYMISSY_THEME_DIR .'/framework/theme-metaboxes/event-metabox.php' );

// Menu -------------------------------------------------------------------------
require_once( CLASSYMISSY_THEME_DIR .'/framework/register-menu.php' );
require_once( CLASSYMISSY_THEME_DIR .'/framework/register-mega-menu.php' );

// Hooks ------------------------------------------------------------------------
require_once( CLASSYMISSY_THEME_DIR .'/framework/register-hooks.php' );

// Likes ------------------------------------------------------------------------
require_once( CLASSYMISSY_THEME_DIR .'/framework/register-likes.php' );

// Widgets ----------------------------------------------------------------------
add_action( 'widgets_init', 'classymissy_widgets_init' );
function classymissy_widgets_init() {
	require_once( CLASSYMISSY_THEME_DIR .'/framework/register-widgets.php' );

	if(class_exists('DTCorePlugin')) {
		register_widget('ClassyMissy_Twitter');
	}

	register_widget('ClassyMissy_Flickr');
	register_widget('ClassyMissy_Recent_Posts');
	register_widget('ClassyMissy_Portfolio_Widget');
}
if(class_exists('DTCorePlugin')) {
	require_once( CLASSYMISSY_THEME_DIR .'/framework/widgets/widget-twitter.php' );
}
require_once( CLASSYMISSY_THEME_DIR .'/framework/widgets/widget-flickr.php' );
require_once( CLASSYMISSY_THEME_DIR .'/framework/widgets/widget-recent-posts.php' );
require_once( CLASSYMISSY_THEME_DIR .'/framework/widgets/widget-recent-portfolios.php' );

// Plugins ---------------------------------------------------------------------- 
require_once( CLASSYMISSY_THEME_DIR .'/framework/register-plugins.php' );

// WooCommerce ------------------------------------------------------------------
if( function_exists( 'is_woocommerce' ) ){
	require_once( CLASSYMISSY_THEME_DIR .'/framework/register-woocommerce.php' );
} ?>