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

if ( get_post_meta( get_the_ID(), '_gfb_bg_color_1', true ) ) {
	 $background_color_1 = get_post_meta( get_the_ID(), '_gfb_bg_color_1', true );
 } else {
	$background_color_1 = '#212325';
}
if ( get_post_meta( get_the_ID(), '_gfb_bg_color_2', true ) ) {
	$background_color_2 = get_post_meta( get_the_ID(), '_gfb_bg_color_2', true );
 } else {
	$background_color_2 = '#656769';
}
$availabilty_text = 'Availability';
if ($gfb_cats === "Cellar 3") {
	$availabilty_text = 'Released';
}
?>
	<?php
/*
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
*/
?>
<div id="single-beer-main" class="avia-section main_color avia-section-default avia-no-shadow avia-full-stretch avia-bg-style-scroll  avia-builder-el-1 el_before_av_section container_wrap fullsize white-text" style="background-color: <?php echo $background_color_1; ?>">


<div class="template-page content  av-content-full alpha units">
<div class="container" role="main">
	<article role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="flex_column av_one_half flex_column_div first top-row-column">
		<?php if ( get_post_meta( get_the_ID(), '_gfb_hero_image', true ) ) { ?>
				<div class="hero-image">
					<img src="<?php echo get_post_meta( get_the_ID(), '_gfb_hero_image', true ); ?>" width="515" alt="<?php echo get_post_meta( get_the_ID(), '_gfb_hero_alt', true ); ?>" />
				</div>
			<?php } ?>
			<div class="single-beer-mobile-split">
				<div class="mobile-bottle-holder"></div>
				<div class="mobile-art-holder"></div>
			</div>
		<header class="beer-header">
			<h1 class="single-beer-title" itemprop="headline"><?php the_title(); ?></h1>
			

			<?php /*
			Just saving in case we want for the future
			<h2 class="single-beer-category"><?php echo $gfb_cats; ?></h2>  

			*/ ?>
		</header> <?php // end header ?>


		<section itemprop="articleBody">
			
			<div class="beer-content-wrap">
				<div class="beer-main-content">
				<?php the_content(); ?>
				</div>
				
			
			</div>

		</section>  <?php // end section ?>
	</div>  <?php // end left column ?>

	<div class="flex_column av_one_fourth flex_column_div top-row-column no-margin-mobile">
			

			<?php if ( get_post_meta( get_the_ID(), '_gfb_beer_bottle', true ) ) { ?>
				<div class="main-beer-image">
					<img src="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_bottle', true ); ?>" alt="<?php the_title(); ?>" />
				</div>
			<?php } ?>
	</div>


	<div class="flex_column av_one_fourth flex_column_div top-row-column no-margin-mobile">
		<div class="image-search">
			<?php if ( get_post_meta( get_the_ID(), '_gfb_beer_info_img', true ) ) { ?>
			
			<img class="image-lockup-right-<?php echo $term->term_id; ?> mobile-image-lockup" src="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_info_img', true ); ?>" width="<?php echo $image_width_right; ?>" alt="<?php echo get_post_meta( get_the_ID(), '_gfb_beer_info_img_alt', true ); ?>" />
		
			<?php } ?>

      <?php
        
        $find_url = '/find-beer/?beer='.str_replace(' ','-',strtolower($post->post_title));
        $find_url_x = get_field('find_beer_url',$post->ID);
        
        if($find_url_x){
          $find_url = $find_url_x;
        }
        
      ?>


			<div class="beer-finder-button">
				<a href="<?php echo $find_url;?>" class="btn btn-large">Find This Beer</a>
			</div>
		</div>
		<?php /* ?>
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
		<?php */ ?>
	</div>

	<?php
	//*********************************************
	//*********************************************
	// VIDEO REVIEWS BEGINS
	//*********************************************
	//*********************************************
	/*
	
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

		  <?php // end section ?>
	<?php // end right column ?>

			<div class="flex_column av_three_fourth flex_column_div first">
				<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_style', true ) ) { ?> 
				<h2><?php echo get_post_meta( get_the_ID(), '_gfb_specs_style', true ); ?></h2>
				<?php } ?>
				<div class="beer-info-wrap" style="color: <?php echo $background_color_2; ?>">
					<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_abv', true ) ) { ?> 
					<span class="abv beer-info-header">ABV</span> <span class="beer-info-content"><?php echo get_post_meta( get_the_ID(), '_gfb_specs_abv', true ); ?></span>
					<?php } ?>
					<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_ibus', true ) ) { ?>
					<span class="ibus beer-info-header">IBU</span> <span class="beer-info-content ibu-content"><?php echo get_post_meta( get_the_ID(), '_gfb_specs_ibus', true ); ?></span>
					<?php } ?>
					<?php if ( get_post_meta( get_the_ID(), '_gfb_specs_availability', true ) ) { ?>
					<br class="mobile-break" />
					<span class="availability beer-info-header"><?php echo $availabilty_text; ?></span> <span class="beer-info-content availability-content"><?php echo get_post_meta( get_the_ID(), '_gfb_specs_availability', true ); ?></span>
				<?php } ?>
				</div>
				
				
			</div>
			<div class="flex_column av_one_fourth flex_column_div">
				<?php 
				if ( get_post_meta( get_the_ID(), '_gfb_specs_options', true ) ) {
				$gfb_options = get_post_meta( get_the_ID(), '_gfb_specs_options', false );
				$gfb_options_array = array();
				foreach($gfb_options as $value)
					{
						$gfb_options_array[$value] = $value;
						
					}

				?>
				<div class="options options-cat-<?php echo $term->term_id; ?>">
					<?php if(isset($gfb_options_array['seven_fifty'])) { ?>
					<div class="single-option seven-fifty icon-row">
						<img src="/wp-content/themes/greenflash2016-child/images/750.png" alt="750 ml bottle" width="20" class="icon-bottle-750ml" />
						<span class="option-title">750 mL.</span>
					</div>
					<?php } ?>
					<?php if(isset($gfb_options_array['twenty_two'])) { ?>
					<div class="single-option seven-fifty icon-row">
						<img src="/wp-content/themes/greenflash2016-child/images/22oz.png" alt="750 ml bottle" width="20" class="icon-bottle-22oz" />
						<span class="option-title">22 oz.</span>
					</div>
					<?php } ?>
					<?php if(isset($gfb_options_array['twelve'])) { ?>
					<div class="single-option seven-fifty icon-row">
						<img src="/wp-content/themes/greenflash2016-child/images/12oz.png" alt="750 ml bottle" width="20" class="icon-bottle" />
						<span class="option-title">12 oz.</span>
					</div>
					<?php } ?>
					<?php if(isset($gfb_options_array['cans'])) { ?>
					<div class="single-option seven-fifty icon-row">
						<img src="/wp-content/themes/greenflash2016-child/images/can.png" alt="12oz Can" class="icon-can" width="20" class="icon-bottle" />
						<span class="option-title">12 oz.</span>
					</div>
					<?php } ?>
					<?php if(isset($gfb_options_array['keg'])) { ?>
					<div class="single-option seven-fifty icon-row">
						<img src="/wp-content/themes/greenflash2016-child/images/keg.png" alt="750 ml bottle" width="20" class="icon-keg" />
						<span class="option-title">Draft</span>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
			<?php if ( ! get_post_meta( get_the_ID(), '_gfb_tasting_notes_appearance', true ) ) { ?>
			<div class="back-to-all-btn desktop-hidden flex_column"><a href="/beer/" class="btn btn-large btn-full-mobile">Back to all beers</a></div>
			<?php } ?>
	</article>  <?php // end article ?>	
</div> <?php // end #main ?>
</div> <?php // end .inner-wrap ?>
</div>
<?php if ( get_post_meta( get_the_ID(), '_gfb_tasting_notes_appearance', true ) ) { ?>
	<div id="single-beer-tasting-notes" class="avia-section main_color avia-section-default avia-no-shadow avia-full-stretch avia-bg-style-scroll  avia-builder-el-1 el_before_av_section container_wrap fullsize white-text" style="background-color: <?php echo $background_color_2; ?>">
		<div class="template-page content  av-content-full alpha units">
			<div class="container" role="main">
				<div class="flex_column av_one_third flex_column_div first">
					<h2>Appearance</h2>
					<p><?php echo get_post_meta( get_the_ID(), '_gfb_tasting_notes_appearance', true ); ?></p>
				</div>
				<div class="flex_column av_one_third flex_column_div">
					<h2>Aroma</h2>
					<p><?php echo get_post_meta( get_the_ID(), '_gfb_tasting_notes_aroma', true ); ?></p>
				</div>
				<div class="flex_column av_one_third flex_column_div">
					<h2>Flavor</h2>
					<p><?php echo get_post_meta( get_the_ID(), '_gfb_tasting_notes_flavor', true ); ?></p>
				</div>
				<div class="back-to-all-btn desktop-hidden flex_column"><a href="/beer/" class="btn btn-large btn-full-mobile">Back to all beers</a></div>
			</div>
		</div>
	</div>
<?php } ?>
<?php //endwhile; else : ?>

						

<?php //endif; ?>

<?php 
include(get_stylesheet_directory().'/includes/beer-subnav.php');
include(get_stylesheet_directory().'/includes/beer-footer.php');
	
get_footer();
