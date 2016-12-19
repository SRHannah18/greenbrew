<?php 
/**
 * Month View Grid Loop
 * This file sets up the structure for the month grid loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/loop-grid.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php 

$days_of_week = tribe_events_get_days_of_week();
$week = 0;

?>


<?php do_action( 'tribe_events_before_the_grid' ) ?>
<table class="tribe-events-calendar">
	<thead>
		<tr>
		<?php
		$x = 1;
		foreach($days_of_week as $day) :
		if($x % 7 == 1) {$t_class = 't-first';}
		elseif($x % 7 == 0) {$t_class = 't-last';}
		else {$t_class = 't-between';} 
		?>
			<th class="<?php echo $t_class; ?>" id="tribe-events-<?php echo strtolower($day) ?>" title="<?php echo $day ?>"><div class="image-replacement2"><?php echo $day ?></div></th>
		<?php
		$x++; 
		endforeach; 
		?>
		</tr>
	</thead>
	<tbody class="hfeed vcalendar">
		<tr>
		<?php 
		$x = 1;
		while (tribe_events_have_month_days()) : tribe_events_the_month_day(); ?>
			<?php if ( $week != tribe_events_get_current_week() ) : $week++; ?>
		</tr>
		<tr>
			<?php 
			endif;
						
			if($x % 7 == 1) {$t_class = 't-first';}
			elseif($x % 7 == 0) {$t_class = 't-last';}
			else {$t_class = 't-between';}  

			?>
			<td class="<?php tribe_events_the_month_day_classes() ?> <?php echo $t_class; ?>">
				<div class="td-bg">
				<?php tribe_get_template_part( 'month/single', 'day' ) ?>
				</div>
			</td>
		<?php
		$x++; 
		endwhile; 
		?>
		</tr>
	</tbody>
</table><!-- .tribe-events-calendar -->
<?php do_action( 'tribe_events_after_the_grid' ) ?>