<?php
add_theme_support('automatic-feed-links');
$pf_slug_text = get_theme_mod('pf_slug_name') ? trim(get_theme_mod('pf_slug_name')) :'Model';
/* ---------------------------------------
 Resize Images Width Fullwisth/Sidebar 
 ----------------------------------------- */
if( !function_exists('julia_kaya_image_width') ){
	function julia_kaya_image_width( $postid ){
		$sidebar_layout = get_post_meta($postid,'kaya_pagesidebar',true); 
		$kaya_width = ($sidebar_layout == "full" ) ? '1250' : '719';
		return $kaya_width;
	 }
}	 
/*-------------------------------------------
Site Title and Desc
-------------------------------------------*/
if( !function_exists('julia_kaya_wp_title') ){
	function julia_kaya_wp_title( $title ) {
		global $page, $paged;
		if ( is_feed() )
			return $title;
		$title .= esc_attr( get_bloginfo( 'name' ) );
		$site_description = esc_attr( get_bloginfo( 'description', 'display' ) );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title .= " | $site_description";
		return $title;
	}
}	
add_filter( 'wp_title', 'julia_kaya_wp_title', 10, 1 ); // End
// Added Class To body
/* ------------------------------------------------------------------------------
// Bottom Footer
--------------------------------------------------------------------------------*/
if( !function_exists('julia_kaya_bottom_footer_section') ){
	function julia_kaya_bottom_footer_section(){
		$bottom_footer_contact_info = get_theme_mod('bottom_footer_contact_info') ? get_theme_mod('bottom_footer_contact_info') : esc_html__('YOURMAIL@DOMAIN.COM | +81 5265 854','julia');
		$bottom_footer_copyrights_info = get_theme_mod('bottom_footer_copyrights_info') ? get_theme_mod('bottom_footer_copyrights_info') : esc_html__('Copy rights &copy; 2016 julia.com','julia');
		$disable_footer_sticky = get_theme_mod('disable_footer_sticky') ? get_theme_mod('disable_footer_sticky') : '0';
		$social_icon_followus_text = get_theme_mod('social_icon_followus_text') ? str_replace('&nbsp;', '', get_theme_mod('social_icon_followus_text')) : esc_html__('FOLLOW US','julia');
		$disable_sticky_footer = ( $disable_footer_sticky == '1' ) ? 'off' : 'on';
		$sticky_footer_class = ( $disable_footer_sticky == '1' ) ? '' : 'bottom_sticky_footer';
	 ?>
	<div class="bottom_footer_bar_wrapper body_frame_border_wrapper <?php echo $sticky_footer_class; ?>" data-footer-sticky="<?php echo $disable_sticky_footer; ?>">
		<div class="container">
			<div class="one_half">
				<p><?php echo trim($bottom_footer_contact_info) ?> | <?php echo trim($bottom_footer_copyrights_info); ?></p>
			</div>
			<?php //if( julia_kaya_social_media_icons() !='' ){ ?>
				<div class="one_half_last">
					<?php
					if( !empty($social_icon_followus_text) ){
						echo '<div class="footer_social_sharing_icons">';
						julia_kaya_social_media_icons();
							echo '<span class="social_share_button">'.trim($social_icon_followus_text).'<i class="fa fa-angle-right"></i></span>'; 
						echo '</div>';
					}	
					if( has_nav_menu( 'footer' ) ){
						wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer' , 'menu_class' => '') );
					} ?>
				</div>
			<?php //} ?>
		</div>			
	</div>
	<?php }
}
/* --------------------------------------
Page Header Section 
---------------------------------------- */
if( !function_exists('julia_kaya_page_menu_section') ){
	function julia_kaya_page_menu_section(){
		if( function_exists('kta_get_user_menu') ){
			if(is_user_logged_in() ){
				kta_get_user_menu();
			}
		}
	echo '<div class="nav_wrap">';
		if (has_nav_menu('primary')) {
			wp_nav_menu(array('echo' => true, 'container_id' => 'myslidemenu','menu_id'=> 'main-menu', 'container_class' => 'menu','theme_location' => 'primary', 'menu_class'=> 'sm sm-blue'));
		}else{
		wp_nav_menu(array('echo' => true, 'container_id' => 'myslidemenu','menu_id'=> 'main-menu', 'container_class' => 'menu','theme_location' => '','container' => 'ul', 'menu_class'=> 'sm sm-blue'));
		}
				
		echo '</div>';


	}
}
function julia_kaya_page_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}

