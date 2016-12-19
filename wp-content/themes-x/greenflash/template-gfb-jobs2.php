<?php
/*
Template Name: Jobs Page New
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

					<!-- <div class="inner-wrap"> -->


						<div id="main" class="twelvecol first clearfix" role="main">

							


							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<?php if(has_excerpt()) { ?>
							<div class="video">
							<div class="inner-wrap">
								<?php
								
									the_excerpt();
								
								?>

								
							</div>
							</div>
							<?php } ?>

							<div class="green">
							<div class="inner-wrap entry-content">
								<header class="article-header">

									<h1 class="page-title<?php echo $page_title_class; ?> image-replacement" itemprop="headline"><?php the_title(); ?></h1>
									<?php the_content(); ?>


								</header> <?php // end article header ?>
							</div>
							</div>

								<section class="entry-content clearfix" itemprop="articleBody">

									<div id="jobs-content-container">

									<div class="white padding">
									<div class="inner-wrap">	

									<h2 id="jobs-title">Current Openings</h2>
									<p>We are looking for hard-working, passionate, talented individuals to join our crew. See below for a list of our current open positions.</p>

									</div>
									</div>


									<div class="gray padding">
									<div class="inner-wrap">

									<?php  // THE LINKS ?>
									<div class="twelvecol first clearfix">
									<div class="fourcol first">
										<h2>San Diego, CA</h2>
									<?php
									$args = array(
										'post_type' => 'gfb_jobs',
										'order'		=> 'ASC',
										'orderby'	=> 'menu_order',
										'tax_query' => array(
												array(
													'taxonomy' => 'our_jobs_cat',
													'field'    => 'slug',
													'terms'    => 'san-diego'
												)
											)
									);

									// the query
									$the_query = new WP_Query( $args ); ?>

									<?php 
									if ( $the_query->have_posts() ) { 
										//$x = 1;
									?>
										<ul id="jobs-list">
										  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
										    <li><a data-id="job-content-<?php the_ID(); ?>" href="#job-content-<?php the_ID(); ?>"><?php the_title(); ?></a></li>

										  <?php
										  //$x++; 
										  endwhile; 
										  ?>
										</ul>
										  
										<?php wp_reset_postdata(); ?>

									<?php }  ?>
								</div>
								<div class="fourcol">
									<h2>Virginia Beach, VA</h2>
									<?php
									$args = array(
										'post_type' => 'gfb_jobs',
										'order'		=> 'ASC',
										'orderby'	=> 'menu_order',
										'tax_query' => array(
												array(
													'taxonomy' => 'our_jobs_cat',
													'field'    => 'slug',
													'terms'    => 'virginia-beach'
												)
											)
									);

									// the query
									$the_query = new WP_Query( $args ); ?>

									<?php 
									if ( $the_query->have_posts() ) { 
										//$x = 1;
									?>
										<ul id="jobs-list">
										  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
										    <li><a data-id="job-content-<?php the_ID(); ?>" href="#job-content-<?php the_ID(); ?>"><?php the_title(); ?></a></li>

										  <?php
										  //$x++; 
										  endwhile; 
										  ?>
										</ul>
										  
										<?php wp_reset_postdata(); ?>

									<?php }  ?>
								</div>
								<div class="fourcol last">
									<h2>Other Locations</h2>

									<?php
									$args = array(
										'post_type' => 'gfb_jobs',
										'order'		=> 'ASC',
										'orderby'	=> 'menu_order',
										'tax_query' => array(
												array(
													'taxonomy' => 'our_jobs_cat',
													'field'    => 'slug',
													'terms'    => 'other'
												)
											)
									);

									// the query
									$the_query = new WP_Query( $args ); ?>

									<?php 
									if ( $the_query->have_posts() ) { 
										//$x = 1;
									?>
										<ul id="jobs-list">
										  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
										    <li><a data-id="job-content-<?php the_ID(); ?>" href="#job-content-<?php the_ID(); ?>"><?php the_title(); ?></a></li>

										  <?php
										  //$x++; 
										  endwhile; 
										  ?>
										</ul>
										  
										<?php wp_reset_postdata(); ?>

									<?php }  ?>
						

									</div>
								</div>


									</div>
									</div>
									<?php // THE CONTENT ?>

									<?php 
									$args = array(
										'post_type' => 'gfb_jobs',
										'order'		=> 'ASC',
										'orderby'	=> 'menu_order'
									);

									// the query
									$the_query = new WP_Query( $args );
									if ( $the_query->have_posts() ) { 
										//$x = 1;
									?>
										
										  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
										  <div id="job-content-<?php the_ID(); ?>" class="job-content">
										    <h2><?php the_title(); ?></h2>
										    <?php the_content(); ?>
										    <a data-id="job-content-<?php the_ID(); ?>" class="job-close desktop-only">CLOSE</a>
										    <p class="mobile-only"><a href="#jobs-title">Back to Top</a></p>
										    <hr class="mobile-only" />
										  </div>

										  <?php
										  //$x++; 
										  endwhile; 
										  ?>
										
										  
										<?php wp_reset_postdata(); ?>

									<?php }  ?>

									</div> <?php // eof jobs container ?>

									



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
					<!-- </div> --> <?php // end .inner-wrap ?>
				</div> <?php // end #inner-content ?>

				<?php
					if(is_page(181)) {
							include_once('tribe-events/includes/newsletter-signup-code.php');
					}
				?>

			</div> <?php // end #content ?>

<?php get_footer(); ?>
