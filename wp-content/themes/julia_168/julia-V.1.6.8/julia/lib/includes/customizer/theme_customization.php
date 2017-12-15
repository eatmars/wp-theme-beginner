<?php
get_template_part('lib/includes/customizer/customizer_controlls');
//Body Background
$kaya_julia_customze_note_settings = array(
	'strong' => array(
	'class' => array()
	),
);
/*---------------------------------------------------------------------------
 Header Section
-----------------------------------------------------------------------------*/
function julia_kaya_header_settings_section( $wp_customize ) {
	$wp_customize->add_section(
	'header_color_section',
	array(
		'title' => esc_html__( 'Header Settings', 'julia'),
		'priority'       => 10,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
		'description' => '<a target="_blank" href="https://youtu.be/26YOJpIK5gs">'. __( ' Watch this Video ', 'julia' ).'</a>'.__(' to know how to configure Header settings', 'julia'),
	));
	$wp_customize->add_setting( 'header_background_color',array( 
		'default' => '#FFFFFF',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(			
		'label' => esc_html__('Header Background Color', 'julia'),
		'section' => 'header_color_section',
		'priority' => 10,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'header_border_bottom_color',array( 
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_border_bottom_color', array(			
		'label' => esc_html__('Header Border Bottom Color', 'julia'),
		'section' => 'header_color_section',
		'priority' => 15,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'header_margin_top', array(
        'default'        => '0',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_check_number',
    ) );
	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'header_margin_top', array(
			 'label'   => esc_html__('Header Margin Top','julia'),
        	'section' => 'header_color_section',
			'settings'    => 'header_margin_top',
			'priority'    => 20,
			'choices'  => array(
				'min'  => 0,
				'max'  => 105,
				'step' => 1
			),
	)));
	$wp_customize->add_setting( 'header_margin_bottom', array(
        'default'        => '0',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_check_number',
    ) );
	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'header_margin_bottom', array(
			 'label'   => esc_html__('Header Margin Bottom','julia'),
        	'section' => 'header_color_section',
			'settings'    => 'header_margin_bottom',
			'priority'    => 30,
			'choices'  => array(
				'min'  => 0,
				'max'  => 105,
				'step' => 1
			),
	)));
	 $wp_customize->add_setting( 'disable_header_sticky', array(
		'default'        => '',
		'transport' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('disable_header_sticky', array(
		'label'    => esc_html__( 'Disable Sticky Header','julia'),
		'section'  => 'header_color_section',
		'type'     => 'checkbox',
		'priority' => 40
	) );
}
add_action( 'customize_register', 'julia_kaya_header_settings_section'); // End
//end header section
//slider settings
function slider_section( $wp_customize ){
	$wp_customize->add_section('slider_section',
		array(
		'title' => __('Slider Settings','julia'),
		'priority' => 11,
		'capability' => 'edit_theme_options',
		'description' => '',
		));
	$wp_customize->add_setting( 'enable_slider_settings', array(
		'default'        => 0,
		'transport' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options'
	));
	$wp_customize->add_control('enable_slider_settings', array(
		'label' => esc_html__('Enable Slider Settings','julia'),
		'section'  => 'slider_section',
		'type'     => 'checkbox',
		'priority' => 1
	));
	}
add_action('customize_register','slider_section');
/*---------------------------------------------------------
Menu Section
----------------------------------------------------------*/
function julia_kaya_menu_section( $wp_customize ) {
	$wp_customize->add_section(
	'menu-section',
	array(
		'title' => esc_html__( 'Menu Color Settings', 'julia'),
		'priority'       => 40,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
		'description' => '<a target="_blank" href="https://youtu.be/16LN1kS92ps">'. __( ' Watch this Video ', 'julia' ).'</a>'.__(' to know how to configure Menu settings', 'julia'),
	));
	//Main Menu Settings
	$wp_customize->add_setting( 'main_menu_title', array(
		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
	));
	$wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'main_menu_title', array(
		'label'    => esc_html__( 'Main Menu Settings', 'julia'),
		'section'  => 'menu-section',
		'settings' => 'main_menu_title',
		'priority' => 80
    ))); 
    $colors[] = array(
		'slug'=>'menu_link_color',
		'priority' => 90,
		'default' => '#ffffff',
		'label' => esc_html__('Links Color', 'julia'),
	);
	$colors[] = array(
		'slug'=>'main_menu_icon_color',
		'priority' => 100,
		'default' => '#ffffff',
		'label' => esc_html__('Menu Icon Color', 'julia'),
	);
	$colors[] = array(
		'slug'=>'menu_link_hover_text_color',
		'default' => '#ff3333',
		'label' => esc_html__('Hover Link color', 'julia'),
		'priority' => 110
	);	
	$colors[] = array(
		'slug'=>'menu_link_active_color',
		'priority' => 120,
		'default' => '#ff3333',
		'label' => esc_html__('Active Link Color', 'julia'),
	);
	$wp_customize->add_setting( 'submenu_title', array(
		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
	));
	$wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'submenu_title', array(
      'label'    => esc_html__( 'Child Menu Settings', 'julia'),
      'section'  => 'menu-section',
      'settings' => 'submenu_title',
      'priority' => 140
    )));
    $colors[] = array(
		'slug'=>'sub_menu_links_bg_color',
		'default' => '#ff3333',
		'label' => esc_html__('Links Background Color', 'julia'),
		'priority' => 141
	);
   	$colors[] = array(
		'slug'=>'sub_menu_link_color',
		'default' => '#ffffff',
		'label' => esc_html__('Links Color', 'julia'),
		'priority' => 150
	);
	$colors[] = array(
		'slug'=>'sub_menu_top_border_color',
		'priority' => 153,
		'default' => '#de2727',
		'label' => esc_html__('Links Border Top Color', 'julia'),
	);
	$colors[] = array(
		'slug'=>'sub_menu_bottom_border_color',
		'priority' => 154,
		'default' => '#ff4e4e',
		'label' => esc_html__('Links Border Bottom Color', 'julia'),
	);
	$colors[] = array(
		'slug'=>'child_menu_icon_color',
		'priority' => 155,
		'default' => '#ffffff',
		'label' => esc_html__('Menu Icon Color', 'julia'),
	);
	$colors[] = array(
		'slug'=>'sub_menu_links_hover_bg_color',
		'default' => '#ff0000',
		'label' => esc_html__('Links Hover Background Color', 'julia'),
		'priority' => 156
	);
	$colors[] = array(
		'slug'=>'sub_menu_link_hover_color',
		'default' => '#ffffff',
		'label' => esc_html__('Links Hover Color', 'julia'),
		'priority' => 160
	);
	$colors[] = array(
		'slug'=>'sub_menu_links_active_bg_color',
		'default' => '#ff0000',
		'label' => esc_html__('Link Active Background Color', 'julia'),
		'priority' => 165
	);
	$colors[] = array(
		'slug'=>'sub_menu_link_active_color',
		'default' => '#ffffff',
		'label' => esc_html__('Link Active Color', 'julia'),
		'priority' => 170
	);  
    foreach( $colors as $color ) {
		$wp_customize->add_setting( $color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'menu-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
			));
	}
}
add_action( 'customize_register', 'julia_kaya_menu_section'); // End
/*---------------------------------------------------------
 Header Section
-----------------------------------------------------------*/
function julia_kaya_user_info_content_section( $wp_customize ) {
	$wp_customize->add_section(
	'user_info_content_section',
	array(
		'title' => esc_html__( 'Memeber Login Section', 'julia'),
		'priority'       => 45,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
		'description' =>'<strong class="customizer_note"> Note: </strong>'.__('This section is depricated, all options moved to “Talent Agency > Register / Login Form”, click ', 'julia').'<a href="'.admin_url('admin.php?page=kta-settings&tab=reg_options').'" target="_blank">here</a> to configure.',
	));
	
	//
}
add_action( 'customize_register', 'julia_kaya_user_info_content_section'); // End
/*---------------------------------------------------------------------------
 Header Section
-----------------------------------------------------------------------------*/
function julia_kaya_header_main_section( $wp_customize ) {
	$wp_customize->add_panel( 'header_section_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => esc_html__( 'Header Section', 'julia'),
	    'description'    => '',
	) );
	$wp_customize->add_section(
	'header-section',
	array(
		'title' => esc_html__( 'Logo Settings', 'julia'),
		'priority'       => 40,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
	));
	$wp_customize->add_setting( 'header_sticky', array(
		'default'        => '',
		'transport' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_setting( 'select_header_logo_type',  array(
        'default' => 'image_logo',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_header_logo_type', array(
        'type' => 'select',
        'label' => esc_html__('Select Header Logo Type','julia'),
        'section' => 'header-section',
        'choices' => array(
        	 'image_logo' => esc_html__('Image Logo','julia'),
        	 'text_logo' => esc_html__('Text Logo','julia'),
        	 'none' => 'None'
        	),
		'priority' => 60,
    ));	
	$src=get_template_directory_uri() . '/images';
	$wp_customize->add_setting('kaya_logo[upload_logo]', array(
	    'default'           => esc_url( $src ).'/logo.png',
	    'capability'        => 'edit_theme_options',
	    'sanitize_callback' => 'esc_url_raw',
	    'type'           => 'option',
	    'transport' => 'postMessage'
	));
    $wp_customize->add_control( new Julia_Kaya_Customize_Imageupload_Control($wp_customize, 'upload_logo', array(
        'label'    => esc_html__('Upload Logo Image', 'julia'),
        'section'  => 'header-section',
        'settings' => 'kaya_logo[upload_logo]',
		'priority' => 70
    )));
    // Retina logo
    $wp_customize->add_setting( 'header_retina_logo', array(
		'default'        => '',
		'transport' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('header_retina_logo', array(
		'label'    => esc_html__( 'Enable Retina Logo','julia'),
		'section'  => 'header-section',
		'type'     => 'checkbox',
		'priority' => 80
	) );
    $wp_customize->add_setting('retina_logo[upload_retina_logo]', array(
	    'default'           => '',
	    'capability'        => 'edit_theme_options',
	    'sanitize_callback' => 'esc_url_raw',
	    'type'           => 'option',
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Imageupload_Control($wp_customize, 'upload_retina_logo', array(
        'label'    => esc_html__('Upload Retina Logo Image', 'julia'),
        'section'  => 'header-section',
        'settings' => 'retina_logo[upload_retina_logo]',
		'priority' => 90
    )));
    // Header Text Logo
    $wp_customize->add_setting( 'header_text_logo', array(
		'default'        => '',
		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
		'transport' => 'postMessage'
	) );
	$wp_customize->add_control( 'header_text_logo', array(
		'label'   => esc_html__('Text Logo','julia'),
		'section' => 'header-section',
		'type'    => 'text',
		'priority' => 100,
	) );
	$colors[] = array(
		'slug'=>'logo_text_font_color',
		'default' => '#333333',
		'label' => esc_html__('Text Logo Font Color', 'julia'),
		'priority' => 102
	);	
	$wp_customize->add_setting( 'text_logo_size', array(
        'default'        => '36',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_check_number',
    ) );
	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'text_logo_size', array(
		'label'   => esc_html__('Logo Font Size','julia'),
    	'section' => 'header-section',
		'settings'    => 'text_logo_size',
		'priority'    => 110,
		'choices'  => array(
			'min'  => 24,
			'max'  => 150,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'header_logo_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('header_logo_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Text Logo Font Weight','julia'),
        'section' => 'header-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'bold' => esc_html__('Bold','julia'),
        	),
		'priority' => 120,
    ));	
    $wp_customize->add_setting( 'header_logo_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('header_logo_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Text Logo Font Style','julia'),
        'section' => 'header-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'italic' => esc_html__('Italic','julia'),
        	),
		'priority' => 130,
    ));
	$wp_customize->add_setting( 'header_text_logo_font_family', array( 
		'default' => '2',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_google_fonts_Control( $wp_customize, 'header_text_logo_font_family', array(
		'label'   => esc_html__('Select Logo Font Family','julia'),
		'section' => 'header-section',
		'settings'    => 'header_text_logo_font_family',
		'priority'    => 140,
	)));   
	$wp_customize->add_setting( 'customize_controll_divider_tagline', array(
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_tagline', array(
        'section' => 'header-section',
		'priority' => 150,
    ))); 
	// Logo tag line
	$wp_customize->add_setting( 'header_text_logo_tagline', array(
		'default'        => '',
		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
		'transport' => 'refresh'
	));
	$wp_customize->add_control( 'header_text_logo_tagline', array(
		'label'   => esc_html__('Logo Tag Line','julia'),
		'section' => 'header-section',
		'type'    => 'text',
		'priority' => 160,
	));
	$wp_customize->add_setting( 'logo_tagline_size', array(
        'default'        => '12',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_check_number',
    ));
	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'logo_tagline_size', array(
		'label'   => esc_html__('Logo Tag Line Font Size','julia'),
    	'section' => 'header-section',
		'settings'    => 'logo_tagline_size',
		'priority'    => 170,
		'choices'  => array(
			'min'  => 10,
			'max'  => 150,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'logo_tagline_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('logo_tagline_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Logo Tag Line Font Weight','julia'),
        'section' => 'header-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'bold' => esc_html__('Bold','julia'),
        	),
		'priority' => 180,
    ));	
    $wp_customize->add_setting( 'logo_tagline_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('logo_tagline_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Logo Tag Line Font Style','julia'),
        'section' => 'header-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'italic' => esc_html__('Italic','julia'),
        	),
		'priority' => 190,
    ));	
    $wp_customize->add_setting( 'logo_tagline_letter_spacing', array(
        'default'        => '0',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_check_number',
    ) );
	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'logo_tagline_letter_spacing', array(
		'label'   => esc_html__('Logo Tag Line Font Letter Spacing','julia'),
    	'section' => 'header-section',
		'settings'    => 'logo_tagline_letter_spacing',
		'priority'    => 191,
		'choices'  => array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1
		),
	)));
   	$wp_customize->add_setting( 'text_logo_tagline_font_family', array(
   		'default' => '',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_google_fonts_Control( $wp_customize, 'text_logo_tagline_font_family', array(
		'label'   => esc_html__('Select Tag Line Font Family','julia'),
		'section' => 'header-section',
		'settings'    => 'text_logo_tagline_font_family',
		'priority'    => 200,
	)));
	$colors[] = array(
		'slug'=>'logo_tagline_font_color',
		'default' => '#333333',
		'label' => esc_html__('Logo Tag Line Color', 'julia'),
		'priority' => 210
	);
	$wp_customize->add_setting( 'header_logo_padding_t_b', array(
        'default'        => '0',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_check_number',
    ));
	foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize,$color['slug'], array(
			'label' => $color['label'],
			'section' => 'header-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action( 'customize_register', 'julia_kaya_header_main_section' );

/*--------------------------------------------------
Pagination Color Settings
---------------------------------------------------*/
function julia_kaya_posts_pagination_section( $wp_customize ) {
	global $kaya_julia_customze_note_settings;
	$wp_customize->add_section(
	'posts_pagination_section',
	array(
		'title' => esc_html__( 'Pagination Color Settings', 'julia'),
		'priority'       => 60,
		'capability' => 'edit_theme_options',
		'panel'  => 'general_section',
		'description' => wp_kses(__( '<strong class="customizer_note"> Note: </strong>Color applies for blog posts, portfolio posts and woocommerce poroducts pagination.', 'julia'),$kaya_julia_customze_note_settings )
	));	
	$colors = array();
	$colors[] = array(
		'slug'=>'posts_pagination_link',
		'default' => '#ff3333',
		'label' => esc_html__('Link Color', 'julia')
	);
	$colors[] = array(
		'slug'=>'posts_pagination_bg',
		'default' => '#ffffff',
		'label' => esc_html__('Background Color', 'julia')
	);
		$colors[] = array(
		'slug'=>'posts_pagination_active_link',
		'default' => '#ffffff',
		'label' => esc_html__('Active Link Color', 'julia')
	);
	$colors[] = array(
		'slug'=>'posts_pagination_active_bg',
		'default' => '#ff3333',
		'label' => esc_html__('Active Background Color', 'julia')
	);
	foreach( $colors as $color ) {
		$wp_customize->add_setting($color['slug'], array(
			'default' => $color['default'],
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize,$color['slug'], array(
			'label' => $color['label'], 
			'section' => 'posts_pagination_section',
			'settings' => $color['slug'])
		));
	}
}
add_action( 'customize_register', 'julia_kaya_posts_pagination_section' );
/*---------------------------------------------------
 Page Title color Settings
-------------------------------------------------------*/
function julia_kaya_page_color_section( $wp_customize ) {
	$wp_customize->add_panel( 'page_color_panel', array(
	    'priority' => 70,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__('Page Section','julia'),
	));	
	$wp_customize->add_section(
	'page-color-section',
	array(
		'title' => esc_html__( 'Page Title bar Settings', 'julia'),
		'priority'       => 70,
		'capability' => 'edit_theme_options',
		'panel' => 'page_color_panel',
	));
	$wp_customize->add_setting( 'page_titlebar_title_color', array( 
		'default' => '#333',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'page_titlebar_title_color',array(
		'label' => esc_html__('Title Color','julia'),
		'section' => 'page-color-section',
		'priority' => 60,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'page_title_border_color',array( 
		'default' => '#151515',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'page_title_border_color',	array(
		'label' => esc_html__('Title Border Color', 'julia'),
		'section' => 'page-color-section',
		'priority' => 65,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'page_title_font_size', array(
        'default'        => '36',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'julia_kaya_check_number',
    ) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'page_title_font_size', array(
		'label'   => esc_html__('Title Font Size (px)','julia'),
    	'section' => 'page-color-section',
		'settings'    => 'page_title_font_size',
		'priority'    => 70,
		'choices'  => array(
			'min'  => 12,
			'max'  => 100,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'page_title_font_letter_space', array(
        'default'        => '0',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'julia_kaya_check_number',
    ) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'page_title_font_letter_space', array(
		 'label'   => esc_html__('Title Letter Space (px)','julia'),
    	'section' => 'page-color-section',
		'settings'    => 'page_title_font_letter_space',
		'priority'    => 71,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'page_title_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('page_title_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Title Font Weight','julia'),
        'section' => 'page-color-section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 80,
    ));
    $wp_customize->add_setting( 'page_title_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('page_title_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Title Font Style','julia'),
        'section' => 'page-color-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'italic' => esc_html__('Italic','julia'),
        	),
		'priority' =>90,
    ));	
    $wp_customize->add_setting( 'page_title_bar_padding', array(
		'default'        => '80',
		'transport' => 'postMessage',
		'sanitize_callback'    => 'julia_kaya_check_number',
	));
	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'page_title_bar_padding', array(
		'label'   => esc_html__('Title Bar Padding Top & Bottom (px)','julia'),
		'section' => 'page-color-section',
		'settings'    => 'page_title_bar_padding',
		'priority'    => 160,
		'choices'  => array(
			'min'  => 30,
			'max'  => 500,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'page_title_position',  array(
        'default' => 'center',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('page_title_position', array(
        'type' => 'select',
        'label' => esc_html__('Title Position','julia'),
        'section' => 'page-color-section',
        'choices' => array(
        	 'center' => esc_html__('Center','julia'),
        	 'left' => esc_html__('Left','julia'),
        	 'right' => esc_html__('Right','julia'),
        	),
		'priority' => 170,
    ));
	$colors = array();
    foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize, $color['slug'], array(
			'label' => $color['label'],
			'section' => 'page-color-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action( 'customize_register', 'julia_kaya_page_color_section' );
/*-------------------------------------------
Page middle content color
--------------------------------------------*/
function julia_kaya_page_middle_color_panel($wp_customize){
	$wp_customize->add_section(
	'background_image',
	array(
		'title' => esc_html__( 'Page Middle Content Settings', 'julia'),
		'priority'       => 80,
		'capability' => 'edit_theme_options',
		'panel' => 'page_color_panel'
	));
	$wp_customize->add_setting( 'select_body_background_type',  array(
        'default' => 'bg_type_color',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_body_background_type', array(
        'type' => 'select',
        'label' => esc_html__('Select Background Type','julia'),
        'section' => 'background_image',
        'choices' => array(
        	 'bg_type_color' => esc_html__('Background Color','julia'),
        	 'bg_type_image' => esc_html__('Background Image','julia'),
        	),
		'priority' => 0,
    ));
	$wp_customize->add_setting( 'body_background_color',array( 
		'default' => '#f4f4f4',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_background_color', array(			
		'label' => esc_html__('Background Color', 'julia'),
		'section' => 'background_image',
		'priority' => 40,
		'type' => 'color',
	)));
	//
	$colors[] = array(
		'slug'=>'page_titles_color',
		'default' => '#333333',
		'label' => esc_html__('Title Color', 'julia'),
		'priority' => 90
	);
	$colors[] = array(
		'slug'=>'page_description_color',
		'default' => '#757575',
		'label' => esc_html__('Content Color', 'julia'),
		'priority' => 100
	);
	$colors[] = array(
		'slug'=>'page_link_color',
		'default' => '#333',
		'label' => esc_html__('Link Color', 'julia'),
		'priority' => 110
	);
	$colors[] = array(
		'slug'=>'page_link_hover_color',
		'default' => '#ff3333',
		'label' => esc_html__('Link Hover Color', 'julia'),
		'priority' => 120
	);
	foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, $color['slug'],array(
			'label' => $color['label'],
			'section' => 'background_image',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));	
	}
}
add_action('customize_register','julia_kaya_page_middle_color_panel');
/*---------------------------------------------------
Page Sidebar color section
-----------------------------------------------------*/
function julia_kaya_page_sidebar_color_panel($wp_customize)
{
	$wp_customize->add_section(
	'page-sidbar-color-section',
	array(
		'title' => esc_html__( 'Page Sidebar Color Settings', 'julia'),
		'priority'       => 80,
		'capability' => 'edit_theme_options',
		'panel' => 'page_color_panel'
	));
	$colors[] = array(
		'slug'=>'sidebar_bg_color',
		'default' => '#FFFFFF',
		'label' => esc_html__('Background Color', 'julia'),
		'priority' => 10
	);
    $colors[] = array(
		'slug'=>'sidebar_title_color',
		'default' => '#333333',
		'label' => esc_html__('Title Color', 'julia'),
		'priority' => 20
	);
    $colors[] = array(
		'slug'=>'sidebar_title_border_color',
		'default' => '#b9b9b9',
		'label' => esc_html__('Title Border Color', 'julia'),
		'priority' => 30
	);
	$colors[] = array(
		'slug'=>'sidebar_desc_color',
		'default' => '#757575',
		'label' => esc_html__('Description Color', 'julia'),
		'priority' => 40
	);
	 $colors[] = array(
		'slug'=>'sidebar_list_border_color',
		'default' => '#cccccc',
		'label' => esc_html__('List Border Bottom Color', 'julia'),
		'priority' => 50
	);
    $colors[] = array(
		'slug'=>'sidebar_link_color',
		'default' => '#333',
		'label' => esc_html__('Hyper Link Color', 'julia'),
		'priority' => 60
	);
    $colors[] = array(
		'slug'=>'sidebar_link_hover_color',
		'default' => '#ff3333',
		'label' => esc_html__('Hyper Link Hover Color', 'julia'),
		'priority' => 70
	);
	$colors[] = array(
		'slug'=>'sidebar_tags_bg_color',
		'default' => '#ffffff',
		'label' => esc_html__('Tag Clouds Background Color', 'julia'),
		'priority' => 80
	);
    $colors[] = array(
		'slug'=>'sidebar_tags_link_color',
		'default' => '#333333',
		'label' => esc_html__('Tag Clouds Text Color', 'julia'),
		'priority' => 90
	);
	$colors[] = array(
		'slug'=>'sidebar_tags_hover_bg_color',
		'default' => '#333333',
		'label' => esc_html__('Tag Clouds Hover Background Color', 'julia'),
		'priority' => 91
	);
    $colors[] = array(
		'slug'=>'sidebar_tags_hover_text_color',
		'default' => '#ffffff',
		'label' => esc_html__('Tag Clouds Hover Text Color', 'julia'),
		'priority' => 92
	);
    $colors[] = array(
		'slug'=>'sidebar_tags_border_color',
		'default' => '#ff3333',
		'label' => esc_html__('Tag Clouds Right Border Color', 'julia'),
		'priority' => 100
	);
    foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, $color['slug'],array(
			'label' => $color['label'],
			'section' => 'page-sidbar-color-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action( 'customize_register', 'julia_kaya_page_sidebar_color_panel' );
/*-------------------------------------------------------
Portfolio Thumbnail Color Settings 
--------------------------------------------------*/
function julia_kaya_portfolio_color_section($wp_customize){
	global $kaya_julia_customze_note_settings;
	$wp_customize->add_panel( 'pf_panel_section', array(
	    'priority'       => 70,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => esc_html__('Portfolio Section','julia'),
	) );	
	$wp_customize->add_section('pf_page_section', array(
			'title' => esc_html__('Portfolio Slug Settings','julia'),
			'priority' => '70',
			'capability' => 'edit_theme_options',
			'panel' => 'pf_panel_section'
	));
	$wp_customize->add_setting( 'pf_slug_note', array(
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
  	$wp_customize->add_control(new Julia_Kaya_Customize_Description_Control( $wp_customize, 'pf_slug_note', array(
		'html_tags' => true,
		'label'    => wp_kses(__( '<strong class="customizer_note"> Note: </strong>This section is depricated, all options moved to “Talent Agency > General”, click ', 'julia'),$kaya_julia_customze_note_settings ).'<a target="_blank" href="'.admin_url('admin.php?page=kta-settings&tab=general').'" target="_blank">here</a> to configure.',
		'section'  => 'pf_page_section',
		'settings' => 'pf_slug_note',
		'priority' => 2
    )));
}
add_action('customize_register','julia_kaya_portfolio_color_section');
/*---------------------------------------------------------
 Portfolio Category Color Section 
----------------------------------------------------------*/
function julia_kaya_pf_cat_section( $wp_customize ){
	global $kaya_julia_customze_note_settings;
	$wp_customize->add_section('pf_menu_cat_section',array(
		'title' => esc_html__('Portfolio Category Settings', 'julia'),
		'priority' => '78',
		'panel' => 'pf_panel_section',
		'description' =>'<strong class="customizer_note"> Note: </strong>'.__('This section is depricated,  options moved to “Talent Agency > Talent Category”, click ', 'julia').'<a href="'.admin_url('admin.php?page=kta-settings&tab=talent_category').'" target="_blank">here</a> to configure.',
	));
	$wp_customize->add_setting( 'pf_category_menu_note', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));
    $wp_customize->add_control(  new Julia_Kaya_Customize_Description_Control(  $wp_customize, 'pf_category_menu_note', array(
		'html_tags' => true,
		'label'    => wp_kses(__( '<strong class="customizer_note"> Note: </strong> Use this section when you use "Portfolio Categories" in menu bar ', 'julia'),$kaya_julia_customze_note_settings ).'<a target="_blank" href="https://youtu.be/vODQrO2Xm_k">More Details</a>',
		'section'  => 'pf_menu_cat_section',
		'settings' => 'pf_category_menu_note',
		'priority' => 0
    )));
    // test
    $wp_customize->add_setting( 'disable_image_hover_title', array(
		'default'        => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('disable_image_hover_title', array(
		'label'    => esc_html__('Disable Image Hover Title','julia'),
		'section'  => 'pf_menu_cat_section',
		'type'     => 'checkbox',
		'priority' => 1
	) );

    // Category Slug Note
    /* $wp_customize->add_setting('pf_cat_slug_name', array(
      'default' => '',
      'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
 	$wp_customize->add_control('pf_slug_name',array(
	    'label' => esc_html__('Portfolio Slug Name','julia'),
	    'type' => 'text',
	    'section' => 'pf_page_section',
	    'priority' => 1
  	));
	$wp_customize->add_setting( 'pf_slug_note', array(
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
  	$wp_customize->add_control(new Julia_Kaya_Customize_Description_Control( $wp_customize, 'pf_slug_note', array(
		'html_tags' => true,
		'label'    => wp_kses(__( '<strong class="customizer_note"> Note: </strong> Please make sure that the permalinks to be updated by navigating to "Settings > Permalinks" select post and save changes to avoid 404 error page. for more information ', 'julia'),$kaya_julia_customze_note_settings ).'<a target="_blank" href="https://www.youtube.com/watch?v=b-sA78KCxmI&feature=youtu.be">Watch this video</a>',
		'section'  => 'pf_page_section',
		'settings' => 'pf_slug_note',
		'priority' => 2
    ))); */
    //End
    $colors = array();	
	$colors[] = array(
		'slug'=>'pf_cat_img_border_color',
		'default' => '#b9b9b9',
		'label' => esc_html__('Vertical Title BG Color ', 'julia'),
		'priority' =>10
	);
	$colors[] = array(
		'slug'=>'pf_cat_img_side_title_color',
		'default' => '#b9b9b9',
		'label' => esc_html__('Image Vertical Title Color', 'julia'),
		'priority' => 15
	);
	$wp_customize->add_setting('vertical_title_font_size', array( 
		'default' => '13',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'julia_kaya_check_number'
	 ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'vertical_title_font_size', array(
		'label'   => esc_html__('Vertical Title Font size','julia'),
		'section' => 'pf_menu_cat_section',
		'settings'    => 'vertical_title_font_size',
		'priority'    => 18,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
	)));
    $wp_customize->add_setting('vertical_title_letter_space', array(
    	'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'vertical_title_letter_space', array(
		'label'   => esc_html__('Vertical Title Letter Spacing','julia'),
		'section' => 'pf_menu_cat_section',
		'settings'    => 'vertical_title_letter_space',
		'priority'    => 20,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'vertical_title_font_weight', array(
        'default' => 'bold',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('vertical_title_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Vertical Title Font Weight','julia'),
        'section' => 'pf_menu_cat_section',
        'choices' => array(
        	'normal' => 'Normal',
        	'bold' => 'Bold'
        	),
		'priority' => 30,
    ));
    $wp_customize->add_setting( 'vertical_title_font_style', array(
        'default' => 'bold',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('vertical_title_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Vertical Title Font Style','julia'),
        'section' => 'pf_menu_cat_section',
        'choices' => array(
        	'normal' => 'Normal',
        	'italic' => 'Italic'
        	),
		'priority' => 40,
    ));
	$colors[] = array(
		'slug'=>'pf_cat_hover_bg_color',
		'default' => '#b9b9b9',
		'label' => esc_html__('Model Details BG Color', 'julia'),
		'priority' => 50
	);
    $colors[] = array(
		'slug'=>'pf_cat_desc_color',
		'default' => '#5e5e5e',
		'label' => esc_html__('Model Details Color', 'julia'),
		'priority' => 60
	);	
    foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'pf_menu_cat_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action('customize_register','julia_kaya_pf_cat_section');
/*------------------------------------------------
 Portfolio Single Page Settings 
 -------------------------------------------------*/
function julia_kaya_portfolio_single_page_settings( $wp_customize ) {
	$wp_customize->add_section(
	'pf_single_page_section',
	array(
		'title' => esc_html__( 'Portfolio Single Page Settings', 'julia'),
		'priority'       => 79,
		'capability' => 'edit_theme_options',
		'panel'  => 'pf_panel_section',
	));	

	$wp_customize->add_setting( 'pf_model_details_note', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ) );
    $wp_customize->add_control(  new Julia_Kaya_Customize_Subtitle_control(  $wp_customize, 'pf_model_details_note', array(
		'label'    => esc_html__( 'Model Information Section', 'julia'),
		'section'  => 'pf_single_page_section',
		'settings' => 'pf_model_details_note',
		'priority' => 0
    )));	
    $colors = array();
	$colors[] = array(
		'slug'=>'pf_contant_bg_color',
		'default' => '#ffffff',
		'label' => esc_html__('Model Details BG Color', 'julia'),
		'priority' =>1,
	);
	$colors[] = array(
		'slug'=>'pf_model_details_title_color',
		'default' => '#333',
		'label' => esc_html__('Model Information Titles', 'julia'),
		'priority' => 3,
	);
	$colors[] = array(
		'slug'=>'pf_porject_details_info_color',
		'default' => '#333',
		'label' => esc_html__('Model Information Color', 'julia'),
		'priority' => 5,
	);

	$wp_customize->add_setting( 'pf_single_tab_desc_note', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));
    $wp_customize->add_control(  new Julia_Kaya_Customize_Subtitle_control(  $wp_customize, 'pf_single_tab_desc_note',   array(
		'label'    => esc_html__( 'Tabs Color Section', 'julia'),
		'section'  => 'pf_single_page_section',
		'settings' => 'pf_single_tab_desc_note',
		'priority' => 6
    )));
	$colors[] = array(
		'slug'=>'pf_tabs_bg_color',
		'default' => '#f2f2f2',
		'label' => esc_html__('Tabs BG Color', 'julia'),
		'priority' =>9,
	);
	$colors[] = array(
		'slug'=>'pf_tabs_text_color',
		'default' => '#7a7a7a',
		'label' => esc_html__('Tabs Title Color', 'julia'),
		'priority' => 10,
	);
	$colors[] = array(
		'slug'=>'pf_tabs_active_bg_color',
		'default' => '#ff3333',
		'label' => esc_html__('Tabs Active BG Color', 'julia'),
		'priority' => 20,
	);
	$colors[] = array(
		'slug'=>'pf_tabs_active_bg_link_color',
		'default' => '#ffffff',
		'label' => esc_html__('Tabs Active BG Link Color', 'julia'),
		'priority' => 30,
	);
	
    $colors[] = array(
		'slug'=>'pf_shortdesc_title_color',
		'default' => '',
		'label' => esc_html__('Title Color', 'julia'),
		'priority' => 160
	);
    $colors[] = array(
		'slug'=>'pf_shortdesc_desc_color',
		'default' => '',
		'label' => esc_html__('Content Color', 'julia'),
		'priority' => 170
	);
    $colors[] = array(
		'slug'=>'pf_shortdesc_link_color',
		'default' => '',
		'label' => esc_html__('Hyper Link Color', 'julia'),
		'priority' => 180
	);
    $colors[] = array(
		'slug'=>'pf_shortdesc_link_hover_color',
		'default' => '',
		'label' => esc_html__('Hyper Link Hover Color', 'julia'),
		'priority' => 190
	);
	//Slider Next Previous Buttons
	 $wp_customize->add_setting( 'pf_single_slider_arrows_page_title', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'pf_single_slider_arrows_page_title', array(
        'label'    => esc_html__( 'Slider Next / Prevous Buttons', 'julia'),
      	'section' => 'pf_single_page_section',
      	'settings' => 'pf_single_slider_arrows_page_title',
      	'priority' => 193
    )));
    $colors[] = array(
		'slug'=>'pf_slider_button_arrow_bg_color',
		'default' => '#ff3333',
		'label' => esc_html__('Slider Arrow Buttons Background Color', 'julia'),
		'priority' => 194
	);
    $colors[] = array(
		'slug'=>'pf_slider_button_arrow_color',
		'default' => '#ffffff',
		'label' => esc_html__('Slider Arrow Buttons Color', 'julia'),
		'priority' => 195
	);
	 // CompCard Settings
    $wp_customize->add_setting( 'pf_single_page_compcard_settings', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'pf_single_page_compcard_settings', array(
        'label'    => esc_html__( 'Comp Card Settings', 'julia'),
      	'section' => 'pf_single_page_section',
      	'settings' => 'pf_single_page_compcard_settings',
      	'priority' => 196
    )));
    $colors[] = array(
		'slug'=>'pf_compcard_title_bg_color',
		'default' => '#ff3333',
		'label' => esc_html__('Compcard Image Title BG', 'julia'),
		'priority' => 197
	);
    $colors[] = array(
		'slug'=>'pf_compcard_title_color',
		'default' => '#ffffff',
		'label' => esc_html__('Compcard Image Title Color', 'julia'),
		'priority' => 198
	);
	$colors[] = array(
		'slug'=>'pf_compcard_model_info_titles_color',
		'default' => '#333',
		'label' => esc_html__('Compcard Model Details Titles Color', 'julia'),
		'priority' => 199
	);
    $colors[] = array(
		'slug'=>'pf_compcard_model_info_color',
		'default' => '#959595',
		'label' => esc_html__('Compcard Model Details Color', 'julia'),
		'priority' => 200
	);
	// Mext Prev Buttons BG Colors
    $wp_customize->add_setting( 'pf_single_page_title', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'pf_single_page_title', array(
        'label'    => esc_html__( 'Portfolio Single Page Buttons Text', 'julia'),
      	'section' => 'pf_single_page_section',
      	'settings' => 'pf_single_page_title',
      	'priority' => 201
    )));
    $wp_customize->add_setting( 'pf_nav_buttons_enable', array(
		'default'        => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('pf_nav_buttons_enable', array(
		'label'    => esc_html__( 'Enable Next / Prev Buttons','julia'),
		'section'  => 'pf_single_page_section',
		'type'     => 'checkbox',
		'priority' => 210
	) );
	$wp_customize->add_setting('pf_button_prev_text', array(
        'default' => esc_html__('PREVIOUS PROJECT','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	 $wp_customize->add_control('pf_button_prev_text', array(
        'label' => esc_html__('Previous Button Text', 'julia'),
        'section' => 'pf_single_page_section',
        'type' => 'text',
        'priority' => 220,    
    ));
    $wp_customize->add_setting('pf_button_next_text', array(
        'default' => esc_html__('NEXT PROJECT','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('pf_button_next_text', array(
        'label' => esc_html__('Next Button Text', 'julia'),
        'section' => 'pf_single_page_section',
        'type' => 'text',
        'priority' => 230,    
    ));
    // Enable Comment Section
    $wp_customize->add_setting( 'pf_single_page_enable_comments_title', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'pf_single_page_enable_comments_title', array(
        'label'    => esc_html__( 'Portfolio Single Page Comment Section', 'julia'),
      	'section' => 'pf_single_page_section',
      	'settings' => 'pf_single_page_enable_comments_title',
      	'priority' => 240
    )));
    $wp_customize->add_setting( 'enable_pf_single_page_comments', array(
		'default'        => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('enable_pf_single_page_comments', array(
		'label'    => esc_html__( 'Enable Comments','julia'),
		'section'  => 'pf_single_page_section',
		'type'     => 'checkbox',
		'priority' => 250
	) );
	//End
	foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize,$color['slug'],array(
			'label' => $color['label'], 
			'section' => 'pf_single_page_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action( 'customize_register', 'julia_kaya_portfolio_single_page_settings' );
/*--------------------------------------------------------------------------------------*/
// Portfolio Single Page Sharing Icons
/*-------------------------------------------------------------------------------------*/
function julia_kaya_pf_social_sharing_section($wp_customize)
{
	$wp_customize->add_section(	// ID
	'pf_social_sharing_section',
	// Arguments array
	array(
		'title' => esc_html__( 'Social Media Sharing Section', 'julia' ),
		'priority'       => 120,
		'capability' => 'edit_theme_options',
		'panel' => 'pf_panel_section',
		'description' => '<a target="_blank" href="https://www.youtube.com/watch?v=ijRsa1mg09c&feature=youtu.be">'. __( ' Watch this Video ', 'julia' ).'</a>'.__(' to know how to configure social sharing icons settings', 'julia'),
	));
	$wp_customize->add_setting( 'pf_social_shaing_icons_bg_color', array( 
		'default' => '#f2f2f2',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'pf_social_shaing_icons_bg_color',
	array(
		'label' => esc_html__('Sharing Icons BG Color','julia'),
		'section' => 'pf_social_sharing_section',
		'priority' => 10,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'pf_social_shaing_icons_color', array( 
		'default' => '#333',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'pf_social_shaing_icons_color',
	array(
		'label' => esc_html__('Sharing Icons Color','julia'),
		'section' => 'pf_social_sharing_section',
		'priority' => 20,
		'type' => 'color',
	))); 
	$wp_customize->add_setting( 'pf_social_shaing_icons_hover_bg_color', array( 
		'default' => '#ff3333',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'pf_social_shaing_icons_hover_bg_color',
	array(
		'label' => esc_html__('Sharing Icons Hover Background Color','julia'),
		'section' => 'pf_social_sharing_section',
		'priority' => 30,
		'type' => 'color',
	))); 
	$wp_customize->add_setting( 'pf_social_shaing_icons_hover_color', array( 
		'default' => '#ffffff',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'pf_social_shaing_icons_hover_color',
	array(
		'label' => esc_html__('Sharing Icons Hover Color','julia'),
		'section' => 'pf_social_sharing_section',
		'priority' => 40,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'pf_disable_facebook_icon', array(
		'default' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_facebook_icon', array(
	      'label'    => esc_html__( 'Disable Facebook', 'julia' ),
	      'section'  => 'pf_social_sharing_section',
	      'settings' => 'pf_disable_facebook_icon',
	      'type' => 'checkbox',
	      'priority' => 60
    ));
    $wp_customize->add_setting( 'pf_disable_twitter_icon', array(
		'default' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_twitter_icon', array(
	      'label'    => esc_html__( 'Disable Twitter', 'julia' ),
	      'section'  => 'pf_social_sharing_section',
	      'settings' => 'pf_disable_twitter_icon',
	      'type' => 'checkbox',
	      'priority' => 70
    ));

    $wp_customize->add_setting( 'pf_disable_google_plus_icon', array(
		'default' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_google_plus_icon', array(
	      'label'    => esc_html__( 'Disable Google Plus', 'julia' ),
	      'section'  => 'pf_social_sharing_section',
	      'settings' => 'pf_disable_google_plus_icon',
	      'type' => 'checkbox',
	      'priority' => 80
    ));
    $wp_customize->add_setting( 'pf_disable_linkedin_icon', array(
		'default' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_linkedin_icon', array(
	      'label'    => esc_html__( 'Disable Linkedin', 'julia' ),
	      'section'  => 'pf_social_sharing_section',
	      'settings' => 'pf_disable_linkedin_icon',
	      'type' => 'checkbox',
	      'priority' => 90
    ));

    $wp_customize->add_setting( 'pf_disable_pinterest_icon', array(
		'default' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_pinterest_icon', array(
	      'label'    => esc_html__( 'Disable Pinterest', 'julia' ),
	      'section'  => 'pf_social_sharing_section',
	      'settings' => 'pf_disable_pinterest_icon',
	      'type' => 'checkbox',
	      'priority' => 100
    ));
    $wp_customize->add_setting( 'pf_disable_stumbleupon_icon', array(
		'default' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_stumbleupon_icon', array(
	      'label'    => esc_html__( 'Disable Stumbleupon', 'julia' ),
	      'section'  => 'pf_social_sharing_section',
	      'settings' => 'pf_disable_stumbleupon_icon',
	      'type' => 'checkbox',
	      'priority' => 110
    ));
    $wp_customize->add_setting( 'pf_disable_digg_icon', array(
		'default' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_digg_icon', array(
	      'label'    => esc_html__( 'Disable Digg', 'julia' ),
	      'section'  => 'pf_social_sharing_section',
	      'settings' => 'pf_disable_digg_icon',
	      'type' => 'checkbox',
	      'priority' => 120
    ));
    $wp_customize->add_setting( 'pf_disable_email_icon', array(
		'default' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_email_icon', array(
	      'label'    => esc_html__( 'Disable Email', 'julia' ),
	      'section'  => 'pf_social_sharing_section',
	      'settings' => 'pf_disable_email_icon',
	      'type' => 'checkbox',
	      'priority' => 130
    ));
    $wp_customize->add_setting( 'email_fields_data_title', array(
		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
	) );
	$wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'email_fields_data_title', array(
      'label'    => esc_html__( 'Email From Field Settings ', 'julia' ),
      'section'  => 'pf_social_sharing_section',
      'settings' => 'email_fields_data_title',
      'priority' => 140
    )));
    // Email Address
    $wp_customize->add_setting('change_your_email_address_text',  array(
        'default' => esc_html__('Your Email Address','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control( 'change_your_email_address_text', array(
        'label' => esc_html__('Change Your Email Address Text', 'julia' ),
        'section' => 'pf_social_sharing_section',
        'type' => 'text',
        'priority' => 150,    
    ));
    //Your Name
    $wp_customize->add_setting('change_your_name_text',  array(
        'default' => esc_html__('Your Name','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control( 'change_your_name_text', array(
        'label' => esc_html__('Change Your Name Text', 'julia' ),
        'section' => 'pf_social_sharing_section',
        'type' => 'text',
        'priority' => 160,    
    ));
    //Send to Email Address
    $wp_customize->add_setting('change_send_email_text',  array(
        'default' => esc_html__('Send to Email Address','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control( 'change_send_email_text', array(
        'label' => esc_html__('Change Send to Email Address Text', 'julia' ),
        'section' => 'pf_social_sharing_section',
        'type' => 'text',
        'priority' => 170,    
    ));
    // Success Message
    $wp_customize->add_setting('change_form_success_msg',  array(
        'default' => esc_html__('This post has been shared!','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control( 'change_form_success_msg', array(
        'label' => esc_html__('Form Success Message Text', 'julia' ),
        'section' => 'pf_social_sharing_section',
        'type' => 'text',
        'priority' => 180,    
    ));
    //Failure Message
    $wp_customize->add_setting('change_form_error_msg',  array(
        'default' => esc_html__('Email check failed, please try again','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control( 'change_form_error_msg', array(
        'label' => esc_html__('Form Error Message Text', 'julia' ),
        'section' => 'pf_social_sharing_section',
        'type' => 'text',
        'priority' => 190,    
    ));
    // Shared Post
    $wp_customize->add_setting('change_shared_post_msg',  array(
        'default' => esc_html__('[Shared Post]','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control( 'change_shared_post_msg', array(
        'label' => esc_html__('Shared Post', 'julia' ),
        'section' => 'pf_social_sharing_section',
        'type' => 'text',
        'priority' => 200,    
    ));
    //Button Text
    $wp_customize->add_setting('change_form_submit_button_text',  array(
        'default' => esc_html__('SUBMIT','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control( 'change_form_submit_button_text', array(
        'label' => esc_html__('Change Form Submit Text', 'julia' ),
        'section' => 'pf_social_sharing_section',
        'type' => 'text',
        'priority' => 210,    
    ));
    // Colors
    $wp_customize->add_setting( 'pf_email_form_button_bg', array( 
		'default' => '#ff3333',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'pf_email_form_button_bg',
	array(
		'label' => esc_html__('Button Background Color','julia'),
		'section' => 'pf_social_sharing_section',
		'priority' => 220,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'pf_email_form_button_color', array( 
		'default' => '#ffffff',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'pf_email_form_button_color',
	array(
		'label' => esc_html__('Button Color','julia'),
		'section' => 'pf_social_sharing_section',
		'priority' => 230,
		'type' => 'color',
	)));	
}
//add_action( 'customize_register', 'julia_kaya_pf_social_sharing_section' );
/*-----------------------------------------------------------------------------------*/
// Blog Single Page
/*-----------------------------------------------------------------------------------*/ 
function julia_kaya_blog_page_section( $wp_customize ){
  // Blog Page Categories
	$wp_customize->add_panel( 'blog_section', array(
	    'priority' => 100,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__( 'Blog Page Settings', 'julia'),
	));
  	$wp_customize->add_section('blog_page_section',array(
      'title' => esc_html__('Blog General Settings','julia'),
      'priority' => '100',
      'panel' => 'blog_section',
    )); 
}
add_action('customize_register','julia_kaya_blog_page_section');
/* Blog Page Color Section */
function julia_kaya_blog_page_bg_section( $wp_customize ){
	global $kaya_julia_customze_note_settings;
	$wp_customize->add_section('blog_bg_color_section',array(
		'title' => esc_html__('Blog Posts Settings', 'julia'),
		'priority' => '100',
		'panel' => 'blog_section',
		'description' => wp_kses(__( '<strong class="customizer_note"> Note: </strong>Below settings applies for blog archives page , category page, author page and tags page. for more details', 'julia'),$kaya_julia_customze_note_settings ).'<a href="https://youtu.be/pK9_XAnr_S0">'.esc_html__('watch this video', 'julia').'</a>',
	)); 
  



    $wp_customize->add_setting('blog_sidebar_positions', array(
		'default' => 'fullwidth',
		'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize',
	));
	$wp_customize->add_control('blog_sidebar_positions',array(
		'label' => esc_html__('Sidebar Position','julia'),
		'type' => 'radio',
		'section' => 'blog_bg_color_section',
		'choices' => array(
			'fullwidth' => esc_html__('No Sidebar','julia'),
			'three_fourth' => esc_html__('Right','julia'),
			'three_fourth_last' => esc_html__('Left','julia')
			),
		'priority' => 4
	));

 $wp_customize->add_setting( 'blog_sidebar_id', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	'default' => 'sidebar-1',
    ));
    $wp_customize->add_control(  new Julia_Kaya_Customize_Sidebar_Control( $wp_customize, 'blog_sidebar_id', array(
      'label'    => __( 'Select Sidebar', 'julia' ),
      'section'  => 'blog_bg_color_section',
      'settings' => 'blog_sidebar_id',
      'priority' => 5,
    )));



    /*
    	$wp_customize->add_setting('blog_single_page_sidebar', array(
		'default' => 'two_third',
		'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize',
    ));

  	$wp_customize->add_control('blog_single_page_sidebar',array(
		'label' => esc_html__('Blog Sidebar Position','julia'),
		'type' => 'radio',
		'section' => 'blog_bg_color_section',
		'choices' => array(
			'fullwidth' => esc_html__('No Sidebar','julia'),
			'three_fourth' => esc_html__('Right','julia'),
			'three_fourth_last' => esc_html__('Left','julia')
		),
		'priority' => 2
  	)); 
  	*/
	$wp_customize->add_setting('blog_cat_limit_content', 
    array(
        'default' => 35,
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('blog_cat_limit_content', array(
        'label' => esc_html__('Limit Word', 'julia'),
        'section' => 'blog_bg_color_section',
        'type' => 'text',
        'priority' => 6,    
    ));

	$colors = array();
	$colors[] = array(
		'slug'=>'blog_page_bg_color',
		'default' => '#FFFFFF',
		'label' => esc_html__('Background Color', 'julia'),
		'priority' => 10
	);
	$colors[] = array(
		'slug'=>'blog_page_date_bg_color',
		'default' => '#ff3333',
		'label' => esc_html__('Date Background Color', 'julia'),
		'priority' => 20
	);
	$colors[] = array(
		'slug'=>'blog_page_date_color',
		'default' => '#ffffff',
		'label' => esc_html__('Date Color', 'julia'),
		'priority' => 30
	);
    $colors[] = array(
		'slug'=>'blog_page_title_color',
		'default' => '#333333',
		'label' => esc_html__('Title Color', 'julia'),
		'priority' => 40
	);
	 $colors[] = array(
		'slug'=>'blog_page_title_hover_color',
		'default' => '#ff3333',
		'label' => esc_html__('Title Hover Color', 'julia'),
		'priority' => 50
	);
	$colors[] = array(
		'slug'=>'blog_desc_color',
		'default' => '#787878',
		'label' => esc_html__('Description', 'julia'),
		'priority' => 70
	);
	$colors[] = array(
		'slug'=>'blog_meta_info_t_b_border_color',
		'default' => '#cccccc',
		'label' => esc_html__('Meta Info Border Top & Bottom Color', 'julia'),
		'priority' => 80
	);
    $colors[] = array(
		'slug'=>'blog_link_color',
		'default' => '#333333',
		'label' => esc_html__('Hyper Meta Info Link Color', 'julia'),
		'priority' => 90
	);
    $colors[] = array(
		'slug'=>'blog_link_hover_color',
		'default' => '#ff3333',
		'label' => esc_html__('Hyper Meta Info Link Hover Color', 'julia'),
		'priority' => 100
	);
    //Button Settings
	$wp_customize->add_setting('kaya_readmore_blog', array(
        'default' => esc_html__('Read More','julia'),
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control( 'kaya_readmore_blog',  array(
        'label' => esc_html__('Readmore Button Text', 'julia'),
        'section' => 'blog_bg_color_section',
        'type' => 'text',
        'priority' => 105,    
    ));
	$colors[] = array(
		'slug'=>'blog_button_bg_color',
		'default' => '#ff3333',
		'label' => esc_html__('Readmore Button BG Color', 'julia'),
		'priority' => 110
	);
	$colors[] = array(
		'slug'=>'blog_button_color',
		'default' => '#ffffff',
		'label' => esc_html__('Readmore Button Text Color', 'julia'),
		'priority' => 120
	);
    $colors[] = array(
		'slug'=>'blog_button_hover_bg_color',
		'default' => '#ff3333',
		'label' => esc_html__('Readmore Button Hover BG Color', 'julia'),
		'priority' => 130
	);
    $colors[] = array(
		'slug'=>'blog_button_hover_color',
		'default' => '#ffffff',
		'label' => esc_html__('Readmore Button Hover Text Color', 'julia'),
		'priority' => 140
	);
    $wp_customize->add_setting( 'blog_button_letter_space', array(
        'default'        => '0',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'julia_kaya_check_number',
    ) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'blog_button_letter_space', array(
		'label'   => esc_html__('Readmore Button Letter Space (px)','julia'),
    	'section' => 'blog_bg_color_section',
		'settings'    => 'blog_button_letter_space',
		'priority'    => 150,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'blog_button_button_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_button_button_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Readmore Button Font Weight','julia'),
        'section' => 'blog_bg_color_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 160,
    ));
    $wp_customize->add_setting( 'blog_button_button_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_button_button_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Readmore Button Font Style','julia'),
        'section' => 'blog_bg_color_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'italic' => esc_html__('Italic','julia'),
        	),
		'priority' =>170,
    ));
	$colors[] = array(
		'slug'=>'blog_gallery_slider_buttons_color',
		'default' => '#b9b9b9',
		'label' => esc_html__('Gallery Slider Navigation Color', 'julia'),
		'priority' => 180
	);
    $colors[] = array(
		'slug'=>'blog_gallery_slider_active_buttons_color',
		'default' => '#ff3333',
		'label' => esc_html__('Gallery Slider Active Navigation Color', 'julia'),
		'priority' => 190
	);
    foreach( $colors as $color ) {
	// SETTINGS
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'blog_bg_color_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action('customize_register','julia_kaya_blog_page_bg_section');
/*-----------------------------------------------------
 Blog Single Page  Section 
 ------------------------------------------------------*/
function julia_kaya_blog_single_page_bg_section( $wp_customize ){
	$wp_customize->add_section('blog_single_bg_section',array(
		'title' => esc_html__('Blog Single page Section', 'julia'),
		'priority' => '101',
		'panel' => 'blog_section',
		'description' => '<a target="_blank" href="https://youtu.be/K6UldFCr3_Q">'. __( ' Watch this Video ', 'julia' ).'</a>'.__(' to know how to configure blog single page settings', 'julia'),
	));
	$wp_customize->add_setting('blog_single_page_sidebar', array(
		'default' => 'two_third',
		'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize',
    ));

  	$wp_customize->add_control('blog_single_page_sidebar',array(
		'label' => esc_html__('Blog Sidebar Position','julia'),
		'type' => 'radio',
		'section' => 'blog_single_bg_section',
		'choices' => array(
			'fullwidth' => esc_html__('No Sidebar','julia'),
			'three_fourth' => esc_html__('Right','julia'),
			'three_fourth_last' => esc_html__('Left','julia')
		),
		'priority' => 2
  	)); 
	$colors = array();
	$colors[] = array(
		'slug'=>'blog_single_page_bg_color',
		'default' => '#FFFFFF',
		'label' => esc_html__('Background Color', 'julia'),
		'priority' => 10
	);
    $colors[] = array(
		'slug'=>'blog_single_page_title_color',
		'default' => '#ffffff',
		'label' => esc_html__('Title Color', 'julia'),
		'priority' => 40
	);
	$colors[] = array(
		'slug'=>'blog_single_page_title_border_color',
		'default' => '#333',
		'label' => esc_html__('Title Bottom Border Color', 'julia'),
		'priority' => 40
	);
	$colors[] = array(
		'slug'=>'blog_single_page_desc_color',
		'default' => '#999',
		'label' => esc_html__('Description', 'julia'),
		'priority' => 70
	);
	
    $colors[] = array(
		'slug'=>'blog_single_page_link_color',
		'default' => '#999',
		'label' => esc_html__('Hyper Link Color', 'julia'),
		'priority' => 90
	);
    $colors[] = array(
		'slug'=>'blog_single_page_link_hover_color',
		'default' => '#ff3333',
		'label' => esc_html__('Hyper Link Hover Color', 'julia'),
		'priority' => 100
	);
	// Blog Next Prev Colors
	$wp_customize->add_setting( 'blog_single_page_title', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	));
    $wp_customize->add_control(  new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'blog_single_page_title', array(
        'label'    => esc_html__( 'Blog Single Page Next / Prev Buttons Text', 'julia'),
      	'section' => 'blog_single_bg_section',
      	'settings' => 'blog_single_page_title',
      	'priority' => 110
    )));
	$wp_customize->add_setting('blog_button_prev_text', 
    array(
        'default' => esc_html__('PREVIOUS PROJECT','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('blog_button_prev_text', array(
        'label' => esc_html__('Previous Button Text', 'julia'),
        'section' => 'blog_single_bg_section',
        'type' => 'text',
        'priority' => 120,    
    ));
    $wp_customize->add_setting('blog_button_next_text', 
    array(
        'default' => esc_html__('NEXT PROJECT','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('blog_button_next_text',
    array(
        'label' => esc_html__('Next Button Text', 'julia'),
        'section' => 'blog_single_bg_section',
        'type' => 'text',
        'priority' => 130,    
    ));
    foreach( $colors as $color ) {
	// SETTINGS
		$wp_customize->add_setting($color['slug'], array(
			'default' => $color['default'],
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'blog_single_bg_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action('customize_register','julia_kaya_blog_single_page_bg_section');
/*--------------------------------------------------------------
Blog Single Quote 
--------------------------------------------------------------*/
function julia_kaya_blog_quote_section( $wp_customize ){
	$wp_customize->add_section('blog_quote_section',array(
		'title' => esc_html__('Blog Quote Format Section', 'julia'),
		'priority' => '105',
		'panel' => 'blog_section',
		'description' => '<a target="_blank" href="https://youtu.be/gCnbSU8pcAY">'. __( ' Watch this Video ', 'julia' ).'</a>'.__(' to know how to configure blog quotation format settings', 'julia'),
	));
	$wp_customize->add_setting( 'blog_quote_font_size', array(
        'default'        => '23',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'julia_kaya_check_number',
    ) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'blog_quote_font_size', array(
		'label'   => esc_html__('Blog Quote Format Font Size (px)','julia'),
    	'section' => 'blog_quote_section',
		'settings'    => 'blog_quote_font_size',
		'priority'    => 1,
		'choices'  => array(
			'min'  => 15,
			'max'  => 100,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'blog_quote_font_letter_space', array(
        'default'        => '0',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'julia_kaya_check_number',
    ) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'blog_quote_font_letter_space', array(
		'label'   => esc_html__('Blog Quote Format Font Letter Space (px)','julia'),
    	'section' => 'blog_quote_section',
		'settings'    => 'blog_quote_font_letter_space',
		'priority'    => 5,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'blog_quote_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_quote_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Blog Quote Format Font Weight','julia'),
        'section' => 'blog_quote_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 10,
    ));
    $wp_customize->add_setting( 'blog_quote_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_quote_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Blog Quote Format Font Style','julia'),
        'section' => 'blog_quote_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'italic' => esc_html__('Italic','julia'),
        	),
		'priority' =>15,
    ));
    $wp_customize->add_setting( 'blog_quote_author_title', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control(new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'blog_quote_author_title', array(
        'label'    => esc_html__( 'Quote Format Author Settings', 'julia'),
      'section' => 'blog_quote_section',
      'settings' => 'blog_quote_author_title',
      'priority' => 20
    )));
    $wp_customize->add_setting( 'blog_quote_author_font_size', array(
        'default'        => '18',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'julia_kaya_check_number',
    ) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'blog_quote_author_font_size', array(
		'label'   => esc_html__('Blog Quote Format Author Font Size (px)','julia'),
    	'section' => 'blog_quote_section',
		'settings'    => 'blog_quote_author_font_size',
		'priority'    => 30,
		'choices'  => array(
			'min'  => 15,
			'max'  => 100,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'blog_quote_author_font_letter_space', array(
        'default'        => '0',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'julia_kaya_check_number',
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'blog_quote_author_font_letter_space', array(
		'label'   => esc_html__('Blog Quote Format Author Font Letter Space (px)','julia'),
    	'section' => 'blog_quote_section',
		'settings'    => 'blog_quote_author_font_letter_space',
		'priority'    => 40,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'blog_quote_author_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_quote_author_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Blog Quote Format Author Font Weight','julia'),
        'section' => 'blog_quote_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 50,
    ));
    $wp_customize->add_setting( 'blog_quote_author_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_quote_author_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Blog Quote Format Author Font Style','julia'),
        'section' => 'blog_quote_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'italic' => esc_html__('Italic','julia'),
        	),
		'priority' =>60,
    ));
}
add_action('customize_register','julia_kaya_blog_quote_section');
/*---------------------------------------------------
 Blog Related Post 
-----------------------------------------------------*/
function julia_kaya_blog_single_related_post_section( $wp_customize ){
	$wp_customize->add_section('blog_single_related_post_section',array(
		'title' => esc_html__('Blog Single Related Post Title Settings', 'julia'),
		'priority' => '105',
		'panel' => 'blog_section',
		'description' => '<a target="_blank" href="https://youtu.be/rHmvWHxeaD8">'. __( ' Watch this Video ', 'julia' ).'</a>'.__(' to know how to configure related post slider settings', 'julia'),
	));
	$colors = array();
	$wp_customize->add_setting('single_related_post_title', 
    array(
        'default' => esc_html__('Related Articles','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('single_related_post_title',
    array(
        'label' => esc_html__('Single Page Related Post Title', 'julia'),
        'section' => 'blog_single_related_post_section',
        'type' => 'text',
        'priority' => 10,    
    ));
}
add_action('customize_register','julia_kaya_blog_single_related_post_section');
/* ------------------------------------------------------------
Comment Form Section 
-------------------------------------------------------------- */
function julia_kaya_blog_single_comment_form_section( $wp_customize ){
	$wp_customize->add_section('blog_single_comment_section',array(
		'title' => esc_html__('Blog Single Comment Form Settings', 'julia'),
		'priority' => '106',
		'panel' => 'blog_section',
		'description' => '<a target="_blank" href="https://youtu.be/2W-5oLwGn6E">'. __( ' Watch this Video ', 'julia' ).'</a>'.__(' to know how to configure comment form settings', 'julia'),
	));
	$colors = array();
	$colors[] = array(
		'slug'=>'blog_single_page_comment_list_border_color',
		'default' => '#cccccc',
		'label' => esc_html__('Comments List Bottom Border Color', 'julia'),
		'priority' => 1
	);
	$colors[] = array(
		'slug'=>'comment_form_border_color',
		'default' => '#cccccc',
		'label' => esc_html__('Comment Form Border Color', 'julia'),
		'priority' => 10
	);
	$colors[] = array(
		'slug'=>'comment_form_input_text',
		'default' => '#757575',
		'label' => esc_html__('Comment Form Input Text Color', 'julia'),
		'priority' => 11
	);
	$wp_customize->add_setting('comment_form_text', 
    array(
        'default' => esc_html__('SUBMIT','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('comment_form_text',
    array(
        'label' => esc_html__('Submit Button Text', 'julia'),
        'section' => 'blog_single_comment_section',
        'type' => 'text',
        'priority' => 20,    
    ));
	$colors[] = array(
		'slug'=>'comment_form_button_bg',
		'default' => '#ff3333',
		'label' => esc_html__('Comment Form Button BG Color', 'julia'),
		'priority' => 30
	);
	$colors[] = array(
		'slug'=>'comment_form_button_color',
		'default' => '#ffffff',
		'label' => esc_html__('Comment Form Button Color', 'julia'),
		'priority' => 40
	);
	$colors[] = array(
		'slug'=>'comment_form_button_hover_bg',
		'default' => '#ffffff',
		'label' => esc_html__('Comment Form Button Hover BG Color', 'julia'),
		'priority' => 50
	);
	$colors[] = array(
		'slug'=>'comment_form_button_hover_color',
		'default' => '#ff3333',
		'label' => esc_html__('Comment Form Button Hover Color', 'julia'),
		'priority' => 60
	);
	   $wp_customize->add_setting( 'comment_form_button_letter_sapcing', array(
        'default'        => '0',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'julia_kaya_check_number',
    ) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'comment_form_button_letter_sapcing', array(
			 'label'   => esc_html__('Comment Form Button Letter Space (px)','julia'),
        	'section' => 'blog_single_comment_section',
			'settings'    => 'comment_form_button_letter_sapcing',
			'priority'    => 70,
			'choices'  => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1
			),
		)));
    $wp_customize->add_setting( 'comment_form_button_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('comment_form_button_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Comment Form Button Font Weight','julia'),
        'section' => 'blog_single_comment_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 80,
    ));
    $wp_customize->add_setting( 'comment_form_button_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('comment_form_button_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Comment Form Button Font Style','julia'),
        'section' => 'blog_single_comment_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'italic' => esc_html__('Italic','julia'),
        	),
		'priority' =>90,
    ));
    foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control( new WP_Customize_Color_Control(	$wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'blog_single_comment_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}    
}
add_action('customize_register','julia_kaya_blog_single_comment_form_section');
/*------------------------------------------------------------------
 Coming Soon Page Section
--------------------------------------------------------------------*/
function julia_kaya_coming_soon_page_section($wp_customize){
	$wp_customize->add_section('coming_soon_page_section',array(
		'title' => esc_html__('Coming Soon Page Settings','julia'),
		'priority' => '125',
	));	
	$color = array();
	$src=get_template_directory_uri() . '/images';
	$wp_customize->add_setting('upload_bg_img[coming_soon_bg]', array(
	    'default'           => esc_url( $src ).'/coming-soon-page.jpg',
	    'capability'        => 'edit_theme_options',
	    'sanitize_callback' => 'esc_url_raw',
	    'transport' => 'postMessage'
	));
    $wp_customize->add_control( new Julia_Kaya_Customize_Imageupload_Control($wp_customize, 'coming_soon_bg', array(
        'label'    => esc_html__('Upload Coming Soon BG Image', 'julia'),
        'section'  => 'coming_soon_page_section',
        'settings' => 'upload_bg_img[coming_soon_bg]',
		'priority' => 1
    )));
    $wp_customize->add_setting( 'disable_coming_soon_pattern', array(
		'default' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'disable_coming_soon_pattern', array(
	      'label'    => esc_html__( 'Disable Pattern', 'julia' ),
	      'section'  => 'coming_soon_page_section',
	      'settings' => 'disable_coming_soon_pattern',
	      'type' => 'checkbox',
	      'priority' => 2
    ));
	$wp_customize->add_setting('coming_soon_page_title', array(
        'default' => esc_html__('Homes & Offices','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('coming_soon_page_title', array(
        'label' => esc_html__('Coming Soon Page Title', 'julia'),
        'section' => 'coming_soon_page_section',
        'type' => 'text',
        'priority' => 5,    
    ));
    $wp_customize->add_setting('coming_soon_page_description', array(
        'default' => esc_html__('We strive to leave the tiniest footprint we can. Thats why our goods are designed and manufactured in the USA. We believe that one of the most.','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control(new Julia_Kaya_Customize_Textarea_Control( $wp_customize, 'coming_soon_page_description', array(
      'label'    => esc_html__( 'Coming Soon Page Content', 'julia'),
      'section'  => 'coming_soon_page_section',
      'settings' => 'coming_soon_page_description',
      'priority' => 10,
      'type' => 'text-area',
      )));
	$wp_customize->add_setting('coming_soon_page_date', array(
        'default' => '2030/10/25',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('coming_soon_page_date', array(
        'label' => esc_html__('Coming Soon Date', 'julia'),
        'section' => 'coming_soon_page_section',
        'type' => 'text',
        'priority' => 20,    
    ));
    $wp_customize->add_setting('coming_soon_page_date_format', array(
        'default' => 'YYYY/MM/DD',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control(  new Julia_Kaya_Customize_Description_Control(  $wp_customize, 'coming_soon_page_date_format', array(
      'label'    => esc_html__( 'Date Format -  YYYY/MM/DD', 'julia'),
      'section'  => 'coming_soon_page_section',
      'settings' => 'coming_soon_page_date_format',
      'priority' => 21
    )));
	$colors[] = array(
	  'slug'=>'coming_soon_page_title_color',
	  'default' => '#b9b9b9',
	  'label' => esc_html__('Coming Soon Page Title Color', 'julia'),
	  'priority' => 30
	);
	$colors[] = array(
	  'slug'=>'coming_soon_page_title_border_color',
	  'default' => '#ff3333',
	  'label' => esc_html__('Coming Soon Page Title Border Color', 'julia'),
	  'priority' => 40
	);
	$colors[] = array(
	  'slug'=>'coming_soon_date_bg_color',
	  'default' => '#b9b9b9',
	   'priority' => 50,
	  'label' => esc_html__('Date Background Color', 'julia')
	);
	$colors[] = array(
	  'slug'=>'coming_soon_date_color',
	  'default' => '#ff3333',
	   'priority' => 60,
	  'label' => esc_html__('Date Color', 'julia')
	);
	$colors[] = array(
	  'slug'=>'coming_soon_date_m_s_h_color',
	  'default' => '#151515',
	   'priority' => 70,
	  'label' => esc_html__('Date Week / Days / Hours Color', 'julia')
	);
	$wp_customize->add_setting( 'coming_soon_social_icons', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'coming_soon_social_icons', array(
        'label'    => esc_html__( 'Social Icons Settings', 'julia'),
      'section' => 'coming_soon_page_section',
      'settings' => 'coming_soon_social_icons',
      'priority' =>75
    )));
	$colors[] = array(
	  'slug'=>'coming_soon_social_icons_bg_color',
	  'default' => '#ff3333',
	   'priority' => 80,
	  'label' => esc_html__('Social Icons Background Color', 'julia')
	);
	$colors[] = array(
	  'slug'=>'coming_soon_social_icons_color',
	  'default' => '#ffffff',
	   'priority' => 90,
	  'label' => esc_html__('Social Icons Color', 'julia')
	);
	$colors[] = array(
	  'slug'=>'coming_soon_social_icons_hover_bg_color',
	  'default' => '#FFFFFF',
	   'priority' => 100,
	  'label' => esc_html__('Social Icons Hover Background Color', 'julia')
	);
	$colors[] = array(
	  'slug'=>'coming_soon_social_icons_hover_color',
	  'default' => '#ffffff',
	   'priority' => 110,
	  'label' => esc_html__('Social Icons Hover Color', 'julia')
	);	
	foreach( $colors as $color ) {
	  // SETTINGS
	 	$wp_customize->add_setting(  $color['slug'], array(
			'default' => $color['default'],
			'capability' =>  'edit_theme_options',
			'transport'   => 'postMessage',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
	  	// CONTROLS
	  	$wp_customize->add_control(  new WP_Customize_Color_Control( $wp_customize,  $color['slug'],  array(
		  	'label' => $color['label'], 
		    'section' => 'coming_soon_page_section',
		    'priority' => $color['priority'],
		    'settings' => $color['slug'])
	    ));
	}
}
add_action('customize_register','julia_kaya_coming_soon_page_section');
/*-----------------------------------------------------------
 Error Page Setings 
------------------------------------------------------------*/
function julia_kaya_error_page_section($wp_customize){
	$wp_customize->add_section('error_page_section',array(
				'title' => esc_html__('404 Error Page Settings','julia'),
				'priority' => '125',
		));	
	$color = array(); 
	$wp_customize->add_setting('upload_404_bg_img[404_page_bg]', array(
	    'default'           => '',
	    'capability'        => 'edit_theme_options',
	    'sanitize_callback' => 'esc_url_raw',
	    'transport' => 'postMessage'
	));
    $wp_customize->add_control( new Julia_Kaya_Customize_Imageupload_Control($wp_customize, '404_page_bg', array(
        'label'    => esc_html__('Upload 404 Page BG Image', 'julia'),
        'section'  => 'error_page_section',
        'settings' => 'upload_404_bg_img[404_page_bg]',
		'priority' => 1
    )));
	$wp_customize->add_setting('error_404_bg_repeat',	array(
		'deafult' => 'repeat',
		'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('error_404_bg_repeat',	array(
		'label' => esc_html__('Background Repeat','julia'),
		'capability' => 'edit_theme_options', 
		'section' => 'error_page_section',
		'priority' => 20,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => 'No Repeat',
			'repeat' => 'Repeat',
			'cover' => 'Cover'
			)
		));
	$wp_customize->add_setting('error_404_bg_position',	array(
		'deafult' => 'center',
		'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('error_404_bg_position',	array(
		'label' => esc_html__('Background Image Position','julia'),
		'capability' => 'edit_theme_options', 
		'section' => 'error_page_section',
		'priority' => 30,
		'type' => 'radio',
		'choices' => array(
			'center' => esc_html__('Center','julia'),
			'left' => esc_html__('Left','julia'),
			'right' => esc_html__('Right','julia'),
			)
		)); 
	$wp_customize->add_setting( 'disable_error_page_pattern', array(
		'default' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'disable_error_page_pattern', array(
	      'label'    => esc_html__( 'Disable Pattern', 'julia' ),
	      'section'  => 'error_page_section',
	      'settings' => 'disable_error_page_pattern',
	      'type' => 'checkbox',
	      'priority' => 35
    ));
	$wp_customize->add_setting('error_page_title', array(
        'default' => esc_html__('Sorry, this page does not exist','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('error_page_title', array(
        'label' => esc_html__('Error Page Title', 'julia'),
        'section' => 'error_page_section',
        'type' => 'text',
        'priority' => 40,    
    ));
	$wp_customize->add_setting('error_page_button_name', array(
        'default' => esc_html__('GO TO HOME PAGE','julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('error_page_button_name', array(
        'label' => esc_html__('GO TO HOME PAGE Button Name', 'julia'),
        'section' => 'error_page_section',
        'type' => 'text',
        'priority' => 45,    
    ));
	$colors[] = array(
	  'slug'=>'title_color_404',
	  'default' => '#fff',
	   'priority' => 50,
	  'label' => esc_html__('404 Color', 'julia')
	);
	$colors[] = array(
	  'slug'=>'error_page_button_color',
	  'default' => '#b9b9b9',
	  'label' => esc_html__('Error Page Button Color', 'julia'),
	  'priority' => 60
	);
	$colors[] = array(
	  'slug'=>'error_page_button_bg_color',
	  'default' => '#ff3333',
	  'label' => esc_html__('Error Page Button BG Color', 'julia'),
	  'priority' => 70
	);
	$colors[] = array(
	  'slug'=>'error_page_button_hover_color',
	  'default' => '#ff3333',
	  'label' => esc_html__('Error Page Button Hover Color', 'julia'),
	  'priority' => 80
	);
	$colors[] = array(
	  'slug'=>'error_page_button_hover_bg_color',
	  'default' => '#b9b9b9',
	  'label' => esc_html__('Error Page Button Hover BG Color', 'julia'),
	  'priority' => 90
	);
	$wp_customize->add_setting( 'error_page_button_letter_sapcing', array(
        'default'        => '0',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'julia_kaya_check_number',
    ) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'error_page_button_letter_sapcing', array(
			 'label'   => esc_html__('Error Page Button Letter Space (px)','julia'),
        	'section' => 'error_page_section',
			'settings'    => 'error_page_button_letter_sapcing',
			'priority'    => 100,
			'choices'  => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1
			),
		)));
    $wp_customize->add_setting( 'error_page_button_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
     $wp_customize->add_control('error_page_button_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Error Page  Button Font Weight','julia'),
        'section' => 'error_page_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 110,
    ));
     $wp_customize->add_setting( 'error_page_button_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('error_page_button_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Error Page  Button Font Style','julia'),
        'section' => 'error_page_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'italic' => esc_html__('Italic','julia'),
        	),
		'priority' =>120,
    ));	
	foreach( $colors as $color ) {
	  // SETTINGS
	  	$wp_customize->add_setting( $color['slug'], array(
	    	'default' => $color['default'],
	      	'capability' =>  'edit_theme_options',
	      	'transport'   => '',
	      	'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	    ) );
	  	// CONTROLS
	  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array(
	  		'label' => $color['label'], 
	      	'section' => 'error_page_section',
	      	'priority' => $color['priority'],
	      	'settings' => $color['slug'])
	    ));
	}
}
add_action('customize_register','julia_kaya_error_page_section');
/*---------------------------------------------------
 Most Footer
----------------------------------------------------*/
function julia_kaya_most_footer_section( $wp_customize ) {
	$wp_customize->add_section(
	// ID
	'footer-section',
	// Arguments array
	array(
		'title' => __( 'Footer  Section', 'julia' ),
		'priority'       => 140,
		'capability' => 'edit_theme_options',
		'description' => '<a target="_blank" href="https://youtu.be/OEml05cHWk8">'. __( ' Watch this Video ', 'julia' ).'</a>'.__(' to know how to bottom footer settings', 'julia'),
	));

	$wp_customize->add_setting( 'disable_footer_sticky', array(
		'default'        => '',
		'transport' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	// Page Wise Footer
	 $wp_customize->add_setting( 'select_footer_type', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	'default' => 'default_footer',
    ));
   $wp_customize->add_control('select_footer_type', array(
        'type' => 'select',
        'label' => esc_html__('Select Footer Type','julia'),
        'section' => 'footer-section',
        'choices' => array(
        	 'default_footer' => esc_html__('Default Footer','julia'),
        	 'page_type_footer' => esc_html__('Page Type Footer','julia'),
        	),
		'priority' => 0,
    ));	

	 $wp_customize->add_setting( 'footer_page_id', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	'default' => '',
    ));
    $wp_customize->add_control(  new Julia_Kaya_Customize_Page_Control( $wp_customize, 'footer_page_id', array(
      'label'    => __( 'Select Page Footer', 'petsvets' ),
      'page_slug' => false,
      'section'  => 'footer-section',
      'settings' => 'footer_page_id',
      'priority' => 1,
    )));

	$wp_customize->add_control('disable_footer_sticky', array(
		'label'    => esc_html__( 'Disable Sticky Footer','julia'),
		'section'  => 'footer-section',
		'type'     => 'checkbox',
		'priority' => 8
	));
 	$wp_customize->add_setting( 'bottom_footer_contact_info', array(
		'deafult' => __('YOURMAIL@DOMAIN.COM | +81 5265 854','julia'),
		//'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));
    $wp_customize->add_control(new Julia_Kaya_Customize_Textarea_Control( $wp_customize, 'bottom_footer_contact_info', array(
      	'label'    => esc_html__( 'Contact Information', 'julia' ),
      	'section'  => 'footer-section',
      	'settings' => 'bottom_footer_contact_info',
      	'priority' => 10,
      	'input_attrs' => array(
    		'placeholder' => esc_html__( 'YOURMAIL@DOMAIN.COM | +81 5265 854', 'julia'),
  		),
     	'type' => 'text-area',
    )));
    $wp_customize->add_setting( 'bottom_footer_copyrights_info', array(
		'deafult' => __('Copy rights &copy; 2016 julia.com','julia'),
		//'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));
    $wp_customize->add_control(new Julia_Kaya_Customize_Textarea_Control( $wp_customize, 'bottom_footer_copyrights_info', array(
      	'label'    => esc_html__( 'Copy Right Information', 'julia' ),
      	'section'  => 'footer-section',
      	'settings' => 'bottom_footer_copyrights_info',
      	'priority' => 20,
      	'input_attrs' => array(
    		'placeholder' => esc_html__( 'Copy rights &copy; 2016 julia.com', 'julia'),
  		),
     	'type' => 'text-area',
    )));
    //Footer Social Icons
    $wp_customize->add_setting( 'footer_social_icons_text', array(
		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
	));
	$wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'footer_social_icons_text', array(
		'label'    => esc_html__( 'Social Icons', 'julia'),
		'section'  => 'footer-section',
		'settings' => 'footer_social_icons_text',
		'priority' => 25
    )));
    //Follow us text
    $wp_customize->add_setting('social_icon_followus_text',  array(
        'default' => esc_html__('FOLLOW US', 'julia'),
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('social_icon_followus_text', array(
        'label' => esc_html__('Follow Us Text', 'julia'),
        'section' => 'footer-section',
        'type' => 'text',
        'priority' => 26, 
        'input_attrs' => array(
    		'placeholder' => esc_html__( 'FOLLOW US', 'julia'),
  		)   
    ));
    $wp_customize->add_setting('facebook_icon_id',  array(
        'default' => 'facebook_user_name',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('facebook_icon_id', array(
        'label' => esc_html__('Facebook ID', 'julia'),
        'section' => 'footer-section',
        'type' => 'text',
        'priority' => 30, 
        'input_attrs' => array(
    		'placeholder' => esc_html__( 'facebook user name , ex: JohnDoe', 'julia'),
  		)   
    ));
    $wp_customize->add_setting('twitter_icon_id',  array(
        'default' => 'twitter_user_name',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',

    ));				
	$wp_customize->add_control('twitter_icon_id', array(
        'label' => esc_html__('Twitter ID', 'julia'),
        'section' => 'footer-section',
        'type' => 'text',
         'input_attrs' => array(
    		'placeholder' => esc_html__( 'twitter user name , ex: JohnDoe', 'julia'),
  		),
        'priority' => 40,    
    ));
    $wp_customize->add_setting('linkedin_icon_id',  array(
        'default' => 'linkedin_user_name',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('linkedin_icon_id', array(
        'label' => esc_html__('Linkedin ID', 'julia'),
        'section' => 'linkedin_icon_id',
        'type' => 'text',
        'input_attrs' => array(
    		'placeholder' => esc_html__( 'linkedin user name , ex: JohnDoe', 'julia'),
  		),
        'priority' => 50,    
    ));
    $wp_customize->add_setting('youtube_icon_id',  array(
        'default' => 'youtube_user_name',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('youtube_icon_id', array(
        'label' => esc_html__('Youtube ID', 'julia'),
        'section' => 'footer-section',
        'type' => 'text',
        'input_attrs' => array(
    		'placeholder' => esc_html__( 'Youtube user name , ex: JohnDoe', 'julia'),
  		),
        'priority' => 60,    
    ));
    $wp_customize->add_setting('googleplus_icon_id',  array(
        'default' => 'google_plus_user_name',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('googleplus_icon_id', array(
        'label' => esc_html__('Google Plus ID', 'julia'),
        'section' => 'footer-section',
        'type' => 'text',
        'input_attrs' => array(
    		'placeholder' => esc_html__( 'googleplus user name , ex: JohnDoe', 'julia'),
  		),
        'priority' => 70,    
    ));
    $wp_customize->add_setting('dribble_icon_id',  array(
        'default' => '',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('dribble_icon_id', array(
        'label' => esc_html__('Dribble ID', 'julia'),
        'section' => 'footer-section',
        'type' => 'text',
        'input_attrs' => array(
    		'placeholder' => esc_html__( 'dribble user name , ex: JohnDoe', 'julia'),
  		),
        'priority' => 80,    
    ));
    $wp_customize->add_setting('digg_icon_id',  array(
        'default' => '',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('digg_icon_id', array(
        'label' => esc_html__('Digg ID', 'julia'),
        'section' => 'footer-section',
        'type' => 'text',
        'input_attrs' => array(
    		'placeholder' => esc_html__( 'digg user name , ex: JohnDoe', 'julia'),
  		),
        'priority' => 90,    
    ));
     $wp_customize->add_setting('instagram_icon_id',  array(
        'default' => '',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('instagram_icon_id', array(
        'label' => esc_html__('Instagram ID', 'julia'),
        'section' => 'footer-section',
        'input_attrs' => array(
    		'placeholder' => esc_html__( 'instagram user name , ex: JohnDoe', 'julia'),
  		),
        'type' => 'text',
        'priority' => 100,    
    ));
     $wp_customize->add_setting('rss_icon_id',  array(
        'default' => '',
        'transport' => '',
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('rss_icon_id', array(
        'label' => esc_html__('Rss ID', 'julia'),
        'section' => 'footer-section',
        'type' => 'text',
        'input_attrs' => array(
    		'placeholder' => esc_html__( 'rss user name , ex: JohnDoe', 'julia'),
  		),
        'priority' => 120,    
    ));
    // Color Settings
    $wp_customize->add_setting( 'footer_color_section_text', array(
		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
	));
	$wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'footer_color_section_text', array(
		'label'    => esc_html__( 'Color Settings', 'julia'),
		'section'  => 'footer-section',
		'settings' => 'footer_color_section_text',
		'priority' => 130
    )));
    $wp_customize->add_setting( 'footer_bg_color',array( 
		'default' => '#FFFFFF',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', array(			
		'label' => esc_html__('Background', 'julia'),
		'section' => 'footer-section',
		'priority' => 140,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'footer_border_top_color',array( 
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_border_top_color', array(			
		'label' => esc_html__('Border Top Color', 'julia'),
		'section' => 'footer-section',
		'priority' => 145,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'footer_text_color',array( 
		'default' => '#333333',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color',	array(			
		'label' => esc_html__('Text Color', 'julia'),
		'section' => 'footer-section',
		'priority' => 150,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'footer_text_link_color',array( 
		'default' => '#333333',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_link_color',	array(			
		'label' => esc_html__('Link Color', 'julia'),
		'section' => 'footer-section',
		'priority' => 160,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'footer_text_link_hover',array( 
		'default' => '#ff3333',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_link_hover', array(			
		'label' => esc_html__('Link Hover Color', 'julia'),
		'section' => 'footer-section',
		'priority' => 170,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'footer_text_font_size', array(
        'default'        => '13',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_check_number',
    ) );
	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'footer_text_font_size', array(
		'label'   => esc_html__('Font Size','julia'),
    	'section' => 'footer-section',
		'settings'    => 'footer_text_font_size',
		'priority'    => 180,
		'choices'  => array(
			'min'  => 12,
			'max'  => 50,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'footer_text_letter_space',  array( 
		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'footer_text_letter_space', array(
		'label'   => esc_html__('Letter Spacing','julia'),
    	'section' => 'footer-section',
		'settings'    => 'footer_text_letter_space',
		'priority'    => 190,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'footer_text_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('footer_text_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Text Font Weight','julia'),
        'section' => 'footer-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'bold' => esc_html__('Bold','julia'),
        	),
		'priority' => 200,
    ));	
    $wp_customize->add_setting( 'footer_text_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('footer_text_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Font Style','julia'),
        'section' => 'footer-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'italic' => esc_html__('Italic','julia'),
        	),
		'priority' => 210,
    ));

}
add_action( 'customize_register', 'julia_kaya_most_footer_section' );

//end
// Typography
function julia_kaya_typography( $wp_customize ){
	global $kaya_julia_customze_note_settings;
	$wp_customize->add_panel( 'typography_panel_section', array(
	    'priority'       => 140,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	  	'title' => esc_html__( 'Typography Section', 'julia'),
	) );
	$wp_customize->add_section(
	// ID
	'typography_section',
	// Arguments array
	array(
		'title' => esc_html__( 'Google Font Family', 'julia'),
		'priority'       => 140,
		'capability' => 'edit_theme_options',
		'panel' => 'typography_panel_section',
	));	
	$wp_customize->add_setting( 'google_body_font',  array( 
		'default' => 'Nova Square',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
	$wp_customize->add_control( new Julia_Kaya_Customize_google_fonts_Control( $wp_customize, 'google_body_font', array(
		'label'   => esc_html__('Select font for Body','julia'),
		'section' => 'typography_section',
		'settings'    => 'google_body_font',
		'priority'    => 0,
	)));
 	$wp_customize->add_setting( 'google_heading_font', array(
 		'default' => '2',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_google_fonts_Control( $wp_customize, 'google_heading_font', array(
		'label'   => esc_html__('Select font for Headings','julia'),
		'section' => 'typography_section',
		'settings'    => 'google_heading_font',
		'priority'    =>10,
	)));
	$wp_customize->add_setting( 'google_menu_font', array( 
		'default' => '2',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
	$wp_customize->add_control( new Julia_Kaya_Customize_google_fonts_Control( $wp_customize, 'google_menu_font', array(
		'label'   => esc_html__('Select font for Menu','julia'),
		'section' => 'typography_section',
		'settings'    => 'google_menu_font',
		'priority'    => 20,
	))); 
	$wp_customize->add_setting( 'google_all_desc_font', array( 'default' => '2',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
	$wp_customize->add_control( new Julia_Kaya_Customize_google_fonts_Control( $wp_customize, 'google_all_desc_font', array(
		'label'   => esc_html__('Select font for All Titles Description','julia'),
		'section' => 'typography_section',
		'settings'    => 'google_all_desc_font',
		'priority'    => 30,
	))); 
	$wp_customize->add_setting( 'google_all_desc_font_note', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));
    $wp_customize->add_control(new Julia_Kaya_Customize_Description_Control( $wp_customize, 'google_all_desc_font_note', array(
    	'html_tags' => true,	
     	'label'    => '<strong class="customizer_note"> Note: </strong> '.wp_kses(esc_html__( 'Menu title description, slider title description, portfolio vertical title, portfolio single page model Information, portfolio sharing icon title, blog page date, blog page quotation, blog meta post, blog single page comment form, tag clouds, blockquotes, search box input fields, and ect...', 'julia'),$kaya_julia_customze_note_settings ),
      	'section'  => 'typography_section',
      	'settings' => 'google_all_desc_font_note',
      	'priority' => 40
    )));
	$wp_customize->add_setting( 'google_all_desc_font_style', array( 'default' => 'italic',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control('google_all_desc_font_style',  array(
        'type' => 'select',
        'label' => esc_html__('Select Font Style', 'julia'),
        'section' => 'typography_section',
        'choices' => array(
        	 'italic' => esc_html__('Italic ','julia'),
        	 'normal' => esc_html__('Normal','julia'),
        	),
		'priority' => 60,
    ));
	$wp_customize->add_setting( 'google_all_desc_font_style_note', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));
    $wp_customize->add_control(new Julia_Kaya_Customize_Description_Control( $wp_customize, 'google_all_desc_font_style_note', array(
    	'html_tags' => true,
      	'label'    => '<strong class="customizer_note"> Note: </strong> '.wp_kses(esc_html__( 'Menu title description, slider title description, portfolio vertical title, portfolio single page model Information, portfolio sharing icon title, blog page date, blog page quotation, blog meta post, blog single page comment form, tag clouds, blockquotes, search box input fields, and ect...', 'julia'),$kaya_julia_customze_note_settings ),
      	'section'  => 'typography_section',
      	'settings' => 'google_all_desc_font_style_note',
      	'priority' =>70
    )));
}
add_action( 'customize_register', 'julia_kaya_typography' );
/* --------------------------------------------
Typography
-----------------------------------------------*/
function julia_kaya_font_panel_section( $wp_customize ){
	$wp_customize->add_section(
	// ID
	'font-panel-section',
	// Arguments array
	array(
		'title' => esc_html__( 'Font Settings', 'julia'),
		'priority'       => 140,
		'capability' => 'edit_theme_options',
		'panel' => 'typography_panel_section'
	));	
	$font_weight_names = array('normal' => 'Normal', 'bold' => 'Bold', 'lighter' => 'Lighter');	
	// Body Font Size
	$wp_customize->add_setting('body_font_size', array(
		'default' => '15',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'body_font_size', array(
		'label'   => esc_html__('Body Font Size','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'body_font_size',
		'priority'    => 3,
		'choices'  => array(
			'min'  => 10,
			'max'  => 30,
			'step' => 1
		),
	)));
	$wp_customize->add_setting('body_font_letter_space', array(
		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'body_font_letter_space', array(
		 'label'   => esc_html__('Body Font Letter Spacing','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'body_font_letter_space',
		'priority'    => 4,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'body_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('body_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Body Font Weight','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 9,
    ));
	// Menu Font Size
	$wp_customize->add_setting( 'menu_font_title', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'menu_font_title', array(
      'label'    => esc_html__( 'Menu Font Settings', 'julia'),
      'section' => 'font-panel-section',
      'settings' => 'menu_font_title',
      'priority' =>10
    )));
	$wp_customize->add_setting('menu_font_size',array(
		'default' => '15',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'menu_font_size', array(
		 'label'   => esc_html__('Menu Font Size','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'menu_font_size',
		'priority'    => 11,
		'choices'  => array(
			'min'  => 10,
			'max'  => 30,
			'step' => 1
		),
	)));
 	$wp_customize->add_setting('menu_font_letter_space', array( 
 		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'menu_font_letter_space', array(
		 'label'   => esc_html__('Menu Font Letter Spacing','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'menu_font_letter_space',
		'priority'    => 20,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'menu_font_weight', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('menu_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Select Menu Font Weight','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 21,
    ));
    $wp_customize->add_setting( 'main_menu_uppercase', array(
		'default'        => 0,
		//'type'           => 'option',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('main_menu_uppercase', array(
		'label'    => esc_html__( 'Enable Uppercase Letters ','julia'),
		'section'  => 'font-panel-section',
		'type'     => 'checkbox',
		'priority' => 22
	) );
    $wp_customize->add_setting( 'customize_controll_divider_menu', array(
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_menu', array(
        'section' => 'font-panel-section',
		'priority' => 23,
    ))); 
    // Menu Description Font 
	$wp_customize->add_setting( 'customize_controll_divider_menu_desc', array(
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_menu_desc', array(
        'section' => 'font-panel-section',
		'priority' => 50,
    ))); 
	// Menu Font Size
	$wp_customize->add_setting('child_menu_font_size', array(
		'default' => '13',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'child_menu_font_size', array(
		 'label'   => esc_html__('Child Menu Font Size','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'child_menu_font_size',
		'priority'    => 60,
		'choices'  => array(
			'min'  => 10,
			'max'  => 30,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('child_menu_font_letter_space',array(
  		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'child_menu_font_letter_space', array(
		 'label'   => esc_html__('Child Menu Font Letter Spacing','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'child_menu_font_letter_space',
		'priority'    => 70,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
 	$wp_customize->add_setting( 'child_menu_font_weight', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('child_menu_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Select Child Menu Font Weight','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 80,
    ));
    $wp_customize->add_setting( 'child_menu_uppercase', array(
		'default'        => 0,
		//'type'           => 'option',
		'transport' => 'postMessage',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('child_menu_uppercase', array(
		'label'    => esc_html__( 'Enable Uppercase Letters ','julia'),
		'section'  => 'font-panel-section',
		'type'     => 'checkbox',
		'priority' => 90
	) );
	// Title Font Sizes
	 $wp_customize->add_setting( 'titles_font_title', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'titles_font_title', array(
        'label'    => esc_html__( 'Title Font Settings', 'julia'),
      'section' => 'font-panel-section',
      'settings' => 'titles_font_title',
      'priority' => 100
    )));
	// H1
	$wp_customize->add_setting('h1_title_fontsize', array(
		'default' => '30',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h1_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H1','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h1_title_fontsize',
		'priority'    => 105,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h1_font_letter_space',
    array( 'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h1_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H1','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h1_font_letter_space',
		'priority'    => 110,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h1_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'

    ));
    $wp_customize->add_control('h1_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H1','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 120,
    ));
    $wp_customize->add_setting( 'customize_controll_divider_h2', array(
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_h2', array(
        'section' => 'font-panel-section',
		'priority' => 130,
    )));
	// H2
	$wp_customize->add_setting('h2_title_fontsize',array(
    	 'default' => '24',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h2_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H2','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h2_title_fontsize',
		'priority'    => 140,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h2_font_letter_space', array( 
  		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h2_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H2','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h2_font_letter_space',
		'priority'    => 150,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h2_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'

    ));
    $wp_customize->add_control('h2_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H2','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 160,
    ));
     $wp_customize->add_setting( 'customize_controll_divider', array(
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider', array(
        'section' => 'font-panel-section',
		'priority' => 170,
    )));	 
	// H3
	$wp_customize->add_setting('h3_title_fontsize',array( 
		'default' => '20',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number',
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h3_title_fontsize', array(
		 'label'   => esc_html__('Font size for heading - H3','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h3_title_fontsize',
		'priority'    => 180,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h3_font_letter_space', array(
  		'default' => '2',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h3_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H3','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h3_font_letter_space',
		'priority'    => 190,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h3_font_weight_bold', array(
        'default' => 'bold',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('h3_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H3','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 200,
    ));
    $wp_customize->add_setting( 'customize_controll_divider_h3', array(
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_h3', array(
        'section' => 'font-panel-section',
		'priority' => 210,
    )));
	// H4
	$wp_customize->add_setting( 'h4_title_fontsize', array(
		'default' => '18',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h4_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H4','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h4_title_fontsize',
		'priority'    => 220,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h4_font_letter_space', array(
  		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h4_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H4','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h4_font_letter_space',
		'priority'    => 230,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		))); 
	$wp_customize->add_setting( 'h4_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('h4_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H4','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 240,
    ));
     $wp_customize->add_setting( 'customize_controll_divider_h4', array(
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_h4', array(
        'section' => 'font-panel-section',
		'priority' => 250,
    )));
	// H5
	$wp_customize->add_setting('h5_title_fontsize', array( 
		'default' => '16',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h5_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H5','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h5_title_fontsize',
		'priority'    => 260,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
	)));
   	$wp_customize->add_setting('h5_font_letter_space',array(
   		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h5_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H5','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h5_font_letter_space',
		'priority'    => 270,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'h5_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('h5_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H5','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 280
    ));	 
     $wp_customize->add_setting( 'customize_controll_divider_h5', array(
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_h5', array(
        'section' => 'font-panel-section',
		'priority' => 290,
    )));
	// H6
	$wp_customize->add_setting('h6_title_fontsize', array( 
		'default' => '14',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'julia_kaya_check_number'
	 ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h6_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H6','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h6_title_fontsize',
		'priority'    => 300,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
	)));
    $wp_customize->add_setting('h6_font_letter_space', array(
    	'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'julia_kaya_check_number'
    ));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h6_font_letter_space', array(
		'label'   => esc_html__('Font Letter Spacing - H6','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h6_font_letter_space',
		'priority'    => 310,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h6_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('h6_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H6','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 320,
    ));	 
}
add_action( 'customize_register', 'julia_kaya_font_panel_section' );
/*-------------------------------------------------------------
 Global Section
--------------------------------------------------------------*/
function julia_kaya_global_section( $wp_customize ) {
	$wp_customize->add_panel( 'general_section', array(
	    'priority' => 150,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__( 'Global Settings', 'julia'),
	) );
	$wp_customize->add_section(
	// ID
	'global-section',
	// Arguments array
	array(
		'title' => esc_html__( 'General Settings', 'julia'),
		'priority'       => 10,
		'capability' => 'edit_theme_options',
		'panel'  => 'general_section',
	));
	$wp_customize->add_setting( 'disable_header_top_search', array(
		'default'        => 0,
		'transport' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('disable_header_top_search', array(
		'label'    => esc_html__( 'Disable Header Top Search Icon','julia'),
		'section' => 'global-section',
		'type'     => 'checkbox',
		'priority' => 1
	) );

	$wp_customize->add_setting('favicon[favi_img]',array(
    	'default' => '',
    	 'capability'   => 'edit_theme_options',
    	 'sanitize_callback' => 'esc_url_raw',
        'type'       => 'option',
    	));
    $wp_customize->add_control(	new Julia_Kaya_Customize_Imageupload_Control($wp_customize,'favicon',array(
		'label' => esc_html__('Upload Favicon Image','julia'),
		'section' => 'global-section',
		'settings' => 'favicon[favi_img]',
		'priority' => 10
	)));	
  	$wp_customize->add_setting( 'kaya_custom_css', array(
  		'transport' => 'postMessage',
  		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
  	));
  	$wp_customize->add_control( new Julia_Kaya_Customize_Textarea_Control( $wp_customize, 'kaya_custom_css', array(
		'label'    => esc_html__( 'Custom CSS', 'julia'),
		'section'  => 'global-section',
		'settings' => 'kaya_custom_css',
		'priority' => 30,
		'type' => 'text-area',
      ))  );
 	 $wp_customize->add_setting( 'kaya_custom_jquery', array(
  		'default' => '',
  		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
  	));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Textarea_Control( $wp_customize, 'kaya_custom_jquery', array(
      'label'    => esc_html__( 'Custom JQUERY', 'julia'),
      'section'  => 'global-section',
      'settings' => 'kaya_custom_jquery',
      'priority' => 39,
      'type' => 'text-area',
      ))  );
	$wp_customize->add_setting( 'jquery_sample_info', array(
  	  	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',  	  	
  	));
 	$wp_customize->add_control( new Julia_Kaya_Customize_Description_Control( $wp_customize, 'jquery_sample_info', array(
		'label'    => esc_html__( "Ex: alert('hai');", 'julia'),
		'section'  => 'global-section',
		'settings' => 'jquery_sample_info',
		'priority' => 40
    	))
 	 );  
  	$wp_customize->add_setting( 'responsive_layout_mode',
		array( 'default' => 'on',
			'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize',
		 ));
	$wp_customize->add_control( 'responsive_layout_mode',array(
		'label' => 'Responsive Mode',
		'section' => 'global-section',
		'priority' => 41,
		'type' => 'radio',
		'choices' => array(
			'on' => 'On',
			'off' => 'Off'	
			)
	));
	$wp_customize->add_setting( 'disable_site_loader', array(
		'default'        => 0,
		'transport' => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('disable_site_loader', array(
		'label'    => esc_html__( 'Enable Site Loader','julia'),
		'section' => 'global-section',
		'type'     => 'checkbox',
		'priority' => 50
	) );
 }
add_action( 'customize_register', 'julia_kaya_global_section' );
/*--------------------------------------------------
 Blog & Portfolio Next Prevb Arrows
--------------------------------------------------*/
function julia_kaya_single_next_prev_button_section( $wp_customize ){
	$wp_customize->add_section('single_next_prev_button_section',array(
		'title' => esc_html__('Blog & Portfolio Single Next / Prev Settings', 'julia'),
		'priority' => '25',
		'panel' => 'general_section',
		'description' => esc_html__('Blog & Portfolio Single Page Previous / Next Buttons Color Section', 'julia'),
	));
	$colors = array();
	$wp_customize->add_setting( 'pf_blog_single_page_title', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    ));
    $wp_customize->add_control( new Julia_Kaya_Customize_Subtitle_control( $wp_customize, 'pf_blog_single_page_title', array(
		'label'    => esc_html__( 'Portfolio & Blog Single Page Buttons Colors', 'julia'),
		'section' => 'single_next_prev_button_section',
		'settings' => 'pf_blog_single_page_title',
		'priority' => 28
    )));
	$colors =array();
	$colors[] = array(
		'slug'=>'next_prev_button_bg_color',
		'default' => '#FFFFFF',
		'label' => esc_html__('Button Background Color', 'julia'),
		'priority' => 30
	);
	$colors[] = array(
		'slug'=>'next_prev_button_text_color',
		'default' => '#ffffff',
		'label' => esc_html__('Button Text Color', 'julia'),
		'priority' => 30
	);
	$colors[] = array(
		'slug'=>'next_prev_button_hover_bg_color',
		'default' => '#ff3333',
		'label' => esc_html__('Button Hover Background Color', 'julia'),
		'priority' => 50
	);
	$colors[] = array(
		'slug'=>'next_prev_button_hover_text_color',
		'default' => '#ffffff',
		'label' => esc_html__('Button Hover Text Color', 'julia'),
		'priority' => 60
	);
	 $wp_customize->add_setting( 'next_prev_button_letter_sapcing', array(
        'default'        => '0',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'julia_kaya_check_number',
    ) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'next_prev_button_letter_sapcing', array(
		'label'   => esc_html__('Button Letter Space (px)','julia'),
    	'section' => 'single_next_prev_button_section',
		'settings'    => 'next_prev_button_letter_sapcing',
		'priority'    => 80,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'next_prev_button_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('next_prev_button_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Button Font Weight','julia'),
        'section' => 'single_next_prev_button_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 90,
    ));
    $wp_customize->add_setting( 'next_prev_button_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('next_prev_button_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Button Font Style','julia'),
        'section' => 'single_next_prev_button_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','julia'),
        	 'italic' => esc_html__('Italic','julia'),
        	),
		'priority' =>100,
    ));    
    foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting( $color['slug'], array(
			'default' => $color['default'],
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'single_next_prev_button_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action('customize_register','julia_kaya_single_next_prev_button_section');
/*--------------------------------------------------
 Dashboard Admin Settings
--------------------------------------------------*/
function julia_kaya_dashboard_admin_section( $wp_customize ){
	$wp_customize->add_section('model_dashboard_section',array(
		'title' => esc_html__('Dashboard Settings', 'julia'),
		'priority' => '30',
		'panel' => 'general_section',
		//'description' => esc_html__('Dashboard Settings', 'julia'),
	));
	$wp_customize->add_setting( 'members_portfolio_submit_message', array(
		'default' => esc_html__('Your Portfolio Profile Will be activate with in 24 hours!', 'julia'),
		'transport' => '',
		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
	));
  	$wp_customize->add_control(new Julia_Kaya_Customize_Textarea_Control( $wp_customize, 'members_portfolio_submit_message', array(
		'label'    => esc_html__( 'Alert Message Text After Model Submission', 'julia'),
		'section'  => 'model_dashboard_section',
		'settings' => 'members_portfolio_submit_message',
		'priority' => 50,
		'type' => 'text',
	)));
}
add_action('customize_register','julia_kaya_dashboard_admin_section');

/*-----------------------------------------------------------------------------------*/
// Woo Commerce Page
/*-----------------------------------------------------------------------------------*/ 
function julia_kaya_woocommerce_page_section( $wp_customize ){
	$wp_customize->add_panel( 'woo_panel_section', array(
	    'priority'       => 160,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	  	'title' => esc_html__( 'Woocommerce Section', 'julia'),
	));
	$wp_customize->add_section('woocommerce_page_section',array(
		'title' => esc_html__('Woocommerce Page Settings', 'julia'),
		'priority' => '150',
		'panel' => 'woo_panel_section'
	));
  	$wp_customize->add_setting('shop_page_columns', array(
		'default' => '4',
		'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize',
	));
	$wp_customize->add_control('shop_page_columns',array(
		'label' => esc_html__('Shop Page Columns','julia'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'4' => esc_html__('4 Columns','julia'),
			'3' => esc_html__('3 Columns','julia'),
			'2' => esc_html__('2 Columns','julia')
			),
		'priority' => 1
	));
	$wp_customize->add_setting('shop_page_sidebar', array(
		'default' => 'fullwidth',
		'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize',
	));
	$wp_customize->add_control('shop_page_sidebar',array(
		'label' => esc_html__('Shop Page Sidebar','julia'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'fullwidth' => esc_html__('No Sidebar','julia'),
			'three_fourth' => esc_html__('Right','julia'),
			'three_fourth_last' => esc_html__('Left','julia')
			),
		'priority' => 1
	));
	$wp_customize->add_setting('product_tag_page_sidebar', array(
		'default' => 'fullwidth',
		'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize',
	));
	$wp_customize->add_control('product_tag_page_sidebar',array(
		'label' => esc_html__('Product Categories / Tags  Page Sidebar','julia'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'fullwidth' => esc_html__('No Sidebar','julia'),
			'three_fourth' => esc_html__('Right','julia'),
			'three_fourth_last' => esc_html__('Left','julia')
			),
		'priority' => 2
	));
	$wp_customize->add_setting('shop_single_page_sidebar', array(
			'default' => 'three_fourth',
			'sanitize_callback' => 'julia_kaya_radio_buttons_sanitize',
		));
	$wp_customize->add_control('shop_single_page_sidebar',array(
		'label' => esc_html__('Shop Single Page Sidebar','julia'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'fullwidth' => esc_html__('No Sidebar','julia'),
			'three_fourth' => esc_html__('Right','julia'),
			'three_fourth_last' => esc_html__('Left','julia')
			),
		'priority' => 3
	));
}
add_action('customize_register','julia_kaya_woocommerce_page_section');
// Elements Colors
function julia_kaya_woocommerce_elements_section( $wp_customize ){
	global $kaya_julia_customze_note_settings;
	$wp_customize->add_section('woocommerce_elements_section',array(
			'title' => 'Woocommerce General Section',
			'priority' => '190',
			'panel' => 'woo_panel_section'
	));
 	$colors = array();
 	$colors[] = array(
		'slug'=>'products_border_color',
		'default' => '#cccccc',
		'label' => esc_html__('Border Color', 'julia'),
		'priority' => 10
	);
	$wp_customize->add_setting( 'products_border_color_note', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Description_Control( $wp_customize, 'products_border_color_note', array(
      	'html_tags' => true,
      'label'    => wp_kses(esc_html__( '<strong class="customizer_note"> Note: </strong> color applied for product single page and checkout page table borders colors and product single page tabs border bottom color', 'julia'),$kaya_julia_customze_note_settings ),
      'section'  => 'woocommerce_elements_section',
      'settings' => 'products_border_color_note',
      'priority' => 20
    )));
	$colors[] = array(
		'slug'=>'woo_elments_bg_colors',
		'default' => '#ff3333',
		'transport'   => 'postMessage',
		'priority' => 60,
		'label' => esc_html__('Elements BG color', 'julia')
	);
	$colors[] = array(
		'slug'=>'woo_elments_text_colors',
		'default' => '#ffffff',
		'transport'   => 'postMessage',
		'priority' => 70,
		'label' => esc_html__('Elements Text color', 'julia')
	);
    $wp_customize->add_setting( 'elements_color_note', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Description_Control( $wp_customize, 'elements_color_note', array(
      	'html_tags' => true,
      'label'    => wp_kses(__( '<strong class="customizer_note"> Note: </strong> color applied for onsale tag, checkout page coupon toggle icon and checkout page registarion form toggle icon', 'julia'),$kaya_julia_customze_note_settings ),
      'section'  => 'woocommerce_elements_section',
      'settings' => 'elements_color_note',
      'priority' => 90
    ))); 
	foreach( $colors as $color ) {
	  	// SETTINGS
	  	$wp_customize->add_setting($color['slug'], array(
			'default' => $color['default'],
			'capability' =>  'edit_theme_options',
			'transport'   => 'postMessage',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		  // CONTROLS
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $color['slug'], array(
			'label' => $color['label'], 
	      	'section' => 'woocommerce_elements_section',
	      	'priority' => $color['priority'],
	      	'settings' => $color['slug'])
	    ));
	}
}
add_action('customize_register','julia_kaya_woocommerce_elements_section');
/*---------------------------------------------------
 Woo Color Section 
 ----------------------------------------------------*/
function julia_kaya_products_bg_section( $wp_customize ){
	global $kaya_julia_customze_note_settings;
	$wp_customize->add_section('products_bg_section',array(
		'title' => esc_html__('Background Color Section', 'julia'),
		'priority' => '180',
		'panel' => 'woo_panel_section'
	));
	$colors = array();
	$colors[] = array(
		'slug'=>'products_bg_color',
		'default' => '#ffffff',
		'label' => esc_html__('Background Color', 'julia'),
		'priority' => 10
	);
    $colors[] = array(
		'slug'=>'products_title_color',
		'default' => '#333333',
		'label' => esc_html__('Title Color', 'julia'),
		'priority' => 20
	);
    $colors[] = array(
		'slug'=>'products_title_border_color',
		'default' => '#d6d6d6',
		'label' => esc_html__('Title Border Color', 'julia'),
		'priority' => 30
	);
	$wp_customize->add_setting( 'products_title_border_color_note', array(
    	'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Julia_Kaya_Customize_Description_Control( $wp_customize, 'products_title_border_color_note', array(
      'html_tags' => true,
      'label'    => wp_kses(__( '<strong class="customizer_note"> Note: </strong> color applied for  Related products, cross sells and up-sells products titles bottom border color', 'julia'), $kaya_julia_customze_note_settings),
      'section'  => 'products_bg_section',
      'settings' => 'products_title_border_color_note',
      'priority' => 31
    )));
	$colors[] = array(
		'slug'=>'products_desc_color',
		'default' => '#686868',
		'label' => esc_html__('Description', 'julia'),
		'priority' => 40
	);
	$colors[] = array(
		'slug'=>'products_price_color',
		'default' => '#939393',
		'label' => esc_html__('Price Color', 'julia'),
		'priority' => 45
	);
    $colors[] = array(
		'slug'=>'products_link_color',
		'default' => '#686868',
		'label' => esc_html__('Hyper Link Color', 'julia'),
		'priority' => 50
	);
    $colors[] = array(
		'slug'=>'products_link_hover_color',
		'default' => '#ff3333',
		'label' => esc_html__('Hyper Link Hover Color', 'julia'),
		'priority' => 60
	);
    foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting($color['slug'], array(
			'default' => $color['default'],
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, $color['slug'],	array(
			'label' => $color['label'],
			'section' => 'products_bg_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action('customize_register','julia_kaya_products_bg_section');
/*---------------------------------------------------
Buttons Color
---------------------------------------------------*/
function julia_kaya_woo_button_colors($wp_customize){
	$wp_customize->add_section('woo_button_section',array(
		'title' => esc_html__('Buttons Color Settings','julia'),
		'priority' => '180',
		'panel' => 'woo_panel_section'
	));	
	$color = array();   
	$colors[] = array(
	  'slug'=>'woo_buttons_bg_color',
	  'default' => '#ff3333',
	   'priority' => 6,
	  'label' => esc_html__('Buttons BG Color', 'julia')
	);
	$colors[] = array(
	  'slug'=>'woo_buttons_text_color',
	  'default' => '#ffffff',
	  'label' => esc_html__('Buttons Text Color', 'julia'),
	  'priority' => 7
	);
	$colors[] = array(
	  'slug'=>'woo_buttons_bg_hover_color',
	  'default' => '#ff3333',
	   'priority' => 8,
	  'label' => esc_html__('Buttons BG Hover Color', 'julia')
	);
	$colors[] = array(
	  'slug'=>'woo_buttons_text_hover_color',
	  'default' => '#ffffff',
	   'priority' => 9,
	  'label' => esc_html__('Buttons Text Hover Color', 'julia')
	);
	foreach( $colors as $color ) {
	  	// SETTINGS
	  	$wp_customize->add_setting($color['slug'], array(
			'default' => $color['default'],
			'capability' =>  'edit_theme_options',
			'transport'   => 'postMessage',
			'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
		));
	  	// CONTROLS
	  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array(
	  		'label' => $color['label'], 
	      	'section' => 'woo_button_section',
	      	'priority' => $color['priority'],
	      	'settings' => $color['slug'])
	    ));
	}
}
add_action('customize_register','julia_kaya_woo_button_colors');
/*--------------------------------------------------
Alert Boxes
--------------------------------------------------*/
function julia_kaya_woo_alert_button_colors($wp_customize){
	$wp_customize->add_section('woo_alertbox_section',array(
		'title' => esc_html__('Alert Boxes Color Settings','julia'),
		'priority' => '190',
		'panel' => 'woo_panel_section'
	));	
	$colors[] = array(
		'slug'=>'success_msg_bg_color',
		'default' => '#dff0d8',
		'transport'   => 'refresh',
		'priority' => 90,
		'label' => esc_html__('Success Alert Box BG Color', 'julia')
	);
	$colors[] = array(
		'slug'=>'success_msg_text_color',
		'default' => '#468847',
		'transport'   => 'refresh',
		'priority' => 100,
		'label' => esc_html__('Success Alert Box Text Color', 'julia')
	);
	$colors[] = array(
		'slug'=>'notification_msg_bg_color',
		'default' => '#b8deff',
		'transport'   => 'refresh',
		'priority' => 110,
		'label' => esc_html__('Notification Alert Box BG Color', 'julia')
	);
	$colors[] = array(
		'slug'=>'notification_msg_text_color',
		'default' => '#333',
		'transport'   => 'refresh',
		'priority' => 120,
		'label' => esc_html__('Notification Alert Box Text Color', 'julia')
	);
	$colors[] = array(
		'slug'=>'warning_msg_bg_color',
		'default' => '#f2dede',
		'transport'   => 'refresh',
		'priority' => 130,
		'label' => esc_html__('Warning Alert Box BG Color', 'julia')
	); 
	$colors[] = array(
		'slug'=>'warning_msg_text_color',
		'default' => '#a94442',
		'transport'   => 'refresh',
		'priority' => 140,
		'label' => esc_html__('Warning Alert Box Text Color', 'julia')
	);  
	foreach( $colors as $color ) {
	  // SETTINGS
	  	$wp_customize->add_setting($color['slug'], array(
	  		'default' => $color['default'],
	      	'capability' =>  'edit_theme_options',
	      	'transport'   => 'postMessage',
	      	'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	    ));
	  // CONTROLS
	  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array(
	  		'label' => $color['label'], 
	      	'section' => 'woo_alertbox_section',
	      	'priority' => $color['priority'],
	      	'settings' => $color['slug'])
	    ));
	}
}
add_action('customize_register','julia_kaya_woo_alert_button_colors'); 
/*--------------------------------------------------
Content Warning Message
--------------------------------------------------*/
function julia_kaya_content_warning_msg($wp_customize){
	$wp_customize->add_section('content_wrng_window_popup',array(
		'title' => esc_html__('Content Warning Settings','julia'),
		'priority' => '150',
		'description' => __('Captcha works only Shortlist model booking form, Contact form widget and User registarion form', 'julia')
	));	
	$wp_customize->add_setting( 'enable_content_popup_box', array(
		'default'  => '',
		'sanitize_callback' => 'julia_kaya_checkbox_field_sanitize',
	 )
	);
	$wp_customize->add_control('enable_content_popup_box', array(
		'label'    => esc_html__( 'Enable Content Popup Window','julia'),
		'section'  => 'content_wrng_window_popup',
		'type'     => 'checkbox',
		'priority' => 0
	) );
	$wp_customize->add_setting( 'content_wrng_popup_text', array(
        'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
        'default' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum .
				<ul>
				<li>It is a long established fact that a reader will be distracted</li>
				<li>It is a long established fact that a reader will be distracted</li>
				<li>It is a long established fact that a reader will be distracted</li>
				</ul>'
    ));
  	$wp_customize->add_control(new Julia_Kaya_Customize_Textarea_Control( $wp_customize, 'content_wrng_popup_text', array(
		'label'    => esc_html__( 'Content Popup Window Text', 'julia'),
		'section'  => 'content_wrng_window_popup',
		'settings' => 'content_wrng_popup_text',
		'priority' => 10,
		'type' => 'text',
	)));
	$wp_customize->add_setting( 'content_wrng_button_text', array(
		'default' => esc_html__('ENTER', 'julia'),
		'transport' => '',
		'sanitize_callback' => 'julia_kaya_text_filed_sanitize',
	));
  	$wp_customize->add_control('content_wrng_button_text', array(
		'label'    => esc_html__( 'Enter Button Text', 'julia'),
		'section'  => 'content_wrng_window_popup',
		'settings' => 'content_wrng_button_text',
		'priority' => 15,
		'type' => 'text',
	));
	$colors = array(); 
	$colors[] = array(
		'slug'=>'contnet_warning_bg_color',
		'default' => '#ffffff',
		'priority' => 20,
		'label' => esc_html__('Background Color', 'julia')
	);
	$colors[] = array(
		'slug'=>'contnet_warning_color',
		'default' => '#353535',
		'priority' => 30,
		'label' => esc_html__('Text Color', 'julia')
	);
	$colors[] = array(
		'slug'=>'contnet_warning_btn_bg_color',
		'default' => '#ff0000',
		'priority' => 40,
		'label' => esc_html__('Button Background Color', 'julia')
	);
	$colors[] = array(
		'slug'=>'contnet_warning_btn_color',
		'default' => '#ffffff',
		'priority' => 50,
		'label' => esc_html__('Button Color', 'julia')
	); 
	foreach( $colors as $color ) {
	  	// SETTINGS
	  	$wp_customize->add_setting($color['slug'], array(
	  		'default' => $color['default'],
	      	'capability' =>  'edit_theme_options',
	      	'transport'   => 'postMessage',
	      	'sanitize_callback' => 'julia_kaya_color_filed_sanitize',
	    ));
	  	// CONTROLS
	  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array(
	  		'label' => $color['label'], 
	      	'section' => 'content_wrng_window_popup',
	      	'priority' => $color['priority'],
	      	'settings' => $color['slug'])
	    ));
	}
}
add_action('customize_register','julia_kaya_content_warning_msg');
?>