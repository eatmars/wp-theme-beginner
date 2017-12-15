<?php
if ( ! defined( 'KAYA_FILEPATH' ) ) {
    define('KAYA_FILEPATH', get_template_directory());
}
if ( ! defined( 'KAYA_DIRECTORY' ) ) {
    define('KAYA_DIRECTORY', get_template_directory_uri());
}
if ( ! defined( 'KAYA_THEME_NAME' ) ) {
    define('KAYA_THEME_NAME', 'julia');
}
add_filter( 'use_default_gallery_style', '__return_false' );
require_once get_template_directory() . '/mr-image-resize.php';          
if( !function_exists('julia_kaya_img_resize') ){ // Image Resizer
    function julia_kaya_img_resize($url, $width, $height=0, $align='') {
        return julia_kaya_image_resize($url, $width, $height, true, $align, false);
      }
}

add_action( 'after_setup_theme', 'julia_kaya_theme_setup' );
if( !function_exists('julia_kaya_theme_setup')){
    function julia_kaya_theme_setup() {      
        // This theme allows users to set a custom background
        add_theme_support( 'custom-background');
        add_theme_support( 'custom-header' );
		add_theme_support( 'title-tag' );
        // Add default posts and comments RSS feed links to head
        add_theme_support( 'automatic-feed-links' );
        // This theme menu supports
        add_theme_support( 'nav-menus' );
        add_editor_style();
        // This theme uses wp_nav_menu() in 2 location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Navigation', 'julia'),
            'footer' => esc_html__( 'Footer Navigation' , 'julia'),   
        ) );
        // This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
        add_theme_support( 'post-thumbnails' );
        add_theme_support('post-formats',array( 'standard'=>'standard','gallery','quote','video','audio' ) ); // Postformates
    }
}  
if ( ! isset( $content_width ) )
   $content_width ='';
//Plugin Activation 
require_once get_template_directory() . '/lib/plugin-activation.php';
add_action( 'tgmpa_register', 'julia_kaya_required_plugins' );
if( !function_exists('julia_kaya_required_plugins') ){
    function julia_kaya_required_plugins() {
        $plugins = array(
            array(
                'name'      => 'SiteOrigin Page Builder',
                'slug'      => 'siteorigin-panels',
                'required'  => true,
            ),
            array(
                'name'      => 'Meta Boxes',
                'slug'      => 'meta-box',
                'required'  => true,
            ),
            array(
                'name'                  => 'Kaya '.ucfirst(KAYA_THEME_NAME).' Plugin',
                'slug'                  => 'kaya-'.KAYA_THEME_NAME.'-plugin',
                'source'                => get_template_directory() . '/lib/plugins/kaya-'.KAYA_THEME_NAME.'-plugin.zip',
                'required'              => true,
                'version'               => '2.1.8',
                'force_activation'      => false,
                'force_deactivation'    => false, 
                'external_url'          => '',
            ), 
            array(
                'name'                  => __('Talent Agency Plugin','julia'),
                'slug'                  => 'talentagency',
                'source'                =>  'http://kayapati.com/kaya-updated-plugins/talentagency/talentagency.zip',
                'required'              => true,
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
                'version'               => '1.4.0',
            ),
            array(
                'name'                  => __('Talent Agency - Talents Shortlist Add On','julia'),
                'slug'                  => 'ta-shortlist',
                'source'                =>  'http://kayapati.com/kaya-updated-plugins/ta-shortlist/ta-shortlist.zip',
                'required'              => true,
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
                'version'               => '1.1.3',
            ),
            array(
                'name'                  => __('Talent Agency - Talent Submission Form','julia'),
                'slug'                  => 'ta-talent-submission-form',
                'source'                =>  'http://kayapati.com/kaya-updated-plugins/talent-submission-form/ta-talent-submission-form.zip',
                'required'              => true,
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
                'version'               => '1.0',
            ),
            array(
                'name'                  => __('Kaya Roles Manager','julia'),
                'slug'                  => 'kaya-roles-manager',
                'source'                => 'http://kayapati.com/kaya-updated-plugins/kaya-roles-manager/kaya-roles-manager.zip',
                'required'              => true,
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
                'version'               => '1.1.4',
            ),
            array(
                'name'                  => __('Talent Agency - Frontend Talent Posting Add On', 'julia'),
                'slug'                  => 'ta-frontend-talent-posting',
                'source'                => 'http://www.kayapati.com/kaya-updated-plugins/ta-frontend-talent-posting/ta-frontend-talent-posting.zip',
                'required'              => false,
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
                'version'               => '1.0.7',
            ), 
            array(
                'name'                  => __('Talent Agency - Talents Adavced Search Add on', 'julia'),
                'slug'                  => 'kta-search',
                'source'                => 'http://kayapati.com/kaya-updated-plugins/ta-search/kta-search.zip',
                'version'               => '1.1.0',                   
            ),
            array(
                'name'      => __('Smart Slider 3', 'julia'),
                'slug'      => 'smart-slider-3',
                'required'  => true,
            ),
        );    
     $config = array(
        'id'           => 'julia',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.                  // Message to output right before the plugins table.                    // Message to output right before the plugins table
            'strings'             => array(
                'page_title'                       => esc_html__( 'Install Required Plugins', 'julia'),
                'menu_title'                       => esc_html__( 'Install Plugins', 'julia'),
                'installing'                       => esc_html__( 'Installing Plugin: %s', 'julia'), // %1$s = plugin name
                'oops'                             => esc_html__( 'Something went wrong with the plugin API.', 'julia'),
                'notice_can_install_required'      => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','julia' ), // %1$s = plugin name(s)
                'notice_can_install_recommended'   => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'julia' ), // %1$s = plugin name(s)
                'notice_cannot_install'            => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'julia' ), // %1$s = plugin name(s)
                'notice_can_activate_required'     => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' , 'julia'), // %1$s = plugin name(s)
                'notice_ask_to_update'            => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme:<br /> %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme:<br /> %1$s.',
                    'tgmpa'
                ),
                'notice_can_activate_recommended'  => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'julia' ), // %1$s = plugin name(s)
                'notice_cannot_activate'           => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'julia' ), // %1$s = plugin name(s)
                'notice_cannot_update'             => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'julia' ), // %1$s = plugin name(s)
                'install_link'                     => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'julia' ),
                'activate_link'                    => _n_noop( 'Activate installed plugin', 'Activate installed plugins' , 'julia'),
                'return'                           => esc_html__( 'Return to Required Plugins Installer', 'julia'),
                'plugin_activated'                 => esc_html__( 'Plugin activated successfully.', 'julia'),
                'complete'                         => esc_html__( 'All plugins installed and activated successfully. %s', 'julia'), // %1$s = dashboard link
                'nag_type'                         => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
        );
        tgmpa( $plugins, $config );
    }
 }   
