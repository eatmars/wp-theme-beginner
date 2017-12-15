<?php
/*-------------------------------------------------------------
juqery and css loads
------------------------------------------------------------*/
add_action('wp_enqueue_scripts', 'julia_kaya_jquery_scripts');
if( !function_exists('julia_kaya_jquery_scripts') ){
	function julia_kaya_jquery_scripts()
	{
		global $julia_kaya_post_item_id, $post, $is_IE, $kta_options;
		$captcha_site_key = !empty($kta_options->captcha_sitekey) ? $kta_options->captcha_sitekey : '';
		$captcha_enable = !empty($kta_options->captcha_enable) ? $kta_options->captcha_enable : '0';
		$captcha_error_message = !empty($kta_options->captcha_error_msg) ? $kta_options->captcha_error_msg  : __('pleace check recaptcha','julia');
		$enable_content_popup_box = get_theme_mod('enable_content_popup_box') ? get_theme_mod('enable_content_popup_box') : '0';
		if( class_exists('woocommerce') ){
            if( is_shop() ){
    			$select_page_options=get_post_meta( wc_get_page_id( 'shop' ),'select_page_options',true);
            }else{ if( get_post() ) { $select_page_options=get_post_meta(get_the_ID(),'select_page_options',true); } else{ $select_page_options = ''; } }
        }elseif( is_page()){
            $select_page_options=get_post_meta($post->ID,'select_page_options',true);
        }else{
            $select_page_options = '';
        }
		wp_enqueue_script("jquery");
		wp_localize_script( 'jquery', 'wppath', array('template_path' => get_template_directory_uri('template_directory')));
		wp_enqueue_script( 'jquery_easing', get_template_directory_uri() .'/js/jquery.easing.1.3.js',array(),'', true);	 // Easing	
		if( ($captcha_enable == '1') && ( !empty($captcha_site_key) ) ){
			wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js');
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) && !is_page() ) {
			wp_enqueue_script( 'comment-reply' );
		}
		if ( $is_IE ) {
			wp_enqueue_script('placeholder', get_template_directory_uri() .'/js/placeholder.js',array(),'', true);
		}
		if( $select_page_options == 'page_slider_setion'){
			wp_enqueue_script('js_supersized.3.2.7', get_template_directory_uri() .'/js/supersized.3.2.7.js',array('jquery'),'', false);
			wp_enqueue_script('js_supersized.shutter', get_template_directory_uri() .'/js/supersized.shutter.js',array('jquery'),'', false);
			wp_enqueue_style('css_supersized', get_template_directory_uri().'/css/supersized.css',false, '', 'all');
			wp_enqueue_style('css_supersized.shutter', get_template_directory_uri().'/css/supersized.shutter.css',false, '', 'all');
			wp_enqueue_style('sliders', get_template_directory_uri() . '/css/sliders.css',true, '1.0', 'all');
		}
		 wp_enqueue_style('css_talents', get_template_directory_uri().'/css/talents.css',false, '', 'all');
		if( $select_page_options == 'video_bg'){
			wp_enqueue_script('mb.YTPlayer', get_template_directory_uri() .'/js/jquery.mb.YTPlayer.min.js',array(),'', true); // for ytp Player
			wp_enqueue_style('sliders', get_template_directory_uri() . '/css/sliders.css',true, '1.0', 'all');
		}

		if( class_exists('woocommerce')){
			wp_enqueue_style('kaya_woocommerce', get_template_directory_uri().'/css/kaya_woocommerce.css',false, '', 'all');
			if(is_product()){
			    wp_enqueue_script( 'cloud-zoom', get_template_directory_uri() .'/js/cloud-zoom.1.0.2.min.js',array(),'', true);
			}
		}
		wp_enqueue_script('jquery-custom', get_template_directory_uri() .'/js/custom.js',array(),'', true);
		global $is_IE; // IE
	    if( $is_IE ) {
			wp_enqueue_script('jquery-html5', get_template_directory_uri() .'/js/html5.js',array(),'', true);
		}
		if( is_page_template( 'templates/coming-soon.php' )  ){
			wp_enqueue_script( 'countdown', get_template_directory_uri() .'/js/countdown.js',array(),'', true);
		}
		wp_localize_script( 'jquery', 'kaya_ajax_url', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
		if( $enable_content_popup_box == '1' ){
			wp_enqueue_script('jquery.cookie', get_template_directory_uri() .'/js/jquery.cookie.js',array(),'', true); // for fancybox  script
		}	
	}
}
/*--------------------------------------------------------------
Styles
---------------------------------------------------------------*/
add_action('wp_enqueue_scripts', 'julia_kaya_css_styles');
if( !function_exists('julia_kaya_css_styles') ){
	function julia_kaya_css_styles() {
		global $wp_styles;		
		wp_enqueue_style( 'julia-style', get_stylesheet_uri() );
		wp_enqueue_style('css_font_awesome', get_template_directory_uri() . '/css/font-awesome.css', false, '3.0', 'all');
		if( is_single() ){
			wp_enqueue_style('sliders', get_template_directory_uri() . '/css/sliders.css',true, '1.0', 'all');
		}
		//smartmenu files
		wp_enqueue_script('jquery-jquery.smartmenus', get_template_directory_uri() .'/js/jquery.smartmenus.js',array(),'', true);
		wp_enqueue_style('css_sm-blue', get_template_directory_uri().'/css/sm-blue.css',false, '', 'all');
		
		wp_enqueue_style('typography', get_template_directory_uri() . '/css/typography.css', true , '', 'all');
		wp_enqueue_style('blog_style', get_template_directory_uri() . '/css/blog_style.css', true , '', 'all');
		wp_enqueue_style('widgets_css', get_template_directory_uri() . '/css/widgets.css', true , '', 'all');
		wp_enqueue_style('layout', get_template_directory_uri() . '/css/layout.css', true , '', 'all');
		$responsive_mode = get_theme_mod( 'responsive_layout_mode' ) ? get_theme_mod( 'responsive_layout_mode' ) : 'on';
		if($responsive_mode == "on"){
			wp_enqueue_style('css_responsive', get_template_directory_uri() . '/css/responsive.css', true, '', 'all');
		}
		wp_enqueue_style( 'julia-ie', get_template_directory_uri() . '/css/ie9_down.css', array( 'julia-style' ) );
		wp_script_add_data( 'julia-ie', 'conditional', 'lt IE 8' );
	}
}	
/*-----------------------------------------------------------------------
Customizer
-----------------------------------------------------------------------*/
if( !function_exists('julia_kaya_theme_customizer_js') ){
	function julia_kaya_theme_customizer_js(){
		wp_enqueue_media();
		wp_enqueue_script('jquery_theme-customizer', get_template_directory_uri() .'/js/theme-customizer.js',array(),'', true);
		wp_enqueue_style('customizer_styles', get_template_directory_uri() . '/css/customizer_styles.css', false, '', 'all');
		wp_enqueue_script('customizer', get_template_directory_uri() .'/js/customizer.js',array(),'', true);
	}
}
add_action( 'customize_controls_enqueue_scripts', 'julia_kaya_theme_customizer_js',100 );
if( !function_exists('julia_kaya_customize_preview_js') ){
	function julia_kaya_customize_preview_js() {
		wp_enqueue_script( 'customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), '' , true );
	}
}
add_action( 'customize_preview_init', 'julia_kaya_customize_preview_js' );
?>