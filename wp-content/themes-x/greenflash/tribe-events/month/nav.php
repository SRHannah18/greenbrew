<?php 
/**
 * Month View Nav Template
 * This file loads the month view navigation.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/nav.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php do_action( 'tribe_events_before_nav' ) ?>

<h3 class="tribe-events-visuallyhidden"><?php _e( 'Calendar Month Navigation', 'tribe-events-calendar' ) ?></h3>
<?php 
// tribe-events-sub-nav uses Ajax
// but it is not working....not sure why.
// for traditional links use tribe-events-sub-nav2
 ?>
<ul class="tribe-events-sub-nav2">
	<li class="tribe-events-nav-previous <?php echo strtolower(tribe_get_previous_month_text()); ?> image-replacement3">
		<span class="arrow"></span><?php tribe_events_the_previous_month_link(); ?>

		<!-- <a href="<?php tribe_get_previous_month_link(); ?>"><?php tribe_get_previous_month_text() ?><span class="arrow"></span></a> -->

	</li><!-- .tribe-events-nav-previous -->
	<li class="tribe-events-nav-next <?php echo strtolower(tribe_get_next_month_text()); ?> image-replacement3">
		<span class="arrow"></span><?php tribe_events_the_next_month_link(); ?>
	</li><!-- .tribe-events-nav-next -->
</ul><!-- .tribe-events-sub-nav -->

<?php do_action( 'tribe_events_after_nav' ) ?>
