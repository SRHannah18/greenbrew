<?php
/*
Template Name: Release Calendar
*/
?>

<?php 
get_header(); 
//echo '<span style="color:black;position:relative;top:130px;">TEST = '.$deviceType.'</span>';
?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main-calendar-image" class="outerwrap twelvecol first hero-image">


			<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$release_cal_hero = ot_get_option( 'release_cal_hero', array());
				// we only want to show the first image of the list
				// this way more than one can be saved and used at a later time.
				$release_cal_hero = array_splice($release_cal_hero,0,1);
				foreach($release_cal_hero as $info) {
					?>
					<h1><?php echo $info['title']; ?></h1>
					<img src="<?php echo $info['image']; ?>" alt="<?php echo $info['description']; ?>" width="1400" height="300" />
					<?php
				}
			} // eof check
			?>
		</div>


		<div id="release-calendar-content" class="outerwrap twelvecol first gray">
			<div class="inner-wrap">

				
			<h2 id="txt-year-round" class="image-replacement2">Year Round<span class="desktop-only">: Enjoy these fine brews, available nationally all year long.</span></h2>

			<div class="cal-images clearfix">
				<ul>
				<?php 
				if ( function_exists( 'ot_get_option' ) ) {
					$cal_year_round = ot_get_option( 'cal_year_round', array());
					$x = 1;
					foreach($cal_year_round as $info) {
						if($x % 8 == 0) {$li_class = ' class="last"';} else {$li_class = '';}
						?>
						<li<?php echo $li_class; ?>><a title="Link to <?php echo $info['description']; ?>" href="<?php echo $info['link']; ?>"><img src="<?php echo $info['image']; ?>" width="116" height="190" alt="<?php echo $info['description']; ?>" /></a></li>
						<?php
					$x++;
					}
				} // eof check
				?>
				</ul>
				<p class="available desktop-only desktop-block">Available Year Round</p>
			</div><?php // EOF cal-images ?>

			

			<h2 id="txt-seasonal" class="image-replacement2">Seasonal<span class="desktop-only">: Discover our seasonal beers &mdash; available nationally.</span></h2>

			<div class="cal-images clearfix">
				<ul>
				<?php 
				if ( function_exists( 'ot_get_option' ) ) {
					$cal_seasonal = ot_get_option( 'cal_seasonal', array());
					$x = 1;
					foreach($cal_seasonal as $info) {
						if($x % 8 == 0) {$li_class = ' class="last"';} else {$li_class = '';}
						?>
						<li<?php echo $li_class; ?>><a title="Link to <?php echo $info['title']; ?>" href="<?php echo $info['link']; ?>"><img src="<?php echo $info['image']; ?>" width="116" height="190" alt="<?php echo $info['title']; ?>" /><span class="dates"><?php echo $info['description']; ?></span></a></li>
						<?php
					$x++;
					}
				} // eof check
			?>
				</ul>
			</div><?php // EOF cal-images ?>

			<h2 id="txt-hop-odyssey" class="image-replacement2">Hop Odyssey<span class="desktop-only">: Try our new craft on draft, before they disappear!</span></h2>

			<div class="cal-images clearfix">
				<ul>
				<?php 
				if ( function_exists( 'ot_get_option' ) ) {
					$cal_hop_odyssey = ot_get_option( 'cal_hop_odyssey', array());
					$x = 1;
					foreach($cal_hop_odyssey as $info) {
						if($x % 8 == 0) {
							$li_class = ' class="last"';
						} else {
							$li_class = '';
						}
						?>
						<li<?php echo $li_class; ?>><a title="Link to <?php echo $info['title']; ?>" href="<?php echo $info['link']; ?>"><img src="<?php echo $info['image']; ?>" width="116" height="190" alt="<?php echo $info['title']; ?>" /><span class="dates"><?php echo $info['description']; ?></span></a></li>
						<?php
					$x++;
					}
				} // eof check
				?>
				</ul>
				<p class="draft desktop-only"><span class="keg"></span>Available Nationally on Draft</p>
			</div><?php // EOF cal-images ?>

						
			</div> <?php // end .inner-wrap ?>
		</div>


		<?php include_once('library/beer-locator-code.php'); ?>



	</div> <?php // end #inner-content ?>
</div> <?php // end #content ?>

<?php get_footer(); ?>
