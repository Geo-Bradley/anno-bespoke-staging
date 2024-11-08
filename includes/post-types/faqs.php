<?php
function faqs_posttype(){
	$labels = array(
		'name'					=> 'FAQs',
		'singular_name'			=> 'FAQs',
		'menu_name'				=> 'FAQs',
		'name_admin_bar'		=> 'FAQs',
		'add_new'				=> 'Add New FAQ',
		'add_new_item'			=> 'Add New FAQ',
		'new_item'				=> 'New FAQ',
		'edit_item'				=> 'Edit FAQ',
		'view_item'				=> 'View FAQ',
		'all_items'				=> 'All FAQs',
		'search_items'			=> 'Search FAQs',
		'not_found'				=> 'No FAQs found.',
		'not_found_in_trash'	=> 'No FAQs found in Trash.'
	);
	$supports = array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions');
	$rewrite = array(
		'slug'					=> 'faqs',
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
		'taxonomies'			=> array('faqs_categories'),
		'show_in_rest'			=> false,
	);
	register_post_type('anno_faqs', $args);
}
add_action('init', 'faqs_posttype');


function faqs_categories(){
    $labels = array(
        'name'              => 'FAQs Categories',
        'singular_name'     => 'FAQs Category',
        'search_items'      => 'Search FAQs',
        'all_items'         => 'All FAQs Categories',
        'parent_item'       => 'Parent FAQs Category',
        'parent_item_colon' => 'Parent FAQs Category:',
        'edit_item'         => 'Edit FAQs Category',
        'update_item'       => 'Update FAQs Category',
        'add_new_item'      => 'Add New FAQs Category',
        'new_item_name'     => 'New FAQs Category Name',
        'menu_name'         => 'FAQs Categories'
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'faqs-category'),
		'show_in_rest'			=> false,
    );
    register_taxonomy('faqs_categories', array('faqs'), $args);
}
add_action('init', 'faqs_categories', 0);