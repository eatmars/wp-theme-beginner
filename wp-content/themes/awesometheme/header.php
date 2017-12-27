<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Awesome Theme</title>
	<?php wp_head(); ?>
</head>

<?php 

// Home is the is blog posts are or the list of posts if you want the static page then its
// is_front_page();
	if(is_home()):
		$awesome_classes = array('awesome-class', 'my-class');
	else:
		$awesome_classes = array('no-awesome-class');
	endif;


 ?>
<body <?php body_class($awesome_classes); ?>>

 
	<?php wp_nav_menu(array("theme_location" => "primary")); 

		var_dump(get_custom_header());

	?>

	<img src=" <?php echo header_image() ?> " alt="" height = "<?php echo get_custom_header()->height; ?>" height = "<?php echo get_custom_header()->width; ?>">

	<img src="<?php echo get_custom_header()->url ?>" alt="" height = " <?php echo get_custom_header()->height; ?> " width = " <?php echo get_custom_header()->width ?> ">
	
 