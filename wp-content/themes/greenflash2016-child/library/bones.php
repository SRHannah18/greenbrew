<?php
/* Welcome to Bones :)
This is the core Bones file where most of the
main functions & features reside. If you have
any custom functions, it's best to put them
in the functions.php file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

/*********************
LAUNCH BONES
Let's fire off all the functions
and tools. I put it up here so it's
right up top and clean.
*********************/

// we're firing all out initial functions at the start
add_action( 'after_setup_theme', 'bones_ahoy', 16 );

function bones_ahoy() {

    // launching operation cleanup
    add_action( 'init', 'bones_head_cleanup' );
    // remove WP version from RSS
    add_filter( 'the_generator', 'bones_rss_version' );
    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
    add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
    // clean up gallery output in wp
    add_filter( 'gallery_style', 'bones_gallery_style' );

    // enqueue base scripts and styles
    add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
    // ie conditional wrapper

    // launching this stuff after theme setup
    bones_theme_support();

    // adding sidebars to Wordpress (these are created in functions.php)
    add_action( 'widgets_init', 'bones_register_sidebars' );
    // adding the bones search form (created in functions.php)
    add_filter( 'get_search_form', 'bones_wpsearch' );

    // cleaning up random code around images
    add_filter( 'the_content', 'bones_filter_ptags_on_images' );
    // cleaning up excerpt
    add_filter( 'excerpt_more', 'bones_excerpt_more' );

    // The Option styles were breaking the calendar on the events page.
    remove_action( 'admin_print_styles-post-new.php', 'ot_admin_styles',11);
	remove_action( 'admin_print_styles-post.php', 'ot_admin_styles',11);

} /* end bones ahoy */

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function bones_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
    // WHY DO THIS?!!!!!
	//add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 );

} /* end bones head cleanup */

// remove WP version from RSS
function bones_rss_version() { return ''; }

// remove WP version from scripts
function bones_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// remove injected CSS for recent comments widget
function bones_remove_wp_widget_recent_comments_style() {
   if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
      remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function bones_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
  }
}

// remove injected CSS from gallery
function bones_gallery_style($css) {
  return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}


/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function bones_scripts_and_styles() {
  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  if (!is_admin()) {

    $script_css_version = '20150927B';

    // modernizr (without media query polyfill)
    wp_register_script( 'bones-modernizr', get_stylesheet_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

    wp_register_script( 'beer-finder', get_stylesheet_directory_uri() . '/library/js/product_finder_iframe_height-ck.js', array(), '1.0', false );

    // register main stylesheet
    wp_register_style( 'bones-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), $script_css_version, 'all' );

    // ie-only style sheet
    wp_register_style( 'bones-ie-only', get_stylesheet_directory_uri() . '/library/css/ie.css', array(), $script_css_version, 'all' );

    // this is a stylesheet for the hop odyssey custom page
    wp_register_style( 'hop-odyssey', get_stylesheet_directory_uri() . '/library/css/hop-odyssey.css', array(), $script_css_version, 'all' );

    wp_register_style( 'custom-pages', get_stylesheet_directory_uri() . '/library/css/custom-pages.css', array(), $script_css_version, 'all' );

    //wp_register_style( 'new-home', get_stylesheet_directory_uri() . '/library/css/new-home.css', array(), '' );
    

    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
		wp_enqueue_script( 'comment-reply' );
    }

    //adding scripts file in the footer
    wp_register_script( 'bones-js', get_stylesheet_directory_uri() . '/library/js/scripts-ck.js', array( 'jquery','jquery-ui-core' ), $script_css_version, true );
    //wp_register_script( 'bones-js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array( 'jquery','jquery-ui-core' ), '', true );

    //wp_register_script( 'jquery-picture', get_stylesheet_directory_uri() . '/library/js/jquery-picture-min.js', array( 'jquery' ), '', true );

    wp_register_script( 'jcycle-2', get_stylesheet_directory_uri() . '/library/js/jquery.cycle2.min.js', array( 'jquery' ), '20131005', false );

    wp_register_script( 'jcycle-youtube', get_stylesheet_directory_uri() . '/library/js/jquery.cycle2.youtube.min.js', array( 'jquery' ), '20131005', false );


    

    // enqueue styles and scripts
    wp_enqueue_script( 'bones-modernizr' );
    wp_enqueue_script( 'beer-finder' );
    wp_enqueue_style( 'bones-stylesheet' );
    wp_enqueue_style( 'bones-ie-only' );
    if ( is_page_template( 'page-hopodyssey.php' ) ) {
            wp_enqueue_style( 'hop-odyssey' );
    }

    if ( is_page_template( 'page-tc-2015.php' ) ) {
            wp_enqueue_style( 'custom-pages' );
    }
    //wp_enqueue_script( 'jquery-picture' );

    $wp_styles->add_data( 'bones-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

    /*
    I recommend using a plugin to call jQuery
    using the google cdn. That way it stays cached
    and your site will load faster.
    */
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bones-js' );
    wp_enqueue_script( 'jcycle-2' );
    //wp_enqueue_script( 'jcycle-youtube' );

  }
}

function my_wp_default_styles($styles)
{
    //use date updated for version number
    $styles->default_version = "20150928";
}
//add_action("wp_default_styles", "my_wp_default_styles");

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function bones_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	// wp custom background (thx to @bransonwerner for update)
	// add_theme_support( 'custom-background',
	//     array(
	//     'default-image' => '',  // background image default
	//     'default-color' => '', // background color default (dont add the #)
	//     'wp-head-callback' => '_custom_background_cb',
	//     'admin-head-callback' => '',
	//     'admin-preview-callback' => ''
	//     )
	// );

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'bonestheme' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'bonestheme' ) // secondary nav in footer
		)
	);
} /* end bones theme support */


