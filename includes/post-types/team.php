<?php
function team_posttype(){
	$labels = array(
		'name'					=> 'Team',
		'singular_name'			=> 'Team',
		'menu_name'				=> 'Team',
		'name_admin_bar'		=> 'Team',
		'add_new'				=> 'Add New Team Member',
		'add_new_item'			=> 'Add New Team Member',
		'new_item'				=> 'New Team Member',
		'edit_item'				=> 'Edit Team Member',
		'view_item'				=> 'View Team Member',
		'all_items'				=> 'All Team',
		'search_items'			=> 'Search Team',
		'not_found'				=> 'No Team found.',
		'not_found_in_trash'	=> 'No Team found in Trash.'
	);
	$supports = array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions');
	$rewrite = array(
		'slug'					=> 'team',
		'with_front'			=> true,
		'pages'					=> true,
	);
	$args = array(
		'labels'				=> $labels,
		'hierarchical' 			=> false,
		'public'				=> true,
		'publicly_queriable'	=> false, 
		'menu_icon'				=> 'dashicons-groups',
		'show_ui'				=> true,
		'supports'				=> $supports,
		'rewrite'				=> $rewrite,
		'has_archive'			=> false,
		'taxonomies'			=> array('team_categories'),
		'show_in_rest'			=> false,
	);
	register_post_type('anno_team', $args);
}
add_action('init', 'team_posttype');


function team_categories(){
    $labels = array(
        'name'              => 'Team Categories',
        'singular_name'     => 'Team Category',
        'search_items'      => 'Search Team',
        'all_items'         => 'All Team Categories',
        'parent_item'       => 'Parent Team Category',
        'parent_item_colon' => 'Parent Team Category:',
        'edit_item'         => 'Edit Team Category',
        'update_item'       => 'Update Team Category',
        'add_new_item'      => 'Add New Team Category',
        'new_item_name'     => 'New Team Category Name',
        'menu_name'         => 'Team Categories'
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'team-category'),
		'show_in_rest'			=> false,
    );
    register_taxonomy('team_categories', array('team'), $args);
}
add_action('init', 'team_categories', 0);