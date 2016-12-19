<?php
/**
 * Month View Template
 * The wrapper template for month view. 
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */
global $deviceType;

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<div id="inner-content" class="wrap clearfix">

<?php include_once('includes/page-banner-code.php'); ?>

<div class="wrap gray">
<div class="inner-wrap">
<?php do_action( 'tribe_events_before_template' ) ?>
<?php //include('includes/events-calendar-nav.php'); ?>
<?php include('includes/tasting-room-nav.php'); ?>
</div>
</div>
	
<div class="wrap gray">
<div class="inner-wrap">
<!-- Tribe Bar -->
<?php tribe_get_template_part( 'modules/bar' ); ?>

<!-- Main Events Content -->
<?php tribe_get_template_part('month/content'); ?>

<?php do_action( 'tribe_events_after_template' ) ?>

</div>
</div> <?php // EOF INNER WRAP ?>
</div>
