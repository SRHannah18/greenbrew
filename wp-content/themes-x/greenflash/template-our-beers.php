<?php
/*
Template Name: Our Beers
*/
?>

<?php 
get_header(); 
//echo '<span style="color:black;position:relative;top:130px;">TEST = '.$deviceType.'</span><br />';
//global $gfb_facebook;
//echo '<span style="color:black;position:relative;top:130px;">TEST = '.$gfb_facebook.'</span>';
if(!isset($deviceType)) {$deviceType = 'computer';}
?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		

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

		<?php if($deviceType != 'phone') { ?>

		<div id="beer-nav" class="outerwrap twelvecol first">
			<div class="inner-wrap">
			<nav role="navigation">
				<ul class="nav">
					<li><a href="#national">Year Round Beers</a></li>
					<li><a href="#hop">Hop Odyssey</a></li>
					<li><a href="#discovery-pack">Discovery Pack</a></li>
					<?php // <li><a href="#barrel">Barrel Aged</a></li> ?>
					<li><a href="#genius">Genius Lab</a></li>
					<?php // <li><a href="#limited">Limited &amp; Special Release</a></li> ?>
					<li><a href="#calendar">Release Calendar</a></li>
					<li><a href="#find-beer">Beer Locator</a></li>
				</ul>
			</nav>
							
			</div> <?php // end .inner-wrap ?>
		</div>

		<div id="national" class="outerwrap twelvecol first beer-types">
			<div class="inner-wrap">
				
				<div class="constant-text">
				<h2>Year Round Beers</h2>
				<h3 class="hide">Taste enlightenment&trade;</h3>
				<p><a data-overlay="slide-beers" data-initial="slide-initial-1" data-secondary="slide-secondary-1" id="learn-more-1" data-child-button="close-more-1" data-class="learn-more" class="learn-more desktop-only">Learn More</a></p>
				<p class="flash-of-genius hide">Experience a Flash of Genius</p>
				<p><a data-overlay="slide-beers" data-initial="slide-initial-1" data-secondary="slide-secondary-1" id="close-more-1" data-parent-button="learn-more-1" data-class="close-more" class="close-more image-replacement2 desktop-only">Close</a></p>
				</div>
				
			<div id="slide-beers" class="slide-overlay">
				<ul>

			<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$beer_lineup_ntl_bottles = ot_get_option( 'beer_lineup_ntl_bottles', array());
				$beer_lineup_ntl_bottles = array_splice($beer_lineup_ntl_bottles,0,11);
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
				<li<?php echo $li_class; ?>><a href="<?php echo $info['beer_natl_lineup_url']; ?>"><img src="<?php echo $beer_image; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="79" height="324" /><span><?php echo $info['title']; ?></span></a><span class="dates"><?php echo $info['beer_natl_lineup_dates']; ?></span><span class="glow"></span></li>
				<?php
				$x++;
				}
			} // eof check
			?>
				</ul>
			</div>
				
							
			</div> <?php // end .inner-wrap ?>

			
			
			<div id="slide-initial-1" class="slide-initial">
			</div>
			<div id="slide-secondary-1" class="slide-secondary">
				<div class="inner-wrap">
				<img src="<?php bloginfo('template_directory'); ?>/images/our-beers/txt-flash-of-genius.png" alt="Flash of Genius" width="500" height="159" />

				<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$beer_lineup = ot_get_option( 'beer_lineup', array());
				// we only want to show the first image of the list
				// this way more than one can be saved and used at a later time.
				$beer_lineup = array_splice($beer_lineup,0,1);
				foreach($beer_lineup as $info) {
					?>
					<h3><?php echo $info['title']; ?></h3>
					<p><?php echo $info['beer_lineup_content']; ?></p>
					<?php
				}
			} // eof check
			?>

				</div>
			</div>


		</div> <?php // end .outer-wrap #national ?>


		<?php // START SEASONAL ?>

		<div id="seasonal" class="outerwrap twelvecol first beer-types">
			<div id="slide-seasonal" class="inner-wrap">
				<div class="slide-overlay">
				<h2>Seasonal Releases: Discover Our Passion</h2>
				<ul>
					<li><a href="<?php bloginfo('wpurl'); ?>/our-beers/palate-wrecker/"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/palate-wrecker.png"><span>Palate Wrecker</span></a><span class="dates"></span><span class="glow"></span></li>
					<li><a href="<?php bloginfo('wpurl'); ?>/our-beers/road-warrior/"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/road-warrior.png"><span>Road Warrior</span></a><span class="dates"></span><span class="glow"></span></li>
					<li><a href="<?php bloginfo('wpurl'); ?>/our-beers/green-bullet/"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/green-bullet.png"><span>Green Bullet</span></a><span class="dates"></span><span class="glow"></span></li>
					
				</ul>
				</div>
			</div>
		</div>

		<?php // END SEASONAL ?>


		<div id="hop" class="outerwrap twelvecol first beer-types">
			<div class="inner-wrap">
				
				<div class="constant-text">
				<h2>Hop Odyssey</h2>
				<h3 class="hide">Set sail on six hoppy adventures!</h3>
				<p><a data-overlay="slide-kegs" data-initial="slide-initial-2" data-secondary="slide-secondary-2" data-child-button="close-more-2" data-class="learn-more" id="learn-more-2" class="learn-more desktop-only">Learn More</a></p>
				<p class="hop-odyssey hide">Hop Odyssey</p>
				<p><a data-overlay="slide-kegs" data-initial="slide-initial-2" data-secondary="slide-secondary-2" id="close-more-2" data-parent-button="learn-more-2" data-class="close-more" class="close-more image-replacement2 desktop-only">Close</a></p>
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
				<li><a href="<?php echo $info['beer_keg_link']; ?>"><img src="<?php echo $beer_image; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="79" height="324" /><span><?php echo $info['title']; ?></span></a><span class="dates"><?php echo $info['beer_keg_date']; ?></span><span class="glow"></span></li>
				<?php
				$x++;
				}
			} // eof check
			?>
				</ul>
			</div>
				
							
			</div> <?php // end .inner-wrap ?>

			
			
			<div id="slide-initial-2" class="slide-initial">
			</div>
			<div id="slide-secondary-2" class="slide-secondary">
				<div class="inner-wrap">
