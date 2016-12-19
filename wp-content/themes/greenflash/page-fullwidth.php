<?php
/*
Template Name: Full Width Custom
*/
?>
<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php the_content(); ?>	



		
		
		<?php 
		// Holiday Page is Hard-Coded because of so many large images
		// Second set of images is for mobile devices
		?>


		<?php
		if(is_page(4249) || is_page(3184)) {

			if(!isset($deviceType)) {$deviceType = 'computer';}
			if($deviceType != 'phone') { 
		?>
		

		<div style="background-color:#ff0000;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<img width="992" height="373" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/stayflashy2.gif" alt="Stay Flashy. A holiday survival guide." />
			</div>
		</div>

		<div style="background-color:#cdcdcd;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<a href="http://www.greenflashbrew.com/our-beers/discoverypack/"><img width="992" height="373" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/tip1-b.jpg" alt="Tip No. 1. Don't be a party pooper. Don't show up empty handed! Spread good cheer with our discovery 8 pack. With West Coast, Hop Head Red and Double Stout, there's something for everyone." /></a>
			</div>
		</div>

		<div style="background-color:#c4d800;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<a href="http://green-flash-gift-shop.myshopify.com/collections/beer-men/products/holiday-ugly-sweater"><img width="992" height="373" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/tip2.jpg" alt="Tip No. 2. Ugly Sweater Check. Shop Now." /></a>
			</div>
		</div>

		<div style="background-color:#000000;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<a href="https://www.pinterest.com/greenflashbeer/beer-cocktails/"><img width="992" height="373" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/tip3.jpg" alt="Tip No. 3. Keep spirits bright with a beertail. Get recipes. Double Stout Black Ale Big, Bold and Complex." /></a>
			</div>
		</div>

		<div style="background-color:#fa0000;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<a href="http://www.greenflashbrew.com/our-beers/soul-style/"><img width="992" height="373" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/tip4.jpg" alt="Tip No. 4. Santas Got Soul. Have you tried our newest release, Soul Style? Yes or no, make it #1 on your wish list." /></a>
			</div>
		</div>

		<div style="background-color:#cdcdcd;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<a href="http://www.greenflashbrew.com/tasting-room/"><img width="992" height="373" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/tip5.jpg" alt="Tip No. 5. Shop Local. Locals only! Show your support and visit our Tasting Room gift shop, join us for our Grand Holiday Marketplace December 13th or buy beer to go for the craft lovers on your checklist." /></a>
			</div>
		</div>

		<div style="background-color:#c4d800;" class="outerwrap twelvecol first">
			<div class="inner-wrap" style="position:relative;">
				<img width="992" height="373" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/tip6.jpg" alt="Need more tips? We got 'em!. Explore our craft on soical media for more holiday survival guide tips. Stay Flashy friends." />
				<a style="position:absolute;top:51%;left:23%;width:3%;height:8%;display:block;text-indent:-9999px;" href="https://www.facebook.com/GreenFlashBrew">Facebook</a> 
				<a style="position:absolute;top:51%;left:26.25%;width:3%;height:8%;display:block;text-indent:-9999px;" href="https://twitter.com/Greenflashbeer">Twitter</a> 
				<a style="position:absolute;top:51%;left:29.5%;width:3%;height:8%;display:block;text-indent:-9999px;" href="http://instagram.com/greenflashbeer">Instagram</a>
			</div>
		</div>	

		<?php 
		/*********************************************************
		// BEGIN MOBILE
		**********************************************************/
		} else { 
		?>
			<div style="background-color:#ff0000;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<img width="700" height="264" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/mobile/stayflashy2.gif" alt="Stay Flashy. A holiday survival guide." />
			</div>
		</div>

		<div style="background-color:#cdcdcd;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<a href="http://www.greenflashbrew.com/our-beers/discoverypack/"><img width="700" height="264" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/mobile/tip1-b.jpg" alt="Tip No. 1. Don't be a party pooper. Don't show up empty handed! Spread good cheer with our discovery 8 pack. With West Coast, Hop Head Red and Double Stout, there's something for everyone." /></a>
			</div>
		</div>

		<div style="background-color:#c4d800;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<a href="http://green-flash-gift-shop.myshopify.com/collections/beer-men/products/holiday-ugly-sweater"><img width="700" height="264" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/mobile/tip2.jpg" alt="Tip No. 2. Ugly Sweater Check. Shop Now." /></a>
			</div>
		</div>

		<div style="background-color:#000000;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<a href="https://www.pinterest.com/greenflashbeer/beer-cocktails/"><img width="700" height="264" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/mobile/tip3.jpg" alt="Tip No. 3. Keep spirits bright with a beertail. Get recipes. Double Stout Black Ale Big, Bold and Complex." /></a>
			</div>
		</div>

		<div style="background-color:#fa0000;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<a href="http://www.greenflashbrew.com/our-beers/soul-style/"><img width="700" height="264" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/mobile/tip4.jpg" alt="Tip No. 4. Santas Got Soul. Have you tried our newest release, Soul Style? Yes or no, make it #1 on your wish list." /></a>
			</div>
		</div>

		<div style="background-color:#cdcdcd;" class="outerwrap twelvecol first">
			<div class="inner-wrap">
				<a href="http://www.greenflashbrew.com/tasting-room/"><img width="700" height="264" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/mobile/tip5.jpg" alt="Tip No. 5. Shop Local. Locals only! Show your support and visit our Tasting Room gift shop, join us for our Grand Holiday Marketplace December 13th or buy beer to go for the craft lovers on your checklist." /></a>
			</div>
		</div>

		<div style="background-color:#c4d800;" class="outerwrap twelvecol first">
			<div class="inner-wrap" style="position:relative;">
				<img width="700" height="264" style="display:block;" src="<?php bloginfo('template_directory'); ?>/images/holidaysurvival/mobile/tip6.jpg" alt="Need more tips? We got 'em!. Explore our craft on soical media for more holiday survival guide tips. Stay Flashy friends." />
				<a style="position:absolute;top:51%;left:23%;width:3%;height:8%;display:block;text-indent:-9999px;" href="https://www.facebook.com/GreenFlashBrew">Facebook</a> 
				<a style="position:absolute;top:51%;left:26.25%;width:3%;height:8%;display:block;text-indent:-9999px;" href="https://twitter.com/Greenflashbeer">Twitter</a> 
				<a style="position:absolute;top:51%;left:29.5%;width:3%;height:8%;display:block;text-indent:-9999px;" href="http://instagram.com/greenflashbeer">Instagram</a>
			</div>
		</div>	
		<?php } ?>	

		<?php } // EOF OF PAGE CHECK ?>

	<?php 
		endwhile; 
	endif; 
	?>
	</div>
</div> <?php // end #content ?>

<?php get_footer(); ?>
