<?php get_header(); ?>

	<?php if(have_posts()): ?>
 
			 <?php while (have_posts()): the_post(); ?>
 
				<p><?php the_content(); ?></p>	

				<h3><?php the_title(); ?></h3>

			 <?php endwhile;  ?>

	<?php endif; ?>	

<?php get_footer(); ?>

 <!-- Hey im a comment -->