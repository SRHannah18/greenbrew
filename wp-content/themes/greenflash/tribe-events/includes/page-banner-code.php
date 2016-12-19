<?php 

// checking permalink...if main page show main image
// otherwise show specific category images
$perma_link = esc_attr($_SERVER['REQUEST_URI']);
$current_perma = substr($perma_link,-7);
//echo $current_perma;
if($current_perma != 'events/' && $current_perma != 's/past/') { 
$event_cats = tribe_get_event_cat_ids();
//echo count($event_cats);

foreach($event_cats as $value) {$event_cat = $value;}
//echo 'Value = '.$event_cat . '<br />';
 
include('category-image-array.php');

if(!is_numeric($event_cat) || !array_key_exists($event_cat,$cat_header_images)) {$event_cat = 0;}
//if(!array_key_exists($event_cat,$cat_header_images)) {$event_cat = 0;}
?>
<h1 class="news-events-header"><?php echo tribe_meta_event_category_name(); ?></h1>
<?php

if($deviceType != 'phone') { ?>
	<img style="display:block;" class="news-events-banner" src="<?php bloginfo('template_directory'); ?>/images/events/cat-headers/<?php echo $cat_header_images[$event_cat]['img_desktop']; ?>" alt="<?php echo $cat_header_images[$event_cat]['img_alt']; ?>" width="1400" height="300" />
<?php } else { ?>
	<img class="news-events-banner" src="<?php bloginfo('template_directory'); ?>/images/events/cat-headers/mobile/<?php echo $cat_header_images[$event_cat]['img_mobile']; ?>" alt="<?php echo $cat_header_images[$event_cat]['img_alt']; ?>" width="1400" height="300" />
<?php } ?>

<?php } else { // eof is this page showing all? ?>
<h1 class="news-events-header">News &amp; Events</h1>
<img style="display:block;" id="events-banner" src="<?php bloginfo('template_directory'); ?>/images/events/beer-events.jpg" alt="News and Events" width="1400" height="300" />
<?php } ?>