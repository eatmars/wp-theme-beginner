<?php
/* ---------------------------------------------------------------------------
 * Load all theme options in back-end
 * --------------------------------------------------------------------------- */
function classymissy_options_page(){ ?>
<!-- wrapper -->
<div id="wrapper">

	<!-- Result -->
    <div id="bpanel-message" style="display:none;"></div>
    <div id="ajax-feedback" style="display:none;"><img src="<?php echo esc_url( CLASSYMISSY_THEME_URI . '/framework/theme-options/images/loading.png' );?>" alt="<?php esc_attr_e('loader', 'classy-missy');?>" /> </div>
    <!-- Result -->

	<!-- panel-wrap -->
	<div id="panel-wrap">

       	<!-- bpanel-wrapper -->
        <div id="bpanel-wrapper">

           	<!-- bpanel -->
           	<div id="bpanel">

                	<!-- bpanel-left -->
                	<div id="bpanel-left">
                    	<div id="logo"><?php
                        	 $logo =  CLASSYMISSY_THEME_URI . '/framework/theme-options/images/logo.png';
							 $advance = classymissy_option('general');
							 if(isset($advance['bpanel-logo-url']) && isset( $advance['enable-bpanel-logo-url']))
							  	$logo = $advance['bpanel-logo-url']; ?>
                             <img src="<?php echo esc_url($logo);?>" width="186" height="101" alt="<?php esc_attr_e('dtlogo', 'classy-missy');?>" />
						</div><?php
						/* ---------------------------------------------------------------------------
						 * Load all theme option tabs.
						 * --------------------------------------------------------------------------- */
						$tabs = array(
							'general' 	  => array('icon' => 'dashicons-admin-home', 'name'=>esc_html__('General','classy-missy'), 'display'=>true),
							'layout'  	  => array('icon' => 'dashicons-exerpt-view', 'name'=>esc_html__('Layout','classy-missy'), 'display'=>true),
							'widgetarea'  => array('icon' => 'dashicons-welcome-widgets-menus', 'name'=>esc_html__('Widget Area','classy-missy'), 'display'=>true),
							'pageoptions' => array('icon' => 'dashicons-admin-page', 'name'=>esc_html__('Page Options','classy-missy'), 'display'=>true),
							'woocommerce' => array('icon' => 'dashicons-cart', 'name'=>esc_html__('WooCommerce','classy-missy'), 'display'=>false),
							
							'colors'	  => array('icon' => 'dashicons-admin-appearance', 'name'=>esc_html__('Colors','classy-missy'), 'display'=>true),
							'fonts'		  => array('icon' => 'dashicons-editor-spellcheck', 'name'=>esc_html__('Fonts','classy-missy'), 'display'=>true),
							'import'	  => array('icon' => 'dashicons-upload', 'name'=>esc_html__('Importer','classy-missy'), 'display'=>false),
							'backup'	  => array('icon' => 'dashicons-backup', 'name'=>esc_html__('Backup','classy-missy'), 'display'=>true),
							'changelog'   => array('icon' => 'dashicons-info', 'name'=> constant('THEME_NAME').esc_html__(' Version ', 'classy-missy').constant('THEME_VERSION'), 'display'=>true)
						);

						if(class_exists('woocommerce')) $tabs['woocommerce']['display'] = true;

						$output = "<!-- bpanel-mainmenu -->\n\t\t\t\t\t\t<ul id='bpanel-mainmenu'>\n";
							foreach($tabs as $tabkey => $tab ):
								if($tab['display'])							
									$output .= "\t\t\t\t\t\t\t\t<li><a href='#{$tabkey}' title='{$tab['name']}'><span class='dashicons {$tab['icon']}'></span>{$tab['name']}</a></li>\n";
							endforeach;
						$output .= "\t\t\t\t\t\t</ul><!-- #bpanel-mainmenu -->\n";
						echo ($output);?>
                    </div><!-- #bpanel-left  end-->
                    
                    <form id="dttheme_options_form" name="dttheme_options_form" enctype="multipart/form-data" method="post" action="options.php">
		                <?php settings_fields( 'dttheme' );?>
                        <input type="hidden" id="dttheme-full-submit" name="dttheme-full-submit" value="0" />
                        <input type="hidden" name="dttheme_admin_wpnonce" value="<?php echo wp_create_nonce('dttheme_wpnonce');?>" /><?php
						/* ---------------------------------------------------------------------------
						 * Load theme options php files
						 * --------------------------------------------------------------------------- */
						foreach($tabs as $tabkey => $tab ):
							if($tab['display'])
								require_once( CLASSYMISSY_THEME_DIR .'/framework/theme-options/' .$tabkey. '.php' );
						endforeach; ?>
						<!-- #bpanel-bottom -->
                        <div id="bpanel-bottom">
                           <input type="submit" value="<?php esc_attr_e('Reset All','classy-missy');?>" class="save-reset dttheme-reset-button bpanel-button white-btn" name="dttheme[reset]" />
						   <input type="submit" value="<?php esc_attr_e('Save All','classy-missy');?>" name="submit"  class="save-reset dttheme-footer-submit bpanel-button white-btn" />
                        </div><!-- #bpanel-bottom end-->        
                    </form>

            </div><!-- #bpanel -->

        </div><!-- #bpanel-wrapper -->
    </div><!-- #panel-wrap end -->
</div><!-- #wrapper end-->
<?php
} ?>