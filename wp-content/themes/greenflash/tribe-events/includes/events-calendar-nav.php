<div class="twelvecol first" id="event-navigation">

		<?php if(is_single()) { ?>
		<!-- <div class="twocol first">
			<a href="<?php bloginfo('wpurl'); ?>/events"><img src="<?php bloginfo('template_directory'); ?>/images/events/event-calendar.jpg" alt="Calendar" width="158" height="158" /></a>
		</div> -->
		<?php } ?>

		<?php 
		if ( function_exists( 'ot_get_option' ) ) {
			$news_nav = ot_get_option( 'news_events_nav', array());
			// we only want to show the first image of the list
			// this way more than one can be saved and used at a later time.
			$news_nav = array_splice($news_nav,0,7);
				$x = 0;
			foreach($news_nav as $info) {

			if($x % 6 == 1) {$div_class = ' first';}
			elseif($x % 6 == 0) {$div_class = ' last';}
			else {$div_class = '';}
			?>

			<?php if(is_single() && $x == 0) { ?>
				<div class="twocol first calendar-link">
					<div class="twocol<?php echo $div_class; ?>"><a href="<?php echo $info['link']; ?>"><img src="<?php echo $info['image']; ?>" alt="<?php echo $info['description']; ?>" width="158" height="158" /></a></div>
				</div>
			<?php } elseif($x != 0) { ?>
				<div class="twocol<?php echo $div_class; ?>"><a href="<?php echo $info['link']; ?>"><img src="<?php echo $info['image']; ?>" alt="<?php echo $info['description']; ?>" width="158" height="158" /></a></div>
				<?php
			} // eof single check
			$x++;
			} // eof links

		}

		?>

		

		<!-- <div class="twocol first">
			<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/events/latest-news.jpg" alt="" width="158" height="158" /></a>
		</div>
		<div class="twocol">
			<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/events/events-at-brewery.jpg" alt="" width="158" height="158" /></a>
		</div>
		<div class="twocol">
			<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/events/food-calendar.jpg" alt="" width="158" height="158" /></a>
		</div>
		<div class="twocol">
			<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/events/on-tap-this-week.jpg" alt="" width="158" height="158" /></a>
		</div>
		<div class="twocol">
			<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/events/supper-club.jpg" alt="" width="158" height="158" /></a>
		</div>
		<div class="twocol last">
			<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/events/green-flash-university.jpg" alt="" width="158" height="158" /></a>
		</div>	 -->

</div>