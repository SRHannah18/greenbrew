<?php
/**
 * List View Template
 * The wrapper template for a list of events. This includes the Past Events and Upcoming Events views 
 * as well as those same views filtered to a specific category.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 * @since  2.1
 * @author Modern Tribe Inc.
 *
 */
global $deviceType;

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<div id="inner-content" class="wrap clearfix">

<?php include_once('includes/page-banner-code.php'); ?>

<?php do_action( 'tribe_events_before_template' ); ?>

<div class="wrap tribe-clearfix gray">
<div class="inner-wrap">

<?php //include('includes/events-calendar-nav.php'); ?>
<?php include('includes/tasting-room-nav.php'); ?>

</div>
</div>

<div class="wrap gray">
<div class="inner-wrap">
<!-- Tribe Bar -->
<?php tribe_get_template_part( 'modules/bar' ); ?>

<!-- Main Events Content -->
<?php tribe_get_template_part( 'list/content' ); ?>

<div class="tribe-clear"></div>

<?php do_action( 'tribe_events_after_template' ) ?>

</div> <?php // EOF INNER WRAP ?>
</div>
</div>