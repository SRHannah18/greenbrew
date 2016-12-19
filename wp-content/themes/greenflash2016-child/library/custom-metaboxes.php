<?php

add_filter( 'cmb_meta_boxes', 'gfb_metaboxes' );

function gfb_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_gfb_';

	$meta_boxes[] = array(
		'id'         => 'gfb_single_beer',
		'title'      => __( 'Additional Fields', 'gfb' ),
		'pages'      => array( 'gfb_our_beers', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(

			array(
				'name' => __( 'Background Color New', 'gfb' ),
				'desc' => __( 'Main Background. A hex value with the #. If blank, defaults to the value for cellar 3.', 'gfb' ),
				'id'   => $prefix . 'bg_color_1',
				'type' => 'text_small',
			),
			
			array(
				'name' => __( 'Background Color New 2', 'gfb' ),
				'desc' => __( 'Secondary Background, and font color of specs. A hex value with the #. If blank, defaults to the value for cellar 3.', 'gfb' ),
				'id'   => $prefix . 'bg_color_2',
				'type' => 'text_small',
			),
			
			
			array(
				'name' => __( 'Tasting Notes Appearance', 'gfb' ),
				'desc' => __( 'Appearance text. If this is empty, the tasting notes section will not appear', 'gfb' ),
				'id'   => $prefix . 'tasting_notes_appearance',
				'type' => 'textarea_small',
			),
			
			array(
				'name' => __( 'Tasting Notes Aroma', 'gfb' ),
				'desc' => __( 'Aroma text', 'gfb' ),
				'id'   => $prefix . 'tasting_notes_aroma',
				'type' => 'textarea_small',
			),
			
			array(
				'name' => __( 'Tasting Notes Flavor', 'gfb' ),
				'desc' => __( 'Flavor text', 'gfb' ),
				'id'   => $prefix . 'tasting_notes_flavor',
				'type' => 'textarea_small',
			),

			// SPECS
			array(
				'name' => __( 'Style', 'gfb' ),
				'desc' => __( '', 'gfb' ),
				'id'   => $prefix . 'specs_style',
				'type' => 'text_medium',
			),

			array(
				'name' => __( 'IBU\'s', 'gfb' ),
				'desc' => __( 'A number', 'gfb' ),
				'id'   => $prefix . 'specs_ibus',
				'type' => 'text_small',
			),
			
			array(
				'name' => __( 'ABV', 'gfb' ),
				'desc' => __( 'A percentage', 'gfb' ),
				'id'   => $prefix . 'specs_abv',
				'type' => 'text_small',
			),

			array(
				'name' => __( 'Availability', 'gfb' ),
				'desc' => __( '', 'gfb' ),
				'id'   => $prefix . 'specs_availability',
				'type' => 'text_medium',
			),

			// OPTIONS

			array(
				'name'    => __( 'Options', 'gfb' ),
				'desc'    => __( 'Check all that apply', 'gfb' ),
				'id'      => $prefix . 'specs_options',
				'type'    => 'multicheck',
				'options' => array(
					'seven_fifty' => __( '750 mL', 'gfb' ),
					'twelve' => __( '12 oz', 'gfb' ),
					'twenty_two' => __( '22 oz', 'gfb' ),
					'keg' => __( 'Keg/Draft', 'gfb' ),
					'cans' => __( '6 Pack Cans', 'gfb' ),
				),
			),

			// IMAGES

			array(
				'name' => __( 'Page Images', 'cmb' ),
				'desc' => __( 'Various images on this beer page.', 'cmb' ),
				'id'   => $prefix . 'test_title2',
				'type' => 'title',
			),

			array(
				'name' => __( 'Hero Image', 'gfb' ),
				'desc' => __( 'Main Image on the Left. Should be a transparent PNG, max width 515px. If you want the image to overflow on the left there should be no space in the image on the left. If you want it to align with the heading above...there should be 10px of space on the left of the image.', 'gfb' ),
				'id'   => $prefix . 'hero_image',
				'type' => 'file',
			),

			array(
				'name' => __( 'Alt Text', 'gfb' ),
				'desc' => __( 'Alternate text for the Hero Image', 'gfb' ),
				'id'   => $prefix . 'hero_image_alt',
				'type' => 'text',
			),


			array(
				'name' => __( 'Beer Bottle', 'gfb' ),
				'desc' => __( 'Main beer bottle to right of hero image. Should be a transparent PNG, optimal size 126 x 507. Uses Title as alt tag', 'gfb' ),
				'id'   => $prefix . 'beer_bottle',
				'type' => 'file',
			),


			array(
				'name' => __( 'Info Image', 'gfb' ),
				'desc' => __( 'The main image on the right. The middle row, right box area should be blank to hold the search area. The default dimensions must be: width 243px, height must be: 391px. However, for Hop Odyssey the dimensions should be: width: 280px, height: 391px. Bottom white border of image must be exactly at the bottom. Must be transparent PNG.', 'gfb' ),
				'id'   => $prefix . 'beer_info_img',
				'type' => 'file',
			),

			array(
				'name' => __( 'Alt', 'gfb' ),
				'desc' => __( 'Alternate text for the Info Image', 'gfb' ),
				'id'   => $prefix . 'beer_info_img_alt',
				'type' => 'text',
			),
		
		),
	);

	

	

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'metabox/init.php';

}
