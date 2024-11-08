<?php
function services_posttype(){
	$labels = array(
		'name'					=> 'Services',
		'singular_name'			=> 'Services',
		'menu_name'				=> 'Services',
		'name_admin_bar'		=> 'Services',
		'add_new'				=> 'Add New Service',
		'add_new_item'			=> 'Add New Service',
		'new_item'				=> 'New Service',
		'edit_item'				=> 'Edit Service',
		'view_item'				=> 'View Service',
		'all_items'				=> 'All Services',
		'search_items'			=> 'Search Services',
		'not_found'				=> 'No Services found.',
		'not_found_in_trash'	=> 'No Services found in Trash.'
	);
	$supports = array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions');
	$rewrite = array(
		'slug'					=> 'services',
		'with_front'			=> true,
		'pages'					=> true,
	);
	$args = array(
		'labels'				=> $labels,
		'hierarchical' 			=> false,
		'public'				=> true,
		'publicly_queriable'	=> false, 
		'menu_icon'				=> 'dashicons-hammer',
		'show_ui'				=> true,
		'supports'				=> $supports,
		'rewrite'				=> $rewrite,
		'has_archive'			=> false,
		'taxonomies'			=> array('services_categories'),
		'show_in_rest'			=> false,
	);
	register_post_type('anno_services', $args);
}
add_action('init', 'services_posttype');


function services_categories(){
    $labels = array(
        'name'              => 'Services Categories',
        'singular_name'     => 'Services Category',
        'search_items'      => 'Search Services',
        'all_items'         => 'All Services Categories',
        'parent_item'       => 'Parent Services Category',
        'parent_item_colon' => 'Parent Services Category:',
        'edit_item'         => 'Edit Services Category',
        'update_item'       => 'Update Services Category',
        'add_new_item'      => 'Add New Services Category',
        'new_item_name'     => 'New Services Category Name',
        'menu_name'         => 'Services Categories'
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'services-category'),
		'show_in_rest'			=> false,
    );
    register_taxonomy('services_categories', array('services'), $args);
}
add_action('init', 'services_categories', 0);