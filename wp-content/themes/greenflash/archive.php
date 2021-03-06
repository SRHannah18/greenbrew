<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
					<div class="inner-wrap">

						<div id="main" class="eightcol first clearfix" role="main">
						<?php 
						// for espresso pages only....
						if ( 'espresso_events' == get_post_type() ) {
							$espresso_title = 'Tours';
						?>
							<h1 class="archive-title"><?php echo $espresso_title; ?></h1>
						<?php
						}

						?>

							<?php if (is_category()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Posts Categorized:', 'bonestheme' ); ?></span> <?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Posts Tagged:', 'bonestheme' ); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="archive-title h2">

									<span><?php _e( 'Posts By:', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Daily Archives:', 'bonestheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Monthly Archives:', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Yearly Archives:', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } else { ?>
									<h1 class="archive-title h1">
										<span><?php _e( 'Green Flash Beer', 'bonestheme' ); ?></span>
									</h1>
							<?php } ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								

								<section class="entry-content clearfix">

									<?php 


										// for espresso pages only....
										if ( 'espresso_events' == get_post_type() ) {
											?>
											<header class="article-header">

												<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
												<p class="byline vcard"><time class="updated" datetime="<?php the_time('Y-m-j'); ?>" pubdate><?php the_time('l F j, Y'); ?></time></p>

											</header> <?php // end article header ?>

											<?php
											echo "ESPRESSO";
											//espresso_event_date_range();
											the_excerpt();
											//espresso_event_reg_button();
											//espresso_event_categories();
											echo '<br /><br />';
											//espresso_edit_event_link();
											
										} else { ?>

										<!-- <div class="blog-image-container fourcol first">
											<a class="fade-rollover" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('gfb-blog-event-thumb'); ?></a>
										</div> <?php // end image container ?> -->

										<div class="blog-content-container twelvecol last">
										<header class="article-header">

											<h2 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
											<p class="byline vcard">
										<time class="updated" datetime="<?php the_time('Y-m-j'); ?>" pubdate><?php the_time('l F j, Y'); ?></time>
										</p>

										</header> <?php // end article header ?>

										<section class="clearfix">
											<?php the_content(); ?>
										</section> <?php // end article section ?>
									<?php } ?>

									

								</section> <?php // end article section ?>

								<footer class="article-footer">

								</footer> <?php // end article footer ?>

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
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <?php // end #main ?>

						<?php 
						// for espresso pages only....
						if ( 'espresso_events' == get_post_type() ) {
							get_sidebar('espresso');
						} else {
							get_sidebar();
						}

						?>

						</div> <?php // end .inner-wrap ?>
					</div> <?php // end #inner-content ?>

			</div> <?php // end #content ?>

<?php get_footer(); ?>
