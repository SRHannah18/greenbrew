<?php
/*
Template Name: Tasting Room
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php
					// Only show the banner image if there is one
					//echo 'DEVICE ' . $deviceType; // works
					if ( has_post_thumbnail() ) { 
						$h1_class = ' hide';
					?>
						<div class="page-banner-image">
							<?php if($deviceType != 'phone') { ?>
								<?php the_post_thumbnail('large'); ?>
							<?php } else { ?>
								<?php the_post_thumbnail('gfb-page-banner-mobile-easy-crop'); ?>
							<?php } ?>
						</div>
					<?php } else {
						$h1_class = '';
					} ?>
					
					
					<div class="inner-wrap">

						<div id="main" class="twelvecol first clearfix" role="main">

						<?php include('library/tasting-room-nav.php'); ?>

							

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title<?php echo $h1_class; ?>"><?php the_title(); ?></h1>

								</header> <?php // end article header ?>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

								<footer class="article-footer">
									<p class="clearfix"><?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

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
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <?php // end #main ?>

						<?php //get_sidebar(); ?>
					</div> <?php // end .inner-wrap ?>
				</div> <?php // end #inner-content ?>

			</div> <?php // end #content ?>

<?php get_footer(); ?>
