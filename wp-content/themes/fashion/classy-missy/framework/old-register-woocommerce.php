<?php
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

#Change Image Sizes
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'dt_woocommerce_image_dimensions', 1 );
function dt_woocommerce_image_dimensions() {
	$catalog = array('width' => '800', 'height'	=> '1400', 'crop' => 1);
    $single = array('width' => '800', 'height' => '1400', 'crop'	=> 1);
	$thumbnail = array('width' => '200', 'height'	=> '350', 'crop' => 1);
 
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog );
	update_option( 'shop_single_image_size', $single );
	update_option( 'shop_thumbnail_image_size', $thumbnail );
}


//Single Product Add / Edit Page
	add_action( 'woocommerce_product_options_advanced' , 'dt_woocommerce_product_options_advanced');
	function dt_woocommerce_product_options_advanced() {
		global $woocommerce, $post;

		echo '<div class="options_group custom-layout">';
				woocommerce_wp_checkbox( array( 
					'id' => '_product_layout',
					'label' => __( 'Product Layout', 'classy-missy' ),
					'description' => __('Check to use custom product layout','classy-missy'),
				) );
		echo '</div>';
	}

	add_action( 'woocommerce_process_product_meta', 'dt_woocommerce_process_product_meta' );
	function dt_woocommerce_process_product_meta( $post_id ) {
		$product_layout = isset( $_POST['_product_layout'] ) ? 'yes' : 'no';
		update_post_meta( $post_id, '_product_layout', $product_layout );
	}
	
	add_filter('template_include', 'dt_product_single_template');
	function dt_product_single_template( $single_template ) {

		if (is_singular( 'product' )) {
			global $post;
			$layout = get_post_meta( $post->ID, '_product_layout', true );
			if( $layout == 'yes' ) {
				remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10);
				$single_template = get_stylesheet_directory(). '/custom-product.php';
			}
		}

		return $single_template;
	}

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
// No.of Products per page ---------------------------------------------------
add_filter( 'loop_shop_per_page', 'classymissy_woo_product_count' );
if (!function_exists('classymissy_woo_product_count')) {
	function classymissy_woo_product_count() {
		$shop_product_per_page = classymissy_wp_kses(trim(stripslashes(classymissy_option('woo','shop-product-per-page'))));
		$shop_product_per_page = !empty( $shop_product_per_page)  ? $shop_product_per_page : 10;
		return $shop_product_per_page;
	}
}
// No.of Products per row ----------------------------------------------------
add_filter( 'loop_shop_columns', 'classymissy_woo_loop_columns' );
if (!function_exists('classymissy_woo_loop_columns')) {
	function classymissy_woo_loop_columns() {
		
		$shop_layout = classymissy_option('woo',"shop-page-product-layout");
		$columns = "";
		switch($shop_layout) {
			
			case "one-half-column":
				$columns = 2;
			break;
			
			case "one-third-column":
				$columns = 3;
			break;
			
			case "one-fourth-column":
				$columns = 4;
			break;
			
			default:
				$columns = 4;
		}
		return $columns;
	}
}

