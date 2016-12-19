<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once( 'library/greenflash-post-types.php' ); 

require_once( 'library/custom-metaboxes.php' );
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

require_once( 'library/Mobile_Detect.php' );

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'gfb-blog-event-thumb', 326, 163, true );
add_image_size( 'gfb-page-banner', 1400, 300, true );
add_image_size( 'gfb-page-banner-mobile', 700, 150, true );
add_image_size( 'gfb-page-banner-mobile-easy-crop',700, 500, false);
add_image_size( 'gfb-bio-image',209, 299, true);


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Blog Sidebar', 'bonestheme' ),
		'description' => __( 'The sidebar for your Blog/Latest News.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Page Sidebar', 'bonestheme' ),
		'description' => __( 'The pages sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));


	register_sidebar(array(
		'id' => 'sidebar3',
		'name' => __( 'Distributor Sidebar', 'bonestheme' ),
		'description' => __( 'For Distributor Pages', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar4',
		'name' => __( 'Retailer Sidebar', 'bonestheme' ),
		'description' => __( 'For Retailer Pages', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

} // don't remove this bracket!

// CHANGE ESPRESSO SLUG
add_filter( 'FHEE__EE_Register_CPTs__register_CPT__rewrite', 'my_custom_event_slug', 10, 2 );
function my_custom_event_slug( $slug, $post_type ) {
	if ( $post_type == 'espresso_events' ) {
		$custom_slug = array( 'slug' => 'tours' );
		return $custom_slug;
	}
	return $slug;
}

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'bonestheme' ) . '</label>
	<input type="text" class="button" data-value="Search" value="' . get_search_query() . '" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'GO' ) .'" />
	</form>';
	return $form;
} // don't remove this bracket!

function add_shopify_code() {
	?>
	<script type="text/javascript">
  var ShopifyStoreConfig = {shop:"green-flash-gift-shop.myshopify.com", collections:[18475581,18474789,18414273,18475213,10982881]};
  (function() {
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; 
    s.src = "//widgets.shopifyapps.com/assets/shopifystore.js";
    var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
  })();  
</script>
	<?php
}

//add_action('wp_head','add_shopify_code');



//add mobile detect to website
function add_mobile_detect() {
	global $deviceType;
	global $gfb_class_new;
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	// if($deviceType == 'phone') {
	// 	$gfb_class_new = 'gfb-mobile';
	// } else {
	// 	$gfb_class_new = 'gfb-desktop';
	// }

	?>
	<script type="text/javascript">
	    IFMGR_SetInternalVars(500, ["beerfinderiframe"]);
	</script>
	<?php
}

add_action('wp_head','add_mobile_detect');


function add_google_analytics() {
?>
<meta name="p:domain_verify" content="547fc9edc774a89754d9a504659cd0d6"/>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-51561538-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
 
</script>
<?php
}

add_action('wp_head','add_google_analytics');

// do shortcodes in widgets
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

// to hide email addresses in content
// USAGE [hideemail email="you@you.com"]
function hide_email_now( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'email' => '',
      ), $atts ) );
   	return '<a href="mailto:' . antispambot($email) . '">' . antispambot($email) . '</a>';
}

add_shortcode('hideemail','hide_email_now');

$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );
$role_object = get_role( 'editor' );
$role_object->add_cap( 'manage_options' );

function new_excerpt_more( $more ) {
	return 'Learn More';
}
add_filter('excerpt_more', 'new_excerpt_more');

function change_tribe_events_date_output() {
	$settings = array(
			'datetime_separator' => ' - ',
			'same_year_format' => 'l F j, Y',
			'show_end_time' => true,
			'time' => true,
		);
	return $settings;
}

add_filter('tribe_events_event_schedule_details_formatting','change_tribe_events_date_output');

function gfb_social_links() {
	
	if ( function_exists( 'ot_get_option' ) ) {
		
		global $gfb_facebook;
		global $gfb_twitter;
		global $gfb_instagram;
		global $gfb_youtube;

		$gfb_facebook = ot_get_option('gfb_social_facebook');
		$gfb_twitter = ot_get_option('gfb_social_twitter');
		$gfb_instagram = ot_get_option('gfb_social_instagram');
		$gfb_youtube = ot_get_option('gfb_social_youtube');
					
	} // eof check		
}

add_action('wp_head','gfb_social_links');

// another go
function wpprogrammer_custom_taxonomy_in_body_class( $classes ){
  if( is_singular() )
  {
    $custom_terms = get_the_terms(0, 'our_beers_cat');
    if ($custom_terms) {
      foreach ($custom_terms as $custom_term) {
        $classes[] = 'beer-cat-' . $custom_term->slug;
      }
    }
  }
  return $classes;
}

add_filter( 'body_class', 'wpprogrammer_custom_taxonomy_in_body_class' );



// redirect distributors to distributor page
function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	global $user;
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return $redirect_to;

		} elseif ( in_array( 'distributor', $user->roles ) ) {
			// redirect them to the default place
			return home_url().'/distributor-landing-page/';

		} elseif ( in_array( 'retailer', $user->roles ) ) {			
			// redirect them to the default place
			return home_url().'/retailers/';


		} else {

			return home_url();
		}



	} else {
		return $redirect_to;
	}
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );


// Let's no allow distributors to edit their profile

// edit_posts - distributors can't do this everyone else can


if(! current_user_can('edit_posts')) {

	add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
	function mytheme_admin_bar_render() {
	    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('edit-profile', 'user-actions');
	}
	

	add_action( 'admin_menu', 'stop_access_profile' );
	function stop_access_profile() {
	    remove_menu_page( 'profile.php' );
	    remove_submenu_page( 'users.php', 'profile.php' );
	    if(IS_PROFILE_PAGE === true) {
	        wp_die( 'You are not permitted to change your own profile information. Please contact Green Flash to have your profile information changed.' );
	    }
	}

	add_filter('show_admin_bar', '__return_false');

	add_filter('body_class','my_class_names');
	function my_class_names($classes) {
	// add 'class-name' to the $classes array
	$classes[] = 'no-admin-bar';
	// return the $classes array
	return $classes;
}


}

// Add role class to body
function add_role_to_body($classes) {
	global $current_user;
	if($user_role = array_shift($current_user->roles)) {
		$classes[] = 'role-'. $user_role;
	} else {
		$classes[] = 'not-logged-in';
	}
	return $classes;
}
add_filter('body_class','add_role_to_body');


add_post_type_support( 'page', 'excerpt' );








