<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 * 
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single vevent hentry">

	<p class="tribe-events-back"><a href="<?php echo tribe_get_events_link() ?>"> <?php _e( '&laquo; All Events', 'avia_framework' ) ?></a></p>

	<!-- Notices -->
	<?php 
		if(function_exists('tribe_the_notices') )
		{
			tribe_the_notices();
		}
		else
		{
			tribe_events_the_notices();
		}
		?>


	<?php while ( have_posts() ) :  the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class='av-single-event-content'>
			<!-- Event featured image, but exclude link -->
				<div id="event-main-wrapper" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch container_wrap fullsize" style="background-color: #eeece9;">
					<div class="container">
						<div class="template-page content  av-content-full alpha units">
							<div class="post-entry post-entry-type-page post-entry-10682">
								<div class="entry-content-wrapper clearfix">
									<div class="single-event-left-side">
										<?php the_title( '<h2 class="tribe-events-single-event-title summary entry-title">', '</h2>' ); ?>
			
										<div class="tribe-events-schedule updated published tribe-clearfix">
											<?php echo tribe_events_event_schedule_details( $event_id, '<h4>', '</h4>'); ?>
											<?php  if ( tribe_get_cost() ) :  ?>
												<span class="tribe-events-divider">-</span>
												<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
											<?php endif; ?>
										</div>
										
										<!-- Event content -->
										<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
										<div class="tribe-events-single-event-description tribe-events-content entry-content description">
											<?php // echo tribe_event_featured_image($event_id, 'entry_with_sidebar', false); ?>
											<?php the_content(); ?>
										</div><!-- .tribe-events-single-event-description -->
									</div>

									<div class='single-event-right-side'>
										
											<!-- Event meta -->
											<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
												<?php
												/**
												 * The tribe_events_single_event_meta() function has been deprecated and has been
												 * left in place only to help customers with existing meta factory customizations
												 * to transition: if you are one of those users, please review the new meta templates
												 * and make the switch!
												 */
												if ( ! apply_filters( 'tribe_events_single_event_meta_legacy_mode', false ) )
													tribe_get_template_part( 'modules/meta' );
												else echo tribe_events_single_event_meta()
												?>
											
										
									</div>
									
								</div><!-- close entry content div -->
								
							</div>
						</div><!-- close content main div -->
					</div>
				</div>
			
				<div id="events-middle" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch container_wrap fullsize thin-bar" style="background-color: #ffffff;">
					<div class="container">
						<div class="template-page content  av-content-full alpha units">
							<div class="post-entry post-entry-type-page post-entry-10682">
								<div class="entry-content-wrapper clearfix">
									<div class="see-all-link">
										<a href="/events/">See All Events</a>
									</div>
									<!-- Event footer -->
							    <div id="tribe-events-footer">
									<!-- Navigation -->
										<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'avia_framework' ) ?></h3>
										<ul class="tribe-events-sub-nav">
											<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '< &nbsp;&nbsp; Next' ) ?></li>
											<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( 'Next &nbsp;&nbsp; >' ) ?></li>
										</ul><!-- .tribe-events-sub-nav -->
									</div><!-- #tribe-events-footer -->
								</div>
							</div>
						</div><!-- close content main div -->
					</div>
				</div>
				
				<div id="related-events-wrapper" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch container_wrap fullsize thin-bar" style="background-color: #eeece9;">
					<div class="container">
						<div class="template-page content  av-content-full alpha units">
							<div class="post-entry post-entry-type-page post-entry-10682">
								<div class="entry-content-wrapper clearfix">
									<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
									<?php if( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
									<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
								</div>
							</div>
						</div><!-- close content main div -->
					</div>
				</div>
				
			</div>
		</div> <!-- av-single-event-content -->
	</div> <!-- #post-x -->
		
	<?php endwhile; ?>

</div><!-- #tribe-events-content -->