// Page Layout ---------------------------------------------------
	add_action( 'woocommerce_show_page_title', 'classymissy_woo_show_page_title', 10);
	if( !function_exists('classymissy_woo_show_page_title') ) {
		function classymissy_woo_show_page_title() {
			return false;
		}
	}

	add_action( 'woocommerce_before_main_content', 'classymissy_woo_before_main_content', 10);
	if( !function_exists('classymissy_woo_before_main_content') ) {

		function classymissy_woo_before_main_content() {

			if( is_shop() ):
				// Page Settings
				$tpl_default_settings = get_post_meta( get_option('woocommerce_shop_page_id') ,'_tpl_default_settings',TRUE);
				$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
		
				$page_layout  = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : "content-full-width";
			
			elseif( is_product() ):
				$page_layout = classymissy_option('woo',"product-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";
			
			elseif( is_product_category() ):
				$page_layout = classymissy_option('woo',"product-category-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";

			elseif( is_product_tag() ):
				$page_layout = classymissy_option('woo',"product-tag-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";
			endif;

			if($page_layout == 'with-left-sidebar'):
				echo '<section class="secondary-sidebar secondary-has-left-sidebar" id="secondary-left">';
				get_sidebar('left');
			  	echo '</section>';
			elseif($page_layout == 'with-both-sidebar'):
				echo '<section class="secondary-sidebar secondary-has-both-sidebar" id="secondary-left">';
				get_sidebar('left');
		  		echo '</section>';
			endif;
	
			if($page_layout != 'content-full-width'):
				echo '<section id="primary" class="page-with-sidebar '.$page_layout.'">';
			else:
				echo '<section id="primary" class="content-full-width">';
			endif;
		}
	}

	add_action( 'woocommerce_after_main_content', 'classymissy_woo_after_main_content', 20);
	if( !function_exists('classymissy_woo_after_main_content') ) {
		function classymissy_woo_after_main_content() {

			echo "</section>";

			if( is_shop() ):
				// Page Settings
				$tpl_default_settings = get_post_meta( get_option('woocommerce_shop_page_id') ,'_tpl_default_settings',TRUE);
				$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
				
				$page_layout  = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : "content-full-width";

			elseif( is_product() ):
				$page_layout = classymissy_option('woo',"product-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";

			elseif( is_product_category() ):
				$page_layout = classymissy_option('woo',"product-category-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";

			elseif( is_product_tag() ):
				$page_layout = classymissy_option('woo',"product-tag-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";
			endif;

			if($page_layout == 'with-right-sidebar'):
				echo '<section class="secondary-sidebar secondary-has-right-sidebar" id="secondary-right">';
					get_sidebar('right');
				echo '</section>';
			elseif($page_layout == 'with-both-sidebar'):
				echo '<section class="secondary-sidebar secondary-has-both-sidebar" id="secondary-right">';
					get_sidebar('right');
				echo '</section>';
			endif;
		}
	}

	add_action( 'woocommerce_after_shop_loop', 'classymissy_woo_after_shop_loop', 10);
	function classymissy_woo_after_shop_loop() { ?>
	    <div class="pagination">
    	    <?php if(function_exists("classymissy_pagination")) echo classymissy_pagination(); ?>
    	</div><?php
	}

// Change Image Sizes --------------------------------------------------------
	$pagenow = classymissy_global_variables('pagenow');
	if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
		add_action( 'init', 'classymissy_woo_image_dimensions', 1 );
	}

	function classymissy_woo_image_dimensions() {
		$catalog 	= 	array('width' => '500', 'height'	=> '875', 'crop' => 1);
		$single 	= 	array('width' => '500', 'height' 	=> '875', 'crop' => 1);
		$thumbnail 	= 	array('width' => '200', 'height'	=> '350', 'crop' => 1);

		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog );
		update_option( 'shop_single_image_size', $single );
		update_option( 'shop_thumbnail_image_size', $thumbnail );
	}

// Color Picker For Product in Admin -------------------------------------------
	# utils
		function dt_get_woocommerce_tax_attribute( $taxonomy ) {
			global $wpdb;
			$attr = substr( $taxonomy, 3 );
			$attr = $wpdb->get_row( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies WHERE attribute_name = '$attr'" );
			return $attr;
		}
 
	# 1. Adding new attribute type
		add_action( 'woocommerce_admin_attribute_types', 'dt_woocommerce_admin_attribute_types' );
		function dt_woocommerce_admin_attribute_types() {
			$att_type = $selected = '';
			if( isset( $_GET['edit'] ) ) {
				global $wpdb;
				$edit = absint( $_GET['edit'] );
				$attribute_to_edit = $wpdb->get_row( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies WHERE attribute_id = '$edit'" );
				$att_type = $attribute_to_edit->attribute_type;
				$selected = selected( 'colorpicker', $att_type, false );
			}
			echo '<option value="colorpicker"'.$selected.'>'.__('Color Picker','classy-missy').'</option>';
		}

	# 2. Init Color Picker Field
	add_action( 'init', 'dt_init_color_picker_attribute_taxonomies' );
	function dt_init_color_picker_attribute_taxonomies() {
		$attribute_taxonomies = wc_get_attribute_taxonomies();
		if ( $attribute_taxonomies ) {
			foreach ( $attribute_taxonomies as $tax ) {
				if( $tax->attribute_type == 'colorpicker' ) {
					add_action( wc_attribute_taxonomy_name( $tax->attribute_name ).'_add_form_fields', 'dt_woo_colorpicker_add_form_fields' );
					add_action( wc_attribute_taxonomy_name( $tax->attribute_name ).'_edit_form_fields', 'dt_woo_colorpicker_edit_form_fields',10, 2 );

					add_filter( 'manage_edit-' . wc_attribute_taxonomy_name( $tax->attribute_name ) . '_columns', 'dt_woo_product_attribute_columns' );
					add_filter( 'manage_' . wc_attribute_taxonomy_name( $tax->attribute_name ) . '_custom_column', 'dt_woo_product_attribute_column', 10, 3 );
				}
			}
		}
	}

		# 2.1 Color Picker Form Field in Add Mode
		function dt_woo_colorpicker_add_form_fields( $taxonomy ) {
			$attr = dt_get_woocommerce_tax_attribute( $taxonomy );
			if( $attr->attribute_type == 'colorpicker' ) {
				$output  = '<div class="form-field">';
				$output .= '<label for="tag-color">'.__('Color Picker','classy-missy').'</label>';
				$output .= '<input name="tag-color" id="tag-color" size="40" type="text">';
				$output .= '</div>';
				echo $output;
			}
		}

		# 2.2. Color Picker Form Field in Edit Mode
		function dt_woo_colorpicker_edit_form_fields( $term, $taxonomy ) {
			$attr = dt_get_woocommerce_tax_attribute( $taxonomy );
			if( $attr->attribute_type == 'colorpicker' ) {
				$value = get_woocommerce_term_meta( $term->term_id, '_color_value', true );
				$output  = '<tr class="form-field">';
				$output .= '<th scope="row" valign="top"> <label for="tag-color">'.__('Color Picker','classy-missy').'</label></th>';
				$output .= '<td><input name="tag-color" id="tag-color" size="40" type="text" value="'.$value.'"></td>';
				$output .= '</tr>';
				echo $output;
			}		
		}

		# 2.3. Display Color in Admin Panel
		function dt_woo_product_attribute_columns( $columns ) {
			if( empty( $columns ) ) {
				return $columns;
			}

			$temp_cols = array();
			$temp_cols['cb'] = $columns['cb'];
			$temp_cols['color_column'] = __( 'Color', 'classy-missy' );

			unset( $columns['cb'] );
			$columns = array_merge( $temp_cols, $columns );

			return $columns;			
		}

		function dt_woo_product_attribute_column( $columns, $column, $id  ){
			if( $column == 'color_column' ) {
				$value = get_woocommerce_term_meta( $id, '_color_value', true );
				$inline = 'border:1px solid #ccc;display:inline-block;height:20px;min-width:20px;';
				$inline = !empty( $value ) ? $inline.'background-color:'.$value.';' : $inline;
				$columns .= '<span style="'.$inline.'"></span>';
			}
			return $columns;
		}

	# 3. Save Color in Database
	add_action( 'created_term', 'dt_woo_product_attribute_save', 10, 3 );
	add_action( 'edit_term', 'dt_woo_product_attribute_save', 10, 3 );
	function dt_woo_product_attribute_save( $term_id, $tt_id, $taxonomy ) {
		if( isset( $_POST['tag-color'] ) ) {
			$value = $_POST['tag-color'];
			update_woocommerce_term_meta( $term_id, '_color_value', $value);
		}
	}

	# 4. Show Color Picker values in Single Product in Attributes Tab
	add_action( 'woocommerce_product_option_terms', 'dt_woocommerce_product_option_terms', 10, 2 );
	function dt_woocommerce_product_option_terms( $taxonomy, $i ) {
		if( $taxonomy->attribute_type == 'colorpicker' ) {
			global $thepostid;
			$attribute_taxonomy_name = wc_attribute_taxonomy_name( $taxonomy->attribute_name );?>
			<select multiple="multiple" data-placeholder="<?php _e( 'Select terms', 'classy-missy' ); ?>" class="multiselect attribute_values wc-enhanced-select" name="attribute_values[<?php echo $i; ?>][]"><?php
				$all_terms = get_terms( $attribute_taxonomy_name, 'orderby=name&hide_empty=0' );
				if ( $all_terms ) {
					foreach ( $all_terms as $term ) {
						echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( has_term( absint( $term->term_id ), $attribute_taxonomy_name, $thepostid ), true, false ) . '>' . $term->name . '</option>';
					}
				}?>
			</select>
			<button class="button plus select_all_attributes"><?php _e( 'Select all', 'classy-missy' ); ?></button>
			<button class="button minus select_no_attributes"><?php _e( 'Select none', 'classy-missy' ); ?></button><?php
		}
	}
// Color Picker For Product in Admin -------------------------------------------

// Color Picker For Product in ( Single Product ) Front End----------------------------------------
	add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'dt_colorpicker_html', 100, 2 );
	function dt_colorpicker_html( $html, $args ) {

		$attr = dt_get_woocommerce_tax_attribute( $args['attribute'] );
		if( $attr->attribute_type == 'colorpicker' ) {
			$options   = $args['options'];
			$product   = $args['product'];
			$attribute = $args['attribute'];
			$class     = "select_box variation-selector variation-select-{$attr->attribute_type}";
			$swatches  = '';

			if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
				$attributes = $product->get_variation_attributes();
				$options    = $attributes[$attribute];
			}

			if ( ! empty( $options ) && $product && taxonomy_exists( $attribute ) ) {
				$terms = wc_get_product_terms( $product->id, $attribute, array( 'fields' => 'all' ) );
				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options ) ) {
						$swatches .= dt_color_swatch_html( '', $term, $attr, $args );
					}
				}

				if ( ! empty( $swatches ) ) {
					$html = '<div class="' . esc_attr( $class ) . '"> <div class="hidden">'.$html.'</div> <div class="color-swatches" data-attribute="attribute_'.$args['attribute'].'">'. $swatches.'</div></div>';
				}
			}
		}

		return $html;
	}

	function dt_color_swatch_html( $html, $term, $attr, $args ) {
		$selected = sanitize_title( $args['selected'] ) == $term->slug ? 'selected' : '';
		$name     = esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) );
		$value = get_woocommerce_term_meta( $term->term_id, '_color_value', true );

		$html = '<div class="color-swatch-holder" data-value="'.$term->slug.'">
		<span class="color-swatch" style="background:'.$value.'"></span> </div>';

		return $html;
	}
