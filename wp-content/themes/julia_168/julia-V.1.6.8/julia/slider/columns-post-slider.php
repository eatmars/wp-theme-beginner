<?php
global $julia_kaya_post_item_id, $post;
echo  julia_kaya_post_item_id(); 
$Kaya_post_slider_auto_play = get_post_meta(get_the_ID(),'Kaya_post_slider_auto_play', true) ? get_post_meta(get_the_ID(),'Kaya_post_slider_auto_play', true) : 'false';
$post_slide_images_order_by = get_post_meta(get_the_ID(),'post_slide_images_order_by', true) ? get_post_meta(get_the_ID(),'post_slide_images_order_by', true) : 'ID';
$post_slide_images_order = get_post_meta(get_the_ID(),'post_slide_images_order', true) ? get_post_meta(get_the_ID(),'post_slide_images_order', true) : 'DESC';
$post_slider_height = get_post_meta(get_the_ID(),'post_slider_height', true) ? get_post_meta(get_the_ID(),'post_slider_height', true) : '';
$post_slider_disable_screen_height = get_post_meta(get_the_ID(),'post_slider_disable_screen_height', true) ? get_post_meta(get_the_ID(),'post_slider_disable_screen_height', true) : '0';
$post_slider_enable_auto_width = get_post_meta(get_the_ID(),'post_slider_enable_auto_width', true) ? get_post_meta(get_the_ID(),'post_slider_enable_auto_width', true) : 'false';
$post_slider_auto_width = ( $post_slider_enable_auto_width == '1' ) ? 'true' : 'false';
$post_slider_width = get_post_meta(get_the_ID(),'post_slider_width', true) ? get_post_meta(get_the_ID(),'post_slider_width', true) : '';
$Kaya_post_slider_columns = get_post_meta(get_the_ID(),'Kaya_post_slider_columns', true) ? get_post_meta(get_the_ID(),'Kaya_post_slider_columns', true) : '5';
$category=get_post_meta(get_the_ID(),'kaya_post_category',false);
$slider_height = ( $post_slider_disable_screen_height == '1' ) ? 'style="height:'.$post_slider_height.'px;"' : '';
$disable_title_on_hover = get_post_meta(get_the_id(),'disable_title_on_hover',true) ? get_post_meta(get_the_id(),'disable_title_on_hover',true) : '0'; 
$title_display_fixed = ( $disable_title_on_hover == '1' ) ? 'disable_hover_title' : '';

