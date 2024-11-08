<?php

function testimonials_posttype(){
	$labels = array(
		'name'					=> 'Testimonials',
		'singular_name'			=> 'Testimonial',
		'menu_name'				=> 'Testimonials',
		'name_admin_bar'		=> 'Testimonials',
		'add_new'				=> 'Add New Testimonial',
		'add_new_item'			=> 'Add New Testimonial',
		'new_item'				=> 'New Testimonial',
		'edit_item'				=> 'Edit Testimonial',
		'view_item'				=> 'View Testimonial',
		'all_items'				=> 'All Testimonials',
		'search_items'			=> 'Search Testimonials',
		'not_found'				=> 'No Testimonials found.',
		'not_found_in_trash'	=> 'No Testimonials found in Trash.'
	);
	$supports = array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions');
	$rewrite = array(
		'slug'					=> 'testimonials',
		'with_front'			=> true,
		'pages'					=> true,
	);	
	$args = array(
		'labels'				=> $labels,
		'hierarchical' 			=> false,
		'public'				=> false,
		'publicly_queriable'	=> false, 
		'menu_icon'				=> 'dashicons-editor-quote',
		'show_ui'				=> true,
		'supports'				=> $supports,
		'rewrite'				=> $rewrite,
		'has_archive'			=> false,
		'taxonomies'			=> array('testimonials_categories')
	);
	register_post_type('testimonials', $args);
}
add_action('init', 'testimonials_posttype');


function testimonials_categories_register(){
	$labels = array(
		'name'              => 'Categories',
		'singular_name'     => 'Category',
		'search_items'      => 'Search Categories',
		'all_items'         => 'All Categories',
		'parent_item'       => 'Parent Category',
		'parent_item_colon' => 'Parent Category:',
		'edit_item'         => 'Edit Category',
		'update_item'       => 'Update Category',
		'add_new_item'      => 'Add New Category',
		'new_item_name'     => 'New Category Name',
		'menu_name'         => 'Categories'
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'testimoials-categories')
	);
	register_taxonomy('testimonials_categories', array('testimonials_categories'), $args);
}
add_action('init', 'testimonials_categories_register', 0);