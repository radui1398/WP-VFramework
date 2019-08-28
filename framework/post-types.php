<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );

# Register Portfolio Posts Type

/*
function testimonial() {
	$labels = array(
		'name'                  => _x( 'Testimonial', 'Post Type General Name', THEME_TEXT_DOMAIN ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', THEME_TEXT_DOMAIN ),
		'menu_name'             => __( 'Testimonials', THEME_TEXT_DOMAIN ),
		'name_admin_bar'        => __( 'Testimonial', THEME_TEXT_DOMAIN),
		'archives'              => __( 'Testimonials Archives', THEME_TEXT_DOMAIN ),
		'parent_item_colon'     => __( 'Parent Testimonial:', THEME_TEXT_DOMAIN ),
		'all_items'             => __( 'All Testimonials', THEME_TEXT_DOMAIN ),
		'add_new_item'          => __( 'Add New Testimonial', THEME_TEXT_DOMAIN ),
		'add_new'               => __( 'Add New', THEME_TEXT_DOMAIN ),
		'new_item'              => __( 'New Item', THEME_TEXT_DOMAIN ),
		'edit_item'             => __( 'Edit Testimonial', THEME_TEXT_DOMAIN ),
		'update_item'           => __( 'Update Testimonial', THEME_TEXT_DOMAIN ),
		'view_item'             => __( 'View Testimonial', THEME_TEXT_DOMAIN ),
		'search_items'          => __( 'Search Testimonial', THEME_TEXT_DOMAIN ),
		'not_found'             => __( 'Not found', THEME_TEXT_DOMAIN ),
		'not_found_in_trash'    => __( 'Not found in Trash', THEME_TEXT_DOMAIN ),
		'insert_into_item'      => __( 'Insert into Testimonial', THEME_TEXT_DOMAIN ),
		'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', THEME_TEXT_DOMAIN ),
		'items_list'            => __( 'Items Testimonial', THEME_TEXT_DOMAIN ),
		'items_list_navigation' => __( 'Testimonials list navigation', THEME_TEXT_DOMAIN ),
		'filter_items_list'     => __( 'Filter items Testimonial', THEME_TEXT_DOMAIN ),
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 26,
		'supports'           => array( 'title' ,  'thumbnail' , 'editor',  'custom-fields',  'revisions' ), //,  'editor'   
	);

	register_post_type( 'testimonial', $args );

	$labels = array(
		'name'                  => _x( 'Project', 'Post Type General Name', THEME_TEXT_DOMAIN ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', THEME_TEXT_DOMAIN ),
		'menu_name'             => __( 'Projects', THEME_TEXT_DOMAIN ),
		'name_admin_bar'        => __( 'Project', THEME_TEXT_DOMAIN),
		'archives'              => __( 'Projects Archives', THEME_TEXT_DOMAIN ),
		'parent_item_colon'     => __( 'Parent Project:', THEME_TEXT_DOMAIN ),
		'all_items'             => __( 'All Projects', THEME_TEXT_DOMAIN ),
		'add_new_item'          => __( 'Add New Project', THEME_TEXT_DOMAIN ),
		'add_new'               => __( 'Add New', THEME_TEXT_DOMAIN ),
		'new_item'              => __( 'New Item', THEME_TEXT_DOMAIN ),
		'edit_item'             => __( 'Edit Project', THEME_TEXT_DOMAIN ),
		'update_item'           => __( 'Update Project', THEME_TEXT_DOMAIN ),
		'view_item'             => __( 'View Project', THEME_TEXT_DOMAIN ),
		'search_items'          => __( 'Search Project', THEME_TEXT_DOMAIN ),
		'not_found'             => __( 'Not found', THEME_TEXT_DOMAIN ),
		'not_found_in_trash'    => __( 'Not found in Trash', THEME_TEXT_DOMAIN ),
		'insert_into_item'      => __( 'Insert into Project', THEME_TEXT_DOMAIN ),
		'uploaded_to_this_item' => __( 'Uploaded to this Project', THEME_TEXT_DOMAIN ),
		'items_list'            => __( 'Items Project', THEME_TEXT_DOMAIN ),
		'items_list_navigation' => __( 'Projects list navigation', THEME_TEXT_DOMAIN ),
		'filter_items_list'     => __( 'Filter items Project', THEME_TEXT_DOMAIN ),
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 26,
		'supports'           => array( 'title' ,  'thumbnail' ,  'custom-fields',  'revisions' ), //,  'editor'   
	);

	register_post_type( 'project', $args );

	$labels = array(
		'name'              => _x( 'Category for Projects', THEME_TEXT_DOMAIN ),
		'singular_name'     => _x( 'Category', THEME_TEXT_DOMAIN ),
		'search_items'      => __( 'Search Category', THEME_TEXT_DOMAIN),
		'all_items'         => __( 'Add Category', THEME_TEXT_DOMAIN  ),
		'parent_item'       => __( 'Parent Category', THEME_TEXT_DOMAIN ),
		'parent_item_colon' => __( 'Parent Category:', THEME_TEXT_DOMAIN ),
		'edit_item'         => __( 'Edit Category', THEME_TEXT_DOMAIN ),
		'update_item'       => __( 'Update Category', THEME_TEXT_DOMAIN ),
		'add_new_item'      => __( 'Add Category', THEME_TEXT_DOMAIN ),
		'new_item_name'     => __( 'Name Category New', THEME_TEXT_DOMAIN ),
		'menu_name'         => __( 'Categories for Projects', THEME_TEXT_DOMAIN ),
	);

	$args = array(
		'hierarchical'      => true,
		 'public' 			=> false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'has_archive' 		=> false,
		'rewrite'           => array( 'slug' => 'project-category' ),
	);

	register_taxonomy( 'project-category', array( 'project' ), $args ); 

	// services
	$labels = array(
		'name'                  => _x( 'Service', 'Post Type General Name', THEME_TEXT_DOMAIN ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', THEME_TEXT_DOMAIN ),
		'menu_name'             => __( 'Services', THEME_TEXT_DOMAIN ),
		'name_admin_bar'        => __( 'Service', THEME_TEXT_DOMAIN),
		'archives'              => __( 'Services Archives', THEME_TEXT_DOMAIN ),
		'parent_item_colon'     => __( 'Parent Service:', THEME_TEXT_DOMAIN ),
		'all_items'             => __( 'All Services', THEME_TEXT_DOMAIN ),
		'add_new_item'          => __( 'Add New Service', THEME_TEXT_DOMAIN ),
		'add_new'               => __( 'Add New', THEME_TEXT_DOMAIN ),
		'new_item'              => __( 'New Item', THEME_TEXT_DOMAIN ),
		'edit_item'             => __( 'Edit Service', THEME_TEXT_DOMAIN ),
		'update_item'           => __( 'Update Service', THEME_TEXT_DOMAIN ),
		'view_item'             => __( 'View Service', THEME_TEXT_DOMAIN ),
		'search_items'          => __( 'Search Service', THEME_TEXT_DOMAIN ),
		'not_found'             => __( 'Not found', THEME_TEXT_DOMAIN ),
		'not_found_in_trash'    => __( 'Not found in Trash', THEME_TEXT_DOMAIN ),
		'insert_into_item'      => __( 'Insert into Service', THEME_TEXT_DOMAIN ),
		'uploaded_to_this_item' => __( 'Uploaded to this Service', THEME_TEXT_DOMAIN ),
		'items_list'            => __( 'Items Service', THEME_TEXT_DOMAIN ),
		'items_list_navigation' => __( 'Services list navigation', THEME_TEXT_DOMAIN ),
		'filter_items_list'     => __( 'Filter items Service', THEME_TEXT_DOMAIN ),
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'service' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 26,
		'supports'           => array( 'title' ,  'thumbnail' , 'editor',  'custom-fields',  'revisions' ), //,  'editor'   
	);

	register_post_type( 'service', $args );



} 
add_action( 'init', 'testimonial', 0 ); */