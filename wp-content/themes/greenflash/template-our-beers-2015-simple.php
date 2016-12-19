<?php
/*
Template Name: Our Beers 2015 V. 2
*/
?>

<?php 
get_header(); 

if(!isset($deviceType)) {$deviceType = 'computer';}
?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<?php if($deviceType != 'phone') { ?>

		<div id="main-beer-image" class="outerwrap twelvecol first discover">


			<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$beer_banner = ot_get_option( 'beer_hero_image', array());
				// we only want to show the first image of the list
				// this way more than one can be saved and used at a later time.
				$beer_banner = array_splice($beer_banner,0,1);
				foreach($beer_banner as $info) {
					?>
					<h1><?php echo $info['title']; ?></h1>
					<img src="<?php echo $info['image']; ?>" alt="<?php echo $info['description']; ?>" width="1400" height="300" />
					<?php
				}
			} // eof check
			?>
		</div>

		

		<div id="beer-nav" class="outerwrap twelvecol first">
			<div class="inner-wrap">
			<nav role="navigation">
				<ul class="nav">
					<li><a href="#national">Year Round Beers</a></li>
					<li><a href="#seasonal">Limited Release</a></li>
					<li><a href="#hop">Hop Odyssey</a></li>
					<li><a href="#cellar-3-main">Cellar 3</a></li>
					<?php // <li><a href="#discovery-pack">Discovery Pack</a></li> ?>
					<?php // <li><a href="#barrel">Barrel Aged</a></li> ?>
					<li><a href="#genuis2">Genius Lab</a></li>
					<?php // <li><a href="#limited">Limited &amp; Special Release</a></li> ?>
					<li><a href="#calendar">Release Calendar</a></li>
					<li><a href="#find-beer">Beer Locator</a></li>
				</ul>
			</nav>
							
			</div> <?php // end .inner-wrap ?>
		</div>


		<?php
		//*************************************
		//*************************************
		// YEAR ROUND
		//*************************************
		//*************************************

		?>

		<?php if ( function_exists( 'ot_get_option' ) ) {
				$year_round_heading_image = ot_get_option( 'year_round_heading_image');
				$year_round_heading_text = ot_get_option( 'year_round_heading_text');
				$year_round_bg_image = ot_get_option( 'year_round_bg_image');
			} ?>

		<div id="national" class="outerwrap twelvecol first beer-types">
			<div class="inner-wrap">
				
				<div class="constant-text">
				<h2 style="background-image:url(<?php echo $year_round_heading_image; ?>);"><?php echo $year_round_heading_text; ?></h2>
				</div>
				
			<div id="slide-beers" class="slide-overlay">
				<ul>

			<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$beer_lineup_ntl_bottles = ot_get_option( 'beer_lineup_ntl_bottles', array());
				$beer_lineup_ntl_bottles = array_splice($beer_lineup_ntl_bottles,0,13);
				$x = 1;
				foreach($beer_lineup_ntl_bottles as $info) {
				if($x % 11 == 1) {$li_class = ' class="first"';}
				elseif($x % 11 == 0) {$li_class = ' class="last"';}
				else {$li_class = '';}
				if($deviceType != 'phone') {
					$beer_image = $info['beer_natl_lineup_image'];
				} else {
					$beer_image = $info['beer_natl_lineup_image2'];
				}
				?>
				<li<?php echo $li_class; ?>><a href="<?php echo $info['beer_natl_lineup_url']; ?>"><img src="<?php echo $beer_image; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="79" height="324" /><span><?php echo $info['title']; ?></span></a><span class="glow"></span></li>
				<?php
				$x++;
				}
			} // eof check
			?>
				</ul>
			</div>
				
							
			</div> <?php // end .inner-wrap ?>

			
			
			<div id="slide-initial-1" class="slide-initial" style="background-image:url(<?php echo $year_round_bg_image; ?>);">
			</div>


		</div> <?php // end .outer-wrap #national ?>


		<?php // START SEASONAL ?>
		

		<?php if ( function_exists( 'ot_get_option' ) ) {
		$seasonal_heading_image = ot_get_option('seasonal_heading_image');
		$seasonal_heading_text = ot_get_option('seasonal_heading_text');
		$seasonal_background_image = ot_get_option( 'seasonal_background_image');
		} ?>

		<div id="seasonal"  style="background-image:url(<?php echo $seasonal_background_image; ?>);" class="outerwrap twelvecol first beer-types">
			<div id="slide-seasonal" class="inner-wrap">
				<div class="slide-overlay">
				<h2 style="background-image:url(<?php echo $seasonal_heading_image; ?>);"><?php echo $seasonal_heading_text; ?></h2>
				<ul>
				<?php	if ( function_exists( 'ot_get_option' ) ) {
				$seasonal_beer_bottles = ot_get_option( 'seasonal_beer_bottles', array());
				$seasonal_beer_bottles = array_splice($seasonal_beer_bottles,0,13);
				$x = 1;
				foreach($seasonal_beer_bottles as $info) {
				if($x % 11 == 1) {$li_class = ' class="first"';}
				elseif($x % 11 == 0) {$li_class = ' class="last"';}
				else {$li_class = '';}
				if($deviceType != 'phone') {
					$beer_image = $info['seasonal_beer_image_desktop'];
				} else {
					$beer_image = $info['seasonal_beer_image_mobile'];
				}
				?>
					<li><a href="<?php echo $info['seasonal_beer_link']; ?>"><img src="<?php echo $beer_image; ?>"><span><?php echo $info['title']; ?></span></a><span class="dates">&nbsp;</span><span class="glow"></span></li>

				<?php 
					} 
				} 
				?>
					
				</ul>
				</div>
			</div>
		</div>
		<?php // END SEASONAL ?>

		<?php // START HOP ODYSSEY ?>


		<?php if ( function_exists( 'ot_get_option' ) ) {
		$hop_odyssey_heading_image = ot_get_option('hop_odyssey_heading_image');
		$hop_odyssey_heading_text = ot_get_option('hop_odyssey_heading_text');
		$hop_odyssey_background_image = ot_get_option( 'hop_odyssey_background_image');
		} ?>


		<div id="hop" class="outerwrap twelvecol first beer-types">
			<div class="inner-wrap">
				
				<div class="constant-text">
				<h2 style="background-image:url(<?php echo $hop_odyssey_heading_image; ?>);"><?php echo $hop_odyssey_heading_text; ?></h2>
				</div>
				
			<div id="slide-kegs" class="slide-overlay">
				<ul>

			<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$beer_hop_odyssey_kegs = ot_get_option( 'beer_hop_odyssey_kegs', array());
				$beer_hop_odyssey_kegs = array_splice($beer_hop_odyssey_kegs,0,6);

				$hop_beer_images = array();
				$hop_beer_alts = array();
				$x = 1;
				foreach($beer_hop_odyssey_kegs as $info) {
				if($deviceType != 'phone') {
					$beer_image = $info['beer_keg_image'];
					$hop_beer_images[$x] = $beer_image;
					$hop_beer_alts[$x] = $info['title']; 
				} else {
					$beer_image = $info['beer_keg_image2'];
				}
				?>
				<li><a href="<?php echo $info['beer_keg_link']; ?>"><img src="<?php echo $beer_image; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="79" height="324" /><span><?php echo $info['title']; ?></span></a><span class="glow"></span></li>
				<?php
				$x++;
				}
			} // eof check
			?>
				</ul>
			</div>
				
							
			</div> <?php // end .inner-wrap ?>

			
			
			<div id="slide-initial-2" class="slide-initial" style="background-image:url(<?php echo $hop_odyssey_background_image; ?>);">
			</div>

		</div>

		<?php 
		// BEGIN CELLAR 3
		//*************************************
		//*************************************
		//*************************************
		?>

		<?php if ( function_exists( 'ot_get_option' ) ) {
		$cellar_3_heading_text = ot_get_option('cellar_3_heading_text');
		$cellar_3_heading_image = ot_get_option('cellar_3_heading_image');
		$cellar_3_background_image = ot_get_option( 'cellar_3_background_image');
		} ?>

		
		<div id="cellar-3-main" class="outerwrap twelvecol first beer-types">

			<div class="inner-wrap">
				
				<div class="constant-text">
				<h2 style="background-image:url(<?php echo $cellar_3_heading_image; ?>);"><?php echo $cellar_3_heading_text; ?></h2>
				</div>


			<div id="slide-cellar-3" class="slide-overlay">
				<ul>

			<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$beer_barrel_aged_bottles = ot_get_option( 'beer_barrel_aged_bottles', array());
				$beer_barrel_aged_bottles = array_splice($beer_barrel_aged_bottles,0,9);

				$hop_beer_images = array();
				$hop_beer_alts = array();
				$x = 1;
				foreach($beer_barrel_aged_bottles as $info) {
				if($deviceType != 'phone') {
					$beer_image = $info['barrel_aged_image'];
					$hop_beer_images[$x] = $beer_image;
					$hop_beer_alts[$x] = $info['title']; 
				} else {
					$beer_image = $info['barrel_aged_image2'];
				}
				?>
				<li><a href="<?php echo $info['beer_barrel_link']; ?>"><img src="<?php echo $beer_image; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="79" height="324" /><span><?php echo $info['title']; ?></span></a><span class="dates">&nbsp;</span><span class="glow"></span></li>
				<?php
				$x++;
				}
			} // eof check
			?>
				</ul>
			</div>
				
			</div>

			<div id="slide-initial-cellar" class="slide-initial" style="background-image:url(<?php echo $cellar_3_background_image; ?>);">
			</div>	
		
		</div>



		<?php 
		// BEGIN DISCOVERY PACK
		//*************************************
		//*************************************
		//*************************************
		/*
		?>

		<?php if ( function_exists( 'ot_get_option' ) ) {
		$discovery_pack_heading_text = ot_get_option('discovery_pack_heading_text');
		$discovery_pack_heading_image = ot_get_option('discovery_pack_heading_image');
		$discovery_pack_background_image = ot_get_option('discovery_pack_background_image');
		$discovery_pack_main_image = ot_get_option('discovery_pack_main_image');
		$discovery_pack_main_link = ot_get_option('discovery_pack_main_link');
		} ?>

		<div id="discovery-pack" class="outerwrap twelvecol first beer-types">
			<div class="inner-wrap">
				
				<div class="constant-text">
				<h2 style="background-image:url(<?php echo $discovery_pack_heading_image; ?>);"><?php echo $discovery_pack_heading_text; ?></h2>
				</div>
				
			<div id="slide-discovery" class="slide-overlay">
				<a href="<?php echo $discovery_pack_main_link; ?>"><img src="<?php echo $discovery_pack_main_image; ?>" alt="<?php echo $discovery_pack_heading_text; ?> Photo" width="" /></a>
			</div>
				
							
			</div> <?php // end .inner-wrap ?>

			
			
			<div id="slide-initial-4" class="slide-initial" style="background-image:url(<?php echo $discovery_pack_background_image; ?>);">
			</div>

		</div>

		 */ ?>

		<?php 
		// BEGIN GENUIS LABS
		//*************************************
		//*************************************
		//*************************************
		?>

		<?php if ( function_exists( 'ot_get_option' ) ) {
			$genius_lab_heading_text = ot_get_option('genius_lab_heading_text');
			$genius_lab_heading_image = ot_get_option('genius_lab_heading_image');
			$genius_lab_background_image = ot_get_option('genius_lab_background_image');
			$genius_lab_content = ot_get_option('genius_lab_content');
			$genius_lab_link = ot_get_option('genius_lab_link');
			//$CHANGE = ot_get_option('CHANGE', array());
		} ?>
		<div id="genuis2" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				
				<div class="constant-text">
				<a href="<?php echo $genius_lab_link; ?>"><h2 style="background-image:url(<?php echo $genius_lab_heading_image; ?>);"><?php echo $genius_lab_heading_text; ?></h2></a>
				
				</div>
				
			<div id="slide-genuis2" class="slide-overlay">
				<p><a href="<?php echo $genius_lab_link; ?>"><?php echo $genius_lab_content; ?></a></p>
				
			</div>
				
							
			</div> <?php // end .inner-wrap ?>

			
			
