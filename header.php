<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
		<title><?php wp_title('|', true, 'right'); ?></title>
		<?php wp_head(); ?>
	</head>
	<body>
		<!-- Secondary Nav -->
		<?php wp_nav_menu( array( 'theme_location'=>'secondary' ) ); ?>
		<header>
			<img alt="" src="<?php header_image(); ?>">
		</header>
		<!-- Primary Nav -->
		<?php wp_nav_menu( array( 'theme_location'=>'primary' ) ); ?>

		<!-- begin inner wrapper -->
		<div class="wrapper">
