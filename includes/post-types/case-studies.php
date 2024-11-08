<?php
function case_studies_posttype(){
	$labels = array(
		'name'					=> 'Case Studies',
		'singular_name'			=> 'Case Studies',
		'menu_name'				=> 'Case Studies',
		'name_admin_bar'		=> 'Case Studies',
		'add_new'				=> 'Add New Case Study',
		'add_new_item'			=> 'Add New Case Study',
		'new_item'				=> 'New Case Study',
		'edit_item'				=> 'Edit Case Study',
		'view_item'				=> 'View Case Study',
		'all_items'				=> 'All Case Studies',
		'search_items'			=> 'Search Case Studies',
		'not_found'				=> 'No Case Studies found.',
		'not_found_in_trash'	=> 'No Case Studies found in Trash.'
	);
	$supports = array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions');
	$rewrite = array(
		'slug'					=> 'case_studies',
		'with_front'			=> true,
		'pages'					=> true,
	);
	$args = array(
		'labels'				=> $labels,
		'hierarchical' 			=> false,
		'public'				=> true,
		'publicly_queriable'	=> false, 
		'menu_icon'				=> 'dashicons-portfolio',
		'show_ui'				=> true,
		'supports'				=> $supports,
		'rewrite'				=> $rewrite,
		'has_archive'			=> false,
		'taxonomies'			=> array('case_studies_categories'),
		'show_in_rest'			=> false,
	);
	register_post_type('anno_case_studies', $args);
}
add_action('init', 'case_studies_posttype');


function case_studies_categories(){
    $labels = array(
        'name'              => 'Case Studies Categories',
        'singular_name'     => 'Case Studies Category',
        'search_items'      => 'Search Case Studies',
        'all_items'         => 'All Case Studies Categories',
        'parent_item'       => 'Parent Case Studies Category',
        'parent_item_colon' => 'Parent Case Studies Category:',
        'edit_item'         => 'Edit Case Studies Category',
        'update_item'       => 'Update Case Studies Category',
        'add_new_item'      => 'Add New Case Studies Category',
        'new_item_name'     => 'New Case Studies Category Name',
        'menu_name'         => 'Case Studies Categories'
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'case-studies-category'),
		'show_in_rest'			=> false,
    );
    register_taxonomy('case_studies_categories', array('case_studies'), $args);
}
add_action('init', 'case_studies_categories', 0);