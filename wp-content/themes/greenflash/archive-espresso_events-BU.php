<?php get_header(); ?>

			<div id="content">


				<div id="inner-content" class="wrap clearfix">
					<div class="inner-wrap">

						<div id="main" class="eightcol first clearfix" role="main">

						<h1 class="archive-title h2 has_no_hero_image">Tours</h1>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<header class="article-header">

									<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

								</header> <?php // end article header ?>

								<section class="entry-content clearfix">
								<?php

								espresso_event_date_range();
								the_excerpt();
								espresso_event_reg_button();
								espresso_event_categories();
								echo '<br /><br />';
								espresso_edit_event_link();
								?>

<?php
/*
Here’s a list of each helper’s template tags:

EEH_Event_View

     espresso_event_reg_button()
    (returns the “Register Now” button if event is active, an inactive button like status banner if the event is not active or a “Read More” button if so desired)
    espresso_event_status_banner()
    (returns a banner showing the event status if it is sold out, expired, or inactive)
    espresso_event_status()
    (returns the event status if it is sold out, expired, or inactive)
    espresso_event_categories()
    (returns the terms associated with an event)
    espresso_event_tickets_available()
    (returns the ticket types available for purchase for an event)
    espresso_event_date_obj()
    (returns the primary date object for an event)
    espresso_event_date()
    (returns the primary date for an event)
    espresso_list_of_event_dates()
    (returns a unordered list of dates for an event)
    espresso_event_end_date()
    (returns the last date for an event)
    espresso_event_date_range()
    (returns the first and last dates for an event (if different))
    espresso_event_date_as_calendar_page()
    (returns the primary date for an event, stylized to appear as the page of a calendar)
    espresso_event_link_url()
    (the link to the event’s single page)
    espresso_event_phone()
    (the event’s phone #)
    espresso_edit_event_link()
    (returns a link to edit an event)
*/
?>


									<?php  ?>

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
												<p><?php _e( 'This is the error message in the custom posty type archive template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <?php // end #main ?>

						<?php get_sidebar('espresso'); ?>

								</div> <?php // end #inner-content ?>
				</div> <?php // end .inner-wrap ?>
			</div> <?php // end #content ?>

<?php get_footer(); ?>
