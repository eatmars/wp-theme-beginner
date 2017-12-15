<?php global $post;
	$video_bg_id=get_post_meta($post->ID,'video_bg_id',true);
	$video_bg_height=get_post_meta($post->ID,'video_bg_height',true);
	$video_bg_description=get_post_meta($post->ID,'video_bg_description',true);
	$select_video_bg_type = get_post_meta($post->ID,'select_video_bg_type',true);
	$video_bg_webm = get_post_meta($post->ID,'video_bg_webm',true);
	$video_bg_mp4 = get_post_meta($post->ID,'video_bg_mp4',true);
	$video_bg_ogg = get_post_meta($post->ID,'video_bg_ogg',true);
	$bg_video_opcaity = get_post_meta($post->ID,'bg_video_opcaity',true) ? get_post_meta($post->ID,'bg_video_opcaity',true) :'1';
	$video_bg_color = get_post_meta($post->ID,'video_bg_color',true) ? get_post_meta($post->ID,'video_bg_color',true) : '#000000';
	$enable_video_screen_height = get_post_meta($post->ID,'enable_video_screen_height',true);
	$video_height = ( $enable_video_screen_height != '1' ) ? 'height:100%' : '';
	?>
	<style>
		#mbYTP_video_bg_wrapper{
			opacity:<?php echo esc_attr( $bg_video_opcaity ); ?>!important;
		}
	</style>
	<div class="video_background_wrapper"  style="<?php echo esc_attr( $video_height ); ?>; background:<?php echo esc_attr( $video_bg_color ); ?>;">
		<div class="video_background"  style="<?php echo esc_attr( $video_height ); ?>; ">
			<a id="video_bg_wrapper" class="player" data-property="{videoURL:'<?php echo trim(esc_attr($video_bg_id)); ?>',containment:'.video_background', showControls:true, mute:true, autoPlay:true, loop:true, vol:50, startAt:10, opacity:1, addRaster:false, quality:'default'}"></a>
			<div class="video_description"> 
			<?php echo wp_kses_data( $video_bg_description ); ?>
			</div>
		</div>
	</div>
