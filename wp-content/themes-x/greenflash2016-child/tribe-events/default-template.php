<?php

global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();
		
	 $title = tribe_is_month() ? __('Calendar of Events', 'avia_framework') : tribe_get_events_title(false);
 	 $args = array('title'=> $title, 'link'=>'');
 	 
 	 
 	 $terms = get_the_terms(get_the_ID(), 'tribe_events_cat');
 	 // EDIT HERE - RW
	 $count = count($terms);
		if ( $count > 0 ){
			foreach ( $terms as $term ) {
		    		$category = $term->term_id;
		    		break;
			}
		}
		
		$catVar = 'tribe_events_cat_';
		$catVar .= $category;

    
		
		if (is_singular()){
			$custom_header_image      = get_field('header_image', $catVar);
			$custom_header_image_top  = get_field('header_image_top', $catVar);
		}else{
  		// get category header image
  		$cat_name = tribe_meta_event_category_name();
  		
      $terms    = get_terms("tribe_events_cat");
   		$count    = count($terms);
   		if ( $count > 0 ){

   		    foreach ( $terms as $term ) {
     		    
     		    if($cat_name == $term->name){
       		    
       		    
       		    $cat_id    = $term->term_id;
       		    $cat_slug  = $term->slug;
       		    $catVar    = 'tribe_events_cat_'.$cat_id;
              $custom_header_image      = get_field('header_image', $catVar);
              $custom_header_image_top  = get_field('header_image_top', $catVar);
              
              echo '<!-- term_id: '.$cat_id.' -->';
              
              //echo $custom_header_image;
              //echo $custom_header_image_top;
   		      }
   		    } // end for
   		} // end if
		} // end if
		
		
 	 	
 	 	$header_image     = '/wp-content/uploads/2016/04/event-calendar-banner.jpg';
 	 	$header_image_top = '/wp-content/uploads/2016/04/headline-event-calendar.png';
 	 	
 	 	if ($custom_header_image != '') $header_image = $custom_header_image;
 	 	if ($custom_header_image_top != '') $header_image_top = $custom_header_image_top;
 	 
 	 if( !is_singular() || get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title($args);
 	 
 	 do_action( 'ava_after_main_title' );
 	 
	 ?>
	 <div class="main_color">
				<div id="event-banner" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch avia-bg-style-scroll banner container_wrap fullsize" style="background-repeat: no-repeat; background-image: url(<?php echo $header_image ?>); background-attachment: scroll; background-position: center center; " data-section-bg-repeat="stretch">
					<div class="container">
						<div class="template-page content  av-content-full alpha units">
							<div class="post-entry post-entry-type-page post-entry-10682">
								<div class="entry-content-wrapper clearfix">
									<div class="avia-image-container  av-styling-   avia-builder-el-3  avia-builder-el-no-sibling   avia-align-center " itemscope="itemscope" itemtype="https://schema.org/ImageObject">
										<div class="avia-image-container-inner">
											<img class="avia_image " src="<?php echo $header_image_top ?>" alt="" title="headline-event-calendar" itemprop="contentURL">
										</div>
									</div>
								</div>
							</div>
						</div><!-- close content main div -->
					</div>
				</div>
				<div class="clear"></div>
				
				
				
				<main class='template-page template-event-page' <?php avia_markup_helper(array('context' => 'content','post_type'=>'page'));?>>
					
					 <div id="tribe-events-pg-template">
              
              
               
                 	<?php
                 	
					tribe_events_before_html();
					tribe_get_view();
					tribe_events_after_html(); 
					
					?>
					
					</div> <!-- #tribe-events-pg-template -->
					
				<!--end content-->
				</main>
	 </div>



<?php get_footer(); ?>