<?php
/**
 * Month View Single Day
 * This file contains one day in the month grid
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/single-day.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php

$day = tribe_events_get_current_month_day();

?>

<?php if ( $day['date'] != 'previous' && $day['date'] != 'next' ) : ?>

<?php if($day['daynum'] < 10) {$day['daynum'] = '0'.$day['daynum'];} ?>

<?php if ( $day['total_events'] > 0) { 
	// add class "one-day-lightbox" via jQuery or manually add it for testing
	?>
	<div id="lightbox-num-<?php echo $day['daynum']; ?>" class="one-day-container">
		<div class="inner-wrap">
<?php } ?>

	<!-- Day Header -->

	<?php 
	if($day['total_events'] > 2) { 
		$day_num_class = ' is_a_link';	
	} else { 
		$day_num_class = '';	
	} 
	 ?>
	
	<div class="tribe-day-num<?php echo $day_num_class; ?>" id="tribe-events-daynum-<?php echo $day['daynum'] ?>">

		<?php if ( $day['total_events'] > 0 && tribe_events_is_view_enabled( 'day' ) ) { ?>
			<a href="<?php echo tribe_get_day_link( $day['date'] ) ?>"><?php echo $day['daynum'] ?></a>
		<?php } else { ?>

			<?php if($day['total_events'] > 2) { ?>
			<a class="open-lightbox2" data-lightbox-id="lightbox-num-<?php echo $day['daynum']; ?>" href="<?php echo $day['view_more'] ?>"><?php echo $day['daynum']; ?></a>
			<?php } else { ?>
			<?php echo $day['daynum']; ?>
			<?php } ?>
		<?php } ?>

	</div>

	<!-- View More -->
	
		


	<div class="one-day-list">
	<!-- Events List -->
	<?php 
	$xx = 1;
	global $tooltip_class; 
	while ($day['events']->have_posts()) : $day['events']->the_post() ?>
		<?php if($xx < 3) {$tooltip_class = 'show-title';} else {$tooltip_class = 'hide-title';} ?>
		<?php tribe_get_template_part('month/single', 'event') ?>
	<?php
	$xx++; 
	endwhile; 
	?>
	</div>

	<?php if($xx > 3) { ?>
	<div class="tribe-events-viewmore">
		<a class="open-lightbox" data-lightbox-id="lightbox-num-<?php echo $day['daynum']; ?>" href="<?php echo $day['view_more'] ?>">View more<span class="inactive"></span><span class="active"></span></a>
	</div>
	<?php } ?>

	

	

<?php if ( $day['total_events'] > 0) { ?>
	<span class="exit-lightbox desktop-only">Click anywhere to exit<span class="exit-x"></span></span>
	</div>
	</div> <!-- EOF One Day Container -->
<?php } ?>

<?php endif; ?>