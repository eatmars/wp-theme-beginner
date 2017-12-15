<?php
if(!class_exists('kaya_julia_sidebar_generator')){
 if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<aside id="sidebar" class="page_sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
<?php endif;
}else{
	kaya_julia_generated_dynamic_sidebar();
} ?>