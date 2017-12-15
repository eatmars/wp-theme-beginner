<?php
get_header();
do_action('kta_before_loop_content');
// Short List Button Text
$remove_short_list_button_text = get_theme_mod('remove_short_list_button_text') ? get_theme_mod('remove_short_list_button_text') :'REMOVE';
$short_list_button_text = get_theme_mod('short_list_button_text') ? get_theme_mod('short_list_button_text') :esc_html__('SHORTLIST','julia'); 
$pf_button_next_text = get_theme_mod('pf_button_next_text') ? get_theme_mod('pf_button_next_text') : esc_html__( 'NEXT','julia' );
$pf_button_prev_text = get_theme_mod('pf_button_prev_text') ? get_theme_mod('pf_button_prev_text') : esc_html__( 'PREV','julia' );
$pf_nav_buttons_enable = get_theme_mod('pf_nav_buttons_enable') ? get_theme_mod('pf_nav_buttons_enable') :0;
$enable_pf_single_page_comments = get_theme_mod('enable_pf_single_page_comments') ? get_theme_mod('enable_pf_single_page_comments') :0;

if(have_posts()) :
	while( have_posts() ) : the_post();		
		$post_id = get_the_ID(); // Post ID
		do_action('Kta_talents_loop_start'); // add scripts before title 
		$post_id = get_the_ID();
		$selected = '';
		if(isset($_SESSION['shortlist'])) {
			if ( in_array($id, $_SESSION['shortlist']) ) {
				$selected = 'item_selected';
			}
		}  ?>
		<div id="<?php the_ID(); ?>" <?php post_class('portfolio_main_content_wrapper item '.$selected); ?>>
			<?php 
			echo '<div class="one_fourth">';
				echo '<div class="kta_left_section_wrapper">';
					kta_talent_details($post_id, $set_card=FALSE, $model_details=TRUE);
					if( function_exists('kta_shortlist_text_buttons')){ // Talents Shortlist button
						echo kta_shortlist_text_buttons();
					}					
				echo '</div>';
				if( function_exists('kta_compcard_download_button') ){
					echo '<div class="kta_left_section_wrapper">';
						kta_compcard_download_button('false'); 
					echo '</div>';
				}
				// Social Share Icons
				if( function_exists('kta_social_share') ){
					echo '<div class="kta_left_section_wrapper">';
						kta_social_share();
					echo '</div>';
				}			
			echo '</div>';
			echo '<div class="three_fourth_last kta_tabs_content_wrapper">';

				do_action('kta_single_tabs');
				do_action('kta_single_tabs_data');				
			echo '</div>';
		echo '</div>';
		if( $enable_pf_single_page_comments == '1' ){
			echo '<div class="clear"> </div>';
			comments_template( '', true );
		}
		echo '<div class="clear"> </div>';
		if( $pf_nav_buttons_enable == '1' ){
			echo '<div id="singlepage_nav" class="">';
				echo '<ul class="pf_single_nav_buttons">';
					echo '<li class="nav_prev_item">';
						previous_post_link( '%link', esc_attr( $pf_button_prev_text ) ); 
					echo '</li>';
					echo '<li class="nav_next_item">';
						next_post_link( '%link', esc_attr( $pf_button_next_text ) ); 
					echo '</li></ul>';
			echo '</div>';
		}

		do_action('Kta_talents_loop_end'); // add scripts before loop end
	endwhile;
	wp_reset_postdata();
	wp_reset_query();
endif;
wp_reset_postdata();
do_action('kta_after_loop_content');
get_footer();
?>