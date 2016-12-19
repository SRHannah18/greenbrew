<?php
/*
Template Name: Treasure Chest 2015
*/
?>
<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		
		<div class="outerwrap twelvecol first pink">
			<div class="inner-wrap">
				<h1 class="image-replacement">Treasure Chest. Raise a glass to find a cure</h1>
				<div id="girl" class="desktop-only"></div>
			</div>
		</div>

		<div style="" class="outerwrap twelvecol first gray">
			<div class="inner-wrap">
				<div id="girl-mobile" class="mobile-only"></div>
				<div class="twocol first">&nbsp;</div>
				<div class="eightcol video">
					<!-- <img src="<?php bloginfo('template_directory'); ?>/images/treasure-chest/2015/lisa-hinkley.jpg" alt="" width="" height="" /> -->
					<iframe width="600" height="349" src="https://www.youtube.com/embed/xrPpgwvA1fo?rel=0" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="twocol last content">
					<h2 class="padding-top">Treasure Chest</h2>
					<p>Established in 2011 by Green Flash Co-Founder and breast cancer survivor Lisa Hinkley, our annual fundraising program raises money to support breast cancer charities. Each year, we introduce an exceptional limited release beer starring a new pinup-inspired icon.
					</p>
					<p><a class="button" target="_blank" href="http://www.greenflashbrew.com/events/category/treasure-chest/">Find An Event</a></p>
			</div>
		</div>

		<?php //style="background-color:#e84179" ?>

		<div class="outerwrap twelvecol first green">
			<div class="inner-wrap cf">
				<div class="fourcol first raise-a-glass">
					<img src="<?php bloginfo('template_directory'); ?>/images/treasure-chest/2015/raise-a-glass-2.jpg" alt="Three people raising a glass of beer." width="350" height="350" />
				</div>
				<div class="eightcol last raise-a-glass">
				<p class="padding-top"><a class="button" target="_blank" href="https://www.youcanpreventcancer.org/greenflashbrewing">Donate Now</a></p>
				<h2>Raise a Glass to Find a Cure</h2>
				<p>With a lofty fundraising goal of $150,000, we need your help! Attend a Treasure Chest Fest in San Diego or Virginia Beach, enjoy Treasure Chest at your local pub or look for 22 oz. bottles at your local bottle shop. You can also help us spread awareness by sharing a picture of yourself cheering with the hashtag #RAISEAGLASS2015 on any of your social networks.</p>
				
				</div>
			</div>
		</div>

		<div style="" class="outerwrap twelvecol first pink">
			<div class="inner-wrap">
				<div class="twocol last">
					<div id="treasure-beer"><a style="display:block;width:100%;height:100%;" href="http://www.greenflashbrew.com/find-beer/"></a></div>
				</div>
				<div class="tencol first about-beer">
				<h2>About the Beer</h2>
				<p>Say Aloha to Treasure Chest 2015, an exotic pink IPA brewed with grapefruit, prickly pear juice and hibiscus flowers. Erupting with fruit-forward complexity, 100% Mosaic hops present aromas of heady citrus and refined stone fruit. The pleasantly bitter flavors of the hops are enhanced by the addition of fresh grapefruit juice. Offering balance to offset the bold citrus notes, prickly pear juice imparts a peppery-sweet kick in the finish. Tropical Hibiscus flowers give this beer a naturally pink hue, a nod to the official color of the Treasure Chest mission. 5.7% ABV | 65 IBU</p>
				</div>
				
			</div>
		</div>

		

		<div class="outerwrap twelvecol first gray">
			<div class="inner-wrap get-involved">
				<h2 class="image-replacement2">Get Involved</h2>
			</div>
		</div>

		<div class="outerwrap twelvecol first image-slider">

		<?php
			$slides = array(
				array(
					'image' => 'virginia-beach-fest.jpg',
					'alt'	=> 'Virginia Beach Fest',
					'link'	=> 'https://www.eventbrite.com/e/treasure-chest-fest-virginia-beach-tickets-17623777192'
				),
				array(
					'image' => 'san-diego-fest.jpg',
					'alt'	=> 'San Diego Fest',
					'link'	=> 'https://www.facebook.com/media/set/?set=a.10156001364460500.1073741864.129721720499&type=3'
				),
				array(
					'image' => 'find-an-event.jpg',
					'alt'	=> 'Find an Event in Your Area',
					'link'	=> 'http://www.greenflashbrew.com/events/category/treasure-chest/'
				),
				array(
					'image' => 'host-your-event.jpg',
					'alt'	=> 'Host Your Own Event',
					'link'	=> 'https://www.pinterest.com/greenflashbeer/treasure-chest-2015/'
				),
				array(
					'image' => 'donate-now.jpg',
					'alt'	=> 'Donate Now',
					'link'	=> 'https://www.youcanpreventcancer.org/greenflashbrewing'
				),
				array(
					'image' => 'race-for-cure.jpg',
					'alt'	=> 'Race for the Cure San Diego',
					'link'	=> 'http://sandiego.info-komen.org/goto/teamtreasurechest'
				),
				// array(
				// 	'image' => 'find-the-beer.jpg',
				// 	'alt'	=> 'Find the Beer',
				// 	'link'	=> 'http://www.greenflashbrew.com/find-beer/'
				// ),
			);
		?>

		<div class="cycle-slideshow"
			data-cycle-fx="carousel"
    		data-cycle-timeout="4000"
    		data-cycle-carousel-visible="3"
    		data-cycle-carousel-fluid="true"
    		data-cycle-next="#next"
    		data-cycle-prev="#prev"
    		data-slides="> div"
		>

		<?php foreach($slides as $slide) { ?>

			<div class="slide"><a target="_blank" href="<?php echo $slide['link']; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/treasure-chest/2015/slider/<?php echo $slide['image']; ?>" alt="<?php echo $slide['alt']; ?>" /></a></div>

		<?php } ?>

		<a href="#" id="next" class="image-replacement">Next</a>
		<a href="#" id="prev" class="image-replacement">Previous</a>
			<!-- <a href="http://www.greenflashbrew.com/events/category/treasure-chest/"><img id="event" src="<?php bloginfo('template_directory'); ?>/images/treasure-chest/2015/find-event.jpg" alt="Find an Event in your area." width="424" height="433" /></a> -->

		</div>

		</div>

		<div class="outerwrap twelvecol first pink">
			<div class="inner-wrap lisa-story" style="clear:both;">
				<div class="threecol first image-holder"></div>
				<div class="ninecol last">
				<h2>Lisa's Story</h2>
				<p>This year, we have many reasons to celebrate. I am grateful to be 5 years cancer free and thrilled to present the 5th annual Treasure Chest campaign including the national debut of this year’s limited edition beer both on draft and in 22 oz. bottles! To date, we have raised over $150,000 for regional breast cancer charities through this national program, and we are pleased to see the momentum and excitement for our initiative grow stronger with each passing year. In addition to hosting our two bi-coastal Treasure Chest Fests, our team will be travelling the country to promote the program nationally. With your help, we are confident our collective efforts will help us reach our 2015 fundraising goal to raise an additional $150,000 for breast cancer charities. We hope you enjoy this year's Treasure Chest 2015 release and look forward to seeing you at the festivals and events. Together we will continue to raise a glass to find a cure.</p>
				<p class="image-replacement" id="lisa-signature">Lisa Hinkley, VP of Marketing and Co-Founder Green Flash Brewing Co.</p>
				</div>
				
			</div>
		</div>

		<div class="outerwrap twelvecol first gray">
			<div class="inner-wrap our-partners">
				<h2 class="image-replacement2">Thank You to Our Partners</h2>
				
				<img src="<?php bloginfo('template_directory'); ?>/images/treasure-chest/2015/our-partners2.jpg" alt="Prevent Cancer. StudioSchulz. Jack Nadel International. Squarepeg Packaging and Printing LLC. Grandstand Glassward &amp; Apparel. Smile. Pop. Party. The photo fun booth. Susan G. Komen. San Diego" width="999" height="115" />
			</div>
		</div>





























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
