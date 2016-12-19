<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 * 
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  2.1
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

global $deviceType;

//$event_id = get_the_ID();
// get category id
$event_cats = tribe_get_event_cat_ids();
foreach($event_cats as $value) {$event_cat = $value;} 
//print_r($event_cats);

include('includes/category-image-array.php');

if(!isset($cat_header_images[$event_cat]['img_desktop']))
	{
		$event_cat = 0;
	}
?>

<div id="inner-content" class="wrap clearfix gray">

<?php if($deviceType != 'phone') { ?>
	<img class="news-events-banner" src="<?php bloginfo('template_directory'); ?>/images/events/cat-headers/<?php echo $cat_header_images[$event_cat]['img_desktop']; ?>" alt="<?php echo $cat_header_images[$event_cat]['img_alt']; ?>" width="1400" height="300" />
<?php } else { ?>
	<img class="news-events-banner" src="<?php bloginfo('template_directory'); ?>/images/events/cat-headers/mobile/<?php echo $cat_header_images[$event_cat]['img_mobile']; ?>" alt="News &amp; Events" width="700" height="150" />
<?php } ?>

<?php echo '<!-- EVENT CAT ID = '.$event_cat.' -->'; ?>

<div class="inner-wrap">

<div id="tribe-events-content" class="tribe-events-single">
<div class="eightcol first">

	<!-- Notices -->
	<?php tribe_events_the_notices() ?>

	<?php the_title( '<h2 class="tribe-events-single-event-title summary">', '</h2>' ); ?>

	<div class="tribe-events-schedule updated published tribe-clearfix">
		<h3><?php echo tribe_events_event_schedule_details(); ?></h3>
		<?php //echo tribe_events_event_recurring_info_tooltip(); ?>
		<?php //echo tribe_events_recurrence_tooltip(); ?>

		<?php  if ( tribe_get_cost() ) :  ?>
			<span class="tribe-events-divider">|</span>
			<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
		<?php endif; ?>
	</div>

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('vevent'); ?>>
			<!-- Event featured image -->
			<?php //echo tribe_event_featured_image(); ?>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
				<?php the_content(); ?>
			</div><!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
				<?php 
				//echo tribe_events_single_event_meta(); 
				tribe_get_template_part( 'modules/meta' );
				?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			</div><!-- .hentry .vevent -->
		<?php if( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments','no' ) == 'yes' ) { comments_template(); } ?>
	<?php endwhile; ?>

	<!-- Event footer -->
    <div id="tribe-events-footer">
		<!-- Navigation -->
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '&laquo; %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% &raquo;' ) ?></li>
		</ul><!-- .tribe-events-sub-nav -->
	</div><!-- #tribe-events-footer -->

	<p class="tribe-events-back"><a href="<?php echo tribe_get_events_link() ?>"> <?php _e( '&laquo; All Events', 'tribe-events-calendar' ) ?></a></p>

</div>
<div class="threecol last event-sidebar">
<?php include('includes/events-calendar-nav.php'); ?>
</div>

</div><!-- #tribe-events-content -->

</div> <?php // EOF inner-wrap ?>
</div>
