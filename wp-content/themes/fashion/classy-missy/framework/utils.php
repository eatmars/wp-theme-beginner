<?php
/* ---------------------------------------------------------------------------
 * Load default theme options
 * - To return default options to store in database.
 * --------------------------------------------------------------------------- */
function classymissy_default_option() {
	 
	$general = array(
		'show-pagecomments' => 'false',
		'enable-responsive' => 'true',
		'show-mobileslider' => 'true'
	);

	$layout = array(
		'logo' => 'true',
		'show-breadcrumb' => 'true',
		'breadcrumb-delimiter' => 'fa fa-angle-right',
		'breadcrumb-style' => 'breadcrumb-left',
		'show-boxed-layout-pattern-color' => 'true',
		'show-boxed-layout-bg-color' => 'true',
		'site-layout' => 'boxed',
		'layout-topbar' => 'true',
		'header-type' => 'fullwidth-header header-align-left fullwidth-menu-header extended-menu-header',
		'layout-stickynav' => 'true',
		'header-position' => 'above slider',
		'header-transparant' => 'semi-transparent-header',
		'show-sociables' => 'on',
		'enable-footer' => 'true',
		'footer-columns' => '5',
		'copyright-content' => '[vc_row]
			[vc_column width="1/2"] &copy; Copyright <a title="" href="#"> Designthemes </a> 2017 / All Rights Reserved [/vc_column]
			[vc_column width="1/2" el_class="alignright"]
				<img class="alignnone size-full wp-image-12" src="http://wedesignthemes.com/veda/fashion/wp-content/uploads/sites/10/2015/06/payment.png" alt="payment" width="286" height="23" />
			[/vc_column][/vc_row]'		
	);	
	
	$social = array(
		'social-1' => array(
			'icon' => 'fa-facebook',
			'link' => '#'
		),
		'social-2' => array(
			'icon' => 'fa-twitter',
			'link' => '#'
		),
		'social-3' => array(
			'icon' => 'fa-google-plus',
			'link' => '#'
		)
	);

	$pageoptions = array(
		'show-standard-left-sidebar-for-post-archives' => 'true',
		'show-standard-right-sidebar-for-post-archives' => 'true',
		'post-format-meta' => 'true',
		'post-author-meta' => 'true',
		'post-date-meta' => 'true',
		'post-comment-meta' => 'true',
		'post-category-meta' => 'true',
		'post-tag-meta' => 'true',
		'show-standard-left-sidebar-for-portfolio-archives' => 'true',
		'show-standard-right-sidebar-for-portfolio-archives' => 'true',
		'enable-404message' => 'true',
		'show-notfound-bg-color' => 'true',
		'show-launchdate' => 'true',
		'show-comingsoon-bg-color' => 'true',
		'single-post-comments' => 'true',

		'post-archives-enable-excerpt' => 'true',
		'post-archives-excerpt' => '50',
		'post-archives-enable-readmore' => 'true',
		'post-archives-readmore' => '[dt_sc_button title="Read More" style="filled" icon_type="fontawesome" iconalign="icon-right with-icon" iconclass="fa fa-long-arrow-right" class="type1"]'
	);

	$woo = array(
		'show-shop-standard-left-sidebar-for-product-layout' => 'true',
		'show-shop-standard-right-sidebar-for-product-layout' => 'true',
		'show-shop-standard-left-sidebar-for-product-category-layout' => 'true',
		'show-shop-standard-right-sidebar-for-product-category-layout' => 'true',
		'show-shop-standard-left-sidebar-for-product-tag-layout' => 'true',
		'show-shop-standard-right-sidebar-for-product-tag-layout' => 'true'
	);

	$colors = array(
		'theme-skin' => 'custom',
		'custom-default' => '#1d9f92',
		'custom-light' => '#2fd9c8',
		'custom-dark' => '#19897e'
	);

	$fonts = array(
		'font-style' => array( '400', '400italic', '500', '600', '700', '800' ),
		'content-font-size' => '14',
		'menu-font-size' => '16',
		'h1-font-size' => '36',
		'h2-font-size' => '28',
		'h3-font-size' => '24',
		'h4-font-size' => '20',
		'h5-font-size' => '16',
		'h6-font-size' => '15',
		'menu-letter-spacing' => '0',
		'h1-letter-spacing' => '0',
		'h2-letter-spacing' => '0',
		'h3-letter-spacing' => '0',
		'h4-letter-spacing' => '0',
		'h5-letter-spacing' => '0',
		'h6-letter-spacing' => '0',
		'body-line-height' => '24'
	);
	
	$data = array(
		'general' => $general,
		'layout'  => $layout,
		'social'  => $social,
		'pageoptions' => $pageoptions,
		'woo'	  => $woo,
		'colors'  => $colors,
		'fonts'   => $fonts
	);
	return $data;
}

