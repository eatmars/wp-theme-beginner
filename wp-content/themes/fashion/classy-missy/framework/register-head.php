<?php
/* ---------------------------------------------------------------------------
 * Loading Theme Scripts
 * --------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'classymissy_enqueue_scripts');
function classymissy_enqueue_scripts() {

	// comment reply script ------------------------------------------------------
	if (is_singular() AND comments_open()):
		 wp_enqueue_script( 'comment-reply' );
	endif;

	// scipts variable -----------------------------------------------------------
	$stickynav = ( classymissy_option("layout","layout-stickynav") ) ? "enable" : "disable";
	$loadingbar = ( classymissy_option("general","enable-loader") ) ? "enable" : "disable";
	$nicescroll = ( classymissy_option("general","enable-nicescroll") ) ? "enable" : "disable";
	if(is_rtl()) $rtl = true; else $rtl = false;

	$htype = classymissy_option('layout','header-type');
	$stickyele = "";
	switch( $htype ){
		case 'fullwidth-header':
		case 'boxed-header':
		case 'split-header fullwidth-header':
		case 'split-header boxed-header':
		case 'two-color-header':
			$stickyele = ".main-header-wrapper";
		break;
			
		case 'fullwidth-header header-align-center fullwidth-menu-header':
		case 'fullwidth-header header-align-left fullwidth-menu-header':
		case 'fullwidth-header header-align-left fullwidth-menu-header extended-menu-header':
			$stickyele = ".menu-wrapper";
		break;

		case 'left-header':
		case 'left-header-boxed':
		case 'creative-header':
		case 'overlay-header':
			$stickyele = ".menu-wrapper";
			$stickynav = "disable";
		break;
	}

	wp_enqueue_script('ui.totop', 				get_theme_file_uri('/framework/js/jquery.ui.totop.min.js'), array(), false, true);
	wp_enqueue_script('classymissy.jqplugins',	get_theme_file_uri('/framework/js/jquery.plugins.js'), array(), false, true);
	wp_enqueue_script('visualNav',				get_theme_file_uri('/framework/js/jquery.visualNav.min.js'), array(), false, true);

	if( $loadingbar == 'enable' ) {
		wp_enqueue_script('pace', get_theme_file_uri('/framework/js/pace.min.js'),array(),false,true);
		wp_localize_script('pace', 'paceOptions', array(
			'restartOnRequestAfter' => 'false',
			'restartOnPushState' => 'false'
		));
	}
	
	$depends = array( 'jquery' );

	if( function_exists( 'is_woocommerce' ) ) {
		
		wp_enqueue_script( 'wc-add-to-cart-variation' );
		$depends = array( 'jquery',  'wc-add-to-cart-variation' );		
	}

	wp_enqueue_script('classymissy.jqcustom', get_theme_file_uri('/framework/js/custom.js'), $depends, false, true);	

	wp_localize_script('classymissy.jqplugins', 'dttheme_urls', array(
		'theme_base_url' => esc_js(CLASSYMISSY_THEME_URI),
		'framework_base_url' => esc_js(CLASSYMISSY_THEME_URI).'/framework/',
		'ajaxurl' => admin_url('admin-ajax.php'),
		'url' => get_site_url(),
		'stickynav' => esc_js($stickynav),
		'stickyele' => esc_js($stickyele),
		'isRTL' => esc_js($rtl),
		'loadingbar' => esc_js($loadingbar),
		'nicescroll' => esc_js($nicescroll)
	));
	
	$picker = classymissy_option('general', 'enable-stylepicker');
	if( isset($picker) ) {
		wp_enqueue_script('cookie', 				get_theme_file_uri('/framework/js/jquery.cookie.min.js'),array(),false,true);
		wp_enqueue_script('classymissy.jqcpanel',	get_theme_file_uri('/framework/js/controlpanel.js'),array(),false,true);
	}
}

/* ---------------------------------------------------------------------------
 * Meta tag for viewport scale
* --------------------------------------------------------------------------- */
function classymissy_viewport() {
	if(classymissy_option('general', 'enable-responsive')){
		echo "<meta name='viewport' content='width=device-width, initial-scale=1'>\r";
	}
}

