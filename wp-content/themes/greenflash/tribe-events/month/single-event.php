<?php 
/**
 * Month Single Event
 * This file contains one event in the month view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php 

global $post;
$day = tribe_events_get_current_month_day();
$event_id = "{$post->ID}-{$day['daynum']}";
$start = tribe_get_start_date( $post, FALSE, 'U' );
$end = tribe_get_end_date( $post, FALSE, 'U' );

// shorten title if necessay
$event_title = get_the_title();
$target_length = 20;
$title_length = strlen($event_title);
if($title_length > $target_length) {
	$event_title = substr($event_title,0,$target_length).'&hellip;';
}
global $tooltip_class;
?>

<div id="tribe-calendar-event-<?php echo $event_id ?>" class="<?php tribe_events_event_classes() ?>">
	<h3 class="tribe-events-month-event-title summary <?php echo $tooltip_class; ?>"><a href="<?php tribe_event_link( $post ); ?>" class="url open-tooltip" data-tooltip-id="tribe-events-tooltip-<?php echo $event_id; ?>">
		<span class="full-title"><?php the_title(); ?></span>
		<span class="partial-title desktop-only"><?php echo $event_title; ?></span>
	</a></h3>
	
	<?php // this is the popup window area ?>
	<div id="tribe-events-tooltip-<?php echo $event_id; ?>" class="tribe-events-tooltip">
		<div class="inner-wrap">
		
		<div class="tribe-events-event-body">

			
			
			<?php if (has_post_thumbnail() ) : ?>
				<div class="tribe-events-event-thumb"><a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail('large');?></a></div>
			<?php endif; ?>

			<div class="entry-summary description">
				<h4 class="summary"><?php the_title() ?></h4>
				<p class="date"><?php echo tribe_events_event_schedule_details(); ?></p>
				<div class="tooltip-excerpt"><?php echo get_the_excerpt(); ?></div>
				<p><a class="learn-more" href="<?php the_permalink(); ?>">Learn More</a></p>
				<p><span class="exit-lightbox desktop-only">Click anywhere to exit<span class="exit-x"></span></span></p>
			</div><!-- .entry-summary -->
			

		</div><!-- .tribe-events-event-body -->
		<!-- <span class="tribe-events-arrow"></span> -->

	</div><!-- .inner-wrap -->
	</div><!-- .tribe-events-tooltip -->
	<?php // EOF popup window area ?>

</div><!-- #tribe-events-event-# -->