// Color Picker For Product in ( Single Product ) Front End----------------------------------------

/**
 * ============================================================
 * ============= 		 SHOP PAGE 		    =================
 * ============================================================
 */
	add_action( 'woocommerce_before_shop_loop', 'dt_woocommerce_before_shop_loop',100 );
	function dt_woocommerce_before_shop_loop() {
		if( is_shop() || is_product_category() || is_product_tag()  ):
			$style = classymissy_option('woo', "product-style");
			echo '<div class="'.$style.'">';
		endif;
	}

	add_action( 'woocommerce_after_shop_loop', 'dt_woocommerce_after_shop_loop',9 );
	function dt_woocommerce_after_shop_loop() {
		if( is_shop() || is_product_category() || is_product_tag()  ):
			echo '</div>';
		endif;
	}

/**
 * ============================================================
 * ============= SINGLE PRODUCT WRAPPER START =================
 * ============================================================
 */
	
	# 1. start .product-wrapper
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		add_action( 'woocommerce_before_shop_loop_item', 'dt_woocommerce_before_shop_loop_item', 5 );
		function dt_woocommerce_before_shop_loop_item() {

			$out = $class = $column = '';

			global $woocommerce_loop;
			$woocommerce_loop['name'] = isset( $woocommerce_loop['name'] ) ? $woocommerce_loop['name'] : '';
			
			if( is_shop() ) {

				$column = classymissy_option('woo', "shop-page-product-layout");
				$style = classymissy_option('woo', "product-style");
				
				$woocommerce_loop['style'] = $style;
			}elseif( is_product_category() || is_product_tag() ) {
                        $woocommerce_loop['style'] = 'woo-style1';
                        $column = 2;				
			} elseif( $woocommerce_loop['name'] == 'dt_sc_recent_products' ||
				$woocommerce_loop['name'] == 'dt_sc_product_category' || 
				$woocommerce_loop['name'] == 'dt_sc_featured_products' || 
				$woocommerce_loop['name'] == 'dt_sc_sale_products' ||
				$woocommerce_loop['name'] == 'dt_sc_best_selling_products' ||
				$woocommerce_loop['name'] == 'dt_sc_product_attribute' ||
				$woocommerce_loop['name'] == 'dt_sc_top_rated_products' ||
				$woocommerce_loop['name'] == 'dt_sc_product' ||
				$woocommerce_loop['name'] == 'dt_sc_products' ) {

				$column = $woocommerce_loop['columns'];
			}
			
			switch($column) {

				case 1:
					$class .= 'no-column';
				break;

				case 2:
				case "one-half-column":
					$class .= " dt-sc-one-half column ";
				break;

				case 3:
				case "one-third-column":
					$class .= " dt-sc-one-third column ";
				break;

				case 4:
				case "one-fourth-column":
					$class .= " dt-sc-one-fourth column ";
				break;

				case 5:
				case "one-fifth-column":
					$class .= " dt-sc-one-fifth column ";
				break;
				
				default:
					$class .= " dt-sc-one-fourth column ";
				break;
			}
			
			$out .= '<div class="'.$class.'">';
			$out .= '	<div class="product-wrapper">';

			echo $out;
		}

	# 2. start .product-thumb
		add_action( 'woocommerce_before_shop_loop_item_title', 'dt_woocommerce_before_shop_loop_item_title', 9 );
		function dt_woocommerce_before_shop_loop_item_title() {
			global $woocommerce_loop, $product;
			
			$out = $class = '';
			$style = isset( $woocommerce_loop['style'] ) ? $woocommerce_loop['style'] : '';
			if( $style == 'woo-style3' ) {
				$class = ' '.$style;
				# Product Gallery Images
				$attachment_ids = $product->get_gallery_image_ids();
				if( $attachment_ids ) {
					$class .= ' has-thumbnails';
				}
			}

			$out .= '<div class="product-thumb">';
			$out .= '	<div class="product-meta">';
			
						if( $product->is_on_sale() and $product->is_in_stock() ) {
							$out .= '<span class="onsale"><span>'.esc_html__('Sale','classy-missy').'</span></span>';
						} elseif( !$product->is_in_stock() ) {
							$out .= '<span class="out-of-stock"><span>'.esc_html__('Out of Stock','classy-missy').'</span></span>';
						}
						
						if( $product->is_featured() ) {
							$out .= '<div class="featured-tag"><div><i class="fa fa-thumb-tack"></i><span>'.esc_html__('Featured','classy-missy').'</span></div></div>';
						}
			$out .= '	</div> <!-- .product-meta -->';
			$out .= '	<div class="product-thumb-wrapper'.$class.'">';
			$out .= '	<div class="product-main-image">';
			echo $out;
		}

		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

		add_action( 'woocommerce_before_shop_loop_item_title', 'dt_woocommerce_template_loop_product_thumbnails', 11);
		function dt_woocommerce_template_loop_product_thumbnails() {

			global $woocommerce_loop,$product;
			$style = isset( $woocommerce_loop['style'] ) ? $woocommerce_loop['style'] : '';

			$output = '';

			# Product Gallery Images
			$attachment_ids = $product->get_gallery_image_ids();

			if( $style == 'woo-style1' || $style == 'woo-style2' ) {
				if( $attachment_ids ) {
					$output .= wp_get_attachment_image( $attachment_ids[0], 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
				}

				$output .= '</div> <!-- .product-main-image -->';
			}elseif( $style == 'woo-style3' ) {
				$output .= '</div> <!-- .product-main-image -->';
				if( $attachment_ids ) {
					$output .= '<ul class="thumbnails">';					
					$post_id = $product->get_id();
					if ( has_post_thumbnail( $post_id ) ) {

						$id = get_post_thumbnail_id( $post_id );

						$original = wp_get_attachment_image_url( $id , 'shop_catalog' );
						$thumbnail = wp_get_attachment_image_url( $id , 'shop_thumbnail' );

						$output .= '<li>';


						$output .= '	<a href="'.esc_attr( $original ).'" data-small="'.esc_attr( $thumbnail ).'">';
						$output .= 		get_the_post_thumbnail( $post_id, 'shop_thumbnail' );
						$output .= '	</a>';
						$output .= '</li>';
					}

					foreach ( $attachment_ids as $attachment_id ) {
						$original = wp_get_attachment_image_src( $attachment_id, 'shop_catalog' );
						$thumbnail = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
						$original = is_array( $original ) ? $original[0] : '';
						$thumbnail = is_array( $thumbnail ) ? $thumbnail[0] : '';
						$output .= '<li>';
						$output .= '	<a href="'.esc_attr( $original ).'" data-small="'.esc_attr( $thumbnail ).'">';
						$output .= 		wp_get_attachment_image( $attachment_id, 'shop_thumbnail' );
						$output .= '	</a>';
						$output .= '</li>';
					}
					$output .= '</ul>';
				}
			} else {
				$output .= '</div> <!-- .product-main-image -->';
			}

			echo $output;
		}

		add_action( 'woocommerce_before_shop_loop_item_title', 'dt_woocommerce_template_loop_product_thumbnail', 12);
		function dt_woocommerce_template_loop_product_thumbnail() {
			global $woocommerce_loop, $product;

			$style = isset( $woocommerce_loop['style'] ) ? $woocommerce_loop['style'] : '';
			
			$output = '</div> <!-- .product-thumb-wrapper -->';

			# Buttons			
			if( $style == 'woo-style1' || $style == 'woo-style2' ) {

				$output .= '<div class="product-buttons-wrapper">';
				$output .= '	<div class="wc_inline_buttons">';
									# Add To Cart Button
									ob_start();
									woocommerce_template_loop_add_to_cart();
									$add_to_cart = ob_get_clean();

									if( !empty($add_to_cart) ) {
										$add_to_cart = str_replace(' class="',' class="dt-sc-button too-small ',$add_to_cart);
										$output .= '<div class="wc_cart_btn_wrapper wc_btn_inline">'.$add_to_cart.'</div>';
									}

									# YITH Wishlist 
									if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {

										$output .= '<div class="wcwl_btn_wrapper wc_btn_inline">'.do_shortcode('[yith_wcwl_add_to_wishlist]').'</div>';
									}

									# YITH Quick View
									if( class_exists('YITH_WCQV_Frontend') ) {
										$label = esc_html( get_option( 'yith-wcqv-button-label' ) );
										$output .= '<div class="wcqv_btn_wrapper wc_btn_inline"><a href="#" class="button yith-wcqv-button" data-product_id="' . $product->id . '">' . $label . '</a></div>';
									}

									# YITH Compare
									if( class_exists('YITH_Woocompare_Frontend') && (get_option('yith_woocompare_compare_button_in_products_list') == 'yes') ) {
										$is_button = get_option( 'yith_woocompare_is_button' );
										$button_text = get_option( 'yith_woocompare_button_text', __( 'Compare', 'classy-missy' ) );
										$class = $is_button == 'button' ? 'button compare yith-woocompare-button' : 'compare yith-woocompare-button';
										$url = array('action' => 'yith-woocompare-add-product', 'id' => $product->id );
										$lang = defined( 'ICL_LANGUAGE_CODE' ) ? ICL_LANGUAGE_CODE : false;
										if( $lang ) {
											$url['lang'] = $lang;
										}
										$output .= '<div class="wc_compare_btn_wrapper wc_btn_inline"><a href="'.esc_url_raw( add_query_arg( $url ) ).'" class="'.$class.'" data-product_id="'.$product->id.'" rel="nofollow">'.$button_text.'</a></div>';
									}
				$output .= '	</div>';
				$output .= '</div> <!-- .product-buttons-wrapper -->';
			}
			# Buttons			

			$output .= '</div> <!-- .product-thumb -->';

			echo $output;
		}
	# end .product-thumb

	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

	# 3. .product-details
		add_action( 'woocommerce_after_shop_loop_item_title', 'dt_woocommerce_after_shop_loop_item_title_start', 1 );
		function dt_woocommerce_after_shop_loop_item_title_start() {
			echo '<div class="product-details">';
		}

		# 3.1. Product Title
			add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 2 );
			
			add_action( 'woocommerce_after_shop_loop_item_title', 'dt_woocommerce_template_loop_product_title', 3 );
			function dt_woocommerce_template_loop_product_title() {
				
				echo '<h3 class="woocommerce-loop-product__title">' . get_the_title() . '</h3>';
			}
			
			add_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_product_link_close',3);

		# 3.2 Product Rating
			add_action( 'woocommerce_after_shop_loop_item_title', 'dt_woocommerce_template_loop_rating_start', 4 );
			function dt_woocommerce_template_loop_rating_start() {
				global $product;
				$rating = wc_get_rating_html( $product->get_average_rating() );
				
				echo '<div class="product-rating-wrapper">';
				if( empty( $rating ) ) {
					echo "<div class='star-rating'><span style='width:0%'><strong class='rating'>0.00</strong> out of 5</span></div>";
				}
			}

			add_action( 'woocommerce_after_shop_loop_item_title', 'dt_woocommerce_template_loop_rating_end',  6);
			function dt_woocommerce_template_loop_rating_end() {
				echo '</div> <!-- .product-rating-wrapper --> ';
			}

		# 3.3. Product Price
			add_action( 'woocommerce_after_shop_loop_item_title', 'dt_woocommerce_template_loop_price_start', 9 );
			function dt_woocommerce_template_loop_price_start() {
				echo '<span class="product-price">';
			}

			add_action( 'woocommerce_after_shop_loop_item_title', 'dt_woocommerce_template_loop_price_end', 11 );
			function dt_woocommerce_template_loop_price_end() {

				echo '</span> <!-- .product-price --> ';
			}

		# 3.4. Product Add Cart
			add_action( 'woocommerce_after_shop_loop_item_title', 'dt_woocommerce_template_loop_add_to_cart', 12 );
			function dt_woocommerce_template_loop_add_to_cart() {

				global $woocommerce_loop,$product;
				$style = isset( $woocommerce_loop['style'] ) ? $woocommerce_loop['style'] : '';				

				# Color Swatch
				if( $product->get_type() == 'variable' ) {

					$variations_html = '<!-- .variations_form start -->';
					
					$attributes = $product->get_variation_attributes();
					$variations = $product->get_available_variations();

					if( !empty( $variations ) ) {
						$variations_html .= '<div data-product_id="'.esc_attr( $product->id ).'" data-product_variations="'.esc_attr( json_encode( $variations ) ).'" class="variations_form">';
						
						
						foreach( $attributes as $name => $options ) {
							$attr = dt_get_woocommerce_tax_attribute( $name );
							if( $attr->attribute_type == 'colorpicker' ) {
								$variations_html .= '<div class="variations '.esc_attr( sanitize_title( $name ) ).'">';
								$variations_html .= '	<select name="attribute_'.esc_attr( sanitize_title( $name ) ).'" data-attribute_name="attribute_'.esc_attr( sanitize_title( $name ) ).'">';
								$variations_html .= '		<option value="">'.__( 'Choose an option','classy-missy').'</option>';
															if( is_array( $options ) ) {
																if ( taxonomy_exists( $name ) ) {
																	$terms = wc_get_product_terms( $product->id, $name, array( 'fields' => 'all' ) );
																	foreach( $terms as $term ) {
																		if ( ! in_array( $term->slug, $options ) ) {
																			continue;
																		}
																		$value = get_woocommerce_term_meta( $term->term_id, '_color_value', true );
																		$variations_html .= '<option value="'.$term->slug.'" data-value="'.$value.'">'. $term->name.'</option>';
																	}
																}
															}
								$variations_html .= '	</select>';									
								$variations_html .= '</div>';
							}
						}
						$variations_html .= '</div> <!-- .variations_form end -->';

						echo $variations_html;
					}
				}
				# Color Swatch

				if( $style == 'woo-style3' ) {

					ob_start();
					woocommerce_template_loop_add_to_cart();
					$add_to_cart = ob_get_clean();

					echo '<div class="wc_cart_btn_wrapper">'.$add_to_cart.'</div>';
				}
			}
	
		add_action( 'woocommerce_after_shop_loop_item_title', 'dt_woocommerce_after_shop_loop_item_title_end', 100 );
		function dt_woocommerce_after_shop_loop_item_title_end() {
			echo '</div> <!-- . product-details -->';
		}
	# end .product-details

	# 4 .product-wrapper
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	classymissy_remove_anonymous_object_action('woocommerce_after_shop_loop_item', 'YITH_WCQV_Frontend', 'yith_add_quick_view_button' , 15 );
	classymissy_remove_anonymous_object_action('woocommerce_after_shop_loop_item', 'YITH_Woocompare_Frontend', 'add_compare_link' , 20 );
	add_action( 'woocommerce_after_shop_loop_item', 'dt_woocommerce_after_shop_loop_item', 100 );
	function dt_woocommerce_after_shop_loop_item() {
		$out  = '	</div> <!-- .product-wrapper -->';
		$out .= '</div> <!-- .column -->';
		echo $out;
	}
