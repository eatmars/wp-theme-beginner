<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php classymissy_viewport(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<?php
$type = classymissy_opts_get('comingsoon-style', 'type1');
$darkbg = classymissy_opts_get('uc-darkbg', '');
$type .= !empty( $darkbg ) ? ' dt-sc-dark-bg' : '';

$bg = classymissy_option('pageoptions','comingsoon-bg');
$opacity = classymissy_opts_get('comingsoon-bg-opacity', '1');
$position = classymissy_opts_get('comingsoon-bg-position', 'center center');
$repeat = classymissy_opts_get('comingsoon-bg-repeat', 'no-repeat');
$color = classymissy_option('pageoptions','comingsoon-bg-color');
$showcolor = classymissy_option('pageoptions','show-comingsoon-bg-color');

$estyle = classymissy_option('pageoptions','comingsoon-bg-style');

$color = !empty($color) ? classymissy_hex2rgb($color) : array('f', 'f', 'f');
$style = !empty($bg) ? "background:url($bg) $position $repeat;" : '';
$style .= (!empty($color) && !empty($showcolor) ) ? "background-color:rgba(  $color[0],  $color[1],  $color[2], {$opacity});" : '';
$style .= !empty($estyle) ? $estyle : ''; ?>

<body <?php body_class(); ?>>

<div class="wrapper under-construction <?php echo esc_attr($type); ?>" style="<?php echo esc_attr($style); ?>"><?php
	$pageid = classymissy_option('pageoptions','comingsoon-pageid');
	if( !empty($pageid) ):
		$page = get_post( $pageid, ARRAY_A );
		echo DTCoreShortcodesDefination::dtShortcodeHelper ( stripslashes($page['post_content']) );
	else:
		echo '<div class="uc-wrapper-inner">';
			echo '<h2>'.esc_html__('Website is almost ready', 'classy-missy').'</h2>';
			echo '<p>'.esc_html__('Our website is under construction.', 'classy-missy').'</p>';
			echo '<p>'.esc_html__("We'll be here soon with our new awesome.", 'classy-missy').'</p>';
			echo '<div class="dt-sc-hr-invisible-xsmall"></div>';

			if( classymissy_option('pageoptions','show-launchdate') == 'true'):
				$date = classymissy_option('pageoptions','comingsoon-launchdate');
				$datetime = new DateTime('tomorrow');
				$date = !empty( $date ) ? $date : $datetime->format('m/d/Y');
				$offset = classymissy_option('pageoptions','comingsoon-timezone');
				$offset = !empty( $offset ) ? $offset : '+5';

				echo '<div class="downcount" data-date="'.$date.'" data-offset="'.$offset.'">';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number days">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Days', 'classy-missy').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number hours">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Hours', 'classy-missy').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number minutes">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Minutes', 'classy-missy').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper last">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number seconds">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Seconds', 'classy-missy').'</h3>';
					echo '</div>';
				echo '</div>';
			endif;
		echo '</div>';
	endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>