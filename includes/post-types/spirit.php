<?php
function spirit_posttype(){
	$labels = array(
		'name'					=> 'Spirits',
		'singular_name'			=> 'Spirits',
		'menu_name'				=> 'Spirits',
		'name_admin_bar'		=> 'Spirits',
		'add_new'				=> 'Add New Spirit',
		'add_new_item'			=> 'Add New Spirit',
		'new_item'				=> 'New Spirit',
		'edit_item'				=> 'Edit Spirit',
		'view_item'				=> 'View Spirit',
		'all_items'				=> 'All Spirits',
		'search_items'			=> 'Search Spirits',
		'not_found'				=> 'No Spirits found.',
		'not_found_in_trash'	=> 'No Spirits found in Trash.'
	);
	$supports = array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions');
	$rewrite = array(
		'slug'					=> 'spirit',
		'with_front'			=> true,
		'pages'					=> true,
	);
	$args = array(
		'labels'				=> $labels,
		'hierarchical' 			=> false,
		'public'				=> true,
		'publicly_queriable'	=> false, 
		'menu_icon'				=> 'dashicons-palmtree',
		'show_ui'				=> true,
		'supports'				=> $supports,
		'rewrite'				=> $rewrite,
		'has_archive'			=> false,
		'taxonomies'			=> array('spirit_categories'),
		'show_in_rest'			=> false,
	);
	register_post_type('anno_spirit', $args);
}
add_action('init', 'spirit_posttype');


function spirit_categories(){
    $labels = array(
        'name'              => 'Spirits Categories',
        'singular_name'     => 'Spirits Category',
        'search_items'      => 'Search Spirits',
        'all_items'         => 'All Spirits Categories',
        'parent_item'       => 'Parent Spirits Category',
        'parent_item_colon' => 'Parent Spirits Category:',
        'edit_item'         => 'Edit Spirits Category',
        'update_item'       => 'Update Spirits Category',
        'add_new_item'      => 'Add New Spirits Category',
        'new_item_name'     => 'New Spirits Category Name',
        'menu_name'         => 'Spirits Categories'
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'spirit-category'),
		'show_in_rest'			=> false,
    );
    register_taxonomy('spirit_categories', array('spirit'), $args);
}
add_action('init', 'spirit_categories', 0);