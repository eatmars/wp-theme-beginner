<?php
/**
 * The template for displaying Search Results pages.
 *
 */
get_header(); ?>
<!-- Start Middle Section -->
<div id="mid_container_wrapper" class="mid_container_wrapper_section">
<div id="mid_container" class="">
	<?php
	global $julia_kaya_post_item_id, $post;
	echo  julia_kaya_post_item_id();
	echo julia_kaya_custom_pagetitle($julia_kaya_post_item_id); ?>
	<section class="fullwidth" id="content_section">
<?php
	if ( have_posts() ) :
			get_template_part( 'loop', 'search');
	else : ?>
		<h1><?php esc_html_e( 'Nothing Found', 'julia' ); ?></h1>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'julia' ); ?></p>
	<?php endif; ?>
</section>
    <!--Start Footer Section -->
<?php get_footer(); ?>