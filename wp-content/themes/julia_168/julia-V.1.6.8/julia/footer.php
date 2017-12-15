<?php
/**
 * The template for displaying the footer
 */
 if( julia_kaya_disable_mid_content() != '1' ){ ?>
	</div> <!-- end middle content section -->
	</div> <!-- end middle Container wrapper section -->
<?php } ?>	
	<footer>
		<?php
		$select_footer_type = get_theme_mod('select_footer_type') ? get_theme_mod('select_footer_type') : 'default_footer';
		if( $select_footer_type == 'page_type_footer' ){
			$footer_page_id = get_theme_mod('footer_page_id') ? get_theme_mod('footer_page_id') : 'select-page';
			if( $footer_page_id != 'select-page' ){
				echo '<div class="page_content_footer">';
				echo '<div class="container">';
					$post = get_page($footer_page_id); 
					$content = apply_filters('the_content', $post->post_content); 
					echo $content;
				echo '</div></div>';
			}
		}else{
			echo julia_kaya_bottom_footer_section();
		}
		?>
		<?php $disable_scroll_top_icon = get_theme_mod('disable_scroll_top_icon') ? get_theme_mod('disable_scroll_top_icon') : '0';  ?>
		<div class="clear"> </div>	<!-- end middle section -->
		</section> <!-- Main Layout Section End -->
		<?php if( $disable_scroll_top_icon !='1' ){ ?>
			<a href="#" class="scroll_top "><i class="fa fa-angle-double-up"></i></a><!-- Back to top -->
		<?php } ?>
	</footer>
	<?php wp_footer(); ?>
	</body>
</html>