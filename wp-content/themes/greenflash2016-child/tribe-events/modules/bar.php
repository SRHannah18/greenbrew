<?php
/**
 * Events Navigation Bar Module Template
 * Renders our events navigation bar used across our views
 *
 * $filters and $views variables are loaded in and coming from
 * the show funcion in: lib/Bar.php
 *
 * @package TribeEventsCalendar
 *
 */
?>

<?php

$filters = tribe_events_get_filters();
$views   = tribe_events_get_views();

$current_url = tribe_events_get_current_filter_url();
$current_uri = $_SERVER['REQUEST_URI'];

?>
<?php if (strpos($current_uri, 'events-at-the-brewery') !== false) { ?>
<div id="events-bar-visit-nav" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch container_wrap fullsize thin-bar" style="background-color: #eeece9;">
	<div class="container">
		<div class="template-page content  av-content-full alpha units">
			<div class="post-entry post-entry-type-page">
				<div class="entry-content-wrapper clearfix">
					<?php dynamic_sidebar( 'Cellar 3 Nav' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } else { ?>
<div id="events-bar-wrapper" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch container_wrap fullsize thin-bar" style="background-color: #ffffff;">
	<div class="container">
		<div class="template-page content  av-content-full alpha units">
			<div class="post-entry post-entry-type-page">
				<div class="entry-content-wrapper clearfix">
					<?php do_action( 'tribe_events_bar_before_template' ) ?>
					<div id="tribe-events-bar">
						<div class="find-text">Find events in your area</div>
						<form id="tribe-bar-form" class="tribe-clearfix" name="tribe-bar-form" method="post" action="<?php echo esc_attr( $current_url ); ?>">
					
							<?php if ( ! empty( $filters ) ) { ?>
								<div class="tribe-bar-filters">
									<div class="tribe-bar-filters-inner tribe-clearfix">
										
										<div class="tribe-bar-geoloc-filter">
          						<label class="label-tribe-bar-geoloc" for="tribe-bar-geoloc">Events in Your Area</label>
          						  <input type="hidden" name="tribe-bar-geoloc-lat" id="tribe-bar-geoloc-lat" value="">
          						  <input type="hidden" name="tribe-bar-geoloc-lng" id="tribe-bar-geoloc-lng" value="">
          						  <?php if($_GET['zip']){ ?>
                        <input type="text" name="tribe-bar-geoloc" id="tribe-bar-geoloc" value="<?php echo $_GET['zip']; ?>" placeholder="city or zip">
                        <?php }else{ ?>
          						  <input type="text" name="tribe-bar-geoloc" id="tribe-bar-geoloc" value="" placeholder="city or zip">
                        <?php } ?>
          						  <div id="tribe-geo-options"><div id="tribe-geo-links">
            				
          				  </div></div></div>
										
										<?php /* foreach ( $filters as $filter ) : ?>

											<div class="<?php echo esc_attr( $filter['name'] ) ?>-filter">
												<label class="label-<?php echo esc_attr( $filter['name'] ) ?>" for="<?php echo esc_attr( $filter['name'] ) ?>"><?php echo $filter['caption'] ?></label>
												<?php echo $filter['html'] ?>
											</div>
										<?php endforeach; */ ?>
										<div class="tribe-bar-submit">
											<input class="btn btn-small btn-zip-search" type="submit" name="submit-bar" value="<?php printf( esc_attr__( 'Find', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?>" />
										</div>
										<!-- .tribe-bar-submit -->
									</div>
									<!-- .tribe-bar-filters-inner -->
								</div><!-- .tribe-bar-filters -->
							<?php } // if ( !empty( $filters ) ) ?>
					
							
						</form>
						<!-- #tribe-bar-form -->
						
						<!-- Views -->
							<?php if ( count( $views ) > 1 ) { ?>
								<div id="tribe-bar-views">
									<div class="tribe-bar-views-inner tribe-clearfix">
										<?php /*
										<h3 class="tribe-events-visuallyhidden"><?php esc_html_e( 'Event Views Navigation', 'the-events-calendar' ) ?></h3>
										<label><?php esc_html_e( 'View As', 'the-events-calendar' ); ?></label>
										<select class="tribe-bar-views-select tribe-no-param" name="tribe-bar-view">
											<?php foreach ( $views as $view ) : ?>
												<option <?php echo tribe_is_view( $view['displaying'] ) ? 'selected' : 'tribe-inactive' ?> value="<?php echo esc_attr( $view['url'] ); ?>" data-view="<?php echo esc_attr( $view['displaying'] ); ?>">
													<?php echo $view['anchor']; ?>
												</option>
											<?php endforeach; ?>
										</select>
										*/ ?>
										<?php foreach ( $views as $view ) : ?>
											<?php if( ! tribe_is_view( $view['displaying'] )) {?>
											<a href="<?php echo esc_attr( $view['url'] ); ?>" class="btn btn-small"><?php if ( $view['anchor'] === 'Month') : ?>Calendar View<?php endif ?><?php if ( $view['anchor'] === 'List') : ?>List View<?php endif ?></a>
										<?php } endforeach; ?>
									</div>
									<!-- .tribe-bar-views-inner -->
								</div><!-- .tribe-bar-views -->
							<?php } // if ( count( $views ) > 1 ) ?>
					
					</div><!-- #tribe-events-bar -->
					<?php
					do_action( 'tribe_events_bar_after_template' ); ?>
				</div>
			</div>
		</div><!-- close content main div -->
	</div>
</div>
<?php } ?>
<script>
  jQuery(window).load(function(){
    <?php if($_GET['zip']){ ?>
      
      //$('#tribe-bar-geoloc').val('<?php echo $_GET['zip']; ?>');
      //$('.btn-zip-search').trigger('click',function(){});
      $('#tribe-bar-form').submit();
      
      
    <?php } ?>
    console.log('hello tribe-bar-geoloc');
  });
</script>