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

 
	<?php wp_nav_menu(array("theme_location" => "primary")); ?>
	
 