<?php

function geo_theme_function_enqueue_admin_scripts(){
	$dir = get_template_directory_uri();
	
	wp_enqueue_media();
	wp_enqueue_editor();
	
	wp_enqueue_style('admin-css', $dir.'/assets/css/admin.css', array(), '1.0.0', 'all');
	wp_register_script('admin-script', $dir.'/assets/js/admin.js', false, '1.0.0', true);
	wp_enqueue_script('admin-script');

	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_style('jquery-ui-css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');

}
add_action('admin_enqueue_scripts', 'geo_theme_function_enqueue_admin_scripts');


function theme_function_enqueue_theme_scripts(){
	$dir = get_template_directory_uri();
	
	// Scripts
	wp_deregister_script('jquery');
	wp_register_script('jquery', '//code.jquery.com/jquery-3.7.1.min.js', false, '3.7.1', true);
	wp_enqueue_script('jquery');
	
	wp_register_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', false, '11.0.0', true);
	wp_enqueue_script('swiper');
	
	wp_register_script('theme-script', $dir.'/assets/js/script.js', false, '1.0.0', true);
	wp_enqueue_script('theme-script');
	
	
	// Styles
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0', 'all');
	wp_enqueue_style('theme-css', $dir.'/assets/css/style.css', array(), '1.1.1', 'all');
    wp_enqueue_style('framework-css', $dir.'/assets/css/framework.css', array(), '1.1.1', 'all');
	
	
	// Fonts
	wp_enqueue_style('theme-bunny-fonts', 'https://fonts.bunny.net/css?family=poppins:200,300,400,600,700', false);


    // Lity
    wp_register_script('lity', 'https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js',  false, '2.4.1', true);
    wp_enqueue_script('lity');
    wp_enqueue_style('lity', 'https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css', array(), '2.4.1', 'all');
}
add_action('wp_enqueue_scripts', 'theme_function_enqueue_theme_scripts');



