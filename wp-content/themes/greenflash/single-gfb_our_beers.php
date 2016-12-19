<?php 
$posttype = 'gfb_our_beers';

	$taxonomies=get_taxonomies(
	array(
		'object_type' => array ($posttype)),
			'names'
		);

	foreach ($taxonomies as $taxonomy ) { //Assigning all tax names of the posttype to an array
	$taxnames[] = $taxonomy;
	//echo $taxonomy .'<br />';
	}

	$gfb_cats = '';
	$x = 1;
	$terms = get_the_terms( $post->ID, $taxnames[0] );
	foreach ( $terms as $term ) { //Assigning tax terms of current post to an array
	$taxterms[] = $term->slug;
	//echo $term->name . '<br />';
	//echo $term->term_id;
	// Prodigies id = 4
	// Hop Odyssey id = 5
	if($x == 1) {$gfb_cats .= $term->name;} else {$gfb_cats .= ', '.$term->name;}
	$x++;
	}



	// get_posts in same custom taxonomy
	$postlist_args = array(
	
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_type' => $posttype,
	'tax_query' => array(
		array(
		'taxonomy' => $taxnames[0],
		'field' => 'slug',
		'terms' => $taxterms,
		)
	  )
	);
	
	//echo $taxterms;
	
	//print_r($postlist);
	//echo '<br />Current PHP version: ' . phpversion().'<br />';

	// get ids of posts retrieved from get_posts
	$ids = array();
	

	// with get posts
	//$postlist = get_posts($postlist_args);
	//foreach ($postlist as $thepost) {
		//$ids[] = $thepost->ID;
		//echo $thepost->ID. '<br />';
	//}


	// with WP Query
	$the_query = new WP_Query( $postlist_args );
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			//echo get_the_ID().' / ';
			$ids[] = get_the_ID();
		}
	}
	wp_reset_postdata();

// Let's create some category specific variables that always default to Prodigies
if($term->term_id == 5) {
	$image_width_right = '280';
} else {
	$image_width_right = '243';
}

get_header(); 

global $deviceType;
if($deviceType != 'phone') {
	$text_search_submit = '';
} else {
	$text_search_submit = 'Go!';
}

/*
<?php if ( get_post_meta( get_the_ID(), 'CHANGE', true ) ) { ?>
	<?php echo get_post_meta( get_the_ID(), 'CHANGE', true ); ?>
<?php } ?>
*/

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div id="content">
<div id="inner-content" class="wrap clearfix <?php echo $background_class; ?>">
	<?php

// This is the code to navigate between portfolio categories
// on individual posts

// get and echo previous and next post in the same taxonomy        
$thisindex = array_search($post->ID, $ids);

if(!empty($ids[$thisindex-1])) {
$previd = $ids[$thisindex-1];
}

if(!empty($ids[$thisindex+1])) {
$nextid = $ids[$thisindex+1];
}
						

if ( !empty($previd) ) {
	echo '<div class="sixcol first nav-previous post-navigation top"><a class="image-replacement2" rel="prev" href="' . get_permalink($previd). '">&laquo; Previous</a></div>';
}
if ( !empty($nextid) ) {
	echo '<div class="sixcol last text-right nav-next post-navigation top"><a class="image-replacement2" rel="next" href="' . get_permalink($nextid). '">Next &raquo;</a></div>';
}

?>
<div class="inner-wrap clearfix single-beer-inner-wrap">



<div id="main" class="twelvecol first clearfix" role="main">
	<article role="article" itemscope itemtype="http://schema.org/BlogPosting">


<?php 
if(!isset($deviceType)) {$deviceType = 'computer';}

//********************************************
//********************************************
// START DESKTOP
//********************************************
//********************************************