$post_slide_gray_scale = get_post_meta(get_the_ID(),'post_slide_gray_scale', true) ? get_post_meta(get_the_ID(),'post_slide_gray_scale', true) : '0';
$post_slide_gray_scale_class = ( $post_slide_gray_scale == '1' ) ? 'gray_scale_img' : '';
$kaya_columns_slider_images = get_post_meta(get_the_ID(), 'kaya_columns_slider_images', false) ? get_post_meta(get_the_ID(), 'kaya_columns_slider_images', false) : '';
?>
<div class="main_header_slider_wrapper <?php echo $post_slide_gray_scale_class; ?>" <?php echo $slider_height; ?> data-windowheight="<?php echo $post_slider_disable_screen_height; ?>" data-autowidth="<?php echo $post_slider_auto_width; ?>" data-columns="<?php echo $Kaya_post_slider_columns; ?>" data-title-hover-disable="<?php echo $disable_title_on_hover; ?>" data-autoplay="<?php echo $Kaya_post_slider_auto_play; ?>">
	 <div id="loading_image" style=""><img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.GIF" alt="" width="31" height="31" /></div> 
	<div class="slides-container"  <?php echo $slider_height; ?>>
	  <?php
			global $post;
			$slider_external_url = get_post_meta(get_the_ID(),'slider_external_url', true) ? get_post_meta(get_the_ID(),'slider_external_url', true) : '';
			$img_url = wp_get_attachment_url(get_post_thumbnail_id());
			$img_height = ( $post_slider_disable_screen_height == '1' ) ? $post_slider_height : '1200';
				if( !empty($kaya_columns_slider_images) && is_array($kaya_columns_slider_images) ){
					foreach ($kaya_columns_slider_images as $slider_img) {
						$image_details = get_post($slider_img);
						$image_url = wp_get_attachment_image_src($slider_img, 'full');
					switch ($Kaya_post_slider_columns) {
						case '5':
							$width = '380';
							//$srcset = 'srcset="'.kaya_image_resize(esc_url($image_details->guid), $width, $img_height, 't').' 1200w, '.kaya_image_resize(esc_url($image_details->guid), 600, 600, 't').' 600w,'.kaya_image_resize(esc_url($image_details->guid), 480, 480, 't').' 480w,  '.kaya_image_resize(esc_url($image_details->guid), 320, 320, 't').' 320w" sizes="(max-width: 1200px) 100vw, 1200px"';
							break;
						case '4':
							$width = '480';
							//$srcset = 'srcset="'.kaya_image_resize(esc_url($image_details->guid), $width, $img_height, 't').' 1200w, '.kaya_image_resize(esc_url($image_details->guid), 600, 600, 't').' 600w,'.kaya_image_resize(esc_url($image_details->guid), 480, 480, 't').' 480w,  '.kaya_image_resize(esc_url($image_details->guid), 320, 320, 't').' 320w" sizes="(max-width: 1200px) 100vw, 1200px"';
							break;
						case '3':
							$width = '650';
							//$srcset = 'srcset="'.kaya_image_resize(esc_url($image_details->guid), $width, $img_height, 't').' 1200w, '.kaya_image_resize(esc_url($image_details->guid), 600, 600, 't').' 600w,'.kaya_image_resize(esc_url($image_details->guid), 480, 480, 't').' 480w,  '.kaya_image_resize(esc_url($image_details->guid), 320, 320, 't').' 320w" sizes="(max-width: 1200px) 100vw, 1200px"';
							break;
						case '2':
							$width = '1000';
							//$srcset = 'srcset="'.kaya_image_resize(esc_url($image_details->guid), $width, $img_height, 't').' 1200w, '.kaya_image_resize(esc_url($image_details->guid), 600, 600, 't').' 600w,'.kaya_image_resize(esc_url($image_details->guid), 480, 480, 't').' 480w,  '.kaya_image_resize(esc_url($image_details->guid), 320, 320, 't').' 320w" sizes="(max-width: 1200px) 100vw, 1200px"';
							break;
						case '1':
							$width = '';
							$srcset = "";
							break;					
						default:
							$width = '380';
							//$srcset = 'srcset="'.kaya_image_resize(esc_url($image_details->guid), $width, $img_height, 't').' 1200w, '.kaya_image_resize(esc_url($image_details->guid), 600, 600, 't').' 600w,'.kaya_image_resize(esc_url($image_details->guid), 480, 480, 't').' 480w,  '.kaya_image_resize(esc_url($image_details->guid), 320, 320, 't').' 320w" sizes="(max-width: 1200px) 100vw, 1200px"';
							break;
					}

						$slide_rand = rand(1,500);
						echo '<div class="main_slider_item">';
						//print_r($image_details);						
						$image_custom_link= get_post_meta( $slider_img, '_image_custom_link', true ) ? get_post_meta( $slider_img, '_image_custom_link', true ) : '';
						$link_new_window= get_post_meta( $slider_img, '_link_new_window', true ) ? get_post_meta( $slider_img, '_link_new_window', true ) : '_blank';
						if( $image_details->guid ){	
							$post_slider_image = ( ( $post_slider_auto_width == 'true' ) || ( $Kaya_post_slider_columns == '1' ) ) ? esc_url($image_url[0]) :  julia_kaya_img_resize(esc_url($image_url[0]), $width, $img_height, 't' );
					 		echo '<img src="'.$post_slider_image.'" alt="'.get_the_title().'" '.$srcset.'>';				
							echo '<div class="slides_description_wrapper '.$title_display_fixed.'">';
								if( !empty($image_custom_link) ):
								echo '<a href="'.$image_custom_link.'" target="'.$link_new_window.'">';
								endif;
									echo '<h3>'.$image_details->post_title.'</h3>';
									if( !empty($image_details->post_content) ): echo '<p>'.$image_details->post_content.'</p>'; endif;
								if( !empty($image_custom_link) ):
								echo '</a>';
								endif;	
							echo '</div>';
						}else{
							echo '<img src="'.get_template_directory_uri().'/images/slider.jpg" alt="'.get_the_title().'">';
						}
						echo '</div>';	
					}
				}else{
					echo '<div class="main_slider_item">';
					echo '<img src="'.get_template_directory_uri().'/images/slider.jpg" alt="'.get_the_title().'">';
					echo '</div>';
					echo '<div class="main_slider_item">';
					echo '<img src="'.get_template_directory_uri().'/images/slider.jpg" alt="'.get_the_title().'">';
					echo '</div>';
					echo '<div class="main_slider_item">';
					echo '<img src="'.get_template_directory_uri().'/images/slider.jpg" alt="'.get_the_title().'">';
					echo '</div>';
					echo '<div class="main_slider_item">';
					echo '<img src="'.get_template_directory_uri().'/images/slider.jpg" alt="'.get_the_title().'">';
					echo '</div>';
				}

		//endwhile;
		//wp_reset_postdata();
		//endif; ?>
	</div>
</div>