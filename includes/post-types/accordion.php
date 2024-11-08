<?php
function accordions_posttype(){
	$labels = array(
		'name'					=> 'Accordions',
		'singular_name'			=> 'Accordions',
		'menu_name'				=> 'Accordions',
		'name_admin_bar'		=> 'Accordions',
		'add_new'				=> 'Add New Accordion',
		'add_new_item'			=> 'Add New Accordion',
		'new_item'				=> 'New Accordion',
		'edit_item'				=> 'Edit Accordion',
		'view_item'				=> 'View Accordion',
		'all_items'				=> 'All Accordions',
		'search_items'			=> 'Search Accordions',
		'not_found'				=> 'No Accordions found.',
		'not_found_in_trash'	=> 'No Accordions found in Trash.'
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
		'menu_icon'				=> 'dashicons-align-center',
		'show_ui'				=> true,
		'supports'				=> $supports,
		'rewrite'				=> $rewrite,
		'has_archive'			=> false,
		'taxonomies'			=> array('accordions_categories'),
		'show_in_rest'			=> false,
	);
	register_post_type('anno_accordions', $args);
}
add_action('init', 'accordions_posttype');


function accordions_categories(){
    $labels = array(
        'name'              => 'Accordions Categories',
        'singular_name'     => 'Accordions Category',
        'search_items'      => 'Search Accordions',
        'all_items'         => 'All Accordions Categories',
        'parent_item'       => 'Parent Accordions Category',
        'parent_item_colon' => 'Parent Accordions Category:',
        'edit_item'         => 'Edit Accordions Category',
        'update_item'       => 'Update Accordions Category',
        'add_new_item'      => 'Add New Accordions Category',
        'new_item_name'     => 'New Accordions Category Name',
        'menu_name'         => 'Accordions Categories'
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'accordions-category'),
		'show_in_rest'			=> false,
    );
    register_taxonomy('accordions_categories', array('services'), $args);
}
add_action('init', 'accordions_categories', 0);