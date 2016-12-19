<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
		<meta name="p:domain_verify" content="884f11f040210ec5be95e9667ec0003b"/>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		
		<?php wp_head(); ?>
		
		<?php 
		global $deviceType;
		//global $gfb_class_new; 
		?>

		<style>
		<?php

		//if($deviceType != 'phone') {

			if ( function_exists( 'ot_get_option' ) ) {
			$splash_bg_desktop = ot_get_option('splash_bg_desktop'); ?>
			@media only screen and (min-width: 768px) {

				.page-template-template-splash-php {background-image: url(<?php echo $splash_bg_desktop; ?>);}
			}

			<?php } // eof check 

		//} else { // eof phone check

			if ( function_exists( 'ot_get_option' ) ) {
			$splash_bg_mobile = ot_get_option('splash_bg_mobile'); ?>

			@media only screen and (max-width: 767px) {

				.page-template-template-splash-php {background-image: url(<?php echo $splash_bg_mobile; ?>);}
			}

			<?php } // eof check 

			

		// } ?>
	
		</style>

	</head>

	<body <?php body_class(); ?>>
	<div id="container">
	<header class="header" role="banner">
	<h1 id="logo" class="h1"><a href="<?php echo home_url(); ?>/home/"><?php bloginfo('name'); ?></a></h1>
	</header> <?php // end header ?>
