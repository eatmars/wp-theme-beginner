<?php get_header();
	$page_layout = classymissy_option('woo',"product-layout");
	$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";

	$show_sidebar = $show_left_sidebar = $show_right_sidebar = false;
	$sidebar_class = "";
	
	switch ( $page_layout ) {
		case 'with-left-sidebar':
			$page_layout = "page-with-sidebar with-left-sidebar";
			$show_sidebar = $show_left_sidebar = true;
			$sidebar_class = "secondary-has-left-sidebar";
		break;

		case 'with-right-sidebar':
			$page_layout = "page-with-sidebar with-right-sidebar";
			$show_sidebar = $show_right_sidebar	= true;
			$sidebar_class = "secondary-has-right-sidebar";
		break;
		
		case 'with-both-sidebar':
			$page_layout = "page-with-sidebar with-both-sidebar";
			$show_sidebar = $show_left_sidebar = $show_right_sidebar	= true;
			$sidebar_class = "secondary-has-both-sidebar";
		break;

		case 'content-full-width':
		default:
			$page_layout = "content-full-width";
		break;
	}

	if ( $show_sidebar ):
		if ( $show_left_sidebar ): ?>
			<!-- Secondary Left -->
			<section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('left');?></section><?php
		endif;
	endif;?>
    <section id="primary" class="<?php echo esc_attr( $page_layout );?>"><?php
    	# Notification
		$all_notices  = WC()->session->get( 'wc_notices', array() );
		$notice_types = apply_filters( 'woocommerce_notice_types', array( 'error', 'success', 'notice' ) );

		foreach ( $notice_types as $notice_type ) {
			if ( wc_notice_count( $notice_type ) > 0 ) {
				wc_get_template( "notices/{$notice_type}.php", array(
					'messages' => array_filter( $all_notices[ $notice_type ] )
				) );
			}
		}
		wc_clear_notices();
		# Notification
		
		if( have_posts() ):
			while( have_posts() ):
				the_post();?>
				<div id="product-<?php the_ID();?>" <?php post_class();?>><?php
					the_content();
					wp_link_pages( array(	
						'before'	=>	'<div class="page-link">',
						'after'		=>	'</div>',
						'link_before'	=>	'<span>',
						'link_after'	=>	'</span>',
						'next_or_number' =>	'number',
						'pagelink' =>	'%',
						'echo'	=>	1 ) );
					edit_post_link( esc_html__( ' Edit ','classy-missy' ) );
				?></div><?php
			endwhile;
		endif;?>
    </section><!-- **Primary - End** --><?php
	
	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('right');?></section><?php
		endif;
	endif;
get_footer();?>