/* ---------------------------------------------------------------------------
 * Scripts of Custom JS from Theme Back-End
* --------------------------------------------------------------------------- */
function classymissy_scripts_custom() {
	if( ($custom_js = classymissy_option('layout', 'customjs-content')) && classymissy_option('layout','enable-customjs') ){
		wp_add_inline_script('classymissy.jqcustom', classymissy_wp_kses(stripslashes($custom_js)) ,'after');
	}
}
add_action('wp_enqueue_scripts', 'classymissy_scripts_custom', 100);

/* ---------------------------------------------------------------------------
 * Loading Theme Styles
 * --------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'classymissy_enqueue_styles', 100 );
function classymissy_enqueue_styles() {

	$layout_opts = classymissy_option('layout');
	$general_opts = classymissy_option('general');
	$colors_opts = classymissy_option('colors');
	$pageopt_opts = classymissy_option('pageoptions');

	// site icons ---------------------------------------------------------------
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ):
		$url = ! empty ( $layout_opts ['favicon-url'] ) ? $layout_opts ['favicon-url'] : CLASSYMISSY_THEME_URI . "/images/favicon.ico";
		echo "<link href='$url' rel='shortcut icon' type='image/x-icon' />\n";
	
		$phone_url = ! empty ( $layout_opts ['apple-favicon'] ) ? $layout_opts ['apple-favicon'] : CLASSYMISSY_THEME_URI . "/images/apple-touch-icon.png";
		echo "<link href='$phone_url' rel='apple-touch-icon'/>\n";
	
		$phone_retina_url = ! empty ( $layout_opts ['apple-retina-favicon'] ) ? $layout_opts ['apple-retina-favicon'] : CLASSYMISSY_THEME_URI. "/images/apple-touch-icon-114x114.png";
		echo "<link href='$phone_retina_url' sizes='114x114' rel='apple-touch-icon'/>\n";
	
		$ipad_url = ! empty ( $layout_opts ['apple-ipad-favicon'] ) ? $layout_opts ['apple-ipad-favicon'] : CLASSYMISSY_THEME_URI . "/images/apple-touch-icon-72x72.png";
		echo "<link href='$ipad_url' sizes='72x72' rel='apple-touch-icon'/>\n";
	
		$ipad_retina_url = ! empty ( $layout_opts ['apple-ipad-retina-favicon'] ) ? $layout_opts ['apple-ipad-retina-favicon'] : CLASSYMISSY_THEME_URI . "/images/apple-touch-icon-144x144.png";
		echo "<link href='$ipad_retina_url' sizes='144x144' rel='apple-touch-icon'/>\n";
	endif;

	// wp_enqueue_style ---------------------------------------------------------------
	wp_enqueue_style( 'classy-missy', get_stylesheet_uri(), false, THEME_VERSION, 'all' );
	
	wp_enqueue_style( 'classy-missy-base',			get_theme_file_uri('/css/base.css'), false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'classy-missy-grid',			get_theme_file_uri('/css/grid.css'), false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'classy-missy-widgets',		get_theme_file_uri('/css/widget.css'), false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'classy-missy-layout',		get_theme_file_uri('/css/layout.css'), false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'classy-missy-blog',			get_theme_file_uri('/css/blog.css'), false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'classy-missy-portfolio',		get_theme_file_uri('/css/portfolio.css'), false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'classy-missy-contact',		get_theme_file_uri('/css/contact.css'), false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'classy-missy-customclass',	get_theme_file_uri('/css/custom-class.css'), false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'classy-missy-browsers',		get_theme_file_uri('/css/browser.css'), false, THEME_VERSION, 'all' );
	
	wp_enqueue_style( 'prettyphoto',	get_theme_file_uri('/css/prettyPhoto.css'), false, THEME_VERSION, 'all' );
	
	if (function_exists('bp_add_cover_image_inline_css')) {
		$inline_css = bp_add_cover_image_inline_css( true );
		wp_add_inline_style( 'bp-parent-css', strip_tags( $inline_css['css_rules'] ) );
	}
	
	// icon fonts ---------------------------------------------------------------------
	wp_enqueue_style ( 'custom-font-awesome',		get_theme_file_uri('/css/font-awesome.min.css'), array (), '4.3.0' );
	wp_enqueue_style ( 'pe-icon-7-stroke',			get_theme_file_uri('/css/pe-icon-7-stroke.css'), array () );
	wp_enqueue_style ( 'stroke-gap-icons-style',	get_theme_file_uri('/css/stroke-gap-icons-style.css'), array () );
	wp_enqueue_style ( 'icon-moon',					get_theme_file_uri('/css/icon-moon.css'), array () );
	wp_enqueue_style ( 'material-design-iconic',	get_theme_file_uri('/css/material-design-iconic-font.min.css'), array () );

	// comingsoon css
	if(isset($pageopt_opts['enable-comingsoon']))
		wp_enqueue_style("classymissy.comingsoon",  	get_theme_file_uri("/css/comingsoon.css"), false, THEME_VERSION, 'all' );

	// notfound css
	if ( is_404() )
		wp_enqueue_style("classymissy.notfound",	  	get_theme_file_uri("/css/notfound.css"), false, THEME_VERSION, 'all' );

	// loader css
	if(isset($general_opts['enable-loader']))
		wp_enqueue_style("classymissy.loader",	  		get_theme_file_uri("/css/loaders.css"), false, THEME_VERSION, 'all' );

	// show mobile slider
    if(empty($general_opts['show-mobileslider'])):
		$out =	'@media only screen and (max-width:320px), (max-width: 479px), (min-width: 480px) and (max-width: 767px), (min-width: 768px) and (max-width: 959px),
		 (max-width:1200px) { #slider { display:none !important; } }';
		wp_add_inline_style('classy-missy', $out);		 
	endif;

	// woocommerce css
	if( function_exists( 'is_woocommerce' ) )
		wp_enqueue_style( 'classymissy.woo', 		get_theme_file_uri('/css/woocommerce.css'), 'woocommerce-general-css', THEME_VERSION, 'all' );

	// static css
	if(isset($general_opts['enable-staticcss'])) :
		wp_enqueue_style("classymissy.static",  		get_theme_file_uri("/style-static.css"), false, THEME_VERSION, 'all' );

	// skin css
	else :
		$skin	  = $colors_opts['theme-skin'];
		if($skin != 'custom')	wp_enqueue_style("skin", 	get_theme_file_uri("/css/skins/$skin/style.css") );
	endif;

	// tribe-events -------------------------------------------------------------------
	wp_enqueue_style( 'classymissy.customevent', 		get_theme_file_uri('/tribe-events/custom.css'), false, THEME_VERSION, 'all' );

	// responsive ---------------------------------------------------------------------
	if(classymissy_option('general', 'enable-responsive')) {
		
		wp_enqueue_style("classymissy.responsive",  		get_theme_file_uri("/css/responsive.css"), false, THEME_VERSION, 'all' );
		wp_enqueue_style("classymissy.responsive-319",  	get_theme_file_uri("/css/responsive-319.css"), false, THEME_VERSION, 'all' );
		wp_enqueue_style("classymissy.responsive-479",  	get_theme_file_uri("/css/responsive-479.css"), false, THEME_VERSION, 'all' );
		wp_enqueue_style("classymissy.responsive-767",  	get_theme_file_uri("/css/responsive-767.css"), false, THEME_VERSION, 'all' );
		wp_enqueue_style("classymissy.responsive-991",  	get_theme_file_uri("/css/responsive-991.css"), false, THEME_VERSION, 'all' );
		wp_enqueue_style("classymissy.responsive-1199",  	get_theme_file_uri("/css/responsive-1199.css"), false, THEME_VERSION, 'all' );
		wp_enqueue_style("classymissy.responsive-1280",  	get_theme_file_uri("/css/responsive-1280.css"), false, THEME_VERSION, 'all' );		
	}

	// google fonts -----------------------------------------------------------------
	$google_fonts = classymissy_fonts();
	$google_fonts = $google_fonts['all'];

	$subset 	  = classymissy_option('fonts','font-subset');
	if( $subset ) $subset = str_replace(' ', '', $subset);

	// style & weight  --------------------------------------------------------------
	if( $weight = classymissy_option('fonts', 'font-style') )
		$weight = ':'. implode( ',', $weight );

	$fonts = classymissy_fonts_selected();
	$fonts = array_unique($fonts);
	$fonts_url = ''; $font_families = array();
	foreach( $fonts as $font ){
		if( in_array( $font, $google_fonts ) ){
			// if google fonts
			$font_families[] .= $font . $weight;
		}
	}
	$query_args = array( 'family' => urlencode( implode( '|', $font_families ) ), 'subset' => urlencode( $subset ) );
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	wp_enqueue_style( 'classymissy-fonts', 		esc_url_raw($fonts_url), false, THEME_VERSION );
	wp_add_inline_style('classymissy-fonts', classymissy_styles_custom_font() );

	// custom css ---------------------------------------------------------------------
	wp_enqueue_style( 'classymissy.custom', 			get_theme_file_uri('/css/custom.css'), false, THEME_VERSION, 'all' );

	// jquery scripts --------------------------------------------
	wp_enqueue_script('modernizr-custom', 	get_theme_file_uri('/framework/js/modernizr.custom.js'), array('jquery'));
	
	// rtl ----------------------------------------------------------------------------
	if(is_rtl()) wp_enqueue_style('classymissy.rtl', 	get_theme_file_uri('/css/rtl.css'), false, THEME_VERSION, 'all' );
}

/* ---------------------------------------------------------------------------
 * Styles Minify
 * --------------------------------------------------------------------------- */