do_action('kta_custom_menu');
/*-----------------------
Logo Display Function
-------------------------*/
if(!function_exists('julia_kaya_logo_image')): // Logo
	function julia_kaya_logo_image() {
		echo '';
		$select_header_logo_type = get_theme_mod('select_header_logo_type') ? get_theme_mod('select_header_logo_type') : 'image_logo';
		$header_text_logo = get_theme_mod('header_text_logo') ? get_theme_mod('header_text_logo') : strtoupper(KAYA_THEME_NAME);
		$logo_text_font_color = get_theme_mod('logo_text_font_color') ? get_theme_mod('logo_text_font_color') : '#333333';
		$text_logo_size = get_theme_mod('text_logo_size') ? get_theme_mod('text_logo_size') : '36';
		$logo_text_font_color = get_theme_mod('logo_text_font_color') ? get_theme_mod('logo_text_font_color') : '#333333';
		$sticky_logo_color = get_theme_mod('sticky_logo_color') ? get_theme_mod('sticky_logo_color') : '#333333';		
		$sticky_text_logo_size = get_theme_mod('sticky_text_logo_size') ? get_theme_mod('sticky_text_logo_size') : '28';
		$logo_text_font_weight = get_theme_mod('header_logo_font_weight') ? get_theme_mod('header_logo_font_weight') : 'normal';
		$logo_text_font_style = get_theme_mod('header_logo_font_style') ? get_theme_mod('header_logo_font_style') : 'normal';
		$header_text_logo_tagline = get_theme_mod('header_text_logo_tagline') ? get_theme_mod('header_text_logo_tagline') : '';
		$logo_tagline_font_color = get_theme_mod('logo_tagline_font_color') ? get_theme_mod('logo_tagline_font_color') : '#333';
		$logo_tagline_font_style = get_theme_mod('logo_tagline_font_style') ? get_theme_mod('logo_tagline_font_style') : 'normal';
		$logo_tagline_font_weight = get_theme_mod('logo_tagline_font_weight') ? get_theme_mod('logo_tagline_font_weight') : 'normal';
		$logo_tagline_size = get_theme_mod('logo_tagline_size') ? get_theme_mod('logo_tagline_size') : '12';
		$logo_tagline_letter_spacing = get_theme_mod('logo_tagline_letter_spacing') ? get_theme_mod('logo_tagline_letter_spacing') : '0';
		$sticky_logo_tagline_color = get_theme_mod('sticky_logo_tagline_color') ? get_theme_mod('sticky_logo_tagline_color') : '#333';
		$retina_logo = get_option('retina_logo');
		$retina_logo_img = $retina_logo['upload_retina_logo'];
		$sticky_retina = get_option('sticky_retina_logo');
		$sticky_retina_logo = $sticky_retina['upload_sticky_retina_logo'];
		$kaya_default_logo = esc_attr( get_template_directory_uri().'/images/logo.png' );
		$kaya_logo_img_src = get_option('kaya_logo');
		$logo = $kaya_logo_img_src['upload_logo'] ? $kaya_logo_img_src['upload_logo'] : $kaya_default_logo;
		if( $logo ){
			$upload_image_id = julia_kaya_get_attachment_id_from_src($logo);
			$array_values = julia_kaya_logo_customizer_media_upload( $upload_image_id );
			$logo_width = $array_values['width'];
			$logo_height = $array_values['height'];
		}else{
			$logo_width = '';
			$logo_height = '';
		}
		$sticky_logo = get_option('sticky_logo');	
		$sticky_logo_img = $sticky_logo['upload_sticky_logo'] ?  $sticky_logo['upload_sticky_logo'] : $kaya_default_logo; 
		if( !empty($sticky_logo_img) ){
			$sticky_logo_src = '<img src="'.esc_url($sticky_logo_img).'" class="sticky_logo" alt="'.esc_attr(get_bloginfo( 'name' )).'" />';
		}else{
			$sticky_logo_src = '<img src="'.esc_url($logo).'" class="sticky_logo" alt="'.esc_attr(get_bloginfo( 'name' )).'" />';
		} 
		if( !empty($retina_logo_img) ){
			$retina_logo_src = '<img src="'.esc_url($retina_logo_img).'" style="width:'.$logo_width.'px; min-height:'.$logo_height.';" class="header_retina_logo retina_logo" alt="'.get_bloginfo( 'name' ).'" />';
		}else{
			$retina_logo_src = '<img src="'.esc_url($logo).'" style="width:'.$logo_width.'px; min-height:'.$logo_height.'px;" class="header_retina_logo retina_logo" alt="'.esc_attr(get_bloginfo( 'name' )).'" />';
		}
		echo '<div class="header_logo_wrapper">';
		if( $select_header_logo_type == 'image_logo' ){
				if( $logo ) {
					$kaya_logo_src = esc_attr( $logo ) ? esc_attr( $logo ) : esc_attr( $kaya_default_logo );
				}else{
					$kaya_logo_src = esc_attr( get_template_directory_uri().'/images/logo.png' );
				}
				$kaya_logo_img = 'class="logo" src="'.esc_attr($kaya_logo_src).'" style="min-height:'.$logo_height.'px;" alt="'.get_bloginfo( 'name' ).'"';
				$kaya_logo = apply_filters('kaya_image_logo', '<img '.$kaya_logo_img .' />'.$sticky_logo_src.$retina_logo_src.$sticky_retina_logo);
				echo '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'.apply_filters('kaya_logo_html', $kaya_logo).'</a>';
			//}
		}elseif( $select_header_logo_type == 'text_logo' ){
			$kaya_logo = apply_filters('kaya_image_logo', $header_text_logo);
			echo '<h1 class="logo" style="font-size:'.$text_logo_size.'px; color:'.$logo_text_font_color.'; font-weight:'.$logo_text_font_weight.'; font-style:'.$logo_text_font_style.'"><a  href="'.esc_url( home_url( '/' ) ).'" style="font-size:'.$text_logo_size.'px; color:'.$logo_text_font_color.'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'.apply_filters('kaya_logo_html', $kaya_logo).'';
			echo '</a></h1>';
			if( !empty($header_text_logo_tagline) ){
				echo '<p class="logo_tag_line logo" style="color:'.$logo_tagline_font_color.'; font-size:'.$logo_tagline_size.'px; line-height:'.ceil(1.1 * $logo_tagline_size).'px; font-weight:'.$logo_tagline_font_weight.'; font-style:'.$logo_tagline_font_style.'; letter-spacing:'.$logo_tagline_letter_spacing.'px;">'.$header_text_logo_tagline.'</p>';
			}	
			echo '<h1 class="sticky_logo" style="font-size:'.$sticky_text_logo_size.'px; color:'.$sticky_logo_color.'; font-weight:'.$logo_text_font_weight.'; font-style:'.$logo_text_font_style.'"><a  href="'.esc_url( home_url( '/' ) ).'" style="font-size:'.$sticky_text_logo_size.'px; color:'.$sticky_logo_color.'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'.apply_filters('kaya_logo_html', $kaya_logo).'';
			echo '</a></h1>';
			if( !empty($header_text_logo_tagline) ){
				echo '<p class="logo_tag_line sticky_logo" style="color:'.$sticky_logo_tagline_color.'; font-size:'.$logo_tagline_size.'px; font-weight:'.$logo_tagline_font_weight.';  line-height:'.ceil(1.1 * $logo_tagline_size).'px; font-style:'.$logo_tagline_font_style.'; letter-spacing:'.$logo_tagline_letter_spacing.'px;">'.$header_text_logo_tagline.'</p>';
			}
			
		}else{

		}
		echo '</div>';
	}	