if($deviceType != 'phone') { ?>	


	<div class="sevencol first left-column">
		<header class="beer-header">
			<h1 class="single-beer-title" itemprop="headline"><?php the_title(); ?></h1>
			

			<?php /*
			Just saving in case we want for the future
			<h2 class="single-beer-category"><?php echo $gfb_cats; ?></h2>  

			*/ ?>
		</header> <?php // end header ?>


		<section itemprop="articleBody">
			<?php if ( get_post_meta( get_the_ID(), '_gfb_hero_image', true ) ) { ?>
				<div class="hero-image">
					<img src="<?php echo get_post_meta( get_the_ID(), '_gfb_hero_image', true ); ?>" width="515" alt="<?php echo get_post_meta( get_the_ID(), '_gfb_hero_alt', true ); ?>" />
				</div>
			<?php } ?>
			
			<div class="left-column-padding">
			<div class="beer-main-content mobile-border-bottom">
			<?php the_content(); ?>
			</div>

			<div class="twelvecol first specs mobile-border-bottom">
				<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_style', true ) ) { ?> 
				<p><?php echo get_post_meta( get_the_ID(), '_gfb_specs_style', true ); ?></p>
				<?php } ?>
				<p>
					<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_ibus', true ) ) { ?>
					<span class="ibus image-replacement2">IBU's:</span> <?php echo get_post_meta( get_the_ID(), '_gfb_specs_ibus', true ); ?>
					<?php } ?>
					<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_abv', true ) ) { ?> 
					<span class="abv image-replacement2">ABV:</span> <?php echo get_post_meta( get_the_ID(), '_gfb_specs_abv', true ); ?>
					<?php } ?>
					<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_availability', true ) ) { ?>
					<span class="availability image-replacement2">Availability:</span> <?php echo get_post_meta( get_the_ID(), '_gfb_specs_availability', true ); ?>
				<?php } ?>
				</p>
				
				
			</div>
			<div class="twelvecol first specs mobile-border-bottom">
				<?php 
				if ( get_post_meta( get_the_ID(), '_gfb_specs_options', true ) ) {
				$gfb_options = get_post_meta( get_the_ID(), '_gfb_specs_options', false );
				$gfb_options_array = array();
				foreach($gfb_options as $value)
					{
						$gfb_options_array[$value] = $value;
					}
				?>
				<p class="options options-cat-<?php echo $term->term_id; ?>">
					<?php if(isset($gfb_options_array['keg'])) { ?>
					<span class="keg image-replacement2">Keg</span>
					<?php } ?>
					<?php if(isset($gfb_options_array['twenty_two'])) { ?>
					<span class="twenty-two-oz image-replacement2">22oz</span>
					<?php } ?>
					<?php if(isset($gfb_options_array['twelve'])) { ?>
					<span class="twelve-oz image-replacement2">12oz</span>
					<?php } ?>
					<?php if(isset($gfb_options_array['cans'])) { ?>
					<span class="cans image-replacement2">6 Pack Cans</span>
					<?php } ?>
				</p>
				<?php } ?>
			</div>
			</div> <?php // EOF Left Col Padding ?>

		</section>  <?php // end section ?>
	</div>  <?php // end left column ?>

	<div class="fivecol last right-column">
		<section itemprop="articleBody">
			

			<?php if ( get_post_meta( get_the_ID(), '_gfb_beer_bottle', true ) ) { ?>
				<div class="fourcol first main-beer-image">
					<img src="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_bottle', true ); ?>" width="126" height="507" alt="<?php the_title(); ?>" />
				</div>
			<?php } ?>



			<div class="eightcol last search-beers">
				<div class="image-search">
					<?php if ( get_post_meta( get_the_ID(), '_gfb_beer_info_img', true ) ) { ?>
					
					<img class="image-lockup-right-<?php echo $term->term_id; ?> mobile-image-lockup" src="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_info_img', true ); ?>" width="<?php echo $image_width_right; ?>" alt="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_info_img_alt', true ); ?>" />
				
					<?php } ?>


				<div id="find-this-beer">
					<h2 class="image-replacement2">Find this Beer</h2>
					<form action="<?php bloginfo('wpurl'); ?>/find-beer/" name="the_beer_finder" id="the_beer_finder" method="post" >
					<label for="zipcode">Zip Code</label>
					<input type="text" id="zipcode" data-value="enter zip" value="enter zip" name="d" />
					<input type="hidden" value="GFB" name="custID">
					<?php if ( get_post_meta( get_the_ID(), '_gfb_beer_search_value', true ) ) { ?>
					<input type="hidden" name="b" value="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_search_value', true ); ?>" />
					<?php } ?>
					<input type="submit" value="<?php echo $text_search_submit; ?>" id="zip-submit" />
					</form>
				</div>
				</div>
				<div id="small-beers">
				<ul>
			<?php 
			if ( function_exists( 'ot_get_option' ) ) {

				if($term->term_id == 4) {


				$beer_lineup_ntl_bottles = ot_get_option( 'beer_lineup_ntl_bottles', array());
				$beer_lineup_ntl_bottles = array_splice($beer_lineup_ntl_bottles,0,13);
				foreach($beer_lineup_ntl_bottles as $info) {
					if($info['beer_natl_lineup_image3'] != '') {
				?>
				<li><a href="<?php echo $info['beer_natl_lineup_url']; ?>"><img src="<?php echo $info['beer_natl_lineup_image3']; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="28" height="125" /><span><?php echo $info['title']; ?></span></a><span class="glow"></span></li>
				<?php
					}
				} // EOF PRODIGIES LOOP

				} elseif($term->term_id == 5) {
				// replace with hop odyssey small beers

				$beer_hop_odyssey_kegs = ot_get_option( 'beer_hop_odyssey_kegs', array());
				$beer_hop_odyssey_kegs = array_splice($beer_hop_odyssey_kegs,0,13);
				foreach($beer_hop_odyssey_kegs as $info) {
					if($info['beer_keg_image3'] != '') {
				?>
				<li><a href="<?php echo $info['beer_keg_link']; ?>"><img src="<?php echo $info['beer_keg_image3']; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="28" height="125" /><span><?php echo $info['title']; ?></span></a></span><span class="glow"></span></li>
				<?php
					}
				} // eof odyssey loop

			} elseif($term->term_id == 43) { // SEASONAL
				// replace with hop odyssey small beers

				$seasonal_beer_bottles = ot_get_option( 'seasonal_beer_bottles', array());
				$seasonal_beer_bottles = array_splice($seasonal_beer_bottles,0,13);
				foreach($seasonal_beer_bottles as $info) {
					if($info['seasonal_beer_image_single_beer'] != '') {
				?>
				<li><a href="<?php echo $info['seasonal_beer_link']; ?>"><img src="<?php echo $info['seasonal_beer_image_single_beer']; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="28" height="125" /><span><?php echo $info['title']; ?></span></a></span><span class="glow"></span></li>
				<?php
					}
				} // eof odyssey loop

				} elseif($term->term_id == 6) { // Barrel Aged
				// replace with hop odyssey small beers

				$beer_barrel_aged_bottles = ot_get_option( 'beer_barrel_aged_bottles', array());
				$beer_barrel_aged_bottles = array_splice($beer_barrel_aged_bottles,0,13);
				foreach($beer_barrel_aged_bottles as $info) {
					if($info['barrel_aged_image_single'] != '') {
				?>
				<li><a href="<?php echo $info['beer_barrel_link']; ?>"><img src="<?php echo $info['barrel_aged_image_single']; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="28" height="125" /><span><?php echo $info['title']; ?></span></a></span><span class="glow"></span></li>
				<?php
					}
				} // eof odyssey loop
			
				} // eof else

			} // eof check
			?>
				</ul>
				</div>
			</div>

			<?php
			//*********************************************
			//*********************************************
			// VIDEO REVIEWS BEGINS
			//*********************************************
			//*********************************************
			

			<?php
			//*********************************************
			//*********************************************
			// VIDEO REVIEWS END
			//*********************************************
			//*********************************************
			?>

			<?php /*
			<div class="twelvecol first rate-beer">
				<h2 class="image-replacement2">Rate &amp; Review</h2>
				<a target="_blank" rel="nofollow" class="image-replacement2" id="rate-beer" href="<?php echo $rate_beer_link; ?>">RateBeer</a>
				<a target="_blank" rel="nofollow" class="image-replacement2" id="beer-advocate" href="<?php echo $beer_advocate_link; ?>">Beer Advocate</a>
				</div>

			
			<div class="twelvecol first">
			<p><a id="all-beers-link" class="single-button" href="<?php bloginfo('wpurl'); ?>/beer">All Beers</a></p>
			</div>

			*/ ?>

		</section>  <?php // end section ?>
	</div> <?php // end right column ?>

