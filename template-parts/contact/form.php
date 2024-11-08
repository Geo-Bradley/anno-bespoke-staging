<?php


	$id = get_the_id();

	$image_id		= esc_attr(get_post_meta($id, 'contact_map_img_meta_field', true));
	$image_data 	= wp_get_attachment($image_id);
	$image_url 		= wp_get_attachment_url($image_id);


	$title_1	= esc_attr(get_post_meta($id, 'hero_contact_title_1_meta_field', true));
	$title_2	= esc_attr(get_post_meta($id, 'hero_contact_title_2_meta_field', true));


?>

<div class="contact-hero section-pad white-bg">
	<div class="wide-container">


	<div class="w100 contact-100">
		<div class="w50 contact-50">

			<h1 class="skew-up"><?= $title_1 ?></h1>
			<h1 class="skew-up"><?= $title_2 ?></h1>

			<?php echo do_shortcode ( '[contact-form-7 id="859ec12" title="Contact form"]' ); ?>

		</div>
		<div class="w50 contact-50">

			<div class="map-img scale-hero-img">
				<img src="<?= $image_url ?>">
			</div>

		</div>
	</div>


	</div>
</div>

