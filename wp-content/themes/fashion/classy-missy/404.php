<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php classymissy_viewport(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<?php
$type = classymissy_opts_get('notfound-style', 'type1');
$darkbg = classymissy_opts_get('notfound-darkbg', '');
$type .= !empty( $darkbg ) ? ' dt-sc-dark-bg' : '';

$bg = classymissy_option('pageoptions','notfound-bg');
$opacity = classymissy_opts_get('notfound-bg-opacity', '1');
$position = classymissy_opts_get('notfound-bg-position', 'center center');
$repeat = classymissy_opts_get('notfound-bg-repeat', 'no-repeat');
$color = classymissy_option('pageoptions','notfound-bg-color');
$showbgcolor = classymissy_option('pageoptions','show-notfound-bg-color');

$estyle = classymissy_option('pageoptions','notfound-bg-style');
$color = !empty($color) ? classymissy_hex2rgb($color) : array('f', 'f', 'f');
$style = !empty($bg) ? "background:url($bg) $position $repeat;" : '';
$style .= (!empty($color) && !empty($showbgcolor)) ? "background-color:rgba(  $color[0] ,  $color[1],  $color[2], {$opacity});" : '';
$style .= !empty($estyle) ? $estyle : ''; ?>

<body <?php body_class(); ?>>

<div class="wrapper <?php echo esc_attr($type); ?>" style="<?php echo esc_attr($style); ?>">
	<div class="container">
        <div class="center-content-wrapper">
            <div class="center-content"><?php
                $pageid = classymissy_option('pageoptions','notfound-pageid');
                if( classymissy_option('pageoptions','enable-404message') && !empty($pageid) ):
                    $page = get_post( $pageid, ARRAY_A );
                    echo DTCoreShortcodesDefination::dtShortcodeHelper ( stripslashes($page['post_content']) );
                elseif( classymissy_option('pageoptions','enable-404message') ):
					echo '<div class="error-box square"><div class="error-box-inner"><h3>'.esc_html__('Oops!', 'classy-missy').'</h3><h2>404</h2><h4>'.esc_html__('Page Not Found', 'classy-missy').'</h4></div></div>';
					echo '<div class="dt-sc-hr-invisible-xsmall"></div>';
					echo '<p>'.esc_html__("It seems you've venured too far.", 'classy-missy').'</p><p>'.esc_html__('Click here to go to home page.', 'classy-missy').'</p>';
					echo '<div class="dt-sc-hr-invisible-xsmall"></div>';
                    echo '<a class="dt-sc-button filled small" target="_blank" href="'.esc_url(home_url('/')).'">'.esc_html__('Back to Home','classy-missy').'</a>';
                endif; ?>
            </div>
        </div>
    </div>    
</div>
</body>
<?php wp_footer(); ?>
</html>