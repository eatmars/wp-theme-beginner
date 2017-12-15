<?php
/*
Template Name: Coming Soon Page
*/
get_header();
$upload_logo = get_theme_mod('upload_logo');
$coming_soon_logo = $upload_logo['coming_soon_logo'] ? $upload_logo['coming_soon_logo'] : get_template_directory_uri().'/images/logo2.png'; 
$upload_bg_img = get_theme_mod('upload_bg_img');
$page_bg_img = $upload_bg_img['coming_soon_bg'] ? $upload_bg_img['coming_soon_bg'] : get_template_directory_uri().'/images/coming-soon-page.jpg'; 
$coming_soon_page_date = get_theme_mod('coming_soon_page_date') ? get_theme_mod('coming_soon_page_date') : '2030/10/06';
$coming_soon_date_color = get_theme_mod('coming_soon_date_color') ? get_theme_mod('coming_soon_date_color') : '#ff3333';
$disable_coming_soon_pattern = get_theme_mod('disable_coming_soon_pattern') ? get_theme_mod('disable_coming_soon_pattern') : '0';
$coming_soon_page_description = get_theme_mod('coming_soon_page_description') ? get_theme_mod('coming_soon_page_description') : 'We strive to leave the tiniest footprint we can. That \'s why our goods are<br> designed and manufactured in the USA. We believe that one of the most.';
$coming_soon_page_title = get_theme_mod('coming_soon_page_title') ? get_theme_mod('coming_soon_page_title') : 'Homes &amp; Offices'; ?>
<div id="mid_container_wrapper" class="mid_container_wrapper_section">
			<div id="mid_container" class="">
				<section class="fullwidth" id="content_section">
<?php				
echo '<div class="coming_soon_page_wraaper">';
	echo '<div class="coming_soon_page_banner">';

	if( $disable_coming_soon_pattern != '1' ){
		echo '<div class="slider_overlay"> </div>';
	}
		echo '<div class="coming_soon_bg_img" style="background:url('.esc_url($page_bg_img).');"> </div>';

		echo '<div class="coming_soon_banner_content">';		
              echo '<h3 class="title_style1">'.esc_attr($coming_soon_page_title).'
              	<span class="title_seperator"> </span></h3>';
               echo '<p>'.$coming_soon_page_description.'</p>';
                echo '<div id="coming_soon_date" data-date="'.trim($coming_soon_page_date).'" data-date-color="'.$coming_soon_date_color.'" ></div>';
            // Socila Media icons    				
			echo '<div class="coming_soon_social_media_icons">';
				julia_kaya_social_media_icons();
            echo '</div></div></div>';
           echo '</section>';
get_footer();