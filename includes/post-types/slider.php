<?php
function slider_posttype(){
	$labels = array(
		'name'					=> 'Slider',
		'singular_name'			=> 'Slider',
		'menu_name'				=> 'Slider',
		'name_admin_bar'		=> 'Slider',
		'add_new'				=> 'Add New Slide',
		'add_new_item'			=> 'Add New Slide',
		'new_item'				=> 'New Slide',
		'edit_item'				=> 'Edit Slide',
		'view_item'				=> 'View Slide',
		'all_items'				=> 'All Slider',
		'search_items'			=> 'Search Slider',
		'not_found'				=> 'No Slider found.',
		'not_found_in_trash'	=> 'No Slider found in Trash.'
	);
	$supports = array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions');
	$rewrite = array(
		'slug'					=> 'slider',
		'with_front'			=> true,
		'pages'					=> true,
	);
	$args = array(
		'labels'				=> $labels,
		'hierarchical' 			=> false,
		'public'				=> true,
		'publicly_queriable'	=> false, 
		'menu_icon'				=> 'dashicons-embed-photo',
		'show_ui'				=> true,
		'supports'				=> $supports,
		'rewrite'				=> $rewrite,
		'has_archive'			=> false,
		'taxonomies'			=> array('slider_categories'),
		'show_in_rest'			=> false,
	);
	register_post_type('anno_slider', $args);
}
add_action('init', 'slider_posttype');


function slider_categories(){
    $labels = array(
        'name'              => 'Slider Categories',
        'singular_name'     => 'Slider Category',
        'search_items'      => 'Search Slider',
        'all_items'         => 'All Slider Categories',
        'parent_item'       => 'Parent Slider Category',
        'parent_item_colon' => 'Parent Slider Category:',
        'edit_item'         => 'Edit Slider Category',
        'update_item'       => 'Update Slider Category',
        'add_new_item'      => 'Add New Slider Category',
        'new_item_name'     => 'New Slider Category Name',
        'menu_name'         => 'Slider Categories'
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'slider-category'),
		'show_in_rest'			=> false,
    );
    register_taxonomy('slider_categories', array('slider'), $args);
}
add_action('init', 'slider_categories', 0);