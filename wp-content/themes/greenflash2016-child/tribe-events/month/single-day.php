<?php
/**
 * Month View Single Day
 * This file contains one day in the month grid
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/single-day.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$day = tribe_events_get_current_month_day();


$events_label = ( 1 === $day['total_events'] ) ? tribe_get_event_label_singular() : tribe_get_event_label_plural();
?>

<?php if ( $day['total_events'] > 0) { 
	// add class "one-day-lightbox" via jQuery or manually add it for testing
	?>
	<div id="lightbox-num-<?php echo $day['daynum']; ?>" class="white-popup mfp-hide one-day-container">
		<div class="container">

			<?php 
			if($day['total_events'] > 2) { 
				$day_num_class = ' is_a_link';	
			} else { 
				$day_num_class = '';	
			} 
			 ?>
			
			<div class="lightbox-day-number-wrap">
				<div class="lightbox-day-number"><?php echo $day['daynum']; ?></div>
			</div>
		
			<div class="one-day-list">
			<!-- Events List -->
			<?php 
			$xx = 1;
			global $tooltip_class; 
			while ($day['events']->have_posts()) : $day['events']->the_post() ?>
				<?php 
					global $post; 
					$event_id = "{$post->ID}-{$day['daynum']}"; ?>
				<?php //tribe_get_template_part('month/single', 'event') ?>
				<div class="one-day-list-link">
					<a href="#tribe-events-tooltip-<?php echo $event_id; ?>" class="open-popup-link no-scroll">
						<span class="full-title"><?php the_title(); ?></span>
						<span class="partial-title desktop-only"><?php echo $event_title; ?></span>
					</a>
				</div>
				
			<?php
			$xx++; 
			endwhile; 
			?>
			</div>
		

		</div>
	</div>
<?php } ?>
<!-- Day Header -->
<div id="tribe-events-daynum-<?php echo $day['daynum-id'] ?>">

	<?php if ( $day['total_events'] > 0 && tribe_events_is_view_enabled( 'day' ) ) { ?>
			<a href="<?php echo tribe_get_day_link( $day['date'] ) ?>"><?php echo $day['daynum'] ?></a>
		<?php } else { ?>

			<?php if($day['total_events'] > 2) { ?>
			<a class="open-popup-link no-scroll" href="#lightbox-num-<?php echo $day['daynum']; ?>"><?php echo $day['daynum']; ?></a>
			<?php } else { ?>
			<?php echo $day['daynum']; ?>
			<?php } ?>
		<?php } ?>

</div>

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


<!-- View More -->
<?php if($day['total_events'] > 2) : ?>
	<div class="tribe-events-viewmore">
		<?php

			$view_all_label = sprintf(
				_n(
					'View %1$s %2$s',
					'View All %1$s %2$s',
					$day['total_events'],
					'the-events-calendar'
				),
				$day['total_events'],
				$events_label
			);

		?>
		<a class="open-popup-link no-scroll" href="#lightbox-num-<?php echo $day['daynum']; ?>"><?php //echo $view_all_label ?> See all</a>
	</div>
<?php
endif;
