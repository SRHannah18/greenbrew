<?php
/*
Template Name: Hop Odyssey
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
								<?php the_post_thumbnail('large'); ?>
							<?php } else { ?>
								<?php the_post_thumbnail('gfb-page-banner-mobile'); ?>
							<?php } ?>
							<a href="<?php bloginfo('wpurl'); ?>/our-beers/Mosaic" id="mosaic" class="image-replacement">Mosaic</a>
							<a href="<?php bloginfo('wpurl'); ?>/our-beers/Citra" id="citra" class="image-replacement">Citra Session</a>
							<a href="<?php bloginfo('wpurl'); ?>/our-beers/segal-ranch-session/" id="segal" class="image-replacement">Segal Ranch</a>
						</div>
					<?php } else { 
						$page_title_class = ' has_no_hero_image';
					 } ?>

					<div class="inner-wrap">
						<a target="_blank" href="https://instagram.com/greenflashbeer/">
						<?php if($deviceType != 'phone') { ?>
							<img id="instagram-image" src="<?php bloginfo('template_directory'); ?>/images/hop/hop-odyssey-landing-instagram-5.png" alt="People around a beach campfire. Bottle of Green Flash Mosaic. Green Flash Beer glasses raised in a toast. The bow of sail boat." width="1026" height="349" />
							<?php } else { ?>
							<img id="instagram-image" src="<?php bloginfo('template_directory'); ?>/images/hop/hop-odyssey-landing-instagram-mobile.png" alt="People around a beach campfire. Bottle of Green Flash Mosaic. Green Flash Beer glasses raised in a toast. The bow of sail boat." width="700" height="211" />
								
							<?php } ?>

						</a>


						<div id="main" class="twelvecol first clearfix" role="main">

							


							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title<?php echo $page_title_class; ?> mobile-only" itemprop="headline"><?php the_title(); ?></h1>


								</header> <?php ?>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>

							</section> <?php // end article section ?>

							<h2 id="txt-share" class="image-replacement2">Share your favorite place to enjoy a hop session. <a class="instagram-hashtag h1" href="https://instagram.com/greenflashbeer/">#MYHOPSESSION</a></h2>
							
							<div class="outerwrap first instagram-wrapper bg-gray clearfix">
							<div class="inner-wrap">

							<div id="home-instagram" class="twelvecol first">

							<?php //do_action('gfb_show_tag_info_hop'); ?>

							

							</div>
							<?php /*
							<div class="twelvecol first">
							<h2>Twitter</h2>
    						<?php  echo do_shortcode('[hashimage hashtag=greenflashbeer limit=12]'); ?>
							</div>
							*/ ?>
							
							<div class="twelvecol first">
							<!-- <h2>Twitter 2</h2> -->
							<?php echo do_shortcode('[ff id="1"]'); ?>
								
							</div>

							</div>
							</div>
							

							</article> <?php // end article ?>

							<?php endwhile; ?>

							<?php endif; ?>

							

						</div> <?php // end #main ?>
					</div> <?php // end .inner-wrap ?>

					<div class="twelvecol wrap">
					<p><iframe src="http://www.vtinfo.com/PF/product_finder.asp?custID=GFB" name="beer_finder_iframe" id="beerfinderiframe"></iframe></p>
					</div>


				</div> <?php // end #inner-content ?>


			</div> <?php // end #content ?>

<?php get_footer(); ?>