/* ---------------------------------------------------------------------------
 * Check activated plugins
 * --------------------------------------------------------------------------- */
function classymissy_is_plugin_active($plugin) {
	return in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) || classymissy_is_plugin_active_for_network( $plugin );
}

function classymissy_is_plugin_active_for_network( $plugin ) {
	if ( !is_multisite() )
		return false;

	$plugins = get_site_option( 'active_sitewide_plugins');
	if ( isset($plugins[$plugin]) )
		return true;

	return false;
}

/* ---------------------------------------------------------------------------
 * Load default theme options
 * - To return default options to store in database.
 * --------------------------------------------------------------------------- */
function classymissy_show_footer_widgetarea( $count ) {
	$classes = array (
		"1" => "dt-sc-full-width",
		"dt-sc-one-half",
		"dt-sc-one-third",
		"dt-sc-one-fourth",
		"dt-sc-one-fifth",
		"dt-sc-one-sixth",
		"1-2" => "dt-sc-one-half",
		"1-3" => "dt-sc-one-third",
		"1-4" => "dt-sc-one-fourth",
		"3-4" => "dt-sc-three-fourth",
		"2-3" => "dt-sc-two-third" );

	if ($count <= 6) :
		for($i = 1; $i <= $count; $i ++) :

			$class = $classes [$count];
			$class = esc_attr( $class );

			$first = ($i == 1) ? "first" : "";
			$first = esc_attr( $first );

			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$i}" )) : endif;
			echo "</div>";
		endfor;
	elseif ($count == 12 || $count == 13) :

		$a = array (
			"1-4",
			"1-4",
			"1-2" );

		$a = ($count == 12) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :
			$class = $classes [$v];
			$class = esc_attr( $class );

			$first = ($k == 0 ) ? "first" : "";
			$first = esc_attr( $first );

			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) : endif;
			echo "</div>";
		endforeach;
	elseif ($count == 7 || $count == 8) :
		$a = array (
			"1-4",
			"3-4");

		$a = ($count == 7) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :
			$class = $classes [$v];
			$class = esc_attr( $class );

			$first = ($k == 0 ) ? "first" : "";
			$first = esc_attr( $first );


			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) :endif;
			echo "</div>";
		endforeach;
	elseif ($count == 9 || $count == 10) :
		$a = array ( 
			"1-3",
			"2-3" );
		$a = ($count == 9) ? $a : array_reverse ( $a );

		foreach ( $a as $k => $v ) :
			$class = $classes [$v];
			$class = esc_attr( $class );

			$first = ($k == 0 ) ? "first" : "";
			$first = esc_attr( $first );

			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) :endif;
			echo "</div>";
		endforeach;
	elseif ($count == 11 ) :
		$a = array ( "1-4", "1-2", "1-4" );
		foreach ( $a as $k => $v ) :
			$class = $classes [$v];
			$class = esc_attr( $class );
			$first = ($k == 0 ) ? "first" : "";
			$first = esc_attr( $first );
			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) : endif;
			echo "</div>";
		endforeach;
	endif;
}

/* ---------------------------------------------------------------------------
 * - To Remove action from 3rd Party Plugins
 * --------------------------------------------------------------------------- */
function classymissy_remove_anonymous_object_action( $tag, $class, $method, $priority=null ){

    if( empty($GLOBALS['wp_filter'][ $tag ]) ){
        return;
    }

    foreach ( $GLOBALS['wp_filter'][ $tag ] as $filterPriority => $filter ){
        if( !($priority===null || $priority==$filterPriority) )
            continue;

        foreach ( $filter as $identifier => $function ){
            if( is_array( $function)
                and is_a( $function['function'][0], $class )
                and $method === $function['function'][1]
            ){
                remove_action(
                    $tag,
                    array ( $function['function'][0], $method ),
                    $filterPriority
                );
            }
        }
    }
}?>