function classymissy_styles_minify( $css ){

	// remove comments
	$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );	

	// remove whitespace
	$css = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css );

	return $css;
}

/* ---------------------------------------------------------------------------
 * Styles Dynamic
 * --------------------------------------------------------------------------- */
function classymissy_styles_dynamic() {

	ob_start();

	if( ! classymissy_opts_get( 'enable-staticcss' ) ){
		// custom colors.php
		$colors_opts = classymissy_option('colors');
		$skin	  = $colors_opts['theme-skin'];
		if($skin == 'custom'):
			include_once CLASSYMISSY_THEME_DIR . '/css/style-custom-color.php';
		endif;
		
		// default colors.php
		include_once CLASSYMISSY_THEME_DIR . '/css/style-default-color.php';

		// fonts.php
		include_once CLASSYMISSY_THEME_DIR . '/css/style-fonts.php';			
	}

	// custom optons css.php			
	if( ($custom_css = classymissy_option('layout','customcss-content')) &&  classymissy_option('layout','enable-customcss')):
		include_once CLASSYMISSY_THEME_DIR . '/css/dt-theme-option-custom-css.php';
	endif;

	$css = ob_get_contents();

	ob_get_clean();

	$css = classymissy_styles_minify( $css );

	wp_register_style( 'classymissy-combined', '', false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'classymissy-combined' );

	wp_add_inline_style('classymissy-combined', $css);	
}
add_action( 'wp_enqueue_scripts', 'classymissy_styles_dynamic', 100 );