endif; // End Logo
/*------------------------------------------------------------------------------------
Frame right side & Coming Soon page socila media icons
-------------------------------------------------------------------------------------*/
if( !function_exists('julia_kaya_social_media_icons') ){
	function julia_kaya_social_media_icons(){
			$facebook_icon_id = get_theme_mod('facebook_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('facebook_icon_id')) : 'facebook_user_name';
			$twitter_icon_id = get_theme_mod('twitter_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('twitter_icon_id')) : 'twitter_user_name';
			$linkedin_icon_id = get_theme_mod('linkedin_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('linkedin_icon_id')) : '';
			$googleplus_icon_id = get_theme_mod('googleplus_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('googleplus_icon_id')) : 'google_plus_user_name';
			$youtube_icon_id = get_theme_mod('youtube_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('youtube_icon_id')) : 'youtube_user_name';
			$dribble_icon_id = get_theme_mod('dribble_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('dribble_icon_id')) : '';
			$digg_icon_id = get_theme_mod('digg_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('dribble_icon_id')) : '';
			$instagram_icon_id = get_theme_mod('instagram_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('instagram_icon_id')) : '';
			$rss_icon_id = get_theme_mod('rss_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('rss_icon_id')) : '';
			echo '<ul>';
				if( trim(!empty($facebook_icon_id)) || !empty($twitter_icon_id) || !empty($linkedin_icon_id) || !empty($youtube_icon_id) || !empty($googleplus_icon_id) || !empty($dribble_icon_id) || !empty($digg_icon_id) || !empty($instagram_icon_id) || !empty($rss_icon_id) ){
					if( trim(!empty($facebook_icon_id) ) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//facebook.com/'.$facebook_icon_id ) ).'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
					}
					if( !empty($twitter_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//twitter.com/'.$twitter_icon_id ) ).'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
					}
					if( !empty($linkedin_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//linkedin.com/'.$linkedin_icon_id ) ).'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
					}
					if( !empty($youtube_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//youtube.com/'.$youtube_icon_id ) ).'" target="_blank"><i class="fa fa-youtube"></i></a></li>';
					}
					if( !empty($googleplus_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//plus.google.com/'.$googleplus_icon_id ) ).'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
					}
					if( !empty($dribble_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//dribble.com/'.$dribble_icon_id ) ).'" target="_blank"><i class="fa fa-dribbble"></i></a></li>';
					}
					if( !empty($digg_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//digg.com/'.$digg_icon_id ) ).'" target="_blank"><i class="fa fa-digg"></i></a></li>';
					}
					if( !empty($instagram_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//instagram.com/'.$instagram_icon_id ) ).'" target="_blank"><i class="fa fa-instagram"></i></a></li>';
					}
					if( !empty($rss_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//rss.com/'.$rss_icon_id ) ).'" target="_blank"><i class="fa fa-rss"></i></a></li>';
					}
				}
			echo '</ul>';
	}
}
//End
/*------------------------------------------------------------------------------------
Page Title bar / Slider Display 
-------------------------------------------------------------------------------------*/
if( !function_exists('julia_kaya_subheader_section') ){
    function julia_kaya_subheader_section(){
		global $julia_kaya_post_item_id, $post;
		echo  julia_kaya_post_item_id();
		if( class_exists('woocommerce') ){
			if( is_shop() ){
				$select_page_options=get_post_meta( wc_get_page_id( 'shop' ),'select_page_options',true);
				$kaya_slider_type=get_post_meta(wc_get_page_id( 'shop' ),'kaya_slider_type',true);
			}else{ 
				if( get_post() ) { $select_page_options=get_post_meta(get_the_ID(),'select_page_options',true);
				$kaya_slider_type=get_post_meta(get_the_ID(),'kaya_slider_type',true); } else{ $select_page_options = ''; $kaya_slider_type = ''; }
			}
		}elseif( is_page()){
			$select_page_options=get_post_meta(get_the_ID(),'select_page_options',true);
			$kaya_slider_type=get_post_meta(get_the_ID(),'kaya_slider_type',true);
		}else{
			$select_page_options = '';
			$kaya_slider_type='';
		}
		if( $select_page_options == 'page_slider_setion'){
			if( is_page() ){
				if( $kaya_slider_type == 'customslider' ){
					get_template_part('slider/custom','slider');
				}elseif( $kaya_slider_type == 'columns_post_slider' ){
					get_template_part('slider/columns-post','slider');
				}else{
					get_template_part('slider/post','slider');
				}
			}
		}
		elseif($select_page_options=="singleimage"){
			get_template_part('slider/single','image');
		}
		elseif($select_page_options=="video_bg"){  
			get_template_part('slider/video');
		}
		elseif($select_page_options == 'page_title_setion'){ }
		elseif($select_page_options == 'none'){	}
		else{ }
	}
}
/*---------------------------------------------------------
Customizer Upload Image URL
---------------------------------------------------------*/
if( !function_exists('julia_kaya_get_attachment_id_from_src') ){
	function julia_kaya_get_attachment_id_from_src($image_src) {
	     global $wpdb;
	     $id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE  guid='%s'", $image_src));
	     return $id;
	}
}	
if(!function_exists('julia_kaya_logo_customizer_media_upload')){
function julia_kaya_logo_customizer_media_upload($upload_image_id)
	{
	  $upload_img_url = wp_get_attachment_image_src($upload_image_id, "full");
		$array['url']= $upload_img_url[0];
		$array['width']= $upload_img_url[1];
		$array['height']= $upload_img_url[2];
		return $array;
	}
}
if( !function_exists('julia_kaya_customizer_media_upload') ){
	function julia_kaya_customizer_media_upload($uploadimageid)
	{
	  $upload_img_url = wp_get_attachment_image_src($uploadimageid, "full");
	  return $upload_img_url[0];
	}
}	
/*---------------------------------------------------------------------------------------
Page title bar display 
---------------------------------------------------------------------------------------*/
if(!function_exists('julia_kaya_custom_pagetitle')){
	function julia_kaya_custom_pagetitle( $post_id )
	{
		global $julia_kaya_post_item_id, $post;
		echo  julia_kaya_post_item_id();
		$kaya_page_title_disable = get_post_meta($julia_kaya_post_item_id, 'kaya_page_title_disable', true) ? get_post_meta($julia_kaya_post_item_id, 'kaya_page_title_disable', true) : '0';
		if( $kaya_page_title_disable != '1' ){
			if( is_front_page() ){ } else{
			$select_page_title_customization=get_post_meta($julia_kaya_post_item_id,'select_page_title_customization',true);
			$page_bread_crumb = get_theme_mod('bread_crumb_remove') ? get_theme_mod('bread_crumb_remove') : '0' ;
			$page_title_color = get_theme_mod('page_titlebar_title_color') ? get_theme_mod('page_titlebar_title_color') : '#333333';
			$page_description_color = get_theme_mod('title_description_color') ? get_theme_mod('title_description_color') : '#333333';
			$page_title_bar_height = get_theme_mod('page_title_bar_height') ? get_theme_mod('page_title_bar_height') : '18';
			$title_left_right_border='';
			$paget_title_position=get_theme_mod('page_title_des_position') ? get_theme_mod('page_title_des_position') : 'left';
			$enable_fullscreen_height='';
			$page_title_font_size = get_theme_mod('page_title_font_size') ? get_theme_mod('page_title_font_size') : '36';
			$page_description_font_size = get_theme_mod('page_description_font_size') ? get_theme_mod('page_description_font_size') : '16';
			$page_line_height = get_theme_mod('page_title_bar_padding') ? get_theme_mod('page_title_bar_padding') : '80';
			$subheader_titleoptions=get_post_meta($julia_kaya_post_item_id,'subheader_titleoptions',true);
			echo '<section class="sub_header_wrapper">';
				echo '<div class="page_title_wrapper" style="">';				
				$kaya_custom_title=get_post_meta($julia_kaya_post_item_id,'kaya_custom_title',true) ? get_post_meta($julia_kaya_post_item_id,'kaya_custom_title',true) : get_the_title();
				$kaya_custom_title_description=get_post_meta($julia_kaya_post_item_id,'kaya_custom_title_description',true);
				$select_page_title_option=get_post_meta($julia_kaya_post_item_id,'select_page_title_option',true);
				$page_description_enable = ( $select_page_title_option == 'custom_page_title' ) ? esc_attr($kaya_custom_title_description) :'';
				$page_title_enable = ( $select_page_title_option == 'custom_page_title' ) ? $kaya_custom_title :get_the_title($post_id);
				if(is_page()){
					echo '<div class="title_big_letter"><strong>'.substr(trim($kaya_custom_title), 0,1).'</strong><span class="title_border_bottom"> </span></div>';
					echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';"> <span>'.esc_attr($kaya_custom_title).'</span></h2>';			
					if(!empty( $page_description_enable )) {		
						echo '<P style="font-size:'.$page_description_font_size.'px; color:'.$page_description_color.';">'.esc_attr($page_description_enable).'</P>';
					} 
				}elseif(is_home()){
					echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'.get_the_title( get_option('page_for_posts', true) ).'</h2>';

				}elseif( is_single()){ 
					echo '<div class="title_big_letter"><strong>'.substr(trim($page_title_enable), 0,1).'</strong><span class="title_border_bottom"> </span></div>';
					echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';"> <span>'.esc_attr($page_title_enable).'</span></h2>';
					if(!empty( $page_description_enable )) {		
						echo '<P style="font-size:'.$page_description_font_size.'px; color:'.$page_description_color.';">'.esc_attr($page_description_enable).'</P>';
					}  ?>
				<?php	} elseif(is_tag()){ ?>
				<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">';
					 printf( __( 'Tag Archives: %s', 'julia' ), single_cat_title( '', false ) ); ?>
				</h2>
			<?php }
			elseif ( is_author() ) {
				the_post();
				echo '<div class="title_big_letter"><strong>'.substr(trim('Author Archives'), 0,1).'</strong><span class="title_border_bottom"> </span></div>';
				echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'.sprintf( __( 'Author Archives: %s', 'julia' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ).'</h2>';
				rewind_posts();

			} elseif (is_category()) { 
				echo '<div class="title_big_letter"><strong>'.substr(trim('Category Archives'), 0,1).'</strong><span class="title_border_bottom"> </span></div>'; ?>
				<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>
					<?php printf( __( 'Category Archives: %s', 'julia' ), single_cat_title( '', false ) ); ?>
				</h2>
			<?php }  elseif( is_tax() ){
				global $post;
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				echo '<div class="title_big_letter"><strong>'.substr(trim($term->name), 0,1).'</strong><span class="title_border_bottom"> </span></div>';
				 echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';"><span>' .$term->name.'</span></h2>';

			}elseif (is_search()) { ?>
					<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?><?php printf( __( 'Search Results for: %s', 'julia' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			<?php }elseif (is_404()) { ?>
					<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?> <?php esc_html_e( 'Error 404 - Not Found', 'julia' ); ?> </h2>
				<?php }
				elseif ( is_day() ){ ?>
				<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>
					<?php  printf( __( 'Daily Archives: %s', 'julia' ), '<span>' . get_the_date() . '</span>' ); ?>
				</h2>
				<?php }			 
				 elseif ( is_month() ) { 
				 	echo '<div class="title_big_letter"><strong>'.substr(trim('Monthly Archives'), 0,1).'</strong><span class="title_border_bottom"> </span></div>'; ?>
				 <?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>
				<?php 	printf( __( 'Monthly Archives: %s', 'julia' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
				</h2>
				<?php } elseif ( is_year() ){
				echo '<div class="title_big_letter"><strong>'.substr(trim('Yearly Archives'), 0,1).'</strong><span class="title_border_bottom"> </span></div>'; ?>
					<h2>	<?php printf( __( 'Yearly Archives: %s', 'julia' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?> </h2>
				<?php }elseif ( class_exists('woocommerce') ){
					if( is_shop() ) { 
						if($kaya_custom_title=get_post_meta(wc_get_page_id('shop'),'kaya_custom_title',true)) {	
							echo '<div class="title_big_letter"><strong>'.substr(trim($kaya_custom_title), 0,1).'</strong><span class="title_border_bottom"> </span></div>';	
							echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'.$kaya_custom_title.'</h2>';			
						} 
						else{
							echo '<div class="title_big_letter"><strong>'.substr(trim('Shop'), 0,1).'</strong><span class="title_border_bottom"> </span></div>';
							echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?> <?php esc_html_e('Shop','julia'); ?></h2>
						<?php }
						if($kaya_custom_title_description=get_post_meta(wc_get_page_id('shop'),'kaya_custom_title_description',true)) {		
							echo '<P style="font-size:'.$page_description_font_size.'px; color:'.$page_description_color.';">'.$kaya_custom_title_description.'</P>';
						} ?>
				<?php }else { ?>
				<?php 
				echo '<div class="title_big_letter"><strong>'.substr(trim('Blog Archives'), 0,1).'</strong><span class="title_border_bottom"> </span></div>';
				echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>	<?php esc_html_e( 'Blog Archives', 'julia' ); ?> </h2> 
				<?php }
				}
			//echo '<span class="title_border_bottom"> </span>';	
			echo '</div>';
			echo'</section>'; ?>
			<div class="clear"></div>
			<?php }
		}
	}
}
/* ---------------------------------------
 Display Model Details on Image Hover 
 ----------------------------------------- */
if( !function_exists('julia_kaya_model_details') ){
	function julia_kaya_model_details(){
		global $post;
		//Start Model Details
		$custom_pf_options = get_option('pf_custom_options');
		$prefix = 'pf_model_';
		for ($i=0; $i < count($custom_pf_options['pf_meta_label_name'])-1; $i++) {
		if( ( !empty($custom_pf_options['pf_meta_label_name'][$i]) ) &&  ( $custom_pf_options['pf_meta_label_name'][$i] != 'Array') &&  ( $custom_pf_options['pf_meta_label_name'][$i] != '') &&  ( !is_array($custom_pf_options['pf_meta_label_name'][$i]) )){
				$options_data_id = $prefix.str_replace(array(' ', ',','-', '/', '___'), '_', trim(strtolower($custom_pf_options['pf_meta_label_uid'][$i])));
				if( $custom_pf_options['pf_meta_field_name'][$i] == 'checkbox' ){
					$meta_data = get_post_meta(get_the_ID(), $options_data_id , false);
				}else{
					$meta_data = get_post_meta(get_the_ID(), $options_data_id , true);
				}
				if( $custom_pf_options['pf_meta_field_name'][$i] == 'date' ){
					$option_data = julia_kaya_dob_cal($meta_data, $custom_pf_options['pf_meta_field_date_format'][$i]);
				}
				elseif( $custom_pf_options['pf_meta_field_name'][$i] == 'checkbox' ){
					$option_data = implode(',', $meta_data);
				}
				else{
					$option_data = str_replace('.', "'", $meta_data);
				}
				$option_value = !empty($option_data) ? '<strong>'.trim($custom_pf_options['pf_meta_label_name'][$i]).' : </strong> '.trim($option_data).'' : '';
				if( $custom_pf_options['pf_option_dsiplay_hover_img'][$i] == 'true' ){
					if( !empty($option_data) ){
						echo '<span>'.$option_value.'</span>';
					}
				}
			}
		} //End
	}
}
/*-----------------------------------------
Include Related Post Section
-----------------------------------------*/
	get_template_part('lib/includes/relatedpost');

/*-----------------------------------------
Menu Customization
-------------------------------------------*/
if( !class_exists('julia_kaya_custom_pagetitle') ){
	class julia_kaya_custom_pagetitle extends Walker_Nav_Menu
	{
      	function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
      	{
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$prepend = '<strong>';
			$append = '</strong>';
			$description='';
			$item_desc='';
			if($item->description){
				$item_desc='<span class="menu_description">'.esc_attr( $item->description ).'</span>';
			}
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $description.$args->link_after.$item_desc;
            $item_output .= '</a>';
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
	}
}
/*-------------------------------------------
Page Post ID Display
--------------------------------------------*/
if( !function_exists('julia_kaya_post_item_id') ){
	function julia_kaya_post_item_id(){
		 global $julia_kaya_post_item_id, $post;
		if( class_exists('woocommerce')){	
			if( is_shop() ){
				$julia_kaya_post_item_id = wc_get_page_id( 'shop' );
			}
			else{
				if( get_post()){ $julia_kaya_post_item_id = $post->ID;}
			}
		}
		elseif(get_post()){
			$julia_kaya_post_item_id = $post->ID;
		}else{

		}
	}
}
/*----------------------------------------------
Portfolio Single page Ajax Mail Send Function 
----------------------------------------------*/
if( !function_exists('julia_kaya_share_post_email') ){
	function julia_kaya_share_post_email(){
		$change_form_success_msg = get_theme_mod('change_form_success_msg') ? get_theme_mod('change_form_success_msg') : esc_html__( 'This post has been shared!', 'julia' );
		$change_form_error_msg = get_theme_mod('change_form_error_msg') ? get_theme_mod('change_form_error_msg') : esc_html__( 'Email check failed, please try again', 'julia' );;
		$change_shared_post_msg = get_theme_mod('change_shared_post_msg') ? get_theme_mod('change_shared_post_msg') : esc_html__( '[Shared Post]', 'julia' );
	    $to = trim($_POST['receiver_email']);
	    $subject = esc_attr( $_POST['user_name'] ). ' '.esc_attr( $change_shared_post_msg ).'';
	    $message = esc_attr($_POST['user_post_link']);
	    $headers = 'From: '. esc_attr($_POST['user_email']).' ' . "\r\n" .
	   'Reply-To: ' . esc_attr($_POST['user_email']). '' . "\r\n" .
	   'X-Mailer: PHP/' . phpversion();    
	    $mailsent = wp_mail( $to, $subject, $message, $headers);
	    if( $mailsent ) {
	       echo esc_attr($change_form_success_msg);
	        die();
	    }
	    else{ 
	         echo esc_attr($change_form_error_msg);
	        die();
	    }
	}
	add_action( 'wp_ajax_nopriv_julia_kaya_share_post_email', 'julia_kaya_share_post_email' );
	add_action( 'wp_ajax_julia_kaya_share_post_email', 'julia_kaya_share_post_email' );
}
/*----------------------------------------------
// Age Calculator
----------------------------------------------*/
if( !function_exists('julia_kaya_dob_cal') ){
	function julia_kaya_dob_cal($date, $date_format){
		if( $date_format == 'y_d_m' ){
			list($year,$day,$month) = explode("-",$date);
		}elseif ($date_format == 'm_d_y') {
			list($month,$day,$year) = explode("-",$date);
		}elseif ($date_format == 'd_m_y') {
			list($day,$month,$year) = explode("-",$date);
		}elseif ($date_format == 'y_m_d') {
			list($year,$month,$day) = explode("-",$date);
		}else{
			list($year,$month,$day) = explode("-",$date);
		}	    
	    $year_diff  = date("Y") - $year;
	    $month_diff = date("m") - $month;
	    $day_diff   = date("d") - $day;
	    if ($day_diff < 0 || $month_diff < 0) $year_diff--;
	    return $year_diff;
	}
}
/*-----------------------------------------------
 // Current user post
----------------------------------------------*/
if( !function_exists('julia_kaya_current_user_post_id') ){
	function julia_kaya_current_user_post_id(){
	    global $post;
	    $current_user_post_id = array(
	       'post_type' => 'portfolio',
	       'post_status' => array('publish', 'pending'),
	       'author' =>  get_current_user_id(),
	    );
	    $author_post_id = get_posts( $current_user_post_id );
	    return $author_post_id[0]->ID;
	}
}
/*----------------------------------------------
// Popup content Box
----------------------------------------------*/
if( !function_exists('julia_kaya_popup_box') ){
	function julia_kaya_popup_box(){
		$kaya_default_logo = esc_attr( get_template_directory_uri().'/images/logo.png' );
		$kaya_logo_img_src = get_option('kaya_logo');
		$logo = $kaya_logo_img_src['upload_logo'] ? $kaya_logo_img_src['upload_logo'] : $kaya_default_logo; ?>
		<div class="content_alert_dialog_overlay"> </div>
			<div class="content_alert_dialog_box" id="content_alert_dialog_wrapper">
				<img src="<?php echo $logo; ?>" style="margin:0px auto; display:block;"/><br />
				<p><?php echo get_theme_mod('content_wrng_popup_text') ? str_replace('&nbsp;','',get_theme_mod('content_wrng_popup_text')) : ' It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum .
				<ul>
				<li>It is a long established fact that a reader will be distracted</li>
				<li>It is a long established fact that a reader will be distracted</li>
				<li>It is a long established fact that a reader will be distracted</li>
				</ul>'; ?></p>
				<div class="content_alert_dialog_btns">
					<div class="dialog_box_allow_btn">
						<a href="#"><?php echo get_theme_mod('content_wrng_button_text') ? str_replace('&nbsp;','', get_theme_mod('content_wrng_button_text')) : 'ENTER'; ?></a>
					</div>
				</div>	
			</div>
	<?php }
}
/*-----------------------------------------------
string to array convertion
--------------------------------------------------*/
if( !function_exists('kaya_explode_data') ){
  function kaya_explode_data($explode_string){
     $explode_string = trim(nl2br($explode_string));
     $explode_string = str_replace('<br />', ",", trim($explode_string));
     $explode_string =  preg_replace( "/\r|\n/", "", trim($explode_string) );
     return trim($explode_string);
  }
} 
/*----------------------------------------------
// Generate Model Unique ID
----------------------------------------------*/
if( !function_exists('julia_kaya_unique_id') ){
    function julia_kaya_unique_id($l = 10) {
      	return substr(uniqid(mt_rand(100000,999999), true), 0, $l);
    }
}
if( !function_exists('julia_kaya_id_prefix') ){
	function julia_kaya_id_prefix(){
		 return get_theme_mod('pf_unique_id_prefix') ? get_theme_mod('pf_unique_id_prefix') :'JLAUSA';
	}
}
/*----------------------------------------------
Model Detials List 
-----------------------------------------------*/
if( !function_exists('julia_kaya_models_shortlist_data') ){
	function julia_kaya_models_shortlist_data($pf_disable_unique_id, $pf_unique_id, $post_id, $set_card=FALSE, $model_details=TRUE){
		// Display Model Information
		global $pf_slug_text;
		$custom_pf_options = get_option('pf_custom_options');
		$prefix = 'pf_model_';
		 unset($custom_pf_options['pf_meta_label_name'][0]);
		 $count = count($custom_pf_options['pf_meta_label_name'])-1;
		if( $count > 0 ){
			echo '<div class="pf_model_info_wrapper"><ul>';
			if( $pf_disable_unique_id != '1' ){
				echo '<li><strong>'.ucfirst($pf_slug_text).' '.__('ID', 'julia').': </strong><span>'.julia_kaya_id_prefix().$pf_unique_id.'</span></li>';
			}
			for ($i=0; $i < count($custom_pf_options['pf_meta_label_name']); $i++) {
				if( ( !empty($custom_pf_options['pf_meta_label_name'][$i]) ) &&  ( $custom_pf_options['pf_meta_label_name'][$i] != 'Array') &&  ( $custom_pf_options['pf_meta_label_name'][$i] != '') &&  ( !is_array($custom_pf_options['pf_meta_label_name'][$i]) )){
						$options_data_id = $prefix.str_replace(array(' ', ',','-', '/', '___'), '_', trim(strtolower($custom_pf_options['pf_meta_label_uid'][$i])));
						//$mutilple_items = ( $custom_pf_options['pf_meta_field_name'][$i] == 'checkbox' ) ? 'false' : 'true';
						if( $custom_pf_options['pf_meta_field_name'][$i] == 'checkbox' ){
							$meta_data = get_post_meta($post_id, $options_data_id , false);
						}else{
							$meta_data = get_post_meta($post_id, $options_data_id , true);
						}
					if( !empty( $meta_data) ){
						if( $custom_pf_options['pf_meta_field_name'][$i] == 'date' ){
							$option_value = julia_kaya_dob_cal($meta_data, $custom_pf_options['pf_meta_field_date_format'][$i]);
						}elseif( $custom_pf_options['pf_meta_field_name'][$i] == 'checkbox' ){
							$option_value = implode(',', $meta_data);
						}else{
							if( $custom_pf_options['pf_meta_field_name'][$i] == 'emailid' ){
								$option_value =  $meta_data;
							}else{
								$option_value = str_replace('.', "'", $meta_data);
							}
						}
						if( class_exists('RW_Meta_Box') ){
							$pf_option_visibility = ( $custom_pf_options['pf_option_visibility'][$i] != 'true' ) ? 'blur_text' : '';
							if( $custom_pf_options['pf_option_visibility'][$i] == 'true' ){
								if(( $custom_pf_options['pf_option_dsiplay_set_card'][$i] == 'true'  ) && $set_card == TRUE){
									echo '<li><strong>'.trim($custom_pf_options['pf_meta_label_name'][$i]).' : </strong><span class="'.$pf_option_visibility.'">'.$option_value.'</span></li>';
								}
								if( $model_details == TRUE ){
									echo '<li><strong>'.trim($custom_pf_options['pf_meta_label_name'][$i]).' : </strong><span class="'.$pf_option_visibility.'">'.$option_value.'</span></li>';
								}
							}
						}
					}
				}
			}
			echo '</ul></div>';
		}
		// End
	}
}
/*----------------------------------------------
// Update Model Posts with ID
----------------------------------------------*/
if( !function_exists('julia_kaya_pf_posts_ids') ){
	function julia_kaya_pf_posts_ids(){
	    $args = array('post_type' => 'portfolio', 'posts_per_page' => -1);
	    $loop = new WP_Query( $args );
	    while ( $loop->have_posts() ) : $loop->the_post();
	    $pf_unique_id = get_post_meta(get_the_ID(),'pf_unique_id', true) ? get_post_meta(get_the_ID(),'pf_unique_id', true) : '';
	    if( empty($pf_unique_id) ){
	        update_post_meta(get_the_ID(), 'pf_unique_id', julia_kaya_unique_id());
	    }
	    endwhile;
	}
}
julia_kaya_pf_posts_ids();

/*-----------------------------------------------
 Page Middel Content Disable 
 ----------------------------------------------*/
 if( !function_exists('julia_kaya_disable_mid_content') ){
	 function julia_kaya_disable_mid_content(){
	 	return get_post_meta(get_the_ID(), 'page_middle_content', true) ? get_post_meta(get_the_ID(), 'page_middle_content', true) : '0';
	 }
}

 if( !function_exists('julia_kaya_disable_mid_content') ){
	 function julia_kaya_disable_mid_content(){
	 	return get_post_meta(get_the_ID(), 'home_container_bg', true) ? get_post_meta(get_the_ID(), 'home_container_bg', true) : '0';
	 }
}
 /**
 * Returns current plugin version.
 * 
 * @return string Plugin version
 */
function kaya_julia_plugins_current_ver() {
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	$plugin_folder = get_plugins( '/' . 'talent-agency' );
	$plugin_file = 'talentagency.php';

	if ( isset( $plugin_folder[$plugin_file]['Version'] ) ) {
		return $plugin_folder[$plugin_file]['Version'];
	} else {
		return NULL;
	}
}

function kaya_admin_ta_plugin_warning_msg() { ?>
    <div class="notice notice-error">
        <p style="font-size:15px; font-weight:bold;"><?php echo '<strong style="color:#dc3232;">'.__('Note for buyers who purchased before 20-12-2016: ', 'julia').'</strong>'; _e( 'New buyers can ignore this message. You must watch this <a href="https://www.youtube.com/watch?v=3FXBPBDmaCM&feature=youtu.be" target="_blank">video</a> before updating "Talent Agency" plugin because we made major changes to "Talent Options Generator" which will cause you to lose the data, so that you must take it backup before updating plugin. We explained in video how to take backup and re enter the data, if you do like shown in video you will not lose any thing. Sorry for your convenience.', 'julia' ); ?></p>
    </div>
    <?php
}
if( current_user_can('administrator') && ( kaya_julia_plugins_current_ver() < '1.1.9' ) && (  kaya_julia_plugins_current_ver() != '' )){
	add_action( 'admin_notices', 'kaya_admin_ta_plugin_warning_msg' );
}

?>