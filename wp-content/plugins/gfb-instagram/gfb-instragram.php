<?php
/*
Plugin Name: Green Flash Instagram Feed
Plugin URI: http://greenflashbrew.com
Description: Plugin to grab photos and information from Green Flash's instagram account
Author: Glen Draeger, Mansker Consulting
Author URI: http://manskerconsulting.com
*/

// Green Flash LIVE Credentials
//define('GFB_GD_INSTAGRAM_CLIENTID', '94bf6da2ebbb47bbaf4827f8474a7fc0');
//define('GFB_GD_INSTAGRAM_CODE', 'eaf8aed443cd4d63bfab49c7b897e362');
//define('GFB_GD_INSTAGRAM_SECRET', 'fea9fa109e0c4286a05b8cb4a08bf56f');
//define('GFB_GD_INSTAGRAM_ACCESS_TOKEN', '176678467.94bf6da.450c6023afbb43c89e202be9e6f11f69');
//define('GFB_GD_INSTAGRAM_REDIRECT_URI', 'http://greenflashbrew.com');


define('GFB_GD_INSTAGRAM_CLIENTID', '18b39f808f464e098cc6a21c33c3848c');
//define('GFB_GD_INSTAGRAM_CODE', 'eaf8aed443cd4d63bfab49c7b897e362');
define('GFB_GD_INSTAGRAM_SECRET', '221a54fc41ab4aabbea81dbc186316de');
//define('GFB_GD_INSTAGRAM_ACCESS_TOKEN', '176678467.18b39f8.4e9c4fa3790645248e029fb48e69b669');
define('GFB_GD_INSTAGRAM_ACCESS_TOKEN', '176678467.1677ed0.3e934278d7714d77b9706c66d76db846');
define('GFB_GD_INSTAGRAM_REDIRECT_URI', 'http://staging7.greenflashbrew.com');




// https://api.instagram.com/oauth/authorize/?client_id=18b39f808f464e098cc6a21c33c3848c&redirect_uri=http://staging7.greenflashbrew.com&response_type=token

// Green Flash's User ID 176678467

// Name of transient key to cache values
define('GFB_GD_TKEY','gfb_gd_tkey');




function gfb_gd_ask_instagram_tag() {

	//delete_transient('gfb_instagram_results');
	$transient_expiration = 60 * 10;

	if ( false === ( $json = get_transient( 'gfb_instagram_results' ) ) ) {

		// API URL
		$api_url = "https://api.instagram.com/v1/";

		$api_response = wp_remote_get($api_url . 'users/176678467/media/recent?access_token='.urlencode(GFB_GD_INSTAGRAM_ACCESS_TOKEN).'&count=5');

		$json = wp_remote_retrieve_body($api_response);

		if(empty($json)) {
			$json = get_transient('gfb_instagram_results');
		}

		set_transient( 'gfb_instagram_results', $json, 60 * 10 );
	}

	$json_array = json_decode($json, true);
	return $json_array;
}

// Get Popular Media

function gfb_gd_ask_instagram_media() {

	$transient_expiration = 60 * 10;

	//delete_transient('gfb_instagram_results2');

	if ( false === ( $json = get_transient( 'gfb_instagram_results2' ) ) ) {

		// API URL
		$api_url = "https://api.instagram.com/v1/";

		// we need 12 images on the off chance that there are 4 repeats....

		$api_response = wp_remote_get($api_url . 'tags/greenflashbeer/media/recent?access_token='.urlencode(GFB_GD_INSTAGRAM_ACCESS_TOKEN).'&count=13');

		$json = wp_remote_retrieve_body($api_response);

		if(empty($json)) {
			$json = get_transient('gfb_instagram_results2');
		}

		set_transient( 'gfb_instagram_results2', $json, 60 * 10 );

	}
	
	$json_array = json_decode($json, true);
	return $json_array;

}

