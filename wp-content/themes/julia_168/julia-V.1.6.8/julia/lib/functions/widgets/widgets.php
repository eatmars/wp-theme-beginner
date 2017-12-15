<?php
// Home Sidebar
if( !function_exists('julia_kaya_page_dynamic_sidebars') ){
	function julia_kaya_page_dynamic_sidebars(){
		if ( function_exists('register_sidebar') )
				register_sidebar(
				array(
					'name' => esc_html__('Sidebar','julia'),
					'id'  => 'sidebar-1',
					'description' => esc_html__('A widget area, used as a sidebar for Homepage', 'julia'),			
					'before_widget' => '<div id="%1$s" class="widget_container %2$s">',
					'after_widget' => '</div>',		
					'before_title' => '<h3 class="title_style1"><span class="title_seperator"></span>',
					'after_title' => '</h3>',
				));
		}
}	
add_action('widgets_init','julia_kaya_page_dynamic_sidebars');		
?>