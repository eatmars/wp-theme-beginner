<?php
if( !function_exists('julia_kaya_advanced_search_form') ){
function julia_kaya_advanced_search_form($button_name = 'SEARCH'){
		global $kta_meta_panel_names;
		$options = get_option('pf_custom_options');
		$search_name = get_option('pf_search_name');
		$change_category_name_text = get_theme_mod('change_category_name_text') ? get_theme_mod('change_category_name_text') : 'Category';
		$disable_category_section = get_theme_mod('disable_category_section') ? get_theme_mod('disable_category_section') : '0';
		$disable_model_id = get_theme_mod('disable_model_id') ? get_theme_mod('disable_model_id') : '0';
		$disable_pf_sorting_options = get_theme_mod('disable_pf_sorting_options') ? get_theme_mod('disable_pf_sorting_options') : '0';
		$pf_slug_text = get_theme_mod('pf_slug_name') ? trim(get_theme_mod('pf_slug_name')) :'Model';
		// unset($options['pf_meta_label_name'][0]);
		 //print_r($options['pf_meta_label_name']);
		$search_box_title = get_theme_mod('search_box_title') ? str_replace('&nbsp;', '', get_theme_mod('search_box_title')) : '';
		echo '<div class="toggle_search_field" data-search="'.$search_name['search_name'].'">';
		echo '<span class="search_close">x</span>';
			if( trim(!empty($search_box_title)) ){
				echo '<h3 class="title_style1">'.esc_attr($search_box_title).'
					<span class="title_seperator"></span></h3>';
			}
			echo '<form method="get"  class="searchbox-wrapper search_form s" action="'.home_url().'">'; ?>
				<input type="hidden" name="advance_search" value="advance_search">
				<input type="hidden"  name="s" placeholder="Name" />
					<?php
					// Category Based Search
					if( $disable_category_section != '1' ){
						if( taxonomy_exists( 'portfolio_category' ) ){
							$pf_search_cat_terms = get_terms('portfolio_category');
							if( is_array($pf_search_cat_terms) ){
								echo '<div class="search_box_style search_by_order">';
									echo '<h5>'.trim($change_category_name_text).'</h5>';
									foreach ($pf_search_cat_terms as $term_key => $pf_search_cat_term) {
										echo '<label><input type="checkbox" name="pf_search_cat_name[]" class="advanced_search_checkbox" value="'.$pf_search_cat_term->term_id.'" />'.$pf_search_cat_term->name.'</label>';
									}
								echo '</div>';
							}else{
								$pf_search_cat_name[] ='';
							}
						}else{
							$pf_search_cat_name[] ='';
						}
					}else{
						$pf_search_cat_name[] ='';
					}
					// End	
					// Model Uniqueue ID
					if( $disable_model_id != '1' ){
						echo '<div class="search_box_style">';
							echo '<input type="text"  name="pf_unique_id" placeholder="'.ucfirst($pf_slug_text).' ID" />'; 
						echo '</div>';
					}else{
						$pf_unique_id = '';
					}
					?>
					<!-- Order By & Order -->
					<?php if( $disable_pf_sorting_options != '1' ){ ?>
						<div class="search_box_style search_by_order">
							<select name="order_by" id="order_by">
								<?php 	$orderby_options = array(
											''  => __('Default Sorting', 'julia'),
											'title' => __('Sort By Name', 'julia'),
											'date' => __('Sort By Date', 'julia'),
											'menu_order'  => __('Menu Order', 'julia'),
											'rand' => __('Sort By Random Order', 'julia'),
										);
								foreach( $orderby_options as $value => $label ) {
									echo "<option value='$value'>$label</option>";
								} ?>
							</select>
							<select name="order" id="order">
								<?php  $order_options = array(
									'DESC' => __('Descending','julia'),
									'ASC' => __('Ascending','julia'),
								);
								foreach( $order_options as $value => $label ) {
									echo "<option value='$value'>$label</option>";
								} ?>
							</select>
						</div>
					<?php }else{
						$order_by = '';
						$order = '';
					} ?>
					<!-- End -->
					<?php 
					$options = get_option('pf_custom_options');
					$count=count($options['pf_meta_field_name']);
					if( !empty($options) ){
						unset($options['pf_meta_label_name'][0]);
					}
					$tabs = 0;
			if( count($kta_meta_panel_names) > 2 ){
	            echo '<div class="search_box_style">';
	                echo '<select class="fullwidth" name="talents_meta_category" id="talents_meta_category">';
	                echo '<option  value="">'.__('Choose Talent Type', 'talentagency').'</option>';
	                foreach($kta_meta_panel_names as $key => $kta_meta_panel)
	                {	
	                    if ((!empty($key)) && (!empty($kta_meta_panel)))
	                    {
	                        echo '<option  value="' . trim($key) . '">' . trim($kta_meta_panel) . '</option>';
	                    }
	                }
	                echo '</select>';
	            echo '</div>';
        	}
		foreach ($options['tabs_name'] as $key => $user_tab) {
			$tab_id = $options['tabs_uid'][$tabs];
			echo '<div id="' . $tab_id . '" class="kta-form-meta-panels">';
			//echo '<h4>'.$user_tab.'</h4>';
					for ($i=0; $i < 100; $i++){ 
						
					if( ( !empty($options['pf_meta_label_name'][$tab_id][$i]) ) &&  ( $options['pf_meta_label_name'][$tab_id][$i] != 'Array') &&  ( $options['pf_meta_label_name'][$tab_id][$i] != '') &&  ( !is_array($options['pf_meta_label_name'][$tab_id][$i]) )){
						$explode_string = trim(nl2br($options['pf_meta_field_options'][$tab_id][$i]));
     					$explode_string = str_replace('<br />', "|", $explode_string);
     					$explode_string =  preg_replace( "/\r|\n/", "", $explode_string );     					
						$array_values = explode('|',$explode_string);
						$data_values = kaya_explode_data($options['pf_meta_field_options'][$tab_id][$i]);
						$data_keys = kaya_explode_data($options['pf_meta_field_options'][$tab_id][$i]);
						$data_keys = str_replace("'", ".", trim($data_keys));
						$data_keys = explode(',', trim($data_keys));
						$data_values = explode(',', trim($data_values));
						$array_data = array_combine($data_keys, $data_values);
						$options_id = str_replace(array(' ', '/', '---','_'), '-', trim(strtolower($options['pf_meta_label_uid'][$tab_id][$i])));

						if( $options['pf_meta_field_name'][$tab_id][$i] == 'text' ){
							if( $options['pf_option_display_search'][$tab_id][$i] == 'true' ){
									//if( ( $options['pf_meta_label_name'][$i] == 'Name' ) ){
										//$type= "hidden";
										//$class= 'hidden_search_box';
										//echo '<div class="search_box_style"><input type="text"  name="s" placeholder="Name" /></div>';
									//}else{
										$type = 'text';
										$class= 'search_box_style';
									//}
									echo '<div class="'.$class.'">';
									echo '<input type="'.$type.'"  name="'.$options_id.'" placeholder="'.$options['pf_meta_label_name'][$tab_id][$i].'" />';
								echo '</div>';
							}
						}
						if( $options['pf_meta_field_name'][$tab_id][$i] == 'select' ){
							if( $options['pf_option_display_search'][$tab_id][$i] == 'true' ){
								echo '<div class="search_box_style">';
								if( ( $options['pf_option_search_range'][$tab_id][$i] == 'true' ) ){
									echo '<select name="'.$options_id.'-from">';
										echo '<option value="">'.$options['pf_meta_label_name'][$tab_id][$i].'</option>';
										foreach ($array_data as $key => $array_value) {
											echo '<option value="'.$key.'">'.$array_value.'</option>';
										} 
									echo '</select>';
									echo '<select name="'.$options_id.'-to">';
										echo '<option value="">'.$options['pf_meta_label_name'][$tab_id][$i].'</option>';
										foreach ($array_data as $key => $array_value) {
											echo '<option value="'.$key.'">'.$array_value.'</option>';
										} 
									echo '</select>';
								}	
								else{
										echo '<select name="'.$options_id.'" class="fullwidth">';
										echo '<option value="">'.$options['pf_meta_label_name'][$tab_id][$i].'</option>';
										foreach ($array_data as $key => $array_value) {
											echo '<option value="'.$key.'">'.$array_value.'</option>';
										} 
									echo '</select>';
									}
								echo '</div>';		
							}
						}
						//Date Fileds
						if( $options['pf_meta_field_name'][$tab_id][$i] == 'date' ){
							if( $options['pf_option_display_search'][$tab_id][$i] == 'true' ){
								echo '<div class="search_box_style">';
								if( ( $options['pf_option_search_range'][$tab_id][$i] == 'true' ) ){
									echo '<select name="'.$options_id.'-from">';
										echo '<option value="">'.$options['pf_meta_label_name'][$tab_id][$i].'</option>';
										foreach (range(0, 80) as $key => $array_value) {
											echo '<option value="'.( $key).'">'.$array_value.'</option>';
										} 
									echo '</select>';
									echo '<select name="'.$options_id.'-to">';
										echo '<option value="">'.$options['pf_meta_label_name'][$tab_id][$i].'</option>';
										foreach (range(1, 80) as $key => $array_value) {
											echo '<option value="'.( $key + 1 ).'">'.$array_value.'</option>';
										} 
									echo '</select>';
								}	
								else{
										echo '<select name="'.$options_id.'" class="fullwidth">';
										echo '<option value="">'.$options['pf_meta_label_name'][$tab_id][$i].'</option>';
										foreach (range(1, 80) as $key => $array_value) {
											echo '<option value="'.( $key ).'">'.$array_value.'</option>';
										} 
									echo '</select>';
									}
								echo '</div>';		
							}
						}
					// Check box
						if( $options['pf_meta_field_name'][$tab_id][$i] == 'checkbox' ){
							if( $options['pf_option_display_search'][$tab_id][$i] == 'true' ){
								echo '<div class="search_box_style">';
									echo '<h5>'.$options['pf_meta_label_name'][$tab_id][$i].'</h5>';
									foreach ($array_data as $key => $array_value) {
										echo '<label><input type="checkbox"  value="'.trim($key).'" name="'.$options_id.'" class="advanced_search_checkbox" />'.$array_value.'</label>';
									}
								echo '</div>';		
							}
						}
					//End		
					}
					}
					echo '</div>';
					$tabs++;
				} // End--
					?>
					<div class="search_box_style search_button">	
							<input id="search_submit" class="" type="submit" name="submit" value="<?php echo $button_name; ?>" />
						</div>
					</form>
				</div>
<?php }
} ?>