<?php
//*************************************
//*************************************
// BEGIN MOBILE
//*************************************
//*************************************
?>

	<?php } else { ?>

		<div class="sevencol first left-column">
		


		<section itemprop="articleBody">
			<?php if ( get_post_meta( get_the_ID(), '_gfb_hero_image', true ) ) { ?>
				<div class="hero-image">
					<img src="<?php echo get_post_meta( get_the_ID(), '_gfb_hero_image', true ); ?>" width="515" alt="<?php echo get_post_meta( get_the_ID(), '_gfb_hero_alt', true ); ?>" />
				</div>
			<?php } ?>

			<?php if ( get_post_meta( get_the_ID(), '_gfb_beer_bottle', true ) ) { ?>
				<div class="fourcol first main-beer-image">
					<img src="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_bottle', true ); ?>" width="126" height="507" alt="<?php the_title(); ?>" />
				</div>
			<?php } ?>
			<?php if ( get_post_meta( get_the_ID(), '_gfb_beer_info_img', true ) ) { ?>
					
					<div id="lockup-container"><img class="image-lockup-right-<?php echo $term->term_id; ?> mobile-image-lockup" src="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_info_img', true ); ?>" width="<?php echo $image_width_right; ?>" alt="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_info_img_alt', true ); ?>" />
					<img id="half-flash" src="<?php bloginfo('template_directory'); ?>/images/half-flash.png" alt="Half Flash" />
					</div>
				
					<?php } ?>



			<header class="beer-header">
			
			</header> <?php // end header ?>
			
			<div class="left-column-padding">
			<div class="beer-main-content mobile-border-bottom">
			<?php the_content(); ?>
			</div>




			<?php if ( get_post_meta( get_the_ID(), '_gfb_tasting_notes', true ) ) { ?>
			<h2>Tasting Notes</h2>
			<blockquote>
			<p>&ldquo;<?php echo get_post_meta( get_the_ID(), '_gfb_tasting_notes', true ); ?>&rdquo;</p>
			</blockquote>
			<?php } ?>

			<div class="twelevecol first awards">

			<?php if ( get_post_meta( get_the_ID(), '_gfb_awards', true ) ) { ?>	
			<h2>Awards and Accolades</h2>

				<?php echo get_post_meta( get_the_ID(), '_gfb_awards', true ); ?>

			<?php } ?>
			</div>

			<div class="twelvecol first specs mobile-border-bottom">
				<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_style', true ) ) { ?> 
				<p class="mobile-beer-style"><?php echo get_post_meta( get_the_ID(), '_gfb_specs_style', true ); ?></p>
				<?php } ?>
				<p>
					<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_ibus', true ) ) { ?>
					<span class="ibus image-replacement2">IBU's:</span> <?php echo get_post_meta( get_the_ID(), '_gfb_specs_ibus', true ); ?>
					<?php } ?>
					<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_abv', true ) ) { ?> 
					<span class="abv image-replacement2">ABV:</span> <?php echo get_post_meta( get_the_ID(), '_gfb_specs_abv', true ); ?>
					<?php } ?>
					<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_availability', true ) ) { ?>
					<span class="availability image-replacement2">Availability:</span> <?php echo get_post_meta( get_the_ID(), '_gfb_specs_availability', true ); ?>
				<?php } ?>
				</p>
				
				

				<?php 
				if ( get_post_meta( get_the_ID(), '_gfb_specs_options', true ) ) {
				$gfb_options = get_post_meta( get_the_ID(), '_gfb_specs_options', false );
				$gfb_options_array = array();
				foreach($gfb_options as $value)
					{
						$gfb_options_array[$value] = $value;
					}
				?>
				<p class="options options-cat-<?php echo $term->term_id; ?>">
					<?php if(isset($gfb_options_array['keg'])) { ?>
					<span class="keg image-replacement">Keg</span>
					<?php } ?>
					<?php if(isset($gfb_options_array['twenty_two'])) { ?>
					<span class="twenty-two-oz image-replacement">22oz</span>
					<?php } ?>
					<?php if(isset($gfb_options_array['twelve'])) { ?>
					<span class="twelve-oz image-replacement">12oz</span>
					<?php } ?>
					<?php if(isset($gfb_options_array['cans'])) { ?>
					<span class="cans image-replacement">Cans</span>
					<?php } ?>
				</p>
				<?php } ?>
			</div>
			</div> <?php // EOF Left Col Padding ?>

		</section>  <?php // end section ?>
	</div>  <?php // end left column ?>

	<div class="fivecol last right-column">
		<section itemprop="articleBody">
			

			



			<div class="eightcol last search-beers">
				<div class="image-search">
					


				<div id="find-this-beer">
					<h2 class="image-replacement2">Find this Beer</h2>
					<form action="<?php bloginfo('wpurl'); ?>/find-beer/" name="the_beer_finder" id="the_beer_finder" method="post" >
					<label for="zipcode">Zip Code</label>
					<input type="text" id="zipcode" data-value="enter zip" value="enter zip" name="d" />
					<input type="hidden" value="GFB" name="custID">
					<?php if ( get_post_meta( get_the_ID(), '_gfb_beer_search_value', true ) ) { ?>
					<input type="hidden" name="b" value="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_search_value', true ); ?>" />
					<?php } ?>
					<input type="submit" value="<?php echo $text_search_submit; ?>" id="zip-submit" />
					</form>
				</div>
				</div>
				<div id="small-beers">
				<ul>
			<?php 
			if ( function_exists( 'ot_get_option' ) ) {

				if($term->term_id == 4) {


				$beer_lineup_ntl_bottles = ot_get_option( 'beer_lineup_ntl_bottles', array());
				$beer_lineup_ntl_bottles = array_splice($beer_lineup_ntl_bottles,0,8);
				foreach($beer_lineup_ntl_bottles as $info) {
				?>
				<li><a href="<?php echo $info['beer_natl_lineup_url']; ?>"><img src="<?php echo $info['beer_natl_lineup_image3']; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="28" height="125" /><span><?php echo $info['title']; ?></span></a><span class="glow"></span></li>
				<?php
				} // EOF PRODIGIES LOOP

				} elseif($term->term_id == 5) {
				// replace with hop odyssey small beers

				$beer_hop_odyssey_kegs = ot_get_option( 'beer_hop_odyssey_kegs', array());
				$beer_hop_odyssey_kegs = array_splice($beer_hop_odyssey_kegs,0,8);
				foreach($beer_hop_odyssey_kegs as $info) {
				?>
				<li><a href="<?php echo $info['beer_keg_link']; ?>"><img src="<?php echo $info['beer_keg_image3']; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="28" height="125" /><span><?php echo $info['title']; ?></span></a></span><span class="glow"></span></li>
				<?php
				} // eof odyssey loop
			
				} // eof else

			} // eof check
			?>
				</ul>
				</div>
			</div>



			

				<?php
			//*********************************************
			//*********************************************
			// VIDEO REVIEWS BEGINS
			//*********************************************
			//*********************************************
			
			if ( get_post_meta( get_the_ID(), '_gfb_review_video_code', true ) ) {
				
				$show_default = 'no';
				$review_video_code = get_post_meta( get_the_ID(), '_gfb_review_video_code', true );
				$review_video_title = get_post_meta( get_the_ID(), '_gfb_review_video_title', true );

				if($review_video_title == '') {

					$review_video_title = 'Video Review';
					//echo 'Good!';
				} 
				$review_video_start = get_post_meta( get_the_ID(), '_gfb_review_video_start', true );
				if($review_video_start != '' && is_numeric($review_video_start)) {

					$start_video = '&amp;start='.$review_video_start;
					//echo 'Good!';

				} else {
					
					$start_video = '';
					//echo 'BAD!';
				}

			} else {

				$show_default = 'yes';
			}
			?>



			<div class="twelvecol first video-reviews" style="clear:both;">

				<?php // NO REVIEW AREA ?>

				<?php if($show_default == 'yes') { ?>


				<h2 class="review-us-title"><a class="review-us" target="_blank" href="https://www.youtube.com/playlist?list=PL9d5oYwh4IoNUboXq5smAME6Ag-M9fF1p"><span>Review Our Beer on YouTube.com</span></a></h2>
				<a class="review-us" target="_blank" href="https://www.youtube.com/playlist?list=PL9d5oYwh4IoNUboXq5smAME6Ag-M9fF1p"><img src="<?php bloginfo('template_directory'); ?>/images/single-beers/you-could-be.jpg" /></a>
				


				<?php // REVIEW AREA ?>

				<?php } else { ?>


				
				<h2 class="review-title-custom"><?php echo $review_video_title; ?></h2>
				<a class="single-button" target="_blank" id="you-tube" href="https://www.youtube.com/playlist?list=PL9d5oYwh4IoNUboXq5smAME6Ag-M9fF1p">YouTube</a>

				<iframe width="392" height="221" src="https://www.youtube.com/embed/<?php echo $review_video_code; ?>?showinfo=0<?php echo $start_video; ?>" frameborder="0" allowfullscreen></iframe>

				<?php } ?>
				
			</div>

			<?php
			//*********************************************
			//*********************************************
			// VIDEO REVIEWS END
			//*********************************************
			//*********************************************
			?>



			

			
			




		</section>  <?php // end section ?>
	</div> <?php // end right column ?>

	<?php } ?>

	</article>  <?php // end article ?>	
</div> <?php // end #main ?>
</div> <?php // end .inner-wrap ?>
</div> <?php // end #inner-content ?>
</div> <?php // end #content ?>
<?php endwhile; else : ?>

						

<?php endif; ?>

<?php get_footer(); ?>
