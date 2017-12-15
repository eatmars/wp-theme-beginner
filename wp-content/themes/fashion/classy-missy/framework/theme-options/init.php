<?php
/* ---------------------------------------------------------------------------
 * Create menu for theme options panel
 * --------------------------------------------------------------------------- */
function classymissy_create_admin_menu() {
	/**
	 * Creates main options page.
	*/
	add_theme_page( THEME_NAME . esc_html__(' Theme Options', 'classy-missy'), THEME_NAME . esc_html__(' Options', 'classy-missy'), 'manage_options', 'classymissy-opts', 'classymissy_options_page'	);
}
add_action('admin_menu', 'classymissy_create_admin_menu');
require_once(CLASSYMISSY_THEME_DIR . '/framework/theme-options/settings.php');

/* ---------------------------------------------------------------------------
 * Create function to init classy missy options
 * --------------------------------------------------------------------------- */
add_action('admin_init', 'classymissy_admin_options_init', 1);
function classymissy_admin_options_init() {
	register_setting(CLASSYMISSY_SETTINGS, CLASSYMISSY_SETTINGS);
	add_option(CLASSYMISSY_SETTINGS, classymissy_default_option());

	if (isset($_POST['dttheme-option-save'])) :
		classymissy_ajax_option_save();
	endif;

	if (isset($_POST['dttheme']['reset'])) :
		delete_option(CLASSYMISSY_SETTINGS);
		update_option(CLASSYMISSY_SETTINGS, classymissy_default_option()); # To set Default options
		wp_redirect(admin_url('admin.php?page=parent&reset=true'));
		exit;
	endif;
}

function classymissy_ajax_option_save() {
	$data = $_POST;
	check_ajax_referer('dttheme_wpnonce', 'dttheme_admin_wpnonce');

	unset($data['_wp_http_referer'], $data['_wpnonce'], $data['action']);
	unset($data['dttheme_admin_wpnonce'], $data['dttheme-option-save'], $data['option_page']);

	$msg = array(
		'success' => false, 
		'message' => esc_html__('Error: Options not saved, please try again.', 'classy-missy')
	);

	$data = array_filter($data['dttheme']);

	if (get_option(CLASSYMISSY_SETTINGS) != $data) {
		if (update_option(CLASSYMISSY_SETTINGS, $data))
			$msg = array(
				'success' => 'options_saved',
				'message' => esc_html__('Options Saved.', 'classy-missy')
			);
	} else {
		$msg = array(
			'success' => true,
			'message' => esc_html__('Options Saved.', 'classy-missy')
		);
	}

	$echo = json_encode($msg);
	@header('Content-Type: application/json; charset='.get_option('blog_charset'));
	echo ($echo);
	exit;
}

/* ---------------------------------------------------------------------------
 * Backup And Restore theme options
 * --------------------------------------------------------------------------- */
add_action('wp_ajax_classymissy_backup_and_restore_action', 'classymissy_backup_and_restore_action');
function classymissy_backup_and_restore_action() {
	
	$save_type = $_REQUEST['type'];
	
	if ($save_type == 'backup_options') :
	
		$data = array(
			'general' => classymissy_option('general'),
			'layout' => classymissy_option('layout'),
			'social' => classymissy_option('social'),
			'pageoptions' => classymissy_option('pageoptions'),
			'woo' => classymissy_option('woo'),
			'colors' => classymissy_option('colors'),
			'fonts' => classymissy_option('fonts'),
			'backup' => date('r')
		);
		
		update_option("dt_theme_backup", $data);
		die('1');
	elseif ($save_type == 'restore_options') :
		$data = get_option("dt_theme_backup");
		update_option(CLASSYMISSY_SETTINGS, $data);
		die('1');
	elseif ($save_type == "import_options") :
		$data = $_REQUEST['data'];
		$data =  unserialize( stripcslashes($data) );
		update_option(CLASSYMISSY_SETTINGS, $data);
		die('1');
	elseif( $save_type == "reset_options") :
		delete_option(CLASSYMISSY_SETTINGS);
		update_option(CLASSYMISSY_SETTINGS, classymissy_default_option()); #To set Default options
		die('1');
	endif;
}

