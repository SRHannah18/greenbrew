<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function greenflash_custom_posts() { 
	// creating (registering) the custom type 
	register_post_type( 'gfb_our_beers', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Our Beers', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Our Beer', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Beers', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New Beer', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Beer', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Beer', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Beer', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Beer', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Post Type', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Green Flash Brewery Beers', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'our-beers', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'gfb_our_beers', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky', 'page-attributes')
	 	) /* end of options */
	); /* end of register post type */



register_post_type( 'gfb_jobs', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Jobs', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Job', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Jobs', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New Job', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Job', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Job', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Job', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Job', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Jobs', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Green Flash Brewery Jobs', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => false,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'our-jobs', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'gfb_our_jobs', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'revisions', 'page-attributes')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type( 'category', 'gfb_our_beers' );
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type( 'post_tag', 'gfb_our_beers' );
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'greenflash_custom_posts');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'our_beers_cat', 
    	array('gfb_our_beers'), /* if you change the name of register_post_type( 'gfb_our_beers', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Beer Categories', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Beer Category', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Beer Categories', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Beer Categories', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Beer Category', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Beer Category:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Beer Category', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Beer Category', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Beer Category', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Beer Category Name', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'beers' ),
    	)
    );   
    
	// now let's add custom tags (these act like categories)
    register_taxonomy( 'our_beers_tag', 
    	array('gfb_our_beers'), /* if you change the name of register_post_type( 'gfb_our_beers', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Beer Tags', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Beer Tag', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Beer Tags', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Beer Tags', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Beer Tag', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Beer Tag:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Beer Tag', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Beer Tag', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Beer Tag', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Beer Tag Name', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    ); 



	register_taxonomy( 'our_jobs_cat', 
    	array('gfb_jobs'), /* if you change the name of register_post_type( 'gfb_our_beers', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Job Categories', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Job Category', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Job Categories', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Job Categories', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Job Category', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Job Category:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Job Category', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Job Category', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Job Category', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Job Category Name', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'jobs' ),
    	)
    );   
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */
	

?>
