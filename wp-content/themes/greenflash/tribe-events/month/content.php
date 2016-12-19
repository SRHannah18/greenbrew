<?php
/**
 * Month View Content Template
 * The content template for the month view of events. This template is also used for
 * the response that is returned on month view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/content.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } 
// Get Month Only
global $linux_time;
$linux_time = strtotime(tribe_get_month_view_date());
$event_date_title = strftime('%B',$linux_time);
// we may change the above format...so just in case...
$event_date_title_class = strftime('%B',$linux_time);
?>



<div id="tribe-events-content" class="tribe-events-month">
	
	<!-- Month Title -->
	<?php do_action( 'tribe_events_before_the_title' ) ?>
	<!-- <h2 class="tribe-events-page-title"><?php tribe_events_title() ?></h2> -->
	<!-- Notices -->
	<?php tribe_events_the_notices() ?>

	<div id="calendar-header">
		<h2 class="tribe-events-page-title image-replacement3 <?php echo strtolower($event_date_title_class); ?>"><?php echo $event_date_title; ?></h2>
		<?php do_action( 'tribe_events_after_the_title' ) ?>

		

		<!-- Month Header -->
		<?php do_action( 'tribe_events_before_header' ) ?>
		<div id="tribe-events-header" class="clearfix" <?php tribe_events_the_header_attributes() ?>>

			<!-- Header Navigation -->
			<?php tribe_get_template_part( 'month/nav' ); ?>

		</div><!-- #tribe-events-header -->
		<?php do_action( 'tribe_events_after_header' ) ?>
	</div> <?php // eof calendar-header ?>

	<!-- Month Grid -->
	<?php tribe_get_template_part( 'month/loop', 'grid' ) ?>

	<!-- Month Footer -->
	<?php do_action( 'tribe_events_before_footer' ) ?>
	<div id="tribe-events-footer">

		<!-- Footer Navigation -->
		<?php do_action( 'tribe_events_before_footer_nav' ); ?>
		<?php //tribe_get_template_part( 'month/nav' ); ?>
		<?php do_action( 'tribe_events_after_footer_nav' ); ?>

	</div><!-- #tribe-events-footer -->
	<?php do_action( 'tribe_events_after_footer' ) ?>
	
</div><!-- #tribe-events-content -->
