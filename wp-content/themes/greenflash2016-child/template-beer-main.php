<?php
	/*
	Template Name: Beer Main
	*/
	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config, $post;

	if ( post_password_required() )
    {
		get_template_part( 'page' ); exit();
    }

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();


 	 // set up post data
	 setup_postdata( $post );

	 //check if we want to display breadcumb and title
	 if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title();
	 
	 do_action( 'ava_after_main_title' );

	 //filter the content for content builder elements
	 $content = apply_filters('avia_builder_precompile', get_post_meta(get_the_ID(), '_aviaLayoutBuilderCleanData', true));

	 //if user views a preview me must use the content because WordPress doesn't update the post meta field
	if(is_preview())
	{
		$content = apply_filters('avia_builder_precompile', get_the_content());
	}

	 //check first builder element. if its a section or a fullwidth slider we dont need to create the default openeing divs here

	 $first_el = isset(ShortcodeHelper::$tree[0]) ? ShortcodeHelper::$tree[0] : false;
	 $last_el  = !empty(ShortcodeHelper::$tree)   ? end(ShortcodeHelper::$tree) : false;
	 if(!$first_el || !in_array($first_el['tag'], AviaBuilder::$full_el ) )
	 {
        echo avia_new_section(array('close'=>false,'main_container'=>true, 'class'=>'main_color container_wrap_first'));
	 }
	
	$content = apply_filters('the_content', $content);
	$content = apply_filters('avf_template_builder_content', $content);
	echo $content;


	$avia_wp_link_pages_args = apply_filters('avf_wp_link_pages_args', array(
																			'before' =>'<nav class="pagination_split_post">'.__('Pages:','avia_framework'),
														                    'after'  =>'</nav>',
														                    'pagelink' => '<span>%</span>',
														                    'separator'        => ' ',
														                    ));

	wp_link_pages($avia_wp_link_pages_args);

	
	
	//only close divs if the user didnt add fullwidth slider elements at the end. also skip sidebar if the last element is a slider
	if(!$last_el || !in_array($last_el['tag'], AviaBuilder::$full_el_no_section ) )
	{
		$cm = avia_section_close_markup();

		echo "</div>";
		echo "</div>$cm <!-- section close by builder template -->";

		//get the sidebar
		if (is_singular('post')) {
		    $avia_config['currently_viewing'] = 'blog';
		}else{
		    $avia_config['currently_viewing'] = 'page';
		}
		get_sidebar();
	}
	else
	{
		echo "<div><div>";
		
	}


echo avia_sc_section::$close_overlay;
echo '		</div><!--end builder template-->';
echo '</div><!-- close default .container_wrap element -->';

