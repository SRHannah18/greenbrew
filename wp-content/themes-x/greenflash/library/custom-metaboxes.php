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
				'name'    => __( 'Background Color', 'gfb' ),
				'desc'    => __( 'This is the main background color/background image for this beer page. Contact Sweet Thursday Web Development to add more.', 'gfb' ),
				'id'      => $prefix . 'bg_color',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __( 'Blue 1 (Road Warrior)', 'gfb' ), 'value' => 'blue-light', ),
					array( 'name' => __( 'Blue 2 (Symposium)', 'gfb' ), 'value' => 'blue-lighter', ),
					array( 'name' => __( 'Blue 3 (Soul Style)', 'gfb' ), 'value' => 'blue-soul', ),

					array( 'name' => __( 'Gray 1 (Black IPA)', 'gfb' ), 'value' => 'gray', ),
					array( 'name' => __( 'Gray 2 (Double Stout)', 'gfb' ), 'value' => 'gray-light', ),
					array( 'name' => __( 'Gray 3 (White IPA)', 'gfb' ), 'value' => 'gray-lighter', ),
					array( 'name' => __( 'Gray, Dark (Cellar 3)', 'gfb' ), 'value' => 'cellar-3', ),
					array( 'name' => __( 'Green 1 (Barleywine)', 'gfb' ), 'value' => 'green', ),
					array( 'name' => __( 'Green 2 (30th Street)', 'gfb' ), 'value' => 'green-dark', ),
					array( 'name' => __( 'Green 3 (Green Bullet)', 'gfb' ), 'value' => 'green-light', ),
					array( 'name' => __( 'Green 4 (Imperial IPA)', 'gfb' ), 'value' => 'green-lighter', ),
					array( 'name' => __( 'Orange 1 (Citra Session)', 'gfb' ), 'value' => 'orange', ),
					array( 'name' => __( 'Orange 2 (Jibe)', 'gfb' ), 'value' => 'orange-jibe', ),
					array( 'name' => __( 'Pink (Le Freak)', 'gfb' ), 'value' => 'pink', ),
					array( 'name' => __( 'Purple (West Coast IPA)', 'gfb' ), 'value' => 'purple-light', ),
					array( 'name' => __( 'Red Dark (Cedar Plank)', 'gfb' ), 'value' => 'red', ),
					array( 'name' => __( 'Red Light (Hop Head Red)', 'gfb' ), 'value' => 'red-light', ),
					array( 'name' => __( 'Yellow (Palate Wrecker)', 'gfb' ), 'value' => 'yellow', ),


					
					
				),
			),

			array(
				'name'    => __( 'Flash of Genius Number', 'gfb' ),
				'desc'    => __( 'This is the beer number. Only works on Prodigies', 'gfb' ),
				'id'      => $prefix . 'fog_number',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __( '01', 'gfb' ), 'value' => '01', ),
					array( 'name' => __( '02', 'gfb' ), 'value' => '02', ),
					array( 'name' => __( '03', 'gfb' ), 'value' => '03', ),
					array( 'name' => __( '04', 'gfb' ), 'value' => '04', ),
					array( 'name' => __( '05', 'gfb' ), 'value' => '05', ),
					array( 'name' => __( '06', 'gfb' ), 'value' => '06', ),
					array( 'name' => __( '07', 'gfb' ), 'value' => '07', ),
					array( 'name' => __( '08', 'gfb' ), 'value' => '08', ),
					array( 'name' => __( '09', 'gfb' ), 'value' => '09', ),
					array( 'name' => __( '10', 'gfb' ), 'value' => '10', ),
					array( 'name' => __( '11', 'gfb' ), 'value' => '11', ),
					array( 'name' => __( '12', 'gfb' ), 'value' => '12', ),
					array( 'name' => __( '13', 'gfb' ), 'value' => '13', ),
					array( 'name' => __( '14', 'gfb' ), 'value' => '14', ),
					array( 'name' => __( '15', 'gfb' ), 'value' => '15', ),
					array( 'name' => __( '16', 'gfb' ), 'value' => '16', ),
				),
			),

			array(
				'name' => __( 'Tasting Notes', 'gfb' ),
				'desc' => __( 'This is the quote by Chuck Silva. Title of Area is hard-coded. This will only show if you enter something here, otherwise nothing shows.', 'gfb' ),
				'id'   => $prefix . 'tasting_notes',
				'type' => 'textarea_small',
			),

			array(
				'name'    => __( 'Awards &amp; Accolades', 'gfb' ),
				'desc'    => __( 'This is where you enter awards and accolades. Title is hard-coded. This will only show if you enter something here, otherwise nothing shows.', 'gfb' ),
				'id'      => $prefix . 'awards',
				'type'    => 'wysiwyg',
				'options' => array(	'textarea_rows' => 5, ),
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
					'twelve' => __( '12 oz', 'gfb' ),
					'twenty_two' => __( '22 oz', 'gfb' ),
					'keg' => __( 'Keg/Draft', 'gfb' ),
					'cans' => __( '6 Pack Cans', 'gfb' ),
				),
			),

			// The NEW VIDEO AREA
			array(
				'name' => __( 'Video Review Area', 'cmb' ),
				'desc' => __( 'This is for the reviews of individual beers that you want to add to the page. If you do not add anything below than the default image and links will show.', 'gfb' ),
				'id'   => $prefix . 'test_title1',
				'type' => 'title',
			),
			array(
				'name' => __( 'Video Title', 'gfb' ),
				'desc' => __( 'Be careful with the title...it cannot be very long. 4 or 5 words at most and make sure you check it in the front end after adding it.', 'gfb' ),
				'id'   => $prefix . 'review_video_title',
				'type' => 'text',
			),

			array(
				'name' => __( 'YouTube Code', 'gfb' ),
				'desc' => __( '<br />Only grab the actual code for the video. For example in these links below only take the red area:<br />https://www.youtube.com/embed/<span style="color:red;">8TXMhczDw28</span>?list=PL9d5oYwh4IoNUboXq5smAME6Ag-M9fF1p&amp;controls=0&amp;showinfo=0"<br />
					https://www.youtube.com/watch?v=<span style="color:red;">8TXMhczDw28</span>&index=3&list=PL9d5oYwh4IoNUboXq5smAME6Ag-M9fF1p', 'gfb' ),
				'id'   => $prefix . 'review_video_code',
				'type' => 'text_medium',
			),

			array(
				'name' => __( 'Start Video At:', 'gfb' ),
				'desc' => __( '<br />If you want the video to start at a specific spot then add here in seconds. For example if you want the video to start at the 1:13 mark, add 73 in the box. If you want to play the entire video leave this blank', 'gfb' ),
				'id'   => $prefix . 'review_video_start',
				'type' => 'text_small',
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

			array(
				'name' => __( 'Mobile Beer Image', 'gfb' ),
				'desc' => __( 'This is the image that shows on the main beer page on the mobile site only. It should by 158px x 158px', 'gfb' ),
				'id'   => $prefix . 'beer_mobile_main',
				'type' => 'file',
			),


			// STORE AREA
			// Left
			array(
				'name' => __( 'Store Area (CURRENTLY NOT USING)', 'cmb' ),
				'desc' => __( '', 'cmb' ),
				'id'   => $prefix . 'test_title2',
				'type' => 'title',
			),
			array(
				'name' => __( 'Store Image: Left', 'gfb' ),
				'desc' => __( 'Upload an image or enter a URL. Size must be: 191px x 192px<br /><strong style="color:#666666;font-style:normal;">If you do not enter anything for either of these store products, the random products will show on the page. If you enter something for either of these, that will override the random products.</strong>', 'gfb' ),
				'id'   => $prefix . 'store_img_left',
				'type' => 'file',
			),
			array(
				'name' => __( 'Title Left', 'gfb' ),
				'desc' => __( '', 'gfb' ),
				'id'   => $prefix . 'store_title_left',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Link Left', 'gfb' ),
				'desc' => __( 'Enter Full URL (http...)', 'gfb' ),
				'id'   => $prefix . 'store_url_left',
				'type' => 'text_url',
				'protocols' => array('http', 'https'), // Array of allowed protocols
			),
			array(
				'name' => __( 'Price Left', 'gfb' ),
				'desc' => __( '', 'gfb' ),
				'id'   => $prefix . 'store_price_left',
				'type' => 'text_small',
			),

			// Right
			array(
				'name' => __( 'Store Image: Right', 'gfb' ),
				'desc' => __( 'Upload an image or enter a URL. Size must be: 191px x 192px', 'gfb' ),
				'id'   => $prefix . 'store_img_right',
				'type' => 'file',
			),
			array(
				'name' => __( 'Title Right', 'gfb' ),
				'desc' => __( '', 'gfb' ),
				'id'   => $prefix . 'store_title_right',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Link Right', 'gfb' ),
				'desc' => __( 'Enter Full URL (http...)', 'gfb' ),
				'id'   => $prefix . 'store_url_right',
				'type' => 'text_url',
				'protocols' => array('http', 'https'), // Array of allowed protocols
			),
			array(
				'name' => __( 'Price Right', 'gfb' ),
				'desc' => __( '', 'gfb' ),
				'id'   => $prefix . 'store_price_right',
				'type' => 'text_small',
			),
			array(
				'name' => __( 'Search Value', 'gfb' ),
				'desc' => __( '<br />This is for the search feature so when someone on an individual beer page searches by zip code, it will only show results for this beer. This must match the exactly the option value being used by VIP. You have to look in the code here: http://www.vtinfo.com/PF/product_finder.asp?custID=GFB, to find it. This may match your beer name exactly, but it may not. You must check.', 'gfb' ),
				'id'   => $prefix . 'beer_search_value',
				'type' => 'text_medium',
			),

			array(
				'name' => __( 'Rate Beer Link', 'gfb' ),
				'desc' => __( 'Enter Full URL. If you do not enter anything the generic link is used (http://www.ratebeer.com/brewers/green-flash-brewing-co/3111/).', 'gfb' ),
				'id'   => $prefix . 'rate_beer_link',
				'type' => 'text_url',
				'protocols' => array('http', 'https'), // Array of allowed protocols
			),

			array(
				'name' => __( 'Beer Advocate Link', 'gfb' ),
				'desc' => __( 'Enter Full URL. If you do not enter anything the generic link is used (http://www.beeradvocate.com/beer/profile/2743/).', 'gfb' ),
				'id'   => $prefix . 'beer_advocate_link',
				'type' => 'text_url',
				'protocols' => array('http', 'https'), // Array of allowed protocols
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
