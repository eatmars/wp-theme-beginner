<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $image_data, $terms_id, $tax_image_data, $kta_search;
$img_width = $tax_image_data['width'] ? $tax_image_data['width'] : (!empty($kta_search->search_img_width) ? $kta_search->search_img_width : '480');
$img_height = $tax_image_data['height'] ? $tax_image_data['height'] : (!empty($kta_search->search_img_height) ? $kta_search->search_img_height : '480');
$width = $image_data['width'] ? $image_data['width'] : $img_width;
$height = $image_data['height'] ? $image_data['height'] : $img_height;

$img_columns = $tax_image_data['columns'] ? $tax_image_data['columns'] : (!empty($kta_search->search_display_columns) ? $kta_search->search_display_columns : '6');

$columns = $image_data['columns'] ? $image_data['columns'] : $img_columns;
$terms = $terms_id ? implode(' ', $terms_id) : '';
$mesonary_imgs = $image_data['mesonary'] ? $image_data['mesonary'] : $tax_image_data['mesonary'];
$mesonary = ($mesonary_imgs == '1') ? 'true' : 'false';

$disable_talent_options = $image_data['disable_talent_options'] ? $image_data['disable_talent_options'] : '';

$selected = '';
if(isset($_SESSION['shortlist'])) {
	if ( in_array($id, $_SESSION['shortlist']) ) {
		$selected = 'item_selected';
	}
}
echo "<li class='item isotope-item all ".$terms." ".$selected." kta-column".$columns."' id='".get_the_ID()."'>";
		if( $disable_talent_options != 'on' ){
			do_action('kta_shortlist_icons');
		}
		echo '<div class="kta-image-details-wrapper">';
			echo Kta_open_post_link();
				echo kta_post_img_thumbnail($mesonary, $width, $height);
			echo Kta_close_post_link();
			if( $disable_talent_options != 'on' ){
				kta_talent_details(get_the_ID(), $set_card=FALSE, $model_details=TRUE);
			}
			echo Kta_post_title();
		echo '</div>';
echo '</li>';