if ( function_exists( 'ot_get_option' ) ) {
			$year_round_heading_image = ot_get_option( 'year_round_heading_image');
			$year_round_heading_text = ot_get_option( 'year_round_heading_text');
			$year_round_bg_image = ot_get_option( 'year_round_bg_image');
		} ?>

	<div id="national" class="avia-section main_color center-text beer-types thin-bar" style="background-image:url(<?php echo $year_round_bg_image; ?>);">
		<div class="container">
			<div class="template-page content av-content-full alpha units">
			
			<div class="constant-text">
			<div class="sp-text">12 & 22oz.</div><h2 class="h1"><?php echo $year_round_heading_text; ?></h2>
			</div>
			
		<div id="slide-beers" class="slide-overlay">
			<ul>

		<?php 
		if ( function_exists( 'ot_get_option' ) ) {
			$beer_lineup_ntl_bottles = ot_get_option( 'beer_lineup_ntl_bottles', array());
			$beer_lineup_ntl_bottles = array_splice($beer_lineup_ntl_bottles,0,13);
			$x = 1;
			foreach($beer_lineup_ntl_bottles as $info) {
			if($x % 11 == 1) {$li_class = ' class="first"';}
			elseif($x % 11 == 0) {$li_class = ' class="last"';}
			else {$li_class = '';}
			if($deviceType != 'phone') {
				$beer_image = $info['beer_natl_lineup_image'];
			} else {
				$beer_image = $info['beer_natl_lineup_image2'];
			}
			?>
			<li<?php echo $li_class; ?>><a href="<?php echo $info['beer_natl_lineup_url']; ?>"><img src="<?php echo $beer_image; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="79" height="324" /><span><?php echo $info['title']; ?></span></a><span class="glow"></span></li>
			<?php
			$x++;
			}
		} // eof check
		?>
			</ul>
		</div>
			
						
		</div> <?php // end .inner-wrap ?>
		</div>


	</div> <?php // end .outer-wrap #national ?>
	<?php // START SEASONAL ?>
		

		<?php if ( function_exists( 'ot_get_option' ) ) {
		$seasonal_heading_image = ot_get_option('seasonal_heading_image');
		$seasonal_heading_text = ot_get_option('seasonal_heading_text');
		$seasonal_background_image = ot_get_option( 'seasonal_background_image');
		} ?>

		<div id="seasonal"  style="background-image:url(<?php echo $seasonal_background_image; ?>);" class="avia-section main_color center-text beer-types thin-bar">
			<div class="container">
			<div class="template-page content av-content-full alpha units">
				<div class="slide-overlay">
				<div class="sp-text">12oz.</div><h2 class="h1"><?php echo $seasonal_heading_text; ?></h2>
				<ul>
				<?php	if ( function_exists( 'ot_get_option' ) ) {
				$seasonal_beer_bottles = ot_get_option( 'seasonal_beer_bottles', array());
				$seasonal_beer_bottles = array_splice($seasonal_beer_bottles,0,13);
				$x = 1;
				foreach($seasonal_beer_bottles as $info) {
				if($x % 11 == 1) {$li_class = ' class="first"';}
				elseif($x % 11 == 0) {$li_class = ' class="last"';}
				else {$li_class = '';}
				if($deviceType != 'phone') {
					$beer_image = $info['seasonal_beer_image_desktop'];
				} else {
					$beer_image = $info['seasonal_beer_image_mobile'];
				}
				?>
					<li><a href="<?php echo $info['seasonal_beer_link']; ?>"><img src="<?php echo $beer_image; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="79" height="324"><span><?php echo $info['title']; ?></span></a><span class="dates">&nbsp;</span><span class="glow"></span></li>

				<?php 
					} 
				} 
				?>
					
				</ul>
				</div>
			</div>
			</div>
		</div>
		<?php // END SEASONAL ?>

		<?php // START HOP ODYSSEY ?>


		<?php if ( function_exists( 'ot_get_option' ) ) {
		$hop_odyssey_heading_image = ot_get_option('hop_odyssey_heading_image');
		$hop_odyssey_heading_text = ot_get_option('hop_odyssey_heading_text');
		$hop_odyssey_background_image = ot_get_option( 'hop_odyssey_background_image');
		$hop_odyssey_show = ot_get_option( 'show_hop_odyssey');
		} ?>

		<?php if ($hop_odyssey_show) { ?>
			<div id="hop" class="avia-section main_color beer-types white-text center-text thin-bar" style="background-image:url(<?php echo $hop_odyssey_background_image; ?>);">
				<div class="container">
				<div class="template-page content av-content-full alpha units">
					
					<div class="constant-text">
					<h2 class="h1"><?php echo $hop_odyssey_heading_text; ?></h2>
					</div>
					
				<div id="slide-kegs" class="slide-overlay">
					<ul>
	
				<?php 
				if ( function_exists( 'ot_get_option' ) ) {
					$beer_hop_odyssey_kegs = ot_get_option( 'beer_hop_odyssey_kegs', array());
					$beer_hop_odyssey_kegs = array_splice($beer_hop_odyssey_kegs,0,6);
	
					$hop_beer_images = array();
					$hop_beer_alts = array();
					$x = 1;
					foreach($beer_hop_odyssey_kegs as $info) {
					if($deviceType != 'phone') {
						$beer_image = $info['beer_keg_image'];
						$hop_beer_images[$x] = $beer_image;
						$hop_beer_alts[$x] = $info['title']; 
					} else {
						$beer_image = $info['beer_keg_image2'];
					}
					?>
					<li><a href="<?php echo $info['beer_keg_link']; ?>"><img src="<?php echo $beer_image; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="79" height="324" /><span><?php echo $info['title']; ?></span></a><span class="glow"></span></li>
					<?php
					$x++;
					}
				} // eof check
				?>
					</ul>
				</div>
					
								
				</div> <?php // end .inner-wrap ?>
				</div>
	
			</div>
			<?php } ?>

		<?php 
		// BEGIN CELLAR 3
		//*************************************
		//*************************************
		//*************************************
		?>

		<?php if ( function_exists( 'ot_get_option' ) ) {
		$cellar_3_heading_text = ot_get_option('cellar_3_heading_text');
		$cellar_3_heading_image = ot_get_option('cellar_3_heading_image');
		$cellar_3_background_image = ot_get_option( 'cellar_3_background_image');
		} ?>

		
		<div id="cellar-3-main" class="avia-section main_color beer-types white-text center-text thin-bar" style="background-image:url(<?php echo $cellar_3_background_image; ?>);">

			<div class="container">
			<div class="template-page content av-content-full alpha units">
				
				<div class="constant-text">
				<h2 class="h1"><?php echo $cellar_3_heading_text; ?></h2>
				</div>


			<div id="slide-cellar-3" class="slide-overlay">
				<ul>

			<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$beer_barrel_aged_bottles = ot_get_option( 'beer_barrel_aged_bottles', array());
				$beer_barrel_aged_bottles = array_splice($beer_barrel_aged_bottles,0,9);

				$hop_beer_images = array();
				$hop_beer_alts = array();
				$x = 1;
				foreach($beer_barrel_aged_bottles as $info) {
				if($deviceType != 'phone') {
					$beer_image = $info['barrel_aged_image'];
					$hop_beer_images[$x] = $beer_image;
					$hop_beer_alts[$x] = $info['title']; 
				} else {
					$beer_image = $info['barrel_aged_image2'];
				}
				?>
				<li><a href="<?php echo $info['beer_barrel_link']; ?>"><img src="<?php echo $beer_image; ?>" alt="<?php echo $info['title']; ?> beer bottle" width="79" height="324" /><span><?php echo $info['title']; ?></span></a><span class="dates">&nbsp;</span><span class="glow"></span></li>
				<?php
				$x++;
				}
			} // eof check
			?>
				</ul>
			</div>
			</div>
			</div>

		</div>
	<?php 
		// BEGIN GENUIS LABS
		//*************************************
		//*************************************
		//*************************************
		?>

		<?php if ( function_exists( 'ot_get_option' ) ) {
			$genius_lab_heading_text = ot_get_option('genius_lab_heading_text');
			$genius_lab_heading_image = ot_get_option('genius_lab_heading_image');
			$genius_lab_background_image = ot_get_option('genius_lab_background_image');
			$genius_lab_content = ot_get_option('genius_lab_content');
			$genius_lab_link = ot_get_option('genius_lab_link');
			//$CHANGE = ot_get_option('CHANGE', array());
		} ?>
		<div id="genuis2" class="avia-section main_color beer-types white-text center-text thin-bar" style="background-image:url(<?php echo str_replace('http://greenflashbrew.wpengine.com','',$genius_lab_background_image); ?>);">
			<div class="container">
			<div class="template-page content av-content-full alpha units">
				
				<div class="constant-text">
				<h2 class="h1"><?php echo $genius_lab_heading_text; ?></h2>
				
				</div>
				
			<div id="slide-genuis2" class="slide-overlay">
				<p><?php echo $genius_lab_content; ?></p>
				
			</div>
				
							
			</div> <?php // end .inner-wrap ?>

		</div> <?php // end .outer-wrap #national ?>
		</div>
		<?php // EOF BARREL ROOM ?>


<?php
include(get_stylesheet_directory().'/includes/beer-subnav.php');
include(get_stylesheet_directory().'/includes/beer-footer.php');


get_footer();