// End
//Theme Files
require_once get_template_directory() . '/lib/includes/theme-functions.php'; //header functions
require_once get_template_directory() . '/lib/includes/header_loads.php'; //Jquery & Css Load
require_once get_template_directory() . '/lib/includes/customizer/theme_customization.php'; //Theme Customization
require_once get_template_directory() . '/lib/functions/kaya_pagination.php'; // pagination functions
require_once get_template_directory() . '/lib/functions/kaya_comments.php'; // comments page
require_once get_template_directory() . '/lib/functions/common.php'; // common functions
require_once get_template_directory() . '/lib/includes/advance-search.php';// Advanced Search
require_once get_template_directory() . '/lib/functions/widgets/widgets.php'; //Widgets
// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'julia', get_template_directory(). '/languages' );
$locale = get_locale();
$locale_file = get_template_directory(). "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );
/* ------------------------------------------------------------------------ */
// limit the post content
/* ------------------------------------------------------------------------ */
if( !function_exists('julia_kaya_content') ){    
    function julia_kaya_content($limit) {
        $content = explode(' ', get_the_content(), $limit);
        if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).' ';
        } else {
        $content = implode(" ",$content);
        }   
        $content = preg_replace('/\[.+\]/','', $content);
        $content = apply_filters('get_the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }
}
/* ------------------------------------------------------------------------ */
//Woocommerce Start here
/* ------------------------------------------------------------------------ */
add_theme_support( 'woocommerce' );
if( class_exists('woocommerce')){
    if( !function_exists('julia_kaya_override_page_title') ){
        function julia_kaya_override_page_title() {
            return false;
        }
    }
    add_filter('woocommerce_show_page_title', 'julia_kaya_override_page_title');
   // Cart Items adding With out refresh
    add_filter('add_to_cart_fragments', 'julia_kaya_woo_header_add_to_cart_fragment');
    if( !function_exists('julia_kaya_woo_header_add_to_cart_fragment') ){
        function julia_kaya_woo_header_add_to_cart_fragment( $fragments ) {
            global $woocommerce;
            ob_start();   ?>
            <a class="cart-contents" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php esc_html_e('View your shopping cart', 'julia'); ?>"><i class="fa fa-shopping-cart">&nbsp; </i>
                <span><?php echo sprintf(_n('%d ', '%d', $woocommerce->cart->cart_contents_count, 'julia' ), $woocommerce->cart->cart_contents_count); ?> </span></a>
            <?php
            $fragments['a.cart-contents'] = ob_get_clean();
            return $fragments;
        }
    }
// Adding Product Class
function julia_product_category_class($classes) {
    global $product, $woocommerce_loop, $post;
    if( is_woocommerce() ){
        $shop_columns = get_theme_mod('shop_page_columns') ? get_theme_mod('shop_page_columns') : '4';
        foreach((get_the_terms($post->ID, 'product_cat')) as $term){
            $classes[] = $term->name;
            $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $shop_columns );
            if( is_shop() ){
                $classes[] ='shop-product-coloumns-'.$shop_columns;
            }   
            else{
                $classes[] ='shop-product-coloumns-'.$woocommerce_loop['columns'];  
            }
        }
   }
    return $classes;
}
add_filter('post_class', 'julia_product_category_class');
// Product Thumbnail
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
    function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
        global $post;
        $img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
        if (  $img_url ) {
            return get_the_post_thumbnail( $post->ID, $size );
        } else {
           echo '<img src="'.get_template_directory_uri().'/images/woo_product.jpg"  alt="" />';
        }
    }
}
//if( current_user_can('customer')){
    add_filter( 'woocommerce_prevent_admin_access', '__return_false' );
//}
}
// Custom Price and Offers Date
//add_filter( 'woocommerce_get_price_html', 'julia_kaya_custom_price_html', 100, 2 );
function julia_kaya_custom_price_html( $price, $product )
{
    global $post;
    $sales_price_to = get_post_meta($post->ID, '_sale_price_dates_to', true);
    if(is_single() && $sales_price_to != "")
    {
        $sales_price_date_to = date("j M y", $sales_price_to);
        return str_replace( '</ins>', ' </ins> <b>(Offer till '.$sales_price_date_to.')</b>', $price );
    }
    else
    {
        return apply_filters( 'woocommerce_get_price', $price );
    }
}
// End Woo Commerce
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 15;' ), 20 );
//end
    add_action( 'after_setup_theme', 'julia_theme_setup' );
    function julia_theme_setup() {
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        //add_theme_support( 'wc-product-gallery-slider' );
    } 
?>