/* ---------------------------------------------------------------------------
 * Styles of Custom Font
 * --------------------------------------------------------------------------- */
function classymissy_styles_custom_font() {	
	$fonts 		  = classymissy_fonts_selected();
	$font_custom  = classymissy_option('fonts','customfont-name');
	$font_custom2 = classymissy_option('fonts','customfont2-name');

	$out = '';

	if( $font_custom && in_array( $font_custom, $fonts ) ){
		$out .= '@font-face {';
			$out .= 'font-family: "'. $font_custom .'";';
			$out .= 'src: url("'. classymissy_option('fonts','customfont-eot') .'");';
			$out .= 'src: url("'. classymissy_option('fonts','customfont-eot') .'#iefix") format("embedded-opentype"),';
				$out .= 'url("'. classymissy_option('fonts','customfont-woff') .'") format("woff"),';
				$out .= 'url("'. classymissy_option('fonts','customfont-ttf') .'") format("truetype"),';
				$out .= 'url("'. classymissy_option('fonts','customfont-svg') . $font_custom .'") format("svg");';
			$out .= 'font-weight: normal;';
			$out .= 'font-style: normal;';
		$out .= '}';
	}
	
	if( $font_custom2 && in_array( $font_custom2, $fonts ) ){
		$out .= '@font-face {';
			$out .= 'font-family: "'. $font_custom2 .'";';
			$out .= 'src: url("'. classymissy_option('fonts','customfont2-eot') .'");';
			$out .= 'src: url("'. classymissy_option('fonts','customfont2-eot') .'#iefix") format("embedded-opentype"),';
				$out .= 'url("'. classymissy_option('fonts','customfont2-woff') .'") format("woff"),';
				$out .= 'url("'. classymissy_option('fonts','customfont2-ttf') .'") format("truetype"),';
				$out .= 'url("'. classymissy_option('fonts','customfont2-svg') . $font_custom2 .'") format("svg");';
			$out .= 'font-weight: normal;';
			$out .= 'font-style: normal;';
		$out .= '}';
	}

	return $out;
}

