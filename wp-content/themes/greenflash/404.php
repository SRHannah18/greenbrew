<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
					<div class="inner-wrap">

					<div id="main" class="twelvecol first clearfix" role="main">

						<article id="post-not-found" class="hentry clearfix">

							<header class="article-header">

								<h1><?php _e( 'Epic 404 - Beer Not Found', 'bonestheme' ); ?></h1>

							</header> <?php // end article header ?>

							<section class="entry-content">

								<div class="eightcol first">
								<p><?php _e( 'The beer you were looking for was not found, but maybe try looking again or use the navigation above to find what you\'re looking for.', 'bonestheme' ); ?></p>

								<p><?php get_search_form(); ?></p>
							</div>
								
								<p><img src="<?php bloginfo('template_directory'); ?>/images/404-page.jpg" alt="Green Flash Brewing Co." width="1000" height="511" /></p>
								

							</section> <?php // end article section ?>


							<footer class="article-footer">

									<p><?php //_e( 'This is the 404.php template.', 'bonestheme' ); ?></p>

							</footer> <?php // end article footer ?>

						</article> <?php // end article ?>

					</div> <?php // end #main ?>
					</div> <?php // end .inner-wrap ?>
				</div> <?php // end #inner-content ?>

			</div> <?php // end #content ?>

<?php get_footer(); ?>
