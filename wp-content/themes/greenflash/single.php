<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					

					<div class="inner-wrap">

					<div id="main" class="eightcol first clearfix" role="main">

						

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
									<p class="byline vcard">
										<?php 
										if ( 'espresso_events' == get_post_type() ) {
										?>

										<h3>Date: <?php espresso_event_date('F j, Y'); ?></h3>
										
										<?php
											//espresso_event_categories();
											
										} else {

										?>
											<time class="updated" datetime="<?php the_time('l F j, Y'); ?>" pubdate><?php the_time('l F j, Y'); ?></time>

										<?php
									
											
										} ?>
										


									</p>

								</header> <?php // end article header ?>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

								<footer class="article-footer">
									<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer> <?php // end article footer ?>

								<?php //comments_template(); ?>

							</article> <?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
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
