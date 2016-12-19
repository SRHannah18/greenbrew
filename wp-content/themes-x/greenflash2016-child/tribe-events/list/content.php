<?php
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="tribe-events-list">
  
  
  
	<?php /* ?>
	<div id="events-list-title" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch container_wrap fullsize" style="background-color: #ffffff;">
		<div class="container">
			<div class="template-page content  av-content-full alpha units">
				<div class="post-entry post-entry-type-page">
					<div class="entry-content-wrapper clearfix">
						<!-- List Title -->
						<?php do_action( 'tribe_events_before_the_title' ); ?>
						<?php /* <h2 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h2> ?>
						<?php do_action( 'tribe_events_after_the_title' ); ?>
					
						<!-- Notices -->
						<?php tribe_the_notices() ?>
					</div>
				</div>
			</div><!-- close content main div -->
		</div>
	</div>
	

	<!-- List Header -->
	<div id="events-list-header" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch container_wrap fullsize" style="background-color: #ffffff;">
		<div class="container">
			<div class="template-page content  av-content-full alpha units">
				<div class="post-entry post-entry-type-page">
					<div class="entry-content-wrapper clearfix">
						<?php do_action( 'tribe_events_before_header' ); ?>
						<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
					
							<!-- Header Navigation -->
							<?php do_action( 'tribe_events_before_header_nav' ); ?>
							<?php tribe_get_template_part( 'list/nav', 'header' ); ?>
							<?php do_action( 'tribe_events_after_header_nav' ); ?>
					
						</div>
					</div>
				</div>
			</div><!-- close content main div -->
		</div>
	</div>
	
	<!-- #tribe-events-header -->
	<?php */ ?>
	<?php do_action( 'tribe_events_after_header' ); ?>
	<div id="events-list-loop" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch container_wrap fullsize" style="background-color: #eeece9;">
		<div class="container">
			<div class="template-page content  av-content-full alpha units">
				<div class="post-entry post-entry-type-page">
					<div class="entry-content-wrapper clearfix">
  					
  					<?php
    				
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
           		      } // end if
           		    } // end for
           		} // end if

    				
    				$go_bottle_caps = 'no';	
    				if($cat_id == 68){ // go sd 
    					$tasting_room     = '/visit/green-flash-san-diego/tasting-room';
    					$brewery_events   = '/events/category/green-flash-san-diego-brewery-events/';
    					$brewery_tours    = '/visit/green-flash-san-diego/brewery-tours';
    					$private_rentals  = '/visit/green-flash-san-diego/private-rentals';
    					$food_menus       = '/visit/green-flash-san-diego/food-menus';
    					$on_tap           = '/visit/green-flash-san-diego/on-tap-beers';
    					$go_bottle_caps   = 'yes';
    				}
    				
    				if($cat_id == 70){ // go cellar 3 
    					$tasting_room     = '/visit/green-flash-cellar3/tasting-room';
    					$brewery_events   = '/events/category/cellar-3-brewery-events/';
    					$brewery_tours    = '/visit/green-flash-cellar3/brewery-tours';
    					$private_rentals  = '/visit/green-flash-cellar3/private-rentals';
    					$food_menus       = '/visit/green-flash-cellar3/food-menus/';
    					$on_tap           = '/visit/green-flash-cellar3/on-tap-beers/';
    					$go_bottle_caps   = 'yes';
    				}
    				
    				if($go_bottle_caps == 'yes'){
  					?>
  					<div class="entry-content-wrapper clearfix">
              <div class="avia-builder-widget-area clearfix  avia-builder-el-3  el_before_av_textblock  avia-builder-el-first "><div id="text-11" class="widget clearfix widget_text">			<div class="textwidget"><ul class="visit-nav">
              	<li><a href="<?php echo $tasting_room; ?>" class="alignnone" style="margin: 0px; padding: 0px; display: inline-block; position: relative; overflow: hidden;"><img class="alignnone size-full wp-image-10568" src="/wp-content/uploads/2014/02/visit-nav-tasting-room.png" alt="visit-nav-tasting-room" width="316" height="316"><span class="image-overlay overlay-type-extern" style="left: -5px; top: 0px; overflow: hidden; display: block; height: 126px; width: 136px;"><span class="image-overlay-insid"></span></span></a></li>
              	<li><a href="<?php echo $brewery_events; ?>" class="alignnone" style="margin: 0px; padding: 0px; display: inline-block; position: relative; overflow: hidden;"><img class="alignnone size-full wp-image-10570" src="/wp-content/uploads/2014/02/visit-nav-brewery-events.png" alt="visit-nav-brewery-events" width="316" height="316"><span class="image-overlay overlay-type-extern" style="left: -5px; top: 0px; overflow: hidden; display: block; height: 126px; width: 136px;"><span class="image-overlay-insid"></span></span></a></li>
              	<li><a href="<?php echo $brewery_tours; ?>" class="alignnone" style="margin: 0px; padding: 0px; display: inline-block; position: relative; overflow: hidden;"><img class="alignnone size-full wp-image-10565" src="/wp-content/uploads/2014/02/visit-nav-brewery-tours.png" alt="visit-nav-brewery-tours" width="316" height="316"><span class="image-overlay overlay-type-extern" style="left: -5px; top: 0px; overflow: hidden; display: block; height: 126px; width: 136px;"><span class="image-overlay-insid"></span></span></a></li>
              	<li><a href="<?php echo $private_rentals; ?>" class="alignnone" style="margin: 0px; padding: 0px; display: inline-block; position: relative; overflow: hidden;"><img class="alignnone size-full wp-image-10569" src="/wp-content/uploads/2014/02/visit-nav-private-rentals.png" alt="visit-nav-private-rentals" width="316" height="316"><span class="image-overlay overlay-type-extern" style="left: -5px; top: 0px; overflow: hidden; display: block; height: 126px; width: 136px;"><span class="image-overlay-insid"></span></span></a></li>
              	<li><a href="<?php echo $food_menus; ?>" class="alignnone" style="margin: 0px; padding: 0px; display: inline-block; position: relative; overflow: hidden;"><img class="alignnone size-full wp-image-10567" src="/wp-content/uploads/2014/02/visit-nav-food-menus.png" alt="visit-nav-food-menus" width="316" height="316"><span class="image-overlay overlay-type-extern" style="left: -5px; top: 0px; overflow: hidden; display: block; height: 126px; width: 136px;"><span class="image-overlay-insid"></span></span></a></li>
              	<li><a href="<?php echo $on_tap; ?>" class="alignnone" style="margin: 0px; padding: 0px; display: inline-block; position: relative; overflow: hidden;"><img class="alignnone size-full wp-image-10566" src="/wp-content/uploads/2014/02/visit-nav-on-tap-this-week.png" alt="visit-nav-on-tap-this-week" width="316" height="316"><span class="image-overlay overlay-type-extern"><span class="image-overlay-insid"></span></span></a></li>
              </ul></div>
              </div></div>
              </div>
              <?php }// end SD ?>
  					
  					
						<!-- Events Loop -->
						<?php if ( have_posts() ){ ?>
							<?php do_action( 'tribe_events_before_loop' ); ?>
							<?php tribe_get_template_part( 'list/loop' ) ?>
							<?php do_action( 'tribe_events_after_loop' ); ?>
						<?php }else{ ?>
						  No Results Found
						<?php } ?>
					</div>
				</div>
			</div><!-- close content main div -->
		</div>
	</div>

	

	<!-- List Footer -->
	<div id="events-list-footer" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch container_wrap fullsize thin-bar" style="background-color: #ffffff;">
		<div class="container">
			<div class="template-page content  av-content-full alpha units">
				<div class="post-entry post-entry-type-page">
					<div class="entry-content-wrapper clearfix">
							<?php do_action( 'tribe_events_before_footer' ); ?>
							<div class="export-list-wrap">
								<?php do_action( 'tribe_events_after_footer' ) ?>
							</div>
						<div id="tribe-events-footer">
					
							<!-- Footer Navigation -->
							<?php do_action( 'tribe_events_before_footer_nav' ); ?>
							<?php tribe_get_template_part( 'list/nav', 'footer' ); ?>
							<?php do_action( 'tribe_events_after_footer_nav' ); ?>
					
						</div>
						<!-- #tribe-events-footer -->
						
						
					</div>
				</div>
			</div><!-- close content main div -->
		</div>
	</div>
	

</div><!-- #tribe-events-content -->
