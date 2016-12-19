<?php
/**
 * Month View Content Template
 * The content template for the month view of events. This template is also used for
 * the response that is returned on month view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="tribe-events-month">
	
	
	
	<div id="events-month-grid" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch container_wrap fullsize" style="background-color: #eeece9;">
		<div class="container">
			<div class="template-page content  av-content-full alpha units">
				<div class="post-entry post-entry-type-page">
					<div class="entry-content-wrapper clearfix">
						<!-- Month Title -->
						<?php do_action( 'tribe_events_before_the_title' ) ?>
						<h2 class="tribe-events-page-title h1"><?php tribe_events_title() ?></h2>
						<?php do_action( 'tribe_events_after_the_title' ) ?>
					
						<!-- Notices -->
						<?php tribe_the_notices() ?>
					
						<!-- Month Header -->
						<?php do_action( 'tribe_events_before_header' ) ?>
						<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
					
							<!-- Header Navigation -->
							<?php tribe_get_template_part( 'month/nav' ); ?>
					
						</div>
						<!-- #tribe-events-header -->
						<?php do_action( 'tribe_events_after_header' ) ?>
						<!-- Month Grid -->
						<?php tribe_get_template_part( 'month/loop', 'grid' ) ?>
					</div>
				</div>
			</div><!-- close content main div -->
		</div>
	</div>
	
	<div id="events-month-footer" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch container_wrap fullsize thin-bar" style="background-color: #ffffff;">
		<div class="container">
			<div class="template-page content  av-content-full alpha units">
				<div class="post-entry post-entry-type-page">
					<div class="entry-content-wrapper clearfix">
						<!-- Month Footer -->
						<?php /* do_action( 'tribe_events_before_footer' ) ?>
						<div id="tribe-events-footer">
					
							<!-- Footer Navigation -->
							<?php do_action( 'tribe_events_before_footer_nav' ); ?>
							<?php tribe_get_template_part( 'month/nav' ); ?>
							<?php do_action( 'tribe_events_after_footer_nav' ); ?>
					
						</div>
						<?php */ ?>
						<!-- #tribe-events-footer -->
						<?php do_action( 'tribe_events_after_footer' ) ?>
					
						<?php tribe_get_template_part( 'month/mobile' ); ?>
						<?php tribe_get_template_part( 'month/tooltip' ); ?>

					</div>
				</div>
			</div><!-- close content main div -->
		</div>
	</div>
	
</div><!-- #tribe-events-content -->
