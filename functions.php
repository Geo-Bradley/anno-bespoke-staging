<?php

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

$dir = get_template_directory();

if ( ! isset( $content_width ) ) {
    $content_width = 900;
}

if ( function_exists( 'add_theme_support' ) ) {

    // Add Thumbnail Theme Support.
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'large', 700, '', true ); // Large Thumbnail.
    add_image_size( 'medium', 250, '', true ); // Medium Thumbnail.
    add_image_size( 'small', 120, '', true ); // Small Thumbnail.
    add_image_size( 'custom-size', 700, 200, true ); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Enable support.
    add_theme_support( 'anno', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

}

// WooCommerce Support
add_theme_support( 'woocommerce' );

/*------------------------------------*\
    Functions
\*------------------------------------*/

// Register Blank Navigation
function register_anno_menu() {
    register_nav_menus( array( // Using array to specify more menus if needed
        'header-menu'  => esc_html( 'Header Menu', 'anno_main_menu' ), // Main Navigation
        'burger-menu'  => esc_html( 'Burger Menu', 'anno_burger_menu' ), // Main Navigation
        'footer-menu'   => esc_html( 'Footer Menu', 'anno_footer_menu' ) // Extra Navigation if needed (duplicate as many as you need!)
    ) );
}

function wpb_add_google_fonts() {
    wp_enqueue_style( 'wpb-google-typekit', 'https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Space+Grotesk:wght@300..700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

// Posttypes - First array is calling for the file name. The require is file location.
$dir = get_template_directory();
$posttypes = array('services', 'slider', 'case-studies', 'testimonials', 'team', 'spirit', 'accordion', 'faqs');
foreach($posttypes as $posttype){
	require $dir.'/includes/post-types/'.$posttype.'.php';
}

// Call Metaboxes - First array is calling for the file name. The require is file location.
$metaboxes = array('home', 'case-study', 'testimonial', 'contact', 'studies-page', 'about', 'teams', 'spirits', 'single-spirit', 'faq');
if(!empty($metaboxes) && is_array($metaboxes)){
    foreach($metaboxes as $metabox){
        require $dir.'/includes/meta-boxes/'.$metabox.'.php';
    }
}

/*------------------------------------*\
    Actions + Filters + Enqueue
\*------------------------------------*/
add_action( 'init', 'register_anno_menu' ); // Add Blank Menu


add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

add_filter( 'wpcf7_autop_or_not', '__return_false' );


// Auto Image Data generation
if ( !function_exists('wp_get_attachment') ) {
    function wp_get_attachment( $attachment_id )
    {
        $attachment = get_post( $attachment_id );
        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );
    }
}



/*------------------------------------*\
    Require
\*------------------------------------*/
// require $dir.'/includes/functions-two.php';
require $dir.'/includes/enqueue.php';
require $dir.'/includes/theme-options/theme-options.php';