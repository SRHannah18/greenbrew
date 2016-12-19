<?php
/*
Template Name: Retailer Home Page
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


						<div id="main" class="ninecol first clearfix" role="main">

							


							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title<?php echo $page_title_class; ?>" itemprop="headline"><?php the_title(); ?></h1>


								</header> <?php // end article header ?>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>


									<?php
									// links to download image pages go here
									if ( function_exists( 'ot_get_option' ) ) {
  
									  /* get the slider array */
									  $dlinks = ot_get_option( 'retailer_download_links', array() );
									  
									  if ( ! empty( $dlinks ) ) {
									  ?>
									  <div id="dlinks-container" class="twelvecol first">
									  <?php
									  	$x = 1;

									    foreach( $dlinks as $dlink ) {
									    if($x % 4 == 1) {
									    	$class = ' first';
									    } elseif($x % 4 == 0) {
									    	$class = ' last';} 
									    else {
									    	$class = '';
									    }
									    ?>
									    <div class="dlinks-content threecol<?php echo $class; ?>">
									    	
									    	<?php if($dlink['image'] != '') { ?>
									    	<div class="dlinks-inner fade">
									        <a href="<?php echo $dlink['link']; ?>">
									        <span class="image"><img src="<?php echo $dlink['image']; ?>" alt="<?php echo $dlink['title']; ?>" /></span>
									        <span class="title"><?php echo $dlink['title']; ?></span>
									        </a>
									        <?php } else { ?>
									        <div class="dlinks-inner">
									        <span class="coming-soon">Coming Soon</span>
									        <span class="title"><?php echo $dlink['title']; ?></span>
									    	<?php } ?>
									    	</div>
									    </div>
									    <?php
									    $x++;
									    }
									    ?>
									  	</div>
									  	<?php
									  }
									  
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
						<?php get_sidebar(); ?>
					</div> <?php // end .inner-wrap ?>
				</div> <?php // end #inner-content ?>

			</div> <?php // end #content ?>

<?php get_footer(); ?>
