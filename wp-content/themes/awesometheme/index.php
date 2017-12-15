<?php get_header(); ?>

	<?php if(have_posts()): ?>
 
			 <?php while (have_posts()): the_post(); ?>

				<h3><?php the_title(); ?></h3>
				<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a' ); ?>, <?php the_category(); ?></small>
				
				<p><?php the_content(); ?></p>	

			 <?php endwhile;  ?>

	<?php endif; ?>	

<?php get_footer(); ?>

 <!-- Hey im a comment -->