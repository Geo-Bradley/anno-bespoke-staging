<?php

function geo_theme_function_enqueue_admin_scripts(){
	$dir = get_template_directory_uri();
	
	wp_enqueue_media();
	wp_enqueue_editor();
	
	wp_enqueue_style('admin-css', $dir.'/assets/css/admin.css', array(), '1.0.0', 'all');
	wp_register_script('admin-script', $dir.'/assets/js/admin.js', false, '1.0.0', true);
	wp_enqueue_script('admin-script');
}
add_action('admin_enqueue_scripts', 'geo_theme_function_enqueue_admin_scripts');


// The proper way to enqueue GSAP script in WordPress

// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
function theme_gsap_script(){
    wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), false, true );
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap-js'), false, true );
}

add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );


function theme_function_enqueue_theme_scripts(){
	$dir = get_template_directory_uri();


	
	// Scripts
	wp_deregister_script('jquery');
	wp_register_script('jquery', '//code.jquery.com/jquery-3.7.1.min.js', false, '3.7.1', true);
	wp_enqueue_script('jquery');

	// Ukiyo (parallax)
	wp_register_script('ukiyo', 'https://cdn.jsdelivr.net/npm/ukiyojs@4.1.2/dist/ukiyo.min.js');
	wp_enqueue_script('ukiyo');

	// Split Type Script
	wp_register_script('split-type', 'https://unpkg.com/split-type@0.3.4/umd/index.min.js');
	wp_enqueue_script('split-type');

	// Lenis Smooth Scroll
	wp_register_script('lenis', 'https://unpkg.com/lenis@1.1.14/dist/lenis.min.js');
	wp_enqueue_script('lenis');

	// Swiper
	wp_register_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', false, '11.1.1', true);
	wp_enqueue_script('swiper');

	// Theme Script
	wp_register_script('theme-script', $dir.'/assets/js/script.js', false, '1.0.3', true);
	wp_enqueue_script('theme-script');
	
	// Styles
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.1.1', 'all');
	wp_enqueue_style('theme-css', $dir.'/assets/css/style.css', array(), '1.1.2', 'all');
    wp_enqueue_style('framework-css', $dir.'/assets/css/framework.css', array(), '1.1.1', 'all');

	//Fonts
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Alike+Angular&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap', false);
	wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/dtf6gci.css', array(), null);


}
add_action('wp_enqueue_scripts', 'theme_function_enqueue_theme_scripts');