<?php
	
require_once( 'library/greenflash-post-types.php' ); 

require_once( 'library/custom-metaboxes.php' );
/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/

add_action('init', function() {
  wp_enqueue_script('globalize-jquery', get_stylesheet_directory_uri() . '/js/globalize-jquery.js', array('jquery'), false, false);
});
function greenflash_assets() {
	wp_enqueue_style('icomoon-styles', get_stylesheet_directory_uri() . '/css/icomoon.css', array(), false);
	wp_enqueue_style('plugin-styles', get_stylesheet_directory_uri() . '/css/plugins.css', array(), false);
	wp_enqueue_style('custom-styles', get_stylesheet_directory_uri() . '/css/greenflash-styles.css', array(), false);
	wp_enqueue_style('custom-styles2', get_stylesheet_directory_uri() . '/css/custom.css', array(), false);
	wp_enqueue_style('custom-styles3', get_stylesheet_directory_uri() . '/css/custom2.css', array(), false);
	
	
	wp_enqueue_script('custom-javascript', get_stylesheet_directory_uri() . '/js/custom.js', array(), false, false);
	wp_enqueue_script('footer-javascript', get_stylesheet_directory_uri() . '/js/footer.js', array(), false, true);
	
	
}
add_action('wp_enqueue_scripts', 'greenflash_assets', 9999);
add_theme_support('avia_template_builder_custom_css');

//set builder mode to debug
add_action('avia_builder_mode', "builder_set_debug");
function builder_set_debug()
{
	return "debug";
}

add_filter('avf_logo_link', function($link) {
	
	$link = '/home';
	
	return $link;
}, 10,1);

add_filter('tribe_events_the_previous_month_link', function($html) {
	
	$html = str_replace('&laquo;', '&lt;', $html);
	
	return $html;
}, 10,1);

add_filter('tribe_events_the_next_month_link', function($html) {
	
	$html = str_replace('&raquo;', '&gt;', $html);
	
	return $html;
}, 10,1);

add_filter('tribe_get_events_title', function($title, $depth) {
	
	$title = str_replace('Events for ', '', $title);
	
	return $title;
}, 10, 2);

add_filter( 'tribe-events-bar-filters',  'remove_search_from_bar', 1000, 1 );
function remove_search_from_bar( $filters ) {
  if ( isset( $filters['tribe-bar-search'] ) ) {
        unset( $filters['tribe-bar-search'] );
    }
 
    return $filters;
}
add_filter( 'tribe-events-bar-filters',  'remove_date_from_bar', 1000, 1 );
function remove_date_from_bar( $filters ) {
  if ( isset( $filters['tribe-bar-date'] ) ) {
        unset( $filters['tribe-bar-date'] );
    }
 
    return $filters;
}
function placeholder_rename_location( $filters ) {
  
    $value = '';
      
    if ( ! empty( $_REQUEST['tribe-bar-geoloc'] ) ) {
        $value = esc_attr( $_REQUEST['tribe-bar-geoloc'] );
    }
  
    $html = sprintf(
        '<input type="text" name="tribe-bar-geoloc" id="tribe-bar-geoloc" value="%s" placeholder="city or zip">',
        esc_attr( $value ),
        'City'
    );
  
    $filters['tribe-bar-geoloc']['caption'] = 'Find events in your area';
    $filters['tribe-bar-geoloc']['html']    = $html;
  
    return $filters;
}
add_filter( 'tribe-events-bar-filters', 'placeholder_rename_location' );

add_filter('tribe_events_event_schedule_details_inner', function($inner) {
	
	$inner = str_replace('January', 'JANUARY', $inner);
	$inner = str_replace('February', 'FEBRUARY', $inner);
	$inner = str_replace('March', 'MARCH', $inner);
	$inner = str_replace('April', 'APRIL', $inner);
	$inner = str_replace('May', 'MAY', $inner);
	$inner = str_replace('June', 'JUNE', $inner);
	$inner = str_replace('July', 'JULY', $inner);
	$inner = str_replace('August', 'AUGUST', $inner);
	$inner = str_replace('September', 'SEPTEMBER', $inner);
	$inner = str_replace('October', 'OCTOBER', $inner);
	$inner = str_replace('November', 'NOVEMBER', $inner);
	$inner = str_replace('December', 'DECEMBER', $inner);
	
	
	return $inner;
}, 10, 3);


