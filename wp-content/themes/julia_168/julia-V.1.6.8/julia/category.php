<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
$blog_sidebar_positions = get_theme_mod( 'blog_sidebar_positions' ) ? get_theme_mod( 'blog_sidebar_positions' ): 'fullwidth';
$blog_sidebar_position = ( $blog_sidebar_positions == 'three_fourth' ) ? 'one_fourth_last'  : 'one_fourth';
$sidebar_border_class=( $blog_sidebar_positions == 'three_fourth' ) ? 'right_sidebar' : 'left_sidebar'; 
$blog_sidebar_id = get_theme_mod('blog_sidebar_id') ? get_theme_mod('blog_sidebar_id') : 'sidebar-1'; ?>
	<!-- Start Middle Section  -->
	<div id="mid_container_wrapper" class="mid_container_wrapper_section">
		<div id="mid_container" class="">
			<?php echo julia_kaya_custom_pagetitle($post->ID); ?>
			<section class="<?php echo esc_attr( $blog_sidebar_positions ); ?>" id="content_section">
				<?php get_template_part( 'loop'); // called loop-blog.php ?>
			</section>
	        <?php // Sidebar Section
					if( trim($blog_sidebar_positions) != 'fullwidth' ) :	?>
				<article class="<?php echo esc_attr( $blog_sidebar_position ). ' ' . esc_attr( $sidebar_border_class ); ?>" >
					<div id="sidebar">
						<?php dynamic_sidebar( $blog_sidebar_id ); ?>
					</div>
				</article>
				<?php endif; ?>
			<div class="clear"></div>
			<?php get_footer(); // Footer Section ?>