<div id="slide-initial-5" class="slide-initial" 
style="background-image:url(<?php echo $genius_lab_background_image; ?>);"></div>


		</div> <?php // end .outer-wrap #national ?>

		<?php // EOF BARREL ROOM ?>

		<div id="calendar" class="outerwrap twelvecol first">
			<?php 
				if ( function_exists( 'ot_get_option' ) ) {
					$gfb_release_cal_link = ot_get_option('gfb_release_cal_link');
					?>
			<?php if($deviceType == 'phone') { ?>
					<a href="<?php echo $gfb_release_cal_link; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/release-calendar/release-calendar-mobile.jpg" alt="Release Calendar" width="700" height="150" /></a>
			<?php } ?>
			<div class="inner-wrap">

				
					<h2 class="image-replacement2 desktop-only desktop-block">Release Calendar</h2>
					<?php if($deviceType != 'phone') { ?>

					
					<p><a id="view-calendar" href="<?php echo $gfb_release_cal_link; ?>">Show Me Now</a></p>

					<?php } ?>
					


					<?php
					
				} // eof check
			?>
							
			</div> <?php // end .inner-wrap ?>
		</div>

		<?php include_once('library/beer-locator-code.php'); ?>


		<?php
		//*******************************************
		//*******************************************
		//*******************************************
		// START MOBILE BEERS...
		//*******************************************
		//*******************************************
		//******************************************* 
		} else { 
		?>


		<?php 
		// BEGIN BEERS w/Colored Backgrounds
		//*************************************
		//*************************************
		//*************************************
		?>

		<ul id="beer-list-color-bgs">

		<?php

		if ( function_exists( 'ot_get_option' ) ) {
  
		  /* get the slider array */
		  $mobile_beers = ot_get_option( 'gfb_mobile_beer_colored_bg', array() );
		  
		  if ( ! empty( $mobile_beers ) ) {

		    foreach( $mobile_beers as $beer ) { ?>

		    <li><a href="<?php echo $beer['gfb_bg_beer_link']; ?>"><img src="<?php echo $beer['gfb_bg_beer_image']; ?>" alt="<?php echo $beer['gfb_bg_beer_title']; ?>" width="420" height="420" /></a></li>


		    <?php
		      
		    }
		  }
		  
		}


		?>

		</ul> <?php // eof beer list ul ?>




		
		
				
							
			


		<?php 
		// BEGIN DISCOVERY PACK
		//*************************************
		//*************************************
		//*************************************
		?>

		<?php // if ( function_exists( 'ot_get_option' ) ) {
		// $discovery_pack_heading_text = ot_get_option('discovery_pack_heading_text');
		// $discovery_pack_heading_image = ot_get_option('discovery_pack_heading_image');
		// $discovery_pack_background_image = ot_get_option('discovery_pack_background_image');
		// $discovery_pack_main_image = ot_get_option('discovery_pack_main_image');
		// $discovery_pack_main_link = ot_get_option('discovery_pack_main_link');
		// } ?>

		<?php /* 

		<div id="discovery-pack" class="outerwrap twelvecol first beer-types bg-black">
			<div class="inner-wrap">
				
				<div class="constant-text">
				<h2 class="image-replacement" style="background-image:url(<?php echo $discovery_pack_heading_image; ?>);"><?php echo $discovery_pack_heading_text; ?></h2>
				</div>
				
			<div id="slide-discovery" class="slide-overlay">
				<a href="<?php echo $discovery_pack_main_link; ?>"><img src="<?php echo $discovery_pack_main_image; ?>" alt="<?php echo $discovery_pack_heading_text; ?> Photo" width="" /></a>
			</div>
				
							
			</div> <?php // end .inner-wrap ?>


		</div>

		*/ ?>

		<?php 
		// BEGIN GENUIS LABS
		//*************************************
		//*************************************
		//*************************************
		?>

		<?php if ( function_exists( 'ot_get_option' ) ) {
			$genius_lab_heading_text = ot_get_option('genius_lab_heading_text');
			$genius_lab_heading_image = ot_get_option('genius_lab_heading_image');
			$genius_lab_background_image = ot_get_option('genius_lab_background_image_mobile_2');
			$genius_lab_content = ot_get_option('genius_lab_content');
			$genius_lab_link = ot_get_option('genius_lab_link');
			//$CHANGE = ot_get_option('CHANGE', array());
		} ?>
		<div id="genuis2" class="outerwrap twelvecol first bg-black" style="background-image:url(<?php echo $genius_lab_background_image; ?>);">
			<div class="inner-wrap">
				
				<div class="constant-text">
				<a href="<?php echo $genius_lab_link; ?>"><h2 class="image-replacement" style="background-image:url(<?php echo $genius_lab_heading_image; ?>);"><?php echo $genius_lab_heading_text; ?></h2></a>
				
				</div>
				
			<div id="slide-genuis2" class="slide-overlay">
				<p><a href="<?php echo $genius_lab_link; ?>"><?php echo $genius_lab_content; ?></a></p>
				
			</div>
				
							
			</div> <?php // end .inner-wrap ?>


		</div> <?php // end .outer-wrap #national ?>

		<?php // EOF BARREL ROOM ?>

		<div id="calendar" class="outerwrap twelvecol first">
			<?php 
				if ( function_exists( 'ot_get_option' ) ) {
					$gfb_release_cal_link = ot_get_option('gfb_release_cal_link');
					?>
			
			<div class="inner-wrap">

				
					<h2 class="image-replacement">Release Calendar</h2>
				
					<p><a class="cellar-3-buttons" id="view-calendar" href="<?php echo $gfb_release_cal_link; ?>">Show Me Now</a></p>

					
					


					<?php
					
				} // eof check
			?>
							
			</div> <?php // end .inner-wrap ?>
		</div>

		<div id="find-beer-mobile" class="outerwrap twelvecol first bg-gray">
			<div class="inner-wrap">
				<h2 class="image-replacement">Beer Locator</h2>
				
					<p><a class="cellar-3-buttons" href="<?php bloginfo('wpurl'); ?>/find-beer/">Find Beer</a></p>
			</div>
		</div>



		

		<?php } 
		//*******************************************
		//*******************************************
		// EOF MOBILE
		//*******************************************
		//*******************************************

		?>

		
















































		

		



	</div> <?php // end #inner-content ?>
</div> <?php // end #content ?>

<?php get_footer(); ?>
