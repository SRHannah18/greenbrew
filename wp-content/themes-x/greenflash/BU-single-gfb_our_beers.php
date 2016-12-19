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

<?php if ( get_post_meta( get_the_ID(), '_gfb_bg_color', true ) ) { ?>
	<?php $background_class = get_post_meta( get_the_ID(), '_gfb_bg_color', true ); ?>
<?php } else {
	$background_class = 'green';
} ?>


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


	<div class="sevencol first left-column">
		<header class="beer-header">
			<h1 class="single-beer-title" itemprop="headline"><?php the_title(); ?></h1>
			<?php if($term->term_id == 4) { 
				$fog_number = get_post_meta( get_the_ID(), '_gfb_fog_number', true );
			?>
			<h2 class="flash-of-genius-txt mobile-border-bottom"><span class="title">Flash of Genius</span> <span class="image-replacement2 number number-<?php echo $fog_number; ?>"><?php echo $fog_number; ?></span></h2>
			<?php } ?>
			

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


			<?php if ( get_post_meta( get_the_ID(), '_gfb_tasting_notes', true ) ) { ?>
			<h2>Tasting Notes <span class="chucksilva image-replacement2">&mdash; Chuck Silva, Brewmaster</span></h2>
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
					<span class="availability image-replacement2">Availibility:</span> <?php echo get_post_meta( get_the_ID(), '_gfb_specs_availability', true ); ?>
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
					<?php if(isset($gfb_options_array['twelve'])) { ?>
					<span class="twelve-oz image-replacement2">12oz</span>
					<?php } ?>
					<?php if(isset($gfb_options_array['twenty_two'])) { ?>
					<span class="twenty-two-oz image-replacement2">22oz</span>
					<?php } ?>
					<?php if(isset($gfb_options_array['keg'])) { ?>
					<span class="keg image-replacement2">Keg</span>
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
					<label for="zipcode">ZipCode</label>
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



			<div class="twelvecol first store mobile-border-top mobile-border-bottom" id="store-div">
				<h2 class="image-replacement2">Visit the Shop for More Gear</h2>
				<a class="single-button" target="_blank" id="shop-now" href="http://green-flash-gift-shop.myshopify.com/">Shop Now</a>


				<?php 
				$store_check_1 = get_post_meta( get_the_ID(), '_gfb_store_img_left', true );
				$store_check_1b = get_post_meta( get_the_ID(), '_gfb_store_img_right', true );
				$store_check_2 = ot_get_option( 'store_products', array());
				if ($store_check_1 != '' || count($store_check_2) > 0) { 
					if($store_check_1 == '' || $store_check_1b == '') {
						// we will get two random store products
						if(count($store_check_2) > 0) {


							$num_count = count($store_check_2);
							if($num_count > 2) {$num_count = 2;}
							$product_info = $store_check_2;
							//$rand_keys = array();
							$rand_keys = array_rand($store_check_2,$num_count);
							//if($rand_keys[0] == '') {$rand_keys[0] == 0;}
						}
					}

				?>



				<div class="sixcol first store-image" data-id="detail-1">
					<?php 
					if ( get_post_meta( get_the_ID(), '_gfb_store_img_left', true ) ) {

						$store_title = get_post_meta( get_the_ID(), '_gfb_store_title_left', true );
						$store_image = get_post_meta( get_the_ID(), '_gfb_store_img_left', true );
						$store_url = get_post_meta( get_the_ID(), '_gfb_store_url_left', true );
						$store_price = get_post_meta( get_the_ID(), '_gfb_store_price_left', true );
					 
					 } elseif(isset($product_info)) { // if there is no individual product use random ones

					 	$store_title = $product_info[$rand_keys[0]]['store_product_name'];
						$store_image = $product_info[$rand_keys[0]]['store_product_image'];
						$store_url = $product_info[$rand_keys[0]]['store_product_link'];
						$store_price = $product_info[$rand_keys[0]]['store_product_price'];

					 } 

						//print_r($product_info);
						//echo '<br /><br />Rand Key = '.$rand_keys[0] . 'Count = '. count($rand_keys);
					 ?>

					<img src="<?php echo $store_image; ?>" alt="<?php echo $store_title; ?>" width="191" height="192" />
					<div class="store-details" id="detail-1">
						<h3><?php echo $store_title; ?></h3>
						<p>
							<span class="cost"><?php echo $store_price; ?></span> 
							<a target="_blank" href="<?php echo $store_url; ?>">Details <span class="triangle">&raquo;</span></a>
						</p>
					</div>

					<?php } // eof check for store products ?>

				</div>

				<div class="sixcol last store-image" data-id="detail-2">

					<?php 

					if ($store_check_1b != '' || count($store_check_2) > 0) {

					if ( get_post_meta( get_the_ID(), '_gfb_store_img_right', true ) ) {

						$store_title = get_post_meta( get_the_ID(), '_gfb_store_title_right', true );
						$store_image = get_post_meta( get_the_ID(), '_gfb_store_img_right', true );
						$store_url = get_post_meta( get_the_ID(), '_gfb_store_url_right', true );
						$store_price = get_post_meta( get_the_ID(), '_gfb_store_price_right', true );
					 
					 } else { // if there is no individual product use random ones

					 	$store_title = $product_info[$rand_keys[1]]['store_product_name'];
						$store_image = $product_info[$rand_keys[1]]['store_product_image'];
						$store_url = $product_info[$rand_keys[1]]['store_product_link'];
						$store_price = $product_info[$rand_keys[1]]['store_product_price'];


					 } ?>

					<img src="<?php echo $store_image; ?>" alt="<?php echo $store_title; ?>" width="191" height="192" />
					<div class="store-details" id="detail-2">
						<h3><?php echo $store_title; ?></h3>
						<p>
							<span class="cost"><?php echo $store_price; ?></span> 
							<a target="_blank" href="<?php echo $store_url; ?>">Details <span class="triangle">&raquo;</span></a>
						</p>
					</div>

					<?php } ?>

				</div>

				<?php
				// let's check for beer links
				if ( get_post_meta( get_the_ID(), '_gfb_rate_beer_link', true ) ) {
					$rate_beer_link = get_post_meta( get_the_ID(), '_gfb_rate_beer_link', true);
				} else {
					$rate_beer_link = 'http://www.ratebeer.com/brewers/green-flash-brewing-co/3111/';
				}

				if ( get_post_meta( get_the_ID(), '_gfb_beer_advocate_link', true ) ) {
					$beer_advocate_link = get_post_meta( get_the_ID(), '_gfb_beer_advocate_link', true);
				} else {
					$beer_advocate_link = 'http://www.beeradvocate.com/beer/profile/2743/';
				}
				?>

				<div class="twelvecol first rate-beer">
				<h2 class="image-replacement2">Rate &amp; Review</h2>
				<a target="_blank" rel="nofollow" class="image-replacement2" id="rate-beer" href="<?php echo $rate_beer_link; ?>">RateBeer</a>
				<a target="_blank" rel="nofollow" class="image-replacement2" id="beer-advocate" href="<?php echo $beer_advocate_link; ?>">Beer Advocate</a>
				</div>


			</div>

			
			<div class="twelvecol first">
			<p><a id="all-beers-link" class="single-button" href="<?php bloginfo('wpurl'); ?>/beer">All Beers</a></p>
			</div>

		</section>  <?php // end section ?>
	</div> <?php // end right column ?>

	</article>  <?php // end article ?>	
</div> <?php // end #main ?>
</div> <?php // end .inner-wrap ?>
</div> <?php // end #inner-content ?>
</div> <?php // end #content ?>
<?php endwhile; else : ?>

						

<?php endif; ?>

<?php get_footer(); ?>