/* ---------------------------------------------------------------------------
 * Fonts Selected in Theme Options Panel
 * --------------------------------------------------------------------------- */
function classymissy_fonts_selected(){
	$fonts = array();
	
	$font_opts = classymissy_option('fonts');
	
	$fonts['content'] 		= !empty ( $font_opts['content-font'] ) 	? 	$font_opts['content-font'] 		: 'Oswald';
	$fonts['menu'] 			= !empty ( $font_opts['menu-font'] ) 		? 	$font_opts['menu-font'] 		: 'Oswald';
	$fonts['title'] 		= !empty ( $font_opts['pagetitle-font'] ) 	? 	$font_opts['pagetitle-font'] 	: 'Oswald';
	$fonts['h1'] 		= !empty ( $font_opts['h1-font'] ) 	? 	$font_opts['h1-font'] 		: 'Oswald';
	$fonts['h2'] 		= !empty ( $font_opts['h2-font'] ) 	? 	$font_opts['h2-font'] 		: 'Oswald';
	$fonts['h3'] 		= !empty ( $font_opts['h3-font'] ) 	? 	$font_opts['h3-font'] 		: 'Oswald';
	$fonts['h4'] 		= !empty ( $font_opts['h4-font'] ) 	? 	$font_opts['h4-font'] 		: 'Oswald';
	$fonts['h5'] 		= !empty ( $font_opts['h5-font'] ) 	? 	$font_opts['h5-font'] 		: 'Oswald';
	$fonts['h6'] 		= !empty ( $font_opts['h6-font'] ) 	? 	$font_opts['h6-font'] 		: 'Oswald';

	return $fonts;
}

/* ---------------------------------------------------------------------------
 * Site SSL Compatibility
 * --------------------------------------------------------------------------- */
function classymissy_ssl( $echo = false ){
	$ssl = '';
	if( is_ssl() ) $ssl = 's';
	if( $echo ){
		echo ($ssl);
	}
	return $ssl;
}

