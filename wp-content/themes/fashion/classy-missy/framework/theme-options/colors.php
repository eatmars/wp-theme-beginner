<!-- #colors -->
<div id="colors" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"> 
            <li><a href="#tab1"><?php esc_html_e('General', 'classy-missy');?></a></li>
            <li><a href="#tab2"><?php esc_html_e('Header', 'classy-missy');?></a></li>
			<li><a href="#tab3"><?php esc_html_e('Menu', 'classy-missy');?></a></li>
            <li><a href="#tab4"><?php esc_html_e('Content', 'classy-missy');?></a></li>
            <li><a href="#tab5"><?php esc_html_e('Footer', 'classy-missy');?></a></li>
            <li><a href="#tab6"><?php esc_html_e('Heading', 'classy-missy');?></a></li>
        </ul>
        
        <!-- #tab1-general -->
        <div id="tab1" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php esc_html_e('Skin', 'classy-missy');?></h3>
                </div>
                
                <div class="box-content">
                    <div class="column one-third"><label><?php esc_html_e('Theme Skin', 'classy-missy');?></label></div>
                    <div class="column two-third last">
                        <select id="dttheme-skin-color" name="dttheme[colors][theme-skin]" class="medium dt-chosen-select skin-types">
                        	<optgroup label="Custom">
								<option value="custom"><?php esc_html_e('Custom Skin', 'classy-missy'); ?></option>
							</optgroup>
							<optgroup label="Skins"><?php
								$skins = array( 'blue', 'brown', 'cadetblue', 'chillipepper', 'cyan', 'darkgolden', 'deeporange', 'deeppurple', 'green', 'lime', 'magenta', 'orange', 'pink', 'purple', 
												'red', 'skyblue', 'teal', 'turquoise', 'wisteria', 'yellow' );
								foreach($skins as $skin):
									$s = selected(classymissy_option('colors','theme-skin'),$skin,false);
									echo "<option $s >$skin</option>";
								endforeach;?>
                            </optgroup>    
                        </select>
                        <p class="note"><?php esc_html_e('Choose one of the predefined styles or set your own colors.', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Body Background Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][body-bgcolor]";
						$value =  (classymissy_option('colors','body-bgcolor') != NULL) ? classymissy_option('colors','body-bgcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom background color of the body.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <?php $panelvisible = ( classymissy_option('colors','theme-skin') == 'custom' ) ? 'style="display:block"' : 'style="display:none"'; ?>

					<div class="custom-skin-panel" <?php echo ($panelvisible);?>>
                        <div class="column one-third"><label><?php esc_html_e('Default Color', 'classy-missy');?></label></div>
                        <div class="column two-third last"><?php
                            $name  =  "dttheme[colors][custom-default]";
                            $value =  (classymissy_option('colors','custom-default') != NULL) ? classymissy_option('colors','custom-default') :"";
                            classymissy_admin_color_picker_two($name,$value);?>
                            <p class="note"><?php esc_html_e('Important: This option can be used only with the <b>"Custom Skin"</b>.', 'classy-missy');?></p>
                        </div>
                        <div class="hr"></div>
    
                        <div class="column one-third"><label><?php esc_html_e('Light Color', 'classy-missy');?></label></div>
                        <div class="column two-third last"><?php
                            $name  =  "dttheme[colors][custom-light]";
                            $value =  (classymissy_option('colors','custom-light') != NULL) ? classymissy_option('colors','custom-light') :"";
                            classymissy_admin_color_picker_two($name,$value);?>
                            <p class="note"><?php esc_html_e('Important: This option can be used only with the <b>"Custom Skin"</b>.', 'classy-missy');?></p>
                        </div>
                        <div class="hr"></div>
    
                        <div class="column one-third"><label><?php esc_html_e('Dark Color', 'classy-missy');?></label></div>
                        <div class="column two-third last"><?php
                            $name  =  "dttheme[colors][custom-dark]";
                            $value =  (classymissy_option('colors','custom-dark') != NULL) ? classymissy_option('colors','custom-dark') :"";
                            classymissy_admin_color_picker_two($name,$value);?>
                            <p class="note"><?php esc_html_e('Important: This option can be used only with the <b>"Custom Skin"</b>.', 'classy-missy');?></p>
                        </div>
                    </div>    

                </div><!-- .box-content -->
            </div><!-- .bpanel-box end -->
        </div><!--#tab1-general end-->

        <!-- #tab2-header -->
        <div id="tab2" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php esc_html_e('Header', 'classy-missy');?></h3>
                </div>
                
                <div class="box-content">
                    <div class="column one-half">
                    	<label><?php esc_html_e('Header BG Color', 'classy-missy');?></label>
                        <div class="clear"></div><?php
						$name  =  "dttheme[colors][header-bgcolor]";
						$value =  (classymissy_option('colors','header-bgcolor') != NULL) ? classymissy_option('colors','header-bgcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom background color of the header.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>

					<div class="column one-half last">
						<div class="bpanel-option-set">
	                        <?php echo classymissy_admin_jqueryuislider( esc_html__("Background opacity", 'classy-missy'), "dttheme[colors][header-bgcolor-opacity]",
                                                                          classymissy_option("colors","header-bgcolor-opacity"),"");?>
                        </div>
                        <p class="note"><?php esc_html_e('You can adjust opacity of the header BG color here.', 'classy-missy');?></p>
                    </div>
					<div class="hr"></div>
                </div><!-- .box-content -->
                
                <div class="box-title">
                    <h3><?php esc_html_e('Top Bar', 'classy-missy');?></h3>
                </div>
                
                <div class="box-content">
                    <div class="column one-third"><label><?php esc_html_e('Top Bar BG Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][topbar-bgcolor]";
						$value =  (classymissy_option('colors','topbar-bgcolor') != NULL) ? classymissy_option('colors','topbar-bgcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom background color of the top bar.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>
                    
                    <div class="column one-third"><label><?php esc_html_e('Top Bar Text Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][topbar-textcolor]";
						$value =  (classymissy_option('colors','topbar-textcolor') != NULL) ? classymissy_option('colors','topbar-textcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom text color of the top bar.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>
                    
                    <div class="column one-third"><label><?php esc_html_e('Top Bar Link Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][topbar-linkcolor]";
						$value =  (classymissy_option('colors','topbar-linkcolor') != NULL) ? classymissy_option('colors','topbar-linkcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom link color of the top bar.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>                    
                    
                    <div class="column one-third"><label><?php esc_html_e('Top Bar Link Hover Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][topbar-linkhovercolor]";
						$value =  (classymissy_option('colors','topbar-linkhovercolor') != NULL) ? classymissy_option('colors','topbar-linkhovercolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom link hover color of the top bar.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                </div><!-- .box-content -->
                
            </div><!-- .bpanel-box end -->            
        </div><!--#tab2-header end-->

        <!-- #tab3-menu -->
        <div id="tab3" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php esc_html_e('Menu', 'classy-missy');?></h3>
                </div>

                <div class="box-content">
                    <div class="column one-half">
                    	<label><?php esc_html_e('Menu BG Color', 'classy-missy');?></label>
                        <div class="clear"></div><?php
						$name  =  "dttheme[colors][menu-bgcolor]";
						$value =  (classymissy_option('colors','menu-bgcolor') != NULL) ? classymissy_option('colors','menu-bgcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom background color of the menu.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>

					<div class="column one-half last">
						<div class="bpanel-option-set">
	                        <?php echo classymissy_admin_jqueryuislider( esc_html__("Background opacity", 'classy-missy'), "dttheme[colors][menu-bgcolor-opacity]",
                                                                          classymissy_option("colors","menu-bgcolor-opacity"),"");?>
                        </div>
                        <p class="note"><?php esc_html_e('You can adjust opacity of the menu BG color here.', 'classy-missy');?></p>
                    </div>
					<div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Menu Link Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][menu-linkcolor]";
						$value =  (classymissy_option('colors','menu-linkcolor') != NULL) ? classymissy_option('colors','menu-linkcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the menu links.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Menu Hover Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][menu-hovercolor]";
						$value =  (classymissy_option('colors','menu-hovercolor') != NULL) ? classymissy_option('colors','menu-hovercolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the hover menu links.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Menu Link Active Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][menu-activecolor]";
						$value =  (classymissy_option('colors','menu-activecolor') != NULL) ? classymissy_option('colors','menu-activecolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the active menu links.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Menu Link Active BG', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][menu-activebgcolor]";
						$value =  (classymissy_option('colors','menu-activebgcolor') != NULL) ? classymissy_option('colors','menu-activebgcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the active menu links background.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                </div><!-- .box-content -->
            </div><!-- .bpanel-box end -->            
        </div><!--#tab3-menu end-->

        <!-- #tab4-content -->
        <div id="tab4" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php esc_html_e('Content', 'classy-missy');?></h3>
                </div>
                
                <div class="box-content">
                    <div class="column one-third"><label><?php esc_html_e('Text Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][content-text-color]";
						$value =  (classymissy_option('colors','content-text-color') != NULL) ? classymissy_option('colors','content-text-color') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the body content text.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Link Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][content-link-color]";
						$value =  (classymissy_option('colors','content-link-color') != NULL) ? classymissy_option('colors','content-link-color') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the body content link.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Link Hover Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][content-link-hcolor]";
						$value =  (classymissy_option('colors','content-link-hcolor') != NULL) ? classymissy_option('colors','content-link-hcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom hover color of the body content link.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                </div><!-- .box-content -->
            </div><!-- .bpanel-box end -->            
        </div><!--#tab4-content end-->

        <!-- #tab5-footer -->
        <div id="tab5" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php esc_html_e('Footer', 'classy-missy');?></h3>
                </div>
                
                <div class="box-content">
                    <div class="column one-half">
                    	<label><?php esc_html_e('Footer Background Color', 'classy-missy');?></label>
                        <div class="clear"></div><?php
						$name  =  "dttheme[colors][footer-bgcolor]";
						$value =  (classymissy_option('colors','footer-bgcolor') != NULL) ? classymissy_option('colors','footer-bgcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the footer background.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>

					<div class="column one-half last">
						<div class="bpanel-option-set">
	                        <?php echo classymissy_admin_jqueryuislider( esc_html__("Background opacity", 'classy-missy'), "dttheme[colors][footer-bgcolor-opacity]",
                                                                          classymissy_option("colors","footer-bgcolor-opacity"),"");?>
                        </div>
                        <p class="note"><?php esc_html_e('You can adjust opacity of the footer BG color here.', 'classy-missy');?></p>
                    </div>
					<div class="hr"></div>

                    <div class="column one-half">
                    	<label><?php esc_html_e('Copyright Section BG Color', 'classy-missy');?></label>
                        <div class="clear"></div><?php
						$name  =  "dttheme[colors][copyright-bgcolor]";
						$value =  (classymissy_option('colors','copyright-bgcolor') != NULL) ? classymissy_option('colors','copyright-bgcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the copyright section background.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>

					<div class="column one-half last">
						<div class="bpanel-option-set">
	                        <?php echo classymissy_admin_jqueryuislider( esc_html__("Background opacity", 'classy-missy'), "dttheme[colors][copyright-bgcolor-opacity]",
                                                                          classymissy_option("colors","copyright-bgcolor-opacity"),"");?>
                        </div>
                        <p class="note"><?php esc_html_e('You can adjust opacity of the copyright section BG color here.', 'classy-missy');?></p>
                    </div>
					<div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Footer Text Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][footer-text-color]";
						$value =  (classymissy_option('colors','footer-text-color') != NULL) ? classymissy_option('colors','footer-text-color') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the footer text elements.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Footer Link Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][footer-link-color]";
						$value =  (classymissy_option('colors','footer-link-color') != NULL) ? classymissy_option('colors','footer-link-color') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the footer links.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Footer Hover Link Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][footer-link-hcolor]";
						$value =  (classymissy_option('colors','footer-link-hcolor') != NULL) ? classymissy_option('colors','footer-link-hcolor') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom hover color of the footer links.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Footer Heading Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][footer-heading-color]";
						$value =  (classymissy_option('colors','footer-heading-color') != NULL) ? classymissy_option('colors','footer-heading-color') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the footer headings.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                </div><!-- .box-content -->
            </div><!-- .bpanel-box end -->            
        </div><!--#tab5-footer end-->

        <!-- #tab6-heading -->
        <div id="tab6" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php esc_html_e('Heading', 'classy-missy');?></h3>
                </div>
                
                <div class="box-content">
                    <div class="column one-third"><label><?php esc_html_e('Heading H1 Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][heading-h1-color]";
						$value =  (classymissy_option('colors','heading-h1-color') != NULL) ? classymissy_option('colors','heading-h1-color') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the heading tag h1.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>
                    
                    <div class="column one-third"><label><?php esc_html_e('Heading H2 Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][heading-h2-color]";
						$value =  (classymissy_option('colors','heading-h2-color') != NULL) ? classymissy_option('colors','heading-h2-color') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the heading tag h2.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Heading H3 Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][heading-h3-color]";
						$value =  (classymissy_option('colors','heading-h3-color') != NULL) ? classymissy_option('colors','heading-h3-color') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the heading tag h3.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Heading H4 Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][heading-h4-color]";
						$value =  (classymissy_option('colors','heading-h4-color') != NULL) ? classymissy_option('colors','heading-h4-color') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the heading tag h4.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Heading H5 Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][heading-h5-color]";
						$value =  (classymissy_option('colors','heading-h5-color') != NULL) ? classymissy_option('colors','heading-h5-color') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the heading tag h5.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                    <div class="hr"></div>

                    <div class="column one-third"><label><?php esc_html_e('Heading H6 Color', 'classy-missy');?></label></div>
                    <div class="column two-third last"><?php
						$name  =  "dttheme[colors][heading-h6-color]";
						$value =  (classymissy_option('colors','heading-h6-color') != NULL) ? classymissy_option('colors','heading-h6-color') :"";
                        classymissy_admin_color_picker_two($name,$value);?>
                        <p class="note"><?php esc_html_e('Pick a custom color of the heading tag h6.(e.g. #a314a3)', 'classy-missy');?></p>
                    </div>
                </div><!-- .box-content -->
            </div><!-- .bpanel-box end -->            
        </div><!--#tab6-heading end-->

    </div><!-- .bpanel-main-content end-->
</div><!-- #colors end-->