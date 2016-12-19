<?php
	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();


	 echo avia_title(array('title' => __('Error 404 - page not found', 'avia_framework')));
	 
	 do_action( 'ava_after_main_title' );
	 
	 $image_404_option = ot_get_option( '404_banner_image', array(array('text' => 'Default 404 Image', 'image' => '/wp-content/uploads/2014/01/404BG_2.jpg')) );
	 
	 
	 $upper_bound = count($image_404_option) - 1;
	 
	 //print_r($image_404_option);
	 //echo '<br />'.$upper_bound;
	 
	 $image_404 = isset($image_404_option) ? $image_404_option[rand(0, $upper_bound)]['image'] : '/wp-content/uploads/2014/01/404BG_2.jpg';
	 
	 foreach($image_404_option AS $option_x){
     $image_404 = $option_x['image']; // hardcode for now because code above is not working.
     break;
   }
	
	?>  


		<div id="page404" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch avia-bg-style-scroll container_wrap white-text fullsize  <?php avia_layout_class( 'main' ); ?>" style="background-repeat: no-repeat; background-image: url(<?php echo "'".$image_404."'"; ?>); background-attachment: scroll; background-position: center center; " data-section-bg-repeat="stretch">
			
			<?php 
				do_action('avia_404_extra'); // allows user to hook into 404 page fr extra functionallity. eg: send mail that page is missing, output additional information
			?>
			
			<div class='container'>

				<main class='template-page content <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content'));?>>


                    <div class="entry entry-content-wrapper clearfix" id='search-fail'>
	                    <div class="largest-text">Well This is awkward</div>
											<form action='/' id='searchform' method='get' class="clearfix"><input type='text' id='s' name='s' value='' placeholder='You look lost, try again' /><input type='submit' value='Search' class='btn btn-large' /></form>
                    </div>

				<!--end content-->
				</main>

				<?php

				//get the sidebar
				$avia_config['currently_viewing'] = 'page';
				get_sidebar();

				?>

			</div><!--end container-->

		</div><!-- close default .container_wrap element -->




<?php get_footer(); ?>