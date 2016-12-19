<?php
/*
Template Name: Home Page 2015
*/
?>

<?php 
get_header(); 
//echo '<span style="color:black;position:relative;top:130px;">TEST = '.$deviceType.'</span>';
?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">

		<div class="outerwrap twelvecol first slider">
			
			<?php if($deviceType != 'phone') { // tablets and desktops ?>
			<div class="cycle-slideshow"
    			data-cycle-fx="scrollHorz"
    			data-cycle-speed="500" 
    			data-cycle-manual-speed="500"
    			data-cycle-timeout="3000"
    			data-cycle-swipe="true"
    			data-pause-on-hover="true"
    			data-slides="> div"
    			>
    			<!-- data-cycle-fx="scrollVertUp" -->
			<?php 
			if ( function_exists( 'ot_get_option' ) ) {
			$banner_images = ot_get_option( 'home_slider2', array() );
				$x = 1;
				foreach($banner_images as $info) {

				?>
				<div class="slider-bg">
					<?php if($info['slider_link'] != '') { 

						if($info['slider_target'] == '_blank') {
							$slider_rel = ' rel="nofollow"';
						} else {
							$slider_rel = '';
						}

						if(!isset($info['slider_target'])) {
							$info['slider_target'] = '_self';
						}
					?>
					<a href="<?php echo $info['slider_link']; ?>" target="<?php echo $info['slider_target']; ?>"<?php echo $slider_rel; ?>>
					<?php } ?>
					<img style="display:block;width:100%;" src="<?php echo $info['home_slider_bg2']; ?>" alt="<?php echo $info['home_slider_foreground_alt']; ?>" width="1400" height="580" />
					<?php if($info['slider_link'] != '') { ?>
					</a>
					<?php } ?>

					<?php 
					// Virgina Beach icon
					if($x == 1) { ?>


					<?php 
						if ( function_exists( 'ot_get_option' ) ) {
							$slider_image_link = ot_get_option( 'slider_image_link', array());
							// we only want to show the first image of the list
							// this way more than one can be saved and used at a later time.
							$slider_image_link = array_splice($slider_image_link,0,1);
							foreach($slider_image_link as $info) {
								?>
								<div id="virginia-beach-icon" style="background-image:url(<?php echo $info['image']; ?>);">
									<a href="<?php echo $info['link']; ?>"><?php echo $info['title']; ?></a>
									<div id="close">Close</div>
								</div>
								<?php
							}
						} // eof check
						?>


					<?php } ?>


				</div>
				<?php
				$x++;
				} // eof loop
			} // eof check
			?>
			<span class="cycle-pager"></span>
			</div>

			<?php } else { // phones only ?>

			<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$mobile_banner = ot_get_option( 'home_mobile_banner', array());
				// we only want to show the first image of the list
				// this way more than one can be saved and used at a later time.
				$mobile_banner = array_splice($mobile_banner,0,1);
				foreach($mobile_banner as $info) {
					?>
					<img src="<?php echo $info['image']; ?>" alt="<?php echo $info['description']; ?>" width="700" height="290" />
					<?php
				}
			} // eof check
			?>

			<?php } ?>


			
							
		
		</div> <?php // eof outwrap slider ?>


		<div class="outerwrap twelvecol first bg-gray boxes">
			<div id="three-boxes" class="inner-wrap">
					
			<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$home_boxes = ot_get_option( 'home_boxes', array());
				// we only want to show the first three of the list
				// this way more than one can be saved and used at a later time.
				$home_boxes = array_splice($home_boxes,0,4);

				$home_featured_beer = ot_get_option( 'home_featured_beer', array());
				$home_featured_beer = array_splice($home_featured_beer,0,4);

				$box_beer_imgs = array();
				$box_beer_img_alts = array();
				$x = 1;
				foreach($home_featured_beer as $beer) {

					$box_beer_imgs[$x] = $beer['image'];
					$box_beer_img_alts[$x] = $beer['description'];
					$x++;
				}
				
				$x = 1;

				foreach($home_boxes as $info) {
					if($x == 1) {$box_class = ' first';}
					elseif($x == 2 || $x == 3) {$box_class = '';}
					else {$box_class = ' last';}
					?>
					<div class="threecol<?php echo $box_class; ?>">
						<a href="<?php echo $info['link']; ?>"><img src="<?php echo $info['image']; ?>" alt="<?php echo $info['title']; ?>" width="327" height="327" /></a>
					<?php if(isset($box_beer_imgs[$x])  && $box_beer_imgs[$x] != '') { ?>
						<img src="<?php echo $box_beer_imgs[$x]; ?>" alt="<?php echo $box_beer_img_alts[$x]; ?>" width="90" height="355" class="featured-beer-bottle" />
					<?php } // eof x check ?>
					</div>
					<?php
				$x++;
				} // eof loop
			} // eof option check
			?>
		
			</div> <?php // end .inner-wrap ?>
		</div>


		<?php
		//if($deviceType != 'phone') {
		include_once('library/beer-locator-code.php');
		//} 
		?>


		<?php ?>

		<div class="outerwrap twelvecol first instagram-wrapper bg-gray clearfix">
			<div class="inner-wrap">
					
			<h2><span>Share your Green Flash experience</span> <a class="instagram-website" href="<?php echo $gfb_instagram; ?>">Instagram</a> <a class="instagram-hashtag" href="<?php echo $gfb_instagram; ?>">#greenflashbeer</a></h2>
			<div id="home-instagram" class="twelvecol first">
			<?php 

			do_action('gfb_show_tag_info'); 

			//gfb_gd_get_access_token();

			?>
			</div>
							
			</div> <?php // end .inner-wrap ?>
		</div>


		<?php ?>



		<?php include_once('tribe-events/includes/newsletter-signup-code.php'); ?>



		<div class="outerwrap twelvecol first bg-gray youtube">
			<div class="inner-wrap">
			
			<h2><span>Watch, enjoy and discover Green Flash</span> <a class="youtube-website" href="<?php echo $gfb_youtube; ?>">YouTube</a></h2>

			<?php if ( function_exists( 'ot_get_option' ) ) {
				$youtube_links = ot_get_option( 'home_youtube', array());
				// we only want to show the first three of the list
				// this way more than one can be saved and used at a later time.
				$youtube_links = array_splice($youtube_links,0,3);	
				$x = 1;
				//echo 'Test';
				foreach($youtube_links as $youtube) {
					if($x == 1) {$div_class = ' first';}
					elseif($x == 2) {$div_class = '';}
					else {$div_class = ' last';}
					
					?>
					<div class="fourcol<?php echo $div_class; ?>"><iframe width="325" height="183" src="<?php echo $youtube['home_youtube_link']; ?>" allowfullscreen></iframe></div>
					<?php


				$x++;
				}

				} 
				?>			
							
			</div> <?php // end .inner-wrap ?>
		</div>

		

		<div class="outerwrap twelvecol first ratereviewbeer">
			<div class="inner-wrap">
					
			<?php if($deviceType != 'phone') { ?>
			<p id="txt-enlighten">Taste Green Flash and enlighten others!</p>
			<?php } ?>
			<h2 id="txt-ratereview">Rate and Review</h2>
			<?php if($deviceType == 'phone') { ?>
			<p id="txt-enlighten">Taste Green Flash and enlighten others!</p>
			<?php } ?>
			<ul id="home-mobile-rate-review">
				<li><a href="http://www.ratebeer.com/brewers/green-flash-brewing-co/3111/" id="btn-ratebeer" target="_blank">Rate Beer</a></li>
				<li><a href="http://www.beeradvocate.com/beer/profile/2743/" id="btn-beer-advocate" target="_blank">Beer Advocate</a></li>

			</ul>			
			</div> <?php // end .inner-wrap ?>
		</div>

		<?php
		// if($deviceType == 'phone') {
		// include_once('library/beer-locator-code.php');
		// } 
		?>
		
		<div class="outerwrap twelvecol first tasteitonce bg-gray">
			<?php if($deviceType == 'phone') { ?>
			<img src="<?php bloginfo('template_directory'); ?>/images/home/tasteonce/the-perfect-ending-MOBILE.png" alt="The Perfect Ending" width="700" height="143" />
			<?php }	?>
			<div class="inner-wrap">
					
			<h2>THE PERFECT ENDING.</h2>

			<?php
			if ( function_exists( 'ot_get_option' ) ) {
				$taste_once = ot_get_option( 'home_taste_once' );
				echo '<p>'.$taste_once.'</p>';
			}
			?>
			<p class="for-mobile-only"><img id="taste-it-once-glass" src="<?php bloginfo('template_directory'); ?>/images/home/tasteonce/taste-it-once-glass.png" alt="Glass with beer in it." width="142" height="250" /></p>
					
			</div> <?php // end .inner-wrap ?>
		</div>

	</div> <?php // end #inner-content ?>


</div> <?php // end #content ?>

<?php get_footer(); ?>
