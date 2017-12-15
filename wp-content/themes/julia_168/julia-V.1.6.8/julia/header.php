<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php $responsive_mode = get_theme_mod( 'responsive_layout_mode' ) ? get_theme_mod( 'responsive_layout_mode' ) : 'on';
	if($responsive_mode == "on"){ ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0" />
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>"> 
	<?php endif; ?>	
	<?php  wp_head();  ?>
</head>
<body <?php body_class(); ?> >
	<?php $disable_site_loader = get_theme_mod('disable_site_loader') ? get_theme_mod('disable_site_loader') : '0';
	$disable_header_sticky = get_theme_mod('disable_header_sticky') ? get_theme_mod('disable_header_sticky') : '0';
	$disable_header_top_search = get_theme_mod('disable_header_top_search') ? get_theme_mod('disable_header_top_search') : '0';
	$disable_sticky_header = ($disable_header_sticky == '1') ? 'off' : 'on';
	$enable_content_popup_box = get_theme_mod('enable_content_popup_box') ? get_theme_mod('enable_content_popup_box') : '0';
	$search_button_name = get_theme_mod('change_search_text') ? get_theme_mod('change_search_text') : __('SEARCH', 'julia');
	// Window Alert Box  ]
	if( $enable_content_popup_box == '1' ){ // Content popup Box Hide/Show
		julia_kaya_popup_box();
	} 
	if( $disable_site_loader == '1' ){ // Site Loader ?>
		<div id="loader"> <div id="status"> </div>	</div> 
	<?php } ?>
	<section id="fullwidth_layout"><!-- Main Layout Section Start -->
		<?php
			if( function_exists('kta_talents_advanced_search_form') ){
				echo '<div class="toggle_search_icon"><i class="fa fa-search"></i></div>';
			}
		?>
		<div class="header_top_bar_setion body_frame_border_wrapper" data-sticky-header="<?php echo $disable_sticky_header; ?>"> <!-- Header frame borders -->
			<div class="header_content_wrapper">
				<div class="container">
					<?php $header_left_content = get_theme_mod('header_left_content') ? get_theme_mod('header_left_content') : '<span><i class="fa fa-phone"></i> 81 ( 2542 ) 524585 </span><span><i class="fa fa-envelope"></i><a href="#">info@gmail.com</a> </span>';
					echo '<div class="one_fifth">'; // Logo Section
						echo julia_kaya_logo_image();
						echo '<div class="mobile_menu_icons menu_search_icon_wrapper">';
							echo '<div class="toggle_menu_border_wrapper mobile_toggle_menu_icons">'; ?>
							<input id="main-menu-state" type="checkbox" />
								<label class="main-menu-btn" for="main-menu-state">
								<span class="main-menu-btn-icon"></span>
							</label>
							<?php echo '</div>';
							if( $disable_header_top_search == '0' ){
								if( function_exists('kta_talents_advanced_search_form') ){
									echo '<div class="toggle_search_icon kta-search-icon"><i class="fa fa-search"></i></div>';
								}
							}
						echo '</div>';
					echo '</div>';
					echo '<div class="header_right_section four_fifth_last">'; // Header right section
						julia_kaya_page_menu_section(); // Menu Section
					echo '</div>';
					?>
				</div>
			</div>
		</div><!-- End Header Section -->
		<?php echo '<div class="toggle_search_wrapper">'; // Advance Search Form
				if( $disable_header_top_search == '0' ){
					if( function_exists('kta_talents_advanced_search_form') ){
						kta_talents_advanced_search_form($search_button_name); // Search Form
					}
				}
			echo '</div>'; 
		echo julia_kaya_subheader_section(); // Sub Header / Page titlebar Section ?>