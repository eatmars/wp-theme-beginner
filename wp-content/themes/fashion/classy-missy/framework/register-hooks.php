<?php
/* ---------------------------------------------------------------------------
 * Hook of Top
 * --------------------------------------------------------------------------- */
function classymissy_hook_top() {
	if( classymissy_option( 'pageoptions','enable-top-hook' ) ) :
		echo '<!-- classymissy_hook_top -->';
			$hook = classymissy_option('pageoptions','top-hook');
			$hook = do_shortcode( stripslashes($hook) );
			if (!empty($hook))
				echo ( $hook );
		echo '<!-- classymissy_hook_top -->';
	endif;	
}
add_action( 'classymissy_hook_top', 'classymissy_hook_top' );


/* ---------------------------------------------------------------------------
 * Hook of Content before
 * --------------------------------------------------------------------------- */
function classymissy_hook_content_before() {
	if( classymissy_option( 'pageoptions','enable-content-before-hook' ) ) :
		echo '<!-- classymissy_hook_content_before -->';
			$hook = classymissy_option('pageoptions','content-before-hook');
			$hook = do_shortcode( stripslashes($hook) );
			if (!empty($hook))
				echo ( $hook );
		echo '<!-- classymissy_hook_content_before -->';
	endif;
}
add_action( 'classymissy_hook_content_before', 'classymissy_hook_content_before' );


/* ---------------------------------------------------------------------------
 * Hook of Content after
 * --------------------------------------------------------------------------- */
function classymissy_hook_content_after() {
	if( classymissy_option( 'pageoptions','enable-content-after-hook' ) ) :
		echo '<!-- classymissy_hook_content_after -->';
			$hook = classymissy_option('pageoptions','content-after-hook');
			$hook = do_shortcode( stripslashes($hook) );
			if (!empty($hook))
				echo ( $hook );
		echo '<!-- classymissy_hook_content_after -->';
	endif;
}
add_action( 'classymissy_hook_content_after', 'classymissy_hook_content_after' );


/* ---------------------------------------------------------------------------
 * Hook of Bottom
 * --------------------------------------------------------------------------- */
function classymissy_hook_bottom() {
	if( classymissy_option( 'pageoptions','enable-bottom-hook' ) ) :
		echo '<!-- classymissy_hook_bottom -->';
			$hook = classymissy_option('pageoptions','bottom-hook');
			$hook = do_shortcode( stripslashes($hook) );
			if (!empty($hook))
				echo ( $hook );
		echo '<!-- classymissy_hook_bottom -->';
	endif;
}
add_action( 'classymissy_hook_bottom', 'classymissy_hook_bottom' );?>