<?php
/*
Template Name: Full Width Page
*/
get_header(); 
global $julia_kaya_post_item_id, $post;
  echo  julia_kaya_post_item_id();
  if( julia_kaya_disable_mid_content() != '1' ){ ?>
		<div id="mid_container_wrapper" class="mid_container_wrapper_section">
			<div id="mid_container" class="">
				<?php 
				if( !is_front_page() ){
					echo julia_kaya_custom_pagetitle($post->ID);
				} ?>
				<section class="fullwidth" id="content_section">
				<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				global $post; ?>
					<?php if( trim($post->post_content) == "" ) {
						$class = "no-content-wrapper";
					}else{
						$class ='page-with-content';
					} ?>
					<div id="post-<?php the_ID(); ?>" class="<?php echo $class; ?>">
						<div class="entry-content">
						<?php the_content(); ?>
						</div>
					</div>
			<!-- #post-## -->
		<?php endwhile;
		wp_reset_query();
		wp_reset_postdata(); 
		endif; ?>
		</section>
	<?php   }
	get_footer(); ?>