/**
 * ==========================================================
 * ============= SINGLE PRODUCT WRAPPER END =================
 * ==========================================================
 */

/**
 * ==========================================================
 * =============    CART SNIPPET FRAGMENT 	=================
 * ==========================================================
 */
	add_filter( 'add_to_cart_fragments', 'classymissy_cart_link_fragment' );
	function classymissy_cart_link_fragment( $fragments ) {
		
		ob_start();?>
        <!-- Header Type : Cart Icon -->
        <a class="header-cart-content" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View Shopping Cart', 'classy-missy' ); ?>">
            	<span class="fa fa-shopping-cart"> </span><?php
					$count = WC()->cart->cart_contents_count;
					if( $count > 0 ) :?>
                    	<sup><?php echo ($count);?></sup><?php
					endif;?>
        </a><?php
		
		$fragments['a.header-cart-content'] = ob_get_clean();
		
		# [dt_sc_woo_cart/]
		ob_start();
		echo do_shortcode('[dt_sc_woo_cart/]');
		$fragments['a.cart-info'] = ob_get_clean();
		
		return $fragments;
	}

/**
 * ==========================================================
 * =============    SINGLE PRODUCT PAGE 	=================
 * ==========================================================
 */
	
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	
	add_action( 'woocommerce_before_single_product_summary', 'woocommerce_before_single_product_summary_start', 1 );
	function woocommerce_before_single_product_summary_start() {
		global $product;

		$out = '<div class="single-product-thumb">';
		$out .= '	<div class="product-meta">';			
						if( $product->is_on_sale() and $product->is_in_stock() ) {
							$out .= '<span class="onsale"><span>'.esc_html__('Sale','classy-missy').'</span></span>';
						} elseif( !$product->is_in_stock() ) {
							$out .= '<span class="out-of-stock"><span>'.esc_html__('Out of Stock','classy-missy').'</span></span>';
						}
						
						if( $product->is_featured() ) {
							$out .= '<div class="featured-tag"><div><i class="fa fa-thumb-tack"></i><span>'.esc_html__('Featured','classy-missy').'</span></div></div>';
						}
		$out .= '	</div> <!-- .product-meta -->';
		echo $out;		
	}
	add_action( 'woocommerce_before_single_product_summary', 'woocommerce_before_single_product_summary_end', 21 );
	function woocommerce_before_single_product_summary_end() {
		echo '</div> <!-- .single-product-thumb -->';
	}

	remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    add_action('woocommerce_after_single_product_summary', 'classymissy_woocommerce_output_related_products', 20 );
    function classymissy_woocommerce_output_related_products() {
		
		$related = classymissy_option('woo', "enable-related");
		if( is_null( $related ) ) {
			return;
		}
		
		$args = array(
			'posts_per_page' 	=> 4,
			'columns' 			=> 4,
			'orderby' 			=> 'rand'
		);
		
		ob_start();
		woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
		$related = ob_get_clean();
		
		$regex = "#<h2>([^<]*)</h2>#";
		preg_match($regex, $related, $matches);
		if( isset( $matches[0]) ) {
			$h2 = $matches[0];
			$related = str_replace($h2, '<div class="dt-sc-title large-with-sub-title-inside "> <h2>'.__('Products','classy-missy').'</h2> <span>'.__('Related','classy-missy').'</span> </div>',  $related );
		}
		
		echo $related;
	}