<?php
/*
Template Name: On Tap Beers
*/
?>
<?php 
get_header(); 
?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php
					// Only show the banner image if there is one
					//echo 'DEVICE ' . $deviceType; // works
					if ( has_post_thumbnail() ) { 
						$page_title_class = '';
					?>
						<div class="page-banner-image">
							<?php if($deviceType != 'phone') { ?>
								<?php the_post_thumbnail('gfb-page-banner'); ?>
							<?php } else { ?>
								<?php the_post_thumbnail('gfb-page-banner-mobile'); ?>
							<?php } ?>
						</div>
					<?php } else { 
						$page_title_class = ' has_no_hero_image';
					 } ?>

					<div class="inner-wrap">


						<div id="main" class="twelvecol first clearfix" role="main">

							<?php include('library/tasting-room-nav.php'); ?>


							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 style="position:absolute;left:-9999px;" class="image-page-title<?php echo $page_title_class; ?>" itemprop="headline"><?php the_title(); ?></h1>


								</header> <?php // end article header ?>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>


									<?php
									// The on tap beers available
									// GREEN FLASH

									if ( function_exists( 'ot_get_option' ) ) {
										$on_tap_beers = ot_get_option( 'on_tap_beers', array());
										// we only want to show the first image of the list
										// this way more than one can be saved and used at a later time.
										?>
										<div class="sixcol first cf">
											<p><img src="http://www.greenflashbrew.com/wp-content/uploads/2014/02/tasting-room-greenflash.jpg" alt="Green Flash Tasting Room" width="444" height="246" /></p>
											<h2>At Green Flash Tasting Room</h2>
										<ul id="on-tap-beers">
										<?php
										$x = 1;
										foreach($on_tap_beers as $info) {

										if(isset($info['on_tap_beer_show']) && ($info['gfb_room_choice'] == 'greenflash' || $info['gfb_room_choice'] == 'both'))
										{
										?>
										<li>
											<h2><?php echo $info['title']; ?></h2>
											<p><?php echo $info['on_tap_beer_description']; ?></p>
										</li>
										<?php
										$x++;
										} // eof show?
										} // eof loop
										?>
										</ul>
										</div>
										<?php

									}

									?>


									<?php
									// The on tap beers available
									// GREEN FLASH

									if ( function_exists( 'ot_get_option' ) ) {
										$on_tap_beers = ot_get_option( 'on_tap_beers', array());
										// we only want to show the first image of the list
										// this way more than one can be saved and used at a later time.
										?>
										<div class="sixcol last cf">
											<p><img src="http://www.greenflashbrew.com/wp-content/uploads/2015/09/tasting-room-cellar-3.jpg" alt="Cellar 3" width="444" height="246" /></p>
											<h2>At Cellar 3 Tasting Room</h2>
										<ul id="on-tap-beers">
										<?php
										$x = 1;
										foreach($on_tap_beers as $info) {

										if(isset($info['on_tap_beer_show']) && ($info['gfb_room_choice'] == 'cellar3' || $info['gfb_room_choice'] == 'both'))
										{
										?>
										<li>
											<h2><?php echo $info['title']; ?></h2>
											<p><?php echo $info['on_tap_beer_description']; ?></p>
										</li>
										<?php
										$x++;
										} // eof show?
										} // eof loop
										?>
										</ul>
										</div>
										<?php

									}

									?>


									

							</section> <?php // end article section ?>

								<footer class="article-footer">
									<?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?>

								</footer> <?php // end article footer ?>

								<?php //comments_template(); ?>

							</article> <?php // end article ?>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <?php // end #main ?>
					</div> <?php // end .inner-wrap ?>
				</div> <?php // end #inner-content ?>

				<?php
					if(is_page(181)) {
							include_once('tribe-events/includes/newsletter-signup-code.php');
					}
				?>

			</div> <?php // end #content ?>

<?php get_footer(); ?>