// Changes the text for the export listed events
remove_action('tribe_events_after_footer', array('Tribe__Events__iCal', 'maybe_add_link'));
add_action('tribe_events_after_footer', 'customized_tribe_single_event_links');
 
function customized_tribe_single_event_links()    {

 
    echo '<a class="tribe-events-ical tribe-events-button" title="Use this to share calendar data with Google Calendar, Apple iCal and other compatible apps" href="' . tribe_get_single_ical_link() . '">Export listed events</a>';
}

// http://www.jordancrown.com/multi-column-gravity-forms/
function gform_column_splits( $content, $field, $value, $lead_id, $form_id ) {
	if( !IS_ADMIN ) { // only perform on the front end

		// target section breaks
		if( $field['type'] == 'section' ) {
			$form = RGFormsModel::get_form_meta( $form_id, true );

			// check for the presence of multi-column form classes
			$form_class = explode( ' ', $form['cssClass'] );
			$form_class_matches = array_intersect( $form_class, array( 'two-column', 'three-column' ) );

			// check for the presence of section break column classes
			$field_class = explode( ' ', $field['cssClass'] );
			$field_class_matches = array_intersect( $field_class, array('gform_column') );

			// if field is a column break in a multi-column form, perform the list split
			if( !empty( $form_class_matches ) && !empty( $field_class_matches ) ) { // make sure to target only multi-column forms

				// retrieve the form's field list classes for consistency
				$form = RGFormsModel::add_default_properties( $form );
				$description_class = rgar( $form, 'descriptionPlacement' ) == 'above' ? 'description_above' : 'description_below';

				// close current field's li and ul and begin a new list with the same form field list classes
				return '</li></ul><ul class="gform_fields '.$form['labelPlacement'].' '.$description_class.' '.$field['cssClass'].'"><li class="gfield gsection empty">';

			}
		}
	}

	return $content;
}
add_filter( 'gform_field_content', 'gform_column_splits', 10, 5 );
function tribe_custom_theme_text ( $translations, $text, $domain ) {
 
	// Put your custom text here in a key => value pair
	// Example: 'Text you want to change' => 'This is what it will be changed to'
	// The text you want to change is the key, and it is case-sensitive
	// The text you want to change it to is the value
	// You can freely add or remove key => values, but make sure to separate them with a comma
	// This example changes the label "Venue" to "Location", and "Related Events" to "Similar Events"
	$custom_text = array(
		'(See all)' => 'See All',
	);
 
	// If this text domain starts with "tribe-" or "the-events-", and we have replacement text
	if((strpos($domain, 'tribe-') === 0 || strpos($domain, 'the-events-') === 0) && array_key_exists($text, $custom_text) ) {
		$text = $custom_text[$text];
	}
 
	return $text;
}
add_filter('gettext', 'tribe_custom_theme_text', 20, 3);


function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_filter('relevanssi_match', 'custom_field_weights');
function custom_field_weights($match) {
	$featured = get_post_meta($match->doc, 'pinsearch', true);
	if ('1' == $featured) {
 		$match->weight = $match->weight * 2;
	}
	else {
		$match->weight = $match->weight / 2;
	}
	return $match;
}

/*
add_filter( 'tribe_get_events_title', function( $title ) {
  //$new_title = explode('</a>',$title);
  //print_r($new_title);
  echo '---'.$title.'----';
	return $title.' ';
} );*/

add_filter('tribe_get_events_title', 'my_get_events_title');
function my_get_events_title($title) {
  
  $new_title = explode('</a>',$title);
  return $new_title[0].'</a>';
  /*
if( tribe_is_month() && !is_tax() ) { // The Main Calendar Page
    return 'Events Calendar';
} elseif( tribe_is_month() && is_tax() ) { // Calendar Category Pages
    return 'Events Calendar' . ' &raquo; ' . single_term_title('', false);
} elseif( tribe_is_event() && !tribe_is_day() && !is_single() ) { // The Main Events List
    return 'Events List';
} elseif( tribe_is_event() && is_single() ) { // Single Events
    return get_the_title();
} elseif( tribe_is_day() ) { // Single Event Days
    return 'Events on: ' . date('F j, Y', strtotime($wp_query->query_vars['eventDate']));
} elseif( tribe_is_venue() ) { // Single Venues
    return $title;
} else {
    return $title;
}*/
}

add_action( 'init', 'allow_origin' );
function allow_origin() {
    header("Access-Control-Allow-Origin: *");
}
