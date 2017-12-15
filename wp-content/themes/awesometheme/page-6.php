<?php get_header(); ?>

	<?php if(have_posts()): ?>
 
			 <?php while (have_posts()): the_post(); ?>
 
				<p><?php the_content(); ?></p>	

				<h3><?php the_title(); ?></h3>

				<h2>Page 6</h2>

				<!-- use the id of the post the id is 6 so the page name or file name will be page-6 -->

			 <?php endwhile;  ?>

	<?php endif; ?>	

<?php get_footer(); ?>

 <!-- Hey im a comment -->