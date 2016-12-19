<?php 
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php 

// Setup an array of venue details for use later in the template
$venue_details = array();

if ($venue_name = tribe_get_meta( 'tribe_event_venue_name' ) ) {
	$venue_details[] = $venue_name;	
}

if ($venue_address = tribe_get_meta( 'tribe_event_venue_address' ) ) {
	$venue_details[] = $venue_address;	
}
// Venue microformats
$has_venue = ( $venue_details ) ? ' vcard': '';
$has_venue_address = ( $venue_address ) ? ' location': '';


$venue_city = tribe_get_city();
$venue_state = tribe_get_state();

?>

<!-- Event Image -->
<div class="list-view-main-image fourcol first">
<?php echo tribe_event_featured_image( null, 'gfb-blog-event-thumb' ) ?>
</div>

<div class="list-view-main-content eightcol last">
<!-- Event Cost -->
<?php if ( tribe_get_cost() ) : ?> 
	<div class="tribe-events-event-cost">
		<span><?php echo tribe_get_cost( null, true ); ?></span>
	</div>
<?php endif; ?>

<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>
<h2 class="tribe-events-list-event-title summary">
	<a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark">
		<?php echo $venue_city . ', '.$venue_state; ?> - <?php the_title() ?>
	</a>
</h2>
<?php do_action( 'tribe_events_after_the_event_title' ) ?>

<!-- Event Meta -->
<?php do_action( 'tribe_events_before_the_meta' ) ?>
<div class="tribe-events-event-meta <?php echo $has_venue . $has_venue_address; ?>">

	<!-- Schedule & Recurrence Details -->
	<div class="updated published time-details">
		<p><?php echo tribe_events_event_schedule_details(); // the date ?></p>
		<?php //echo tribe_events_event_recurring_info_tooltip() ?>
		<?php //echo tribe_events_recurrence_tooltip(); ?>
	</div>

</div><!-- .tribe-events-event-meta -->
<?php do_action( 'tribe_events_after_the_meta' ) ?>

<!-- Event Content -->
<?php do_action( 'tribe_events_before_the_content' ) ?>
<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
	<?php the_excerpt() ?>
	<p><a href="<?php echo tribe_get_event_link() ?>" class="tribe-events-read-more learn-more" rel="bookmark"><?php _e( 'Learn More', 'tribe-events-calendar' ) ?></a></p>
</div><!-- .tribe-events-list-event-description -->
<?php do_action( 'tribe_events_after_the_content' ) ?>

</div> <?php // eof of list main content ?>
