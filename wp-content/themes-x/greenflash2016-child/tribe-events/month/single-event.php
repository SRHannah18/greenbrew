<?php
/**
 * Month Single Event
 * This file contains one event in the month view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/single-event.php
 *
 * @package TribeEventsCalendar
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
$target_length = 160;
$title_length = strlen($event_title);
if($title_length > $target_length) {
	$event_title = substr($event_title,0,$target_length).'&hellip;';
}
global $tooltip_class;
?>
<?php if ($tooltip_class == 'show-title') { ?>
<div id="tribe-calendar-event-<?php echo $event_id ?>" class="<?php tribe_events_event_classes() ?>">
	<h5 class="tribe-events-month-event-title summary <?php echo $tooltip_class; ?>"><a href="#tribe-events-tooltip-<?php echo $event_id; ?>" class="open-popup-link no-scroll"><?php echo $event_title; ?></a></h5>
	<?php } ?>
	<?php // this is the popup window area ?>
	<div id="tribe-events-tooltip-<?php echo $event_id; ?>" class="white-popup mfp-hide">
		<div class="container">
		
		<div class="tribe-events-event-body">
			<div class="av_five_twelfths first flex_column">
				<?php if (has_post_thumbnail() ) : ?>
					<div class="tribe-events-event-thumb"><a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail('large');?></a></div>
				<?php endif; ?>
			</div>
			<div class="av_seven_twelfths flex_column">
				<div class="entry-summary description">
					<h4 class="h2"><?php the_title() ?></h4>
					<p class="date"><strong><?php echo tribe_events_event_schedule_details(); ?></strong></p>
					<div class="tooltip-excerpt"><?php echo get_the_excerpt(); ?></div>
					<div class="event-btn-wrap"><a class="btn btn-large" href="<?php the_permalink(); ?>">Learn More</a></div>
				</div><!-- .entry-summary -->
			</div>

		</div><!-- .tribe-events-event-body -->

	</div><!-- .inner-wrap -->
	</div><!-- .tribe-events-tooltip -->
	<?php // EOF popup window area ?>
<?php if ($tooltip_class == 'show-title') { ?>
</div><!-- #tribe-events-event-# -->
<?php } ?>