/*********************
MENUS & NAVIGATION
*********************/

/*********************
MENUS & NAVIGATION
*********************/
// class Menu_With_Description extends Walker_Nav_Menu {
// 	function start_el(&$output, $item, $depth, $args) {
// 		global $wp_query;
// 		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
// 		$class_names = $value = '';

// 		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

// 		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
// 		$class_names = ' class="' . esc_attr( $class_names ) . '"';

// 		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

// 		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
// 		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
// 		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
// 		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

// 		$item_output = $args->before;
// 		$item_output .= '<a'. $attributes .'><span class="aspan">';
// 		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
// 		$item_output .= '</span></a>';
// 		$item_output .= '<span class="menu-content">' . $item->description . '</span>';
// 		$item_output .= $args->after;

// 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
// 	}
// }


/**
* Create HTML list of nav menu items and allow HTML tags.
* Replacement for the native menu Walker, echoing the description.
* This is the ONLY known way to display the Description field.
*
* @see http://wordpress.stackexchange.com/questions/51609/
*
*/
class Description_Walker extends Walker_Nav_Menu {
 
function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
{
$classes = empty ( $item->classes ) ? array () : (array) $item->classes;
 
$class_names = join(
' '
, apply_filters(
'nav_menu_css_class'
, array_filter( $classes ), $item
)
);
 
! empty ( $class_names )
and $class_names = ' class="'. esc_attr( $class_names ) . '"';
 
// Build default menu items
$output .= "<li id='menu-item-$item->ID' $class_names>";
 
$attributes = '';
 
! empty( $item->attr_title )
and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
! empty( $item->target )
and $attributes .= ' target="' . esc_attr( $item->target ) .'"';
! empty( $item->xfn )
and $attributes .= ' rel="' . esc_attr( $item->xfn ) .'"';
! empty( $item->url )
and $attributes .= ' href="' . esc_attr( $item->url ) .'"';
 
// Build the description (you may need to change the depth to 0, 1, or 2)
// $description = ( ! empty ( $item->description ) and 1 == $depth )
// ? '<span class="menu-content">'. $item->description . '</span>' : '';

$description = '<span class="menu-content">'. $item->description . '</span>';
 
$title = apply_filters( 'the_title', $item->title, $item->ID );
 
$item_output = $args->before
. '<a '.$attributes.'><span class="aspan">'
. $args->link_before
. $title
. '</span></a> '
. $args->link_after
. $description
. $args->after;
 
// Since $output is called by reference we don't need to return anything.
$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id);

}
}



// the main menu
global $walker;
$walker = new Description_Walker;

function bones_main_nav() {
	//$walker = new Description_Walker;
	// display the wp3 menu if available
	global $walker;
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
    	'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
    	'menu_class' => 'nav top-nav clearfix',         // adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'bones_main_nav_fallback',		// fallback function
    	'walker' => $walker 							// so we can add html text after link in menu item     
	));
} /* end bones main nav */

// the footer menu (should you choose to use one)
function bones_footer_links() {
	//$walker = new Description_Walker;
	// display the wp3 menu if available
	global $walker;
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    	'menu_class' => 'footer-nav clearfix',      // adding custom nav class
    	'theme_location' => 'footer-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'bones_footer_links_fallback',
    	'walker' => $walker
	));
} /* end bones footer link */

// this is the fallback for header menu
function bones_main_nav_fallback() {

	//$walker = new Description_Walker;
	global $walker;
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => 'nav top-nav clearfix',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // before each link
        'link_after' => '',
        'walker' => $walker                            // after each link
	) );
}

// this is the fallback for footer menu
function bones_footer_links_fallback() {
	/* you can put a default here if you like */
}

/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using bones_related_posts(); )
function bones_related_posts() {
	echo '<ul id="bones-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) { 
			$tag_arr .= $tag->slug . ',';
		}
        $args = array(
        	'tag' => $tag_arr,
        	'numberposts' => 5, /* you can change this to show more */
        	'post__not_in' => array($post->ID)
     	);
        $related_posts = get_posts( $args );
        if($related_posts) {
        	foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
	           	<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
	        <?php endforeach; }
	    else { ?>
            <?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'bonestheme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_query();
	echo '</ul>';
} /* end bones related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function bones_page_navi() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
	return;
	
	echo '<nav class="pagination">';
	
		echo paginate_links( array(
			'base' 			=> str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
			'format' 		=> '',
			'current' 		=> max( 1, get_query_var('paged') ),
			'total' 		=> $wp_query->max_num_pages,
			'prev_text' 	=> '&larr;',
			'next_text' 	=> '&rarr;',
			'type'			=> 'list',
			'end_size'		=> 3,
			'mid_size'		=> 3
		) );
	
	echo '</nav>';
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bones_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function bones_excerpt_more($more) {
	global $post;
	// edit here if you like
return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __( 'Read', 'bonestheme' ) . get_the_title($post->ID).'">'. __( 'Read more &raquo;', 'bonestheme' ) .'</a>';
}

/*
 * This is a modified the_author_posts_link() which just returns the link.
 *
 * This is necessary to allow usage of the usual l10n process with printf().
 */
function bones_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}

?>
