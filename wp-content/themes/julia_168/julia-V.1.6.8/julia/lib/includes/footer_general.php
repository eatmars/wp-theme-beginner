<footer>
	<div class="footer_wrapper"> <!-- Start Footer section -->
		<?php
			function julia_kaya_bottom_footer_section(){
				$select_most_footer_style=get_theme_mod('select_most_footer_style') ? get_theme_mod('select_most_footer_style') : 'left_content_right_menu';
				if( $select_most_footer_style == 'left_content_right_menu' ){
							$left_class = 'one_half footer_left_content';
							$right_class = 'one_half_last footer_right_content';								
						}elseif( $select_most_footer_style == 'left_menu_right_content' ){
							$left_class = 'one_half_last footer_right_content';
							$right_class = 'one_half footer_left_content';	
						}elseif( $select_most_footer_style == 'left_content_right_content' ){
							$left_class = 'one_half footer_left_content';
							$right_class = 'one_half_last footer_right_content';	
						}elseif( $select_most_footer_style == 'center_content_center_menu' ){
							$left_class = 'fullwidth';
							$right_class = 'fullwidth';
						}else{
							$left_class = '';
							$right_class = '';
						}
					// Change Footer styles
					if( $select_most_footer_style != 'none' ){	
						echo '<div class="'.$left_class.'">'; // Left Content
							echo '<span class="">';
								echo get_theme_mod('most_footer_left_section') ? do_shortcode( get_theme_mod('most_footer_left_section') ) :__('Copy rights &copy; kayapati.com ', 'petsvets');
							echo '</span>';
						echo '</div>';
						// Right Menu
						echo '<div class="'.$right_class.'">';
							if( $select_most_footer_style == 'left_content_right_content' ){
								echo '<span class="footer_right">'.get_theme_mod('most_footer_right_section') ? do_shortcode( get_theme_mod('most_footer_right_section') )  :__('Footer Right Section','petsvets') .'</span>';
							}else{
								if( has_nav_menu( 'footer' ) ){
									wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer' , 'menu_class' => '') );
								}
							}
						echo '</div>';
					}
			}
		?>
		<?php 
		$most_footer_disable=get_theme_mod('most_footer_disable') ? get_theme_mod('most_footer_disable') : '0'; 
		if($most_footer_disable == "0"){ ?> 
			<div id="footer_bottom" class="container">
				<?php
				julia_kaya_bottom_footer_content_alignment();
						 ?>
			</div>
			<!-- end Footer bottom section  -->
		<?php } ?>
	</div>
</footer>