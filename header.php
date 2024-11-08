<!doctype html>

<?php 
	$dir = get_template_directory_uri(); 
?>

<html <?php language_attributes(); ?>>
	<head>
	
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

		<script src="https://unpkg.com/scrollreveal"></script>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
		<div class="cursor-dot" data-cursor-dot></div>
		<div class="cursor-outline" data-cursor-outline></div>



		<div id="header">

			<?php get_template_part('template-parts/header/navigation', 'php'); ?>
		
		</div>

		<div id="primary">