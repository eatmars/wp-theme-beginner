<?php get_header(); ?>

	<?php if(have_posts()): ?>
 
			 <?php while (have_posts()): the_post(); ?>

				<h3><?php the_title(); ?></h3>
				<div class="thumbnail-img"><?php echo the_post_thumbnail(); ?></div>
				
				<p><?php the_content(); ?></p>	

				<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a' ); ?>, <?php the_category(); ?></small>

			 <?php endwhile;  ?>

	<?php endif; ?>	

<?php get_footer(); ?>

 <!-- Hey im a comment -->