/* ---------------------------------------------------------------------------
 * Create function to get theme options
 * --------------------------------------------------------------------------- */
function classymissy_option($key1, $key2 = '') {
	global $classymissyoptions;

	$options = $classymissyoptions;
	$output = NULL;

	if (is_array ( $options )) {

		if (array_key_exists ( $key1, $options )) {
			$output = $options [$key1];
			if (is_array ( $output ) && ! empty ( $key2 )) {
				$output = (array_key_exists ( $key2, $output ) && (! empty ( $output [$key2] ))) ? $output [$key2] : NULL;
			}
		} else {
			$output = $output;
		}
	}
	return $output;
}

/* ---------------------------------------------------------------------------
 * Create admin panel image preview
 * --------------------------------------------------------------------------- */
function classymissy_adminpanel_image_preview($src, $backend = true, $default = "no-image.jpg") {
	$default = ($backend) ? CLASSYMISSY_THEME_URI . "/framework/theme-options/images/" . $default : CLASSYMISSY_THEME_URI . "/images/" . $default;
	$src = ! empty ( $src ) ? $src : $default;
	$output = "<div class='bpanel-option-help'>\n";
	$output .= "<a href='' title='' class='a_image_preivew'> <img src='" . CLASSYMISSY_THEME_URI . "/framework/theme-options/images/image-preview.png' alt='img' /> </a>\n";
	$output .= "\r<div class='bpanel-option-help-tooltip imagepreview'>\n";
	$output .= "\r<img src='{$src}' data-default='{$default}'/>";
	$output .= "\r</div>\n";
	$output .= "</div>\n";
	echo ($output);
}

/* ---------------------------------------------------------------------------
 * Types of Background option available
 * --------------------------------------------------------------------------- */
function classymissy_bgtypes($name, $parent, $child) {
	$args = array (
		"bg-patterns" => esc_html__ ( "Pattern", 'classy-missy' ),
		"bg-custom" => esc_html__ ( "Custom Background", 'classy-missy' ),
		"bg-none" => esc_html__ ( "None", 'classy-missy' ) 
	);
	$out = '<div class="bpanel-option-set">';
	$out .= "<label>" . esc_html__ ( "Background Type", 'classy-missy' ) . "</label>";
	$out .= "<div class='clear'></div>";
	$out .= "<select class='bg-type dt-chosen-select' name='{$name}'>";
	foreach ( $args as $k => $v ) :
		$rs = selected ( $k, classymissy_option ( $parent, $child ), false );
		$out .= "<option value='{$k}' {$rs}>{$v}</option>";
	endforeach;
	$out .= "</select>";
	$out .= '</div>';
	echo ($out);
}

/* ---------------------------------------------------------------------------
 * Getting color picker for color option
 * --------------------------------------------------------------------------- */
function classymissy_admin_color_picker($label, $name, $value, $tooltip = NULL) {
	$output = "<div class='bpanel-option-set'>\n";
	if (! empty ( $label )) :
		$output .= "<label>{$label}</label>";
		$output .= "<div class='hr_invisible'></div><div class='clear'></div>";
	endif;
	
	$output .= "<input type='text' class='my-color-field medium' name='{$name}' value='{$value}' />";

	echo ($output);
	if ($tooltip != NULL)
		classymissy_adminpanel_tooltip ( $tooltip );

	echo "</div>\n";
}

/* ---------------------------------------------------------------------------
 * Getting color picker for color option
 * --------------------------------------------------------------------------- */
function classymissy_adminpanel_tooltip($tooltip) {
	$output = "<div class='bpanel-option-help'>\n";
	$output .= "<a href='' title=''> <img src='" . CLASSYMISSY_THEME_URI . "/framework/theme-options/images/help.png' alt='' title='' /> </a>\n";
	$output .= "\r<div class='bpanel-option-help-tooltip'>\n";
	$output .= $tooltip;
	$output .= "\r</div>\n";
	$output .= "</div>\n";
	echo ($output);
}

