<?php


	$id = get_the_id();

	$image_id		= esc_attr(get_post_meta($id, 'about_hero_image_meta_field', true));
	$image_data 	= wp_get_attachment($image_id);
	$image_url 		= wp_get_attachment_url($image_id);



	$title	= esc_attr(get_post_meta($id, 'about_hero_title_meta_field', true));
	$subheading	= esc_attr(get_post_meta($id, 'about_hero_subheading_meta_field', true));


?>

<div class="about-hero section-pad white-bg">
	<div class="wide-container">
			
		<div class="main-header w100">

			<div class="w50">
				<h1 class="skew-up"><?= $title ?></h1>
			</div>
			<div class="w50">
				<h3 class="skew-up"><?= $subheading ?></h3>
			</div>

		</div>

		<div class="w100 about-hero-img scale-hero-img">
			<img src="<?= $image_url; ?>">
		</div>

	</div>
</div>

