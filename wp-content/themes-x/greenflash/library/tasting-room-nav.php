<div class="twelvecol first" id="tasting-room-box-nav">

	<?php 
	if ( function_exists( 'ot_get_option' ) ) {
		$tasting_room_nav = ot_get_option( 'tasting_room_nav', array());
		// we only want to show the first image of the list
		// this way more than one can be saved and used at a later time.
		$tasting_room_nav = array_splice($tasting_room_nav,0,6);
		$x = 0;
		foreach($tasting_room_nav as $info) {

		if($x % 6 == 0) {$div_class = ' first';}
		elseif($x % 6 == 5) {$div_class = ' last';}
		else {$div_class = '';}

		if(isset($info['tasting_room_popup'])) {
			$nav_class = ' class="view-popup"';
		} else {
			$nav_class = '';
		}

		if($info['tasting_room_link'] != '') {
			$the_dual_link = $info['tasting_room_link'];
		} else {
			$the_dual_link = $info['tasting_room_image_popup'];
		}
		?>
		<div class="twocol<?php echo $div_class; ?>"><a<?php echo $nav_class; ?> href="<?php echo $the_dual_link; ?>"><img src="<?php echo $info['tasting_room_image']; ?>" alt="<?php echo $info['tasting_room_image_alt']; ?>" width="158" height="158" /></a></div>
			<?php
		$x++;
		} // eof links
	}
	?>

</div> <?php // EOF BOX NAVIGATION ?>