/* ---------------------------------------------------------------------------
 * Layout Selected in Theme Options Panel
 * --------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'classymissy_appearance_css', 102);
function classymissy_appearance_css() {
	$output = NULL;

	if (classymissy_option('layout', 'site-layout') == 'boxed') :

		if (classymissy_option('layout', 'bg-type') == 'bg-patterns') :
			$pattern 			= 	classymissy_option('layout', 'boxed-layout-pattern');
			$pattern_repeat 	= 	classymissy_option('layout', 'boxed-layout-pattern-repeat');
			$pattern_opacity 	= 	classymissy_option('layout', 'boxed-layout-pattern-opacity');
			$enable_color 		= 	classymissy_option('layout', 'show-boxed-layout-pattern-color');
			$pattern_color 		= 	classymissy_option('layout', 'boxed-layout-pattern-color');

			$output .= "body { ";

			if (!empty($pattern)) {
				$output .= "background-image:url('" . CLASSYMISSY_THEME_URI . "/framework/theme-options/images/patterns/{$pattern}');";
			}

			$output .= "background-repeat:$pattern_repeat;";
			if ($enable_color) {
				if (!empty($pattern_opacity)) {
					$color = classymissy_hex2rgb($pattern_color);
					$output .= "background-color:rgba($color[0],$color[1],$color[2],$pattern_opacity); ";
				} else {
					$output .= "background-color:$pattern_color;";
				}
			}
			$output .= "}\r\t";

		elseif (classymissy_option('layout', 'bg-type') == 'bg-custom') :
			$bg 			= 	classymissy_option('layout', 'boxed-layout-bg');
			$bg_repeat 		= 	classymissy_option('layout', 'boxed-layout-bg-repeat');
			$bg_opacity 	= 	classymissy_option('layout', 'boxed-layout-bg-opacity');
			$bg_color 		= 	classymissy_option('layout', 'boxed-layout-bg-color');
			$enable_color 	= 	classymissy_option('layout', 'show-boxed-layout-bg-color');
			$bg_position 	= 	classymissy_option('layout', 'boxed-layout-bg-position');

			$output .= "body { ";

			if (!empty($bg)) {
				$output .= "background-image:url($bg);";
				$output .= "background-repeat:$bg_repeat;";
				$output .= "background-position:$bg_position;";
			}

			if ($enable_color) {
				if (!empty($bg_opacity)) {
					$color = classymissy_hex2rgb($bg_color);
					$output .= "background-color:rgba($color[0],$color[1],$color[2],$bg_opacity);";
				} else {
					$output .= "background-color:$bg_color;";
				}
			}
			$output .= "}\r\t";
		endif;

	endif;
	
	if (!empty($output)) :
		wp_register_style( 'classymissy-layout', '' );
		wp_enqueue_style( 'classymissy-layout' );
		wp_add_inline_style('classymissy-layout', $output);
	endif;
}

/* ---------------------------------------------------------------------------
 * Body Class Filter for layout changes
 * --------------------------------------------------------------------------- */
function classymissy_body_classes( $classes ) {

	// layout
	$classes[] 		= 	'layout-'. classymissy_option('layout','site-layout');

	// header
	$header_type 	= 	classymissy_option('layout','header-type');
	if( isset($header_type) && ($header_type == 'left-header-boxed') ):
		$classes[]	=	'left-header left-header-boxed';
	elseif( isset($header_type) && ($header_type == 'creative-header') ):
		$classes[]	=	'left-header left-header-creative';
	else:
		$classes[]	=	$header_type;
	endif;

	$htrans 		= 	classymissy_option('layout', 'header-transparant');
	if(isset($htrans)):
		$classes[]	=	classymissy_option('layout', 'header-transparant');
	endif;
	
	$stickyhead		=	classymissy_option('layout','layout-stickynav');
	if(isset($stickyhead)):
		$classes[]	=	'sticky-header';
	endif;

	$standard		=	classymissy_option('layout','header-position');
	if( isset($standard) && ($standard == 'above slider') ):
		$classes[]	=	'standard-header';
	elseif( isset($standard) && ($standard == 'below slider') ):
		$classes[]	=	'standard-header header-below-slider';
	elseif ( isset($standard) && ($standard == 'on slider') ):
		$classes[]	=	'header-on-slider';
	endif;

	$topbar			=	classymissy_option('layout','layout-topbar');
	if(isset($topbar)):
		$classes[]	=	'header-with-topbar';
	endif;

	if( is_page() ) {
		$pageid = classymissy_ID();
		$page_meta = get_post_meta( $pageid, '_tpl_default_settings', true );

		if( ($page_meta) && (array_key_exists( 'show_slider', $page_meta )) ) {
			$classes[] = "page-with-slider";
		}
		if( ($page_meta) && (!array_key_exists( 'enable-sub-title', $page_meta )) ) {
			$classes[] = "no-breadcrumb";
		}
	} elseif( is_home() ) {
		$pageid = get_option('page_for_posts');
		if(($slider_key = get_post_meta( $pageid, '_tpl_default_settings', true )) && (array_key_exists( 'show_slider', $slider_key )) ) {
			$classes[] = "page-with-slider";
		}
	}

	return $classes;
}
add_filter( 'body_class', 'classymissy_body_classes' );?>