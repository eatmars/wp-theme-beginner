<div class="slider_bg_img_wrapper">
	<?php $Kaya_post_slider_auto_play = ( get_post_meta(get_the_ID(),'Kaya_post_slider_auto_play', true) == 'false') ? '0' : '1';
	 $Kaya_post_slide_animation_type = get_post_meta(get_the_ID(),'Kaya_post_slide_animation_type', true) ? get_post_meta(get_the_ID(),'Kaya_post_slide_animation_type', true) : '1';
	$post_slide_images_order_by = get_post_meta(get_the_ID(),'post_slide_images_order_by', true) ? get_post_meta(get_the_ID(),'post_slide_images_order_by', true) : 'ID';
	$post_slide_images_order = get_post_meta(get_the_ID(),'post_slide_images_order', true) ? get_post_meta(get_the_ID(),'post_slide_images_order', true) : 'DESC';
	$post_slide_pattern_disable = get_post_meta(get_the_ID(),'post_slide_pattern_disable', true) ? get_post_meta(get_the_ID(),'post_slide_pattern_disable', true) : '0';
	$kaya_post_slider_interval = get_post_meta(get_the_ID(),'kaya_post_slider_interval', true) ? get_post_meta(get_the_ID(),'kaya_post_slider_interval', true) : '3000';
	$category=get_post_meta(get_the_ID(),'kaya_post_category',false);	?>