function gfb_show_tag_info() {

	$gfb_info2 = gfb_gd_ask_instagram_tag(); // green flash
	$gfb_info = gfb_gd_ask_instagram_media(); // users

	//print_r($gfb_info);


	//print_r($gfb_info2);

	// create image array from greenflash
	$gfb_images_used = array();
	for($x = 0; $x < 4; $x++)
		{
			$gfb_images_used[$x] = $gfb_info2["data"][$x]["images"]["thumbnail"]["url"];
		}

	//print_r($gfb_images_used);

	// START greenflash beer images
	
	$count = 12;
	$x = 0;
	$y = 0;
	// check for duplicate images


	while($x < $count) {

		if(!in_array($gfb_info["data"][$x]["images"]["thumbnail"]["url"], $gfb_images_used)) 
		{

		?>
		<div data-id="profile-slide-<?php echo $y; ?>" class="twocol instagram-content gfb-<?php echo $y; ?>">
		<a target="_blank" href="<?php echo $gfb_info["data"][$x]["link"]; ?>">
		<img class="main-image" src="<?php echo $gfb_info["data"][$x]["images"]["thumbnail"]["url"]; ?>" width="150" height="150" alt="Green Flash beer on Instagram by <?php echo $gfb_info["data"][$x]["user"]["username"]; ?>" />
		</a>
		<div id="profile-slide-<?php echo $y; ?>" class="profile-info">
		<img class="profile-image" src="<?php echo $gfb_info["data"][$x]["user"]["profile_picture"]; ?>" width="30" height="30" alt="<?php echo $gfb_info["data"][$x]["user"]["username"]; ?>" /><span class="profile-username"><?php echo $gfb_info["data"][$x]["user"]["username"]; ?></span>
		</div>
		</div>
		<?php
		$y++;
		}
	$x++;
	if($y > 7) {break;} // we only want 8 images....
	}





	// START greenflashbeer tag images
	//$gfb_info2 = gfb_gd_ask_instagram_tag();
	$count = 4;
	//echo '<p>Count = '.$count.'</p>';

	for($x = 0;$x < $count;$x++) {
	?>
	<div data-id="profile-slide2-<?php echo $x; ?>" class="twocol instagram-content tag-<?php echo $x; ?>">
	<a target="_blank" class="main-link" href="<?php echo $gfb_info2["data"][$x]["link"]; ?>">
	<img class="main-image" src="<?php echo $gfb_info2["data"][$x]["images"]["thumbnail"]["url"]; ?>" width="150" height="150" alt="Green Flash beer on Instagram by <?php echo $gfb_info["data"][$x]["user"]["username"]; ?>" />
	</a>
	<div id="profile-slide2-<?php echo $x; ?>" class="profile-info">
	<img class="profile-image" src="<?php echo $gfb_info2["data"][$x]["user"]["profile_picture"]; ?>" width="30" height="30" alt="<?php echo $gfb_info["data"][$x]["user"]["username"]; ?>" /><span class="profile-username"><?php echo $gfb_info2["data"][$x]["user"]["username"]; ?></span>
	</div>
	</div>

	<?php 
	} 
	

	
}

// register custom action
add_action('gfb_show_tag_info','gfb_show_tag_info');


// to get the Instagram access token
// probably only need to use this once initially
// follow directions here:
// http://instagram.com/developer/authentication/#

function gfb_gd_get_access_token() {
	
	$args = array(
		'method' => 'POST',
		'timeout' => 45,
		'redirection' => 5,
		'httpversion' => '1.0',
		'blocking' => true,
		'headers' => array('content-type' => 'application/x-www-form-urlencoded'),
		'body' => array(
			'client_id' => GFB_GD_INSTAGRAM_CLIENTID,
			'client_secret' => GFB_GD_INSTAGRAM_SECRET,
			'grant_type' => 'authorization_code',
			'redirect_uri' => GFB_GD_INSTAGRAM_REDIRECT_URI,
			'code' => GFB_GD_INSTAGRAM_CODE
		),
		'cookies' => array()
		);

	$api_response = wp_remote_post('https://api.instagram.com/oauth/access_token',$args);

	$json = wp_remote_retrieve_body($api_response);

	if(empty($json)) {
		//return false;
		echo 'NOTHING';
	} else {

	//decode json
	$json = json_decode($json);
	print_r($json);
	}


}

/*
https://api.instagram.com/v1/users/self/feed?access_token=

https://api.instagram.com/oauth/access_token?client_id=bd424acfca824f44ac33d2c25e5af85d&client_secret=a4fc1f889bcb49d29b9c010c5daacb70&grant_type=authorization_code&redirect_uri=http://greenflashbrew.com/xdev&code=9d94360571e346bbaf2b6f2916673f3d


$result = json_decode($my_json_string);

It's not difficult to obtain information. For example if you want the current temperature in Celsius:

echo $result->data->current_condition[0]->temp_C;

You can get an array of the future two days (http://codepad.org/bhOcd3eT):

$weatherarray = $result->data->weather; // An array with two elements

echo $result["data"]["current_condition"][0]["temp_C"];

*/