<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap gray clearfix">
					<?php if($deviceType != 'phone') { ?>
						<img class="news-events-banner" src="<?php bloginfo('template_directory'); ?>/images/events/cat-headers/beer-events.jpg" alt="<?php echo $cat_header_images[$event_cat]['img_alt']; ?>" width="1400" height="300" />
					<?php } else { ?>
						<img class="news-events-banner" src="<?php bloginfo('template_directory'); ?>/images/events/cat-headers/mobile/beer-events.jpg" alt="<?php echo $cat_header_images[$event_cat]['img_alt']; ?>" width="700" height="150" />
					<?php } ?>
					<div class="inner-wrap">

						<div id="main" class="twelvecol first clearfix" role="main">
							<h1>Latest News</h1>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<div class="blog-content-container twelvecol first">
								<header class="article-header">

									<h2 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<p class="byline vcard">
								<time class="updated" datetime="<?php the_time('Y-m-j'); ?>" pubdate><?php the_time('l F j, Y'); ?></time>
								</p>

								</header> <?php // end article header ?>

								<section class="entry-content clearfix">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

								<footer class="article-footer">
									<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

								</footer> <?php // end article footer ?>
								</div> <?php // end content container ?>

								<?php // comments_template(); // uncomment if you want to use them ?>

							</article> <?php // end article ?>

							<?php endwhile; ?>

									<?php if ( function_exists( 'bones_page_navi' ) ) { ?>
											<?php bones_page_navi(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
														<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <?php // end #main ?>

						<?php //get_sidebar(); ?>
				</div> <?php // end .inner-wrap ?>
				</div> <?php // end #inner-content ?>

			</div> <?php // end #content ?>

<?php get_footer(); ?>