<script type="text/javascript">			
			jQuery(function($){
				$('body').addClass('fullscreen_slider_bg');		
				$.supersized({				
					// Functionality
					slideshow               :   1,			// Slideshow on/off
					autoplay				:	<?php echo esc_attr( $Kaya_post_slider_auto_play ); ?>,			// Slideshow starts playing automatically
					start_slide             :   1,			// Start slide (0 is random)
					stop_loop				:	0,			// Pauses slideshow on last slide
					random					: 	0,			// Randomize slide order (Ignores start slide)
					slide_interval          :   <?php echo $kaya_post_slider_interval; ?>,		// Length between transitions
					transition              :   <?php echo esc_attr( $Kaya_post_slide_animation_type ); ?>, 	// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	1000,		// Speed of transition
					new_window				:	1,			// Image links open in new window/tab
					pause_hover             :   0,			// Pause slideshow on hover
					keyboard_nav            :   1,			// Keyboard navigation on/off
					performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,			// Disables image dragging and right click with Javascript							   
					// Size & Position						   
					min_width		        :   0,			// Min width allowed (in pixels)
					min_height		        :   0,			// Min height allowed (in pixels)
					vertical_center         :   1,			// Vertically center background
					horizontal_center       :   1,			// Horizontally center background
					fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
					fit_portrait         	:   1,			// Portrait images will not exceed browser height
					fit_landscape			:   0,			// Landscape images will not exceed browser width
															   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					thumb_links				:	1,			// Individual thumb links for each slide
					thumbnail_navigation    :   0,			// Thumbnail navigation
					slides 					:  	[			// Slideshow Images

									<?php  
								  	if(empty($category)) {
										$loop = new WP_Query(array('post_type' => 'slider', 'taxonomy' => 'slider_category','term' => '', 'orderby' => $post_slide_images_order_by, 'posts_per_page' =>-1,'order' => $post_slide_images_order));
									}else{ 
										$loop =new WP_Query(array('post_type' => 'slider', 'orderby' => esc_attr( $post_slide_images_order_by ), 'posts_per_page' =>-1,'order' => esc_attr( $post_slide_images_order ), 'tax_query' => array( array( 'taxonomy' => 'slider_category', 'field' => 'slug', 'terms' => $category , 'operator' => 'IN'))));
									}
									if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); 								
									$slide_title_bg_border_color = get_post_meta(get_the_ID(), 'slide_title_bg_border_color', true) ? get_post_meta(get_the_ID(), 'slide_title_bg_border_color', true) :'#ff3333';
									$slide_title_color = get_post_meta(get_the_ID(), 'slide_title_color', true) ?  get_post_meta(get_the_ID(), 'slide_title_color', true) :'#fff';
									$slide_title_font_size = get_post_meta(get_the_ID(), 'slide_title_font_size', true) ?  get_post_meta(get_the_ID(), 'slide_title_font_size', true) : '100';
									$slide_title_letter_spacing = get_post_meta(get_the_ID(), 'slide_title_letter_spacing', true) ? get_post_meta(get_the_ID(), 'slide_title_letter_spacing', true) :'0';
									$slide_title_font_weight = get_post_meta(get_the_ID(), 'slide_title_font_weight', true) ? get_post_meta(get_the_ID(), 'slide_title_font_weight', true) : 'bold';
									$slide_title_font_style = get_post_meta(get_the_ID(), 'slide_title_font_style', true) ? get_post_meta(get_the_ID(), 'slide_title_font_style', true) :'normal';
									$slide_description_color = get_post_meta(get_the_ID(), 'slide_description_color', true) ? get_post_meta(get_the_ID(), 'slide_description_color', true) : '#fff';
									$slide_description_font_size = get_post_meta(get_the_ID(), 'slide_description_font_size', true) ? get_post_meta(get_the_ID(), 'slide_description_font_size', true) :'25';
									$slide_description_letter_spacing = get_post_meta(get_the_ID(), 'slide_description_letter_spacing', true) ? get_post_meta(get_the_ID(), 'slide_description_letter_spacing', true) : '0';
									$slide_desc_font_weight = get_post_meta(get_the_ID(), 'slide_desc_font_weight', true) ? get_post_meta(get_the_ID(), 'slide_desc_font_weight', true) : 'normal';
									$slide_desc_font_style = get_post_meta(get_the_ID(), 'slide_desc_font_style', true) ? get_post_meta(get_the_ID(), 'slide_desc_font_style', true) :'italic';
									//Buttons 
									$slide_readmore_button_text = get_post_meta($post->ID, 'slide_readmore_button_text', true) ? get_post_meta($post->ID, 'slide_readmore_button_text', true) : '';
								  	$slide_readmore_button_bg = get_post_meta($post->ID, 'slide_readmore_button_bg', true) ? get_post_meta($post->ID, 'slide_readmore_button_bg', true) : '';
								  	$slide_readmore_button_text_color = get_post_meta($post->ID, 'slide_readmore_button_text_color', true) ? get_post_meta($post->ID, 'slide_readmore_button_text_color', true) : '#353535';
								  	$slide_readmore_button_hover_bg_color = get_post_meta($post->ID, 'slide_readmore_button_hover_bg_color', true) ? get_post_meta($post->ID, 'slide_readmore_button_hover_bg_color', true) : '';
								  	$slide_readmore_hover_text = get_post_meta($post->ID, 'slide_readmore_hover_text', true) ? get_post_meta($post->ID, 'slide_readmore_hover_text', true) : '';
								  	$slide_readmore_button_font_size = get_post_meta($post->ID, 'slide_readmore_button_font_size', true) ? get_post_meta($post->ID, 'slide_readmore_button_font_size', true) : '13';
								  	$slide_readmore_button_letter_space = get_post_meta($post->ID, 'slide_readmore_button_letter_space', true) ? get_post_meta($post->ID, 'slide_readmore_button_letter_space', true) : '2';
								  	$slide_readmore_button_link = get_post_meta($post->ID, 'slide_readmore_button_link', true) ? get_post_meta($post->ID, 'slide_readmore_button_link', true) : '';
								  	$slide_title_bottom_border_color = get_post_meta($post->ID, 'slide_title_bottom_border_color', true) ? get_post_meta($post->ID, 'slide_title_bottom_border_color', true) : '#3cb14f';
								    $slide_readmore_hover_text = get_post_meta($post->ID, 'slide_readmore_hover_text', true) ? get_post_meta($post->ID, 'slide_readmore_hover_text', true) : '#ffffff';
								    $slide_readmore_button_hover_border_color = get_post_meta($post->ID, 'slide_readmore_button_hover_border_color', true) ? get_post_meta($post->ID, 'slide_readmore_button_hover_border_color', true) : '';
								  	$slide_readmore_button_border_color = get_post_meta($post->ID, 'slide_readmore_button_border_color', true) ? get_post_meta($post->ID, 'slide_readmore_button_border_color', true) : '';
								    /* Button 2 styles */
								    $slide_readmore_button2_text = get_post_meta($post->ID, 'slide_readmore_button2_text', true) ? get_post_meta($post->ID, 'slide_readmore_button2_text', true) : '';
								  	$slide_readmore_button2_bg = get_post_meta($post->ID, 'slide_readmore_button2_bg', true) ? get_post_meta($post->ID, 'slide_readmore_button2_bg', true) : '';
								  	$slide_readmore_button2_text_color = get_post_meta($post->ID, 'slide_readmore_button2_text_color', true) ? get_post_meta($post->ID, 'slide_readmore_button2_text_color', true) : '#353535';
								  	$slide_readmore_button2_hover_bg_color = get_post_meta($post->ID, 'slide_readmore_button2_hover_bg_color', true) ? get_post_meta($post->ID, 'slide_readmore_button2_hover_bg_color', true) : '';
								  	$slide_readmore2_hover_text = get_post_meta($post->ID, 'slide_readmore2_hover_text', true) ? get_post_meta($post->ID, 'slide_readmore2_hover_text', true) : '';
								  	$slide_readmore_button2_font_size = get_post_meta($post->ID, 'slide_readmore_button2_font_size', true) ? get_post_meta($post->ID, 'slide_readmore_button2_font_size', true) : '13';
								  	$slide_readmore_button2_letter_space = get_post_meta($post->ID, 'slide_readmore_button2_letter_space', true) ? get_post_meta($post->ID, 'slide_readmore_button2_letter_space', true) : '2';
								  	$slide_readmore_button2_link = get_post_meta($post->ID, 'slide_readmore_button2_link', true) ? get_post_meta($post->ID, 'slide_readmore_button2_link', true) : '';
								  	$slide_readmore_button2_hover_border_color = get_post_meta($post->ID, 'slide_readmore_button2_hover_border_color', true) ? get_post_meta($post->ID, 'slide_readmore_button2_hover_border_color', true) : '';
								  	$slide_readmore_button2_border_color = get_post_meta($post->ID, 'slide_readmore_button2_border_color', true) ? get_post_meta($post->ID, 'slide_readmore_button2_border_color', true) : '';
								  	$slide_content_position = get_post_meta($post->ID, 'slide_content_position', true) ? get_post_meta($post->ID, 'slide_content_position', true) : 'center';
								  	$button1_border_color = $slide_readmore_button_border_color ? 'border:1px solid '.$slide_readmore_button_border_color.';' : '';
									$button2_border_color = $slide_readmore_button2_border_color ? 'border:1px solid '.$slide_readmore_button2_border_color.';' : '';

									$slide_readmore_button2_font_weight = get_post_meta($post->ID, 'slide_readmore_button2_font_weight', true) ? get_post_meta($post->ID, 'slide_readmore_button2_font_weight', true) : 'normal';
									$slide_readmore_button2_font_style = get_post_meta($post->ID, 'slide_readmore_button2_font_style', true) ? get_post_meta($post->ID, 'slide_readmore_button2_font_style', true) : 'normal';
									$slide_readmore_button_font_style = get_post_meta($post->ID, 'slide_readmore_button_font_style', true) ? get_post_meta($post->ID, 'slide_readmore_button_font_style', true) : 'normal';
									$slide_readmore_button_font_weight = get_post_meta($post->ID, 'slide_readmore_button_font_weight', true) ? get_post_meta($post->ID, 'slide_readmore_button_font_weight', true) : 'normal';		
									//End
									
									 $img_url = wp_get_attachment_url( get_post_thumbnail_id() ); 
										if($img_url){  ?>
										{image : '<?php echo esc_url( $img_url ); ?>', title : '<style type="text/css">#slidecaption{ text-align:<?php echo esc_attr( $slide_content_position ); ?>; } #slidecaption .slider_button_1:hover{ background:<?php echo esc_attr( $slide_readmore_button_hover_bg_color ); ?>!important; border-color:<?php echo esc_attr( $slide_readmore_button_hover_border_color ); ?>!important; color:<?php echo esc_attr( $slide_readmore_hover_text ); ?>!important; } #slidecaption .slider_button_2:hover{ background:<?php echo esc_attr( $slide_readmore_button2_hover_bg_color ); ?>!important; border-color:<?php echo esc_attr( $slide_readmore_button2_hover_border_color ); ?>!important; color:<?php echo esc_attr( $slide_readmore2_hover_text ); ?>!important; }</style><h2 style="color:<?php echo esc_attr( $slide_title_color ); ?>; font-size:<?php echo esc_attr( $slide_title_font_size ); ?>px; letter-spacing:<?php echo esc_attr( $slide_title_letter_spacing ) ?>px; font-weight:<?php echo esc_attr( $slide_title_font_weight ); ?>; font-style:<?php echo esc_attr( $slide_title_font_style ); ?>;"><?php echo the_title(); ?></h2><p style="color:<?php echo esc_attr( $slide_description_color); ?>; font-size:<?php echo esc_attr(  $slide_description_font_size ); ?>px; letter-spacing:<?php echo esc_attr( $slide_description_letter_spacing ); ?>px; font-weight:<?php echo esc_attr( $slide_desc_font_weight ); ?>; font-style:<?php echo esc_attr( $slide_desc_font_style ); ?>;"><?php echo 
											preg_replace( "/\r|\n/", "", get_the_content() ); ?></p><?php if( trim(!empty($slide_readmore_button_text)) ){ ?><a style="background-color:<?php echo esc_attr(  $slide_readmore_button_bg ); ?>; <?php echo esc_attr( $button1_border_color ); ?> color:<?php echo esc_attr( $slide_readmore_button_text_color ); ?>; font-size:<?php echo esc_attr( $slide_readmore_button_font_size ); ?>px; font-style:<?php echo esc_attr( $slide_readmore_button_font_style ); ?>; font-weight:<?php echo esc_attr( $slide_readmore_button_font_weight ); ?>; letter-spacing:<?php echo esc_attr( $slide_readmore_button_letter_space ); ?>px;" href="<?php echo esc_url($slide_readmore_button_link); ?>" class="slider_button_1"><?php echo esc_attr($slide_readmore_button_text); ?></a><?php } ?> <?php if( trim(!empty($slide_readmore_button2_text)) ){ ?><a style="background-color:<?php echo esc_attr( $slide_readmore_button2_bg ); ?>; <?php echo esc_attr( $button2_border_color ) ?> color:<?php echo esc_attr( $slide_readmore_button2_text_color ); ?>; font-size:<?php echo esc_attr( $slide_readmore_button2_font_size ); ?>px; font-style:<?php echo esc_attr( $slide_readmore_button2_font_style ); ?>; font-weight:<?php echo esc_attr(  $slide_readmore_button2_font_weight ); ?>; letter-spacing:<?php echo esc_attr( $slide_readmore_button2_letter_space ); ?>px;" href="<?php echo esc_url($slide_readmore_button2_link); ?>" class="slider_button_2"><?php echo esc_attr($slide_readmore_button2_text); ?></a><?php } ?>'},
									<?php }else{ ?>
										{image : '<?php echo get_template_directory_uri(); ?>/images/coming-soon-page.jpg', title : '<h2 style="color:<?php echo esc_attr( $slide_title_color ); ?>; font-size:<?php echo esc_attr( $slide_title_font_size ); ?>px; letter-spacing:<?php echo esc_attr( $slide_title_letter_spacing ); ?>px; font-weight:<?php echo esc_attr( $slide_title_font_weight ); ?>; font-style:<?php echo esc_attr( $slide_title_font_style ); ?>;"><?php echo the_title(); ?></h2><p style="color:<?php echo esc_attr( $slide_description_color ); ?>; font-size:<?php echo esc_attr( $slide_description_font_size ); ?>px; letter-spacing:<?php echo esc_attr( $slide_description_letter_spacing ); ?>px; font-weight:<?php echo esc_attr( $slide_desc_font_weight ); ?>; font-style:<?php echo esc_attr( $slide_desc_font_style ); ?>;"><?php echo get_the_content(); ?></p>'},
									<?php } 
									endwhile;															
									endif;
									wp_reset_postdata(); ?>
												],												
					// Theme Options			   
					progress_bar			:	1,			// Timer for each slide							
					mouse_scrub				:	0
					
				});
		    });
		    
		</script>
		<?php 
		if( $post_slide_pattern_disable != '1' ){ ?>
			<div class="slider_overlay"> </div>
		<?php } ?>
		<?php //if( is_front_page() ){ ?>
		<div id="slidecaption"></div>
		<div id="controls-wrapper" class="load-item">
			<div id="controls">
				<ul id="slide-list"></ul>
			</div>
		</div>
		<?php //} ?>
	</div>