<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$beer_hop = ot_get_option( 'hop_odyssey_content_2', array());
				// we only want to show the first image of the list
				// this way more than one can be saved and used at a later time.
				$beer_hop = array_splice($beer_hop,0,1);
				foreach($beer_hop as $info) {
					?>
					<div class="hop-content">
					<?php /*
					<h3><?php echo $info['title']; ?><br />
						<span class="image-replacement2"><?php echo $info['hop_odyssey_content_2_sub_title']; ?></span></h3>
					*/ ?>
					<p><?php echo $info['hop_odyssey_content_2_main']; ?></p>
					</div>
					

						<?php if($info['hop_odyssey_content_2_img_middle'] != '') { ?>
						<div id="hop-image-middle">
							<img src="<?php echo $info['hop_odyssey_content_2_img_middle']; ?>" alt="<?php echo $info['hop_odyssey_content_2_img_middle_alt']; ?>" />
						</div>
						<?php } else { ?> 
						<div id="six-beer-bottles">
						<ul>
							<?php
							for($x = 1;$x < 7;$x++) {
							?>
							<li class="beer-<?php echo $x; ?>"><img src="<?php echo $hop_beer_images[$x]; ?>" alt="<?php echo $hop_beer_alts[$x]; ?>" /></li>
							<?php	
							}
							?>
						</ul>
						</div>
						<?php } ?>
					
					<div id="hop-odyssey-logo">
						<img src="<?php echo $info['hop_odyssey_content_2_img_right']; ?>" alt="<?php echo $info['hop_odyssey_content_2_img_right_alt']; ?>" />
					</div>
					<?php
				}
			} // eof check
			?>

				</div>
			</div>

		</div>



		
		<div id="cellar" class="outerwrap twelvecol first beer-types" style="height:auto;">

			<div class="wrap">
				<h2><a href="<?php bloginfo('wpurl'); ?>/cellar3/">Craft Evolves Into Artistry. Learn More.</a></h2>
				<!-- <h3 class="image-replacement"><a href="<?php bloginfo('wpurl'); ?>/cellar3/">Cellar 3</a></h3> -->
				<a href="<?php bloginfo('wpurl'); ?>/cellar3/"><img alt="Cellar 3" id="cellar-3" src="<?php bloginfo('template_directory'); ?>/images/our-beers/txt-cellar-3.png" /></a>
				</div>
				
				<a href="<?php bloginfo('wpurl'); ?>/cellar3/"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/cellar-3-beer-page3.jpg" style="width:100%;height:auto;" width="1662" height="477" alt="Craft evolves into artistry. Learn more. Cellar 3." /></a>

				
		
		</div>



		<?php 
		// BEGIN DISCOVERY PACK
		//*************************************
		//*************************************
		//*************************************
		?>

		<div id="discovery-pack" class="outerwrap twelvecol first beer-types">
			<div class="inner-wrap">
				
				<div class="constant-text">
				<h2>Discovery Pack</h2>
				<h3 class="hide">Explore our Craft</h3>
				<p><a data-overlay="slide-discovery" data-initial="slide-initial-4" data-secondary="slide-secondary-4" data-child-button="close-more-4" data-class="learn-more" id="learn-more-4" class="learn-more desktop-only">Learn More</a></p>
				<p class="discovery-pack hide">Discovery Pack</p>
				<p><a data-overlay="slide-discovery" data-initial="slide-initial-4" data-secondary="slide-secondary-4" id="close-more-4" data-parent-button="learn-more-4" data-class="close-more" class="close-more image-replacement2 desktop-only">Close</a></p>
				</div>
				
			<div id="slide-discovery" class="slide-overlay">
				<a href="<?php bloginfo('wpurl'); ?>/our-beers/discoverypack/"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/discovery-pack-line-up-2.png" alt="CHANGE" width="1000" /></a>
			</div>
				
							
			</div> <?php // end .inner-wrap ?>

			
			
			<div id="slide-initial-4" class="slide-initial">
			</div>
			<div id="slide-secondary-4" class="slide-secondary">
				<div class="inner-wrap">

					<p class="sixcol last">Introducing our multi-pack for craft enthusiasts to explore our lineup of award winning ales. Our Discovery Pack includes 8 12 oz. bottles: 4 West Coast IPA, 2 Double Stout and 2 Hop Head Red. West Coast IPA, our most popular beer and most recognized brand, is our flagship beer. Double Stout is a year round high gravity dark beer that will balance the IPA assortment. Hop Head Red is a double red IPA  that is a unique style and a more approachable IPA.</p>
					<p class="sixcol first"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/discovery-pack-specs.png" alt="" /></p>

				</div>
			</div>

		</div>












		<?php /*

		<div id="barrel" class="outerwrap twelvecol first beer-types">
				<div class="inner-wrap">
				
				<div class="constant-text">
				<h2>Barrel Aged</h2>
				<h3 class="hide">The Journey is the Destination</h3>
				<p><a data-overlay="slide-bottles" data-initial="slide-initial-3" data-secondary="slide-secondary-3" data-child-button="close-more-3" data-class="learn-more" id="learn-more-3" class="learn-more desktop-only">Learn More</a></p>
				<p class="barrel-room hide">The Barrel Room</p>
				<p><a data-overlay="slide-bottles" data-initial="slide-initial-3" data-secondary="slide-secondary-3" id="close-more-3" data-parent-button="learn-more-3" data-class="close-more" class="close-more image-replacement2 desktop-only">Close</a></p>
				</div>
				
			<div id="slide-bottles" class="slide-overlay">
				<ul>
				<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$beer_barrel_aged_bottles = ot_get_option( 'beer_barrel_aged_bottles', array());
				$beer_barrel_aged_bottles = array_splice($beer_barrel_aged_bottles,0,3);
				foreach($beer_barrel_aged_bottles as $info) {
				if($deviceType != 'phone') {
					$beer_image = $info['barrel_aged_image'];
				} else {
					$beer_image = $info['barrel_aged_image2'];
				}
				?>
				<li><a href="<?php echo $info['beer_barrel_link']; ?>"><img src="<?php echo $beer_image; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="95" height="364" /><span><?php echo $info['title']; ?></span></a><span class="glow"></span></li>
				<?php
				}
			} // eof check
			?>
				</ul>
			</div>
				
							
			</div> <?php // end .inner-wrap ?>

			
			
			<div id="slide-initial-3" class="slide-initial">
			</div>
			<div id="slide-secondary-3" class="slide-secondary">
				<div class="inner-wrap">
				<h3 class="image-replacement2">The Barrel Room</h3>
				<!-- <p>A place where art and science quietly converge, The Barrel Room houses some of our most adventurous and experimental offerings. Here, beer is aged in a variety of wine and spirit barrels, with a menagerie of controlled and wild yeasts.  After resting for months, or even years, our barrel-aged ales offer the most complex flavor profiles that the Genius Lab dares imaginable. Visit The Barrel Room and discover the wild side of the Green Flash Experience.</p> -->

			<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$beer_barrel = ot_get_option( 'beer_barrel', array());
				// we only want to show the first image of the list
				// this way more than one can be saved and used at a later time.
				$beer_barrel = array_splice($beer_barrel,0,1);
				foreach($beer_barrel as $info) {
					?>
					<p><?php echo $info['beer_barrel_content']; ?></p>
					<?php
				}
			} // eof check
			?>


				</div>
			</div>





		</div> */ ?> <?php // EOF BARREL ROOM ?>


		<?php
		// START MOBILE BEERS... 
		} else { 
		?>

		<div id="mobile-beers" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<p style="padding-top:16px;"><em>Click on any beer below to find out more.</em></p>
				<?php
				$args = array(
				    'orderby'       => 'name', 
				    'order'         => 'DESC',
				); 
				$categories = get_terms('our_beers_cat', $args);

				foreach( $categories as $category ) { ?>

					<?php if($category->name != 'Hop Odyssey') { ?>

					<h2><?php echo $category->name; // Print the cat title ?></h2>
					
					<?php
					$args = array(
						'post_type' => 'gfb_our_beers',
						'order'		=> 'ASC',
						'orderby'	=> 'menu_order',
						'posts_per_page' => -1,
						'taxonomy' => $category->taxonomy,
						'term' => $category->slug,
					);

					// the query
					$the_query = new WP_Query( $args ); ?>

					<ul class="mobile-beers">

					<?php 
					if ( $the_query->have_posts() ) { 
					$x = 1;
					?>
											
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<?php 
					if ( get_post_meta( get_the_ID(), '_gfb_beer_mobile_main', true ) ) { 

					if($x % 4 == 0) {
						$mob_class = 'last';
					} elseif($x % 4 == 1) {
						$mob_class = 'first';
					} else {
						$mob_class = 'none';
					}

					?>				  
						
						<li class="<?php echo $mob_class; ?>"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_mobile_main', true ) ?>" alt="<?php the_title(); ?>" width="158" height="158" /></a></li>

					<?php } ?>

					<?php
					$x++; 
					endwhile; 
					?>

					</ul>

					<?php wp_reset_postdata(); ?>

					<?php } ?>


					<?php } else { ?>


					<div class="twelvecol first">
					<h2>Hop Odyssey&trade;</h2>
						<p><strong><em>Set sail on 3 hoppy adventures</strong></p>
				

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
				<span style="display:inline-block;margin-right:20px;"><a href="<?php echo $info['beer_keg_link']; ?>"><img src="<?php echo $beer_image; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="79" height="324" /><br /><span><?php echo $info['title']; ?></span></a><br /><span class="dates"><?php echo $info['beer_keg_date']; ?></span></span> 
				<?php
				$x++;
				}
			} // eof check
			?>
		</div>

		<?php // START SEASONAL ?>

		<div id="seasonal" class="outerwrap twelvecol first beer-types">
			<div id="slide-seasonal" class="inner-wrap">
				<div class="slide-overlay">
				<h2 style="padding-top:24px;">Seasonal Releases</h2>
				<p><strong>Discover Our Passion</strong></p>
				<ul>
					<li style="display:inline-block;margin-right:20px;text-align:center;"><a href="<?php bloginfo('wpurl'); ?>/our-beers/palate-wrecker/"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/palate-wrecker.jpg"><br /><span>Palate<br />Wrecker</span></a><span class="dates"></span></li>
					<li style="display:inline-block;margin-right:20px;text-align:center;"><a href="<?php bloginfo('wpurl'); ?>/our-beers/road-warrior/"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/road-warrior.jpg"><br /><span>Road<br />Warrior</span></a><span class="dates"></span></li>
					<li style="display:inline-block;margin-right:20px;text-align:center;"><a href="<?php bloginfo('wpurl'); ?>/our-beers/green-bullet/"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/green-bullet.jpg"><br /><span>Green<br />Bullet</span></a><span class="dates"></span></li>
					
				</ul>
				</div>
			</div>
		</div>

		<?php // END SEASONAL ?>
				
			


						<?php /*
						<h2>Hop Odyssey&trade;</h2>
						<p><strong><em>Limited Release Series</em> Coming 02.27.15</strong></p>
						<p><a href="http://www.greenflashbrew.com/2015hopodyssey/"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/hop-odyssey-coming-february-mobile.jpg" style="width:100%;height:auto;" width="700" height="201" alt="Hop Odyssey&trade; Limited Relsease Series. Comming 02.27.15" /></a></p> */ ?>
					<?php } ?>

				<?php }  ?>

				<div id="cellar" class="outerwrap twelvecol first beer-types" style="height:auto;">
			
	
				<a href="<?php bloginfo('wpurl'); ?>/cellar3/"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/cellar-3-beer-page-mobile3.jpg" style="width:100%;height:auto;" width="700" height="305" alt="Craft evolves into artistry. Learn more. Cellar 3." /></a>
		
		</div>



			<h2>Discovery Pack</h2>
			<p><a href="<?php bloginfo('wpurl'); ?>/our-beers/discoverypack/"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/discovery-pack-line-up-mobile-2.jpg" alt="The Discovery Pack Box and 8 bottles of beer. 2 Hop Head Red, 4 West Coast IPA, 2 Double Stout" /></a></p>

			<p>Introducing our multi-pack for craft enthusiasts to explore our lineup of award winning ales. Our Discovery Pack includes 8 12 oz. bottles: 4 West Coast IPA, 2 Double Stout and 2 Hop Head Red. West Coast IPA, our most popular beer and most recognized brand, is our flagship beer. Double Stout is a year round high gravity dark beer that will balance the IPA assortment. Hop Head Red is a double red IPA  that is a unique style and a more approachable IPA.</p>
			<p style="background:#383838;padding:12px 6px;text-align:center;"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/discovery-pack-specs.png" alt="A multi-pack for Craft Enthusiasts. 8 Doubles. 2 Double Stout. 4 West Coast IPA. 2 Hop Head Red." /></p>

			</div>	
		</div>

		<?php } ?>

		<div id="genuis2" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				
				<div class="constant-text">
				<h2 class="image-replacement2">Gensis Labs</h2>
				<h3 class="hide">Limited Edition Brews</h3>
				<p><a data-overlay="slide-genuis2" data-initial="slide-initial-5" data-secondary="slide-secondary-5" id="learn-more-5" data-child-button="close-more-5" data-class="learn-more" class="learn-more desktop-only">Learn More</a></p>
				<p><a data-overlay="slide-genuis2" data-initial="slide-initial-5" data-secondary="slide-secondary-5" id="close-more-5" data-parent-button="learn-more-5" data-class="close-more" class="close-more image-replacement2 desktop-only">Close</a></p>
				</div>
				
			<!-- <div id="slide-genuis2" class="slide-overlay"></div> -->
				
							
			</div> <?php // end .inner-wrap ?>

			
			
			<div id="slide-initial-5" class="slide-initial"></div>
			<div id="slide-secondary-5" class="slide-secondary">
				<div class="inner-wrap">
					<div class="genius-content">
				<?php 
				if ( function_exists( 'ot_get_option' ) ) {
					$genius_lab = ot_get_option( 'genius_lab', array());
					// we only want to show the first image of the list
					// this way more than one can be saved and used at a later time.
					$genius_lab = array_splice($genius_lab,0,1);
					foreach($genius_lab as $info) {
						?>
						<?php /* <h3><?php echo $info['title']; ?> <span><?php echo $info['genius_lab_line_2']; ?></span></h3> */ ?>
						<p><?php echo $info['genius_lab_content']; ?></p>
						<?php
					}
				} // eof check
			?>
				</div>
				</div>
			</div>


		</div> <?php // end .outer-wrap #national ?>
















































		<?php 
		if ( function_exists( 'ot_get_option' ) ) {
			$beer_special = ot_get_option( 'beer_special', array());
			if(count($beer_special) > 0)
			{
		?>

		<div id="limited" class="outerwrap twelvecol first bg-gray">
			<div class="inner-wrap">
				
				<h2 class="image-replacement2">Limited &amp; Special Release</h2>

				<?php 
				//if ( function_exists( 'ot_get_option' ) ) {
					//$beer_special = ot_get_option( 'beer_special', array());
					// we only want to show the first image of the list
					// this way more than one can be saved and used at a later time.
					$beer_special = array_splice($beer_special,0,12);
					$x = 1;
					foreach($beer_special as $info) {

						if($x % 6 == 1) {$div_class = ' first';}
						elseif($x % 6 == 0) {$div_class = ' last';}
						else {$div_class = '';}
						?>
						<div class="twocol<?php echo $div_class; ?>"><a href="<?php echo $info['link']; ?>"><img src="<?php echo $info['image']; ?>" alt="<?php echo $info['description']; ?>" width="158" height="158" /></a></div>
						<?php
					$x++;
					} // eof real content

					$y = 6 -(($x-1) % 6);
					if($y != 6) // if the row is full don't add another row
					{

						for($z = 0; $z < $y; $z++)
						{
							if($x % 6 == 1) {$div_class = ' first';}
							elseif($x % 6 == 0) {$div_class = ' last';}
							else {$div_class = '';}
						?>
						<div class="twocol<?php echo $div_class; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/our-beers/limited-no-image.png" alt="default" width="158" height="158" /></div>
						<?php
						$x++;	
						}
					} // eof image placeholders

				
			?>

			</div> <?php // end .inner-wrap ?>
		</div>

		<?php 
			} // eof are there elements in the array
		} // eof check 
		?>

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



	</div> <?php // end #inner-content ?>
</div> <?php // end #content ?>

<?php get_footer(); ?>