/* ---------------------------------------------------------------------------
 * Getting color picker for color option
 * --------------------------------------------------------------------------- */
function classymissy_admin_color_picker_two($name, $value) {
	echo "<input type='text' class='my-color-field small' name='{$name}' value='{$value}' />";
}

/* ---------------------------------------------------------------------------
 * Getting jquery ui slider
 * --------------------------------------------------------------------------- */
function classymissy_admin_jqueryuislider($label, $id = '', $value = '', $px = "px") {
	$div_value = (! empty ( $value ) && ($px == "px")) ? $value . "px" : $value;
	$output = "<label>{$label}</label>";
	$output .= "<div class='clear'></div>";
	$output .= "<div id='{$id}' class='dttheme-slider' data-for='{$px}'></div>";
	$output .= "<input type='hidden' class='' name='{$id}' value='{$value}'/>";
	$output .= "<div class='dttheme-slider-txt'>{$div_value}</div>";
	echo ($output);
}

/* ---------------------------------------------------------------------------
 * Getting theme switch button
 * --------------------------------------------------------------------------- */
function classymissy_switch($label, $parent, $name) {
	$checked = ("true" == classymissy_option ( $parent, $name )) ? ' checked="checked"' : '';
	$switchclass = ("true" == classymissy_option ( $parent, $name )) ? 'checkbox-switch-on' : 'checkbox-switch-off';
	$out = "<div data-for='dttheme-{$parent}-{$name}' class='checkbox-switch {$switchclass}'></div>";
	$out .= "<input id='dttheme-{$parent}-{$name}' class='hidden' name='dttheme[{$parent}][{$name}]' type='checkbox' value='true' {$checked} />";
	echo ($out);
}

/* ---------------------------------------------------------------------------
 * Return List of social icons
 * --------------------------------------------------------------------------- */
function classymissy_listSocial() {
	$sociables = array('fa-dribbble' => 'Dribble', 'fa-flickr' => 'Flickr', 'fa-github' => 'GitHub', 'fa-pinterest' => 'Pinterest', 'fa-stack-overflow' => 'Stack Overflow', 'fa-twitter' => 'Twitter', 'fa-youtube' => 'YouTube', 'fa-android' => 'Android', 'fa-dropbox' => 'Dropbox', 'fa-instagram' => 'Instagram', 'fa-windows' => 'Windows', 'fa-apple' => 'Apple', 'fa-facebook' => 'Facebook', 'fa-google-plus' => 'Google Plus', 'fa-linkedin' => 'LinkedIn', 'fa-skype' => 'Skype', 'fa-tumblr' => 'Tumblr', 'fa-vimeo-square' => 'Vimeo');
	
	return $sociables;
}

/* ---------------------------------------------------------------------------
 * Getting theme sociable selection box
 * --------------------------------------------------------------------------- */
function classymissy_sociables_selection($name = '', $selected = "") {
	$sociables = classymissy_listSocial();

	$name = ! empty ( $name ) ? "name='dttheme[social][{$name}][icon]'" : '';
	$out = "<select class='social-select' {$name}>"; // name attribute will be added to this by jQuery menuAdd()
	foreach ( $sociables as $key => $value ) :
		$s = selected ( $key, $selected, false );
		$v = ucwords ( $value );
		$out .= "<option value='{$key}' {$s} >{$v}</option>";
	endforeach;
	$out .= "</select>";

	return $out;
}

/* ---------------------------------------------------------------------------
 * Add new mimes to use custom font upload
 * --------------------------------------------------------------------------- */
add_filter('upload_mimes', 'classymissy_upload_mimes');
function classymissy_upload_mimes( $existing_mimes = array() ){
	$existing_mimes['woff'] = 'font/woff';
	$existing_mimes['ttf'] 	= 'font/ttf';
	$existing_mimes['svg'] 	= 'font/svg';
	$existing_mimes['eot'] 	= 'font/eot';
	return $existing_mimes;
} ?>