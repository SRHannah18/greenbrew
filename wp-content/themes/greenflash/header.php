<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8" />

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True" />
		<meta name="MobileOptimized" content="320" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f" />
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png" />
		<meta name="p:domain_verify" content="884f11f040210ec5be95e9667ec0003b" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php 
		global $deviceType;
		//global $gfb_class_new;
		?>
		<?php // wordpress head functions ?>
		<?php wp_head(); ?>

		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

		<!-- Facebook Pixel Code for PageView (INSTALLED BY KEMBREE, 2/17/16)-->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','//connect.facebook.net/en_US/fbevents.js');

		fbq('init', '418263148343947');
		fbq('track', "PageView");</script>
		<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=418263148343947&ev=PageView&noscript=1" /></noscript>
		<!-- End Facebook Pixel Code -->

		<!-- Facebook Conversion Code for Key Page Views Tracking Pixel (DEACTIVATED BY KEMBREE, 2/17/16) -->
		<!--
		<script>
		(function() { var _fbq = window._fbq || (window._fbq = []); if (!_fbq.loaded) { var fbds = document.createElement('script'); fbds.async = true; fbds.src = '//connect.facebook.net/en_US/fbds.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(fbds, s); _fbq.loaded = true; } })(); window._fbq = window._fbq || []; window._fbq.push(['track', '6028610765163', {'value':'0.00','currency':'USD'}]); </script>
		<noscript> <img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6028610765163&cd[value]=0.00&cd[currency]=USD&noscript=1" /> 			
		</noscript> 
		-->

	</head>

	<body <?php body_class(); ?>>


		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">
					<div class="inner-wrap">
						<?php if(is_page_template('template-home.php')) { ?>
						<h1 id="logo" class="h1"><a href="<?php echo home_url(); ?>/home/"><?php bloginfo('name'); ?></a></h1>
						<?php } else { ?>
						<p id="logo" class="h1"><a href="<?php echo home_url(); ?>/home/"><?php bloginfo('name'); ?></a></p>
						<?php } ?>
						<?php // bloginfo('description'); ?>

						<?php 
						
						if($deviceType == 'phone') { ?>

						<div id="mobile-nav-button">Navigation</div>

						<?php } ?>
						<a class="screen-reader-text" href="#content">Got to Content</a>
						<a class="screen-reader-text" href="#social-links-screen">Skip Main Navigation</a>
						<nav role="navigation" id="main-navigation">
							<?php bones_main_nav(); ?>
						</nav>

						<?php if($deviceType != 'phone') { // don't show social on mobile ?>
						<?php 
						global $gfb_facebook; 
						global $gfb_twitter;
						global $gfb_instagram;
						global $gfb_youtube;
						?>
						<a id="social-links-screen" class="screen-reader-text" href="#content">Skip Social Links</a>
						<ul id="social-links-header">
							<li><a target="_blank" href="<?php echo $gfb_facebook; ?>" id="facebook">Facebook</a></li>
							<li><a target="_blank" href="<?php echo $gfb_twitter; ?>" id="twitter">Twitter</a></li>
							<li><a target="_blank" href="<?php echo $gfb_instagram; ?>" id="instagram">Instagram</a></li>
							<li><a target="_blank" href="<?php echo $gfb_youtube; ?>" id="youtube">YouTube</a></li>
						</ul>

						<?php } ?>

						<div id="header-top-bar">
							<div>
							<?php if(is_user_logged_in()) { ?>
								<?php /*
								<a href="<?php bloginfo('wpurl'); ?>/distributor-landing-page/" class="button" id="partner-login">Distributor Pages</a>
								<a href="<?php bloginfo('wpurl'); ?>/retailers/" class="button" id="retailer-login">Retailer Pages</a>
								*/ ?>
								<a href="<?php echo wp_logout_url(home_url()); ?>" class="button logout" title="Logout">Logout</a>
							<?php } else { ?>
								<?php /*
								<a href="<?php bloginfo('wpurl'); ?>/wp-login.php" class="button" id="partner-login">Partner Login</a>
								*/ ?>

								<a href="https://distributor-portal-gfbc.myshopify.com/account/login" class="button" id="partner-login">Partner Login</a>
								
							<?php } ?>
							</div>

							<?php
							//$items_test = 5;
							//if($items_test > 0) {$cart_class = ' full';} else {$cart_class = '';}
							?>

							<!-- <div><a href="" class="button<?php //echo $cart_class; ?>" id="my-cart"><span class="cart-status">&nbsp;</span>My Cart<span class="cart-items">(<?php //echo $items_test; ?>)</span></a></div> -->
							<div id="header-search">
								<?php get_search_form(); ?>
							</div>
						</div>

					</div> <?php // end .inner-wrap ?>
				</div> <?php // end #inner-header ?>

			</header> <?php // end header ?>