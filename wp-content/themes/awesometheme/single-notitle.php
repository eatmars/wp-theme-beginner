<?php

/*
	Template Name: Page No Title
*/

 get_header(); ?>

	<?php if(have_posts()): ?>
 
			 <?php while (have_posts()): the_post(); ?>

			 	<h1>This is my static title</h1>

				<p><?php the_content(); ?></p>	

				<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a' ); ?>, <?php the_category(); ?></small>

			 <?php endwhile;  ?>

	<?php endif; ?>	

<?php get_footer(); ?>

 <!-- Hey im a comment -->