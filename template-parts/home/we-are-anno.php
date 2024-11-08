<?php


	$page_id = get_the_id();

	$image_id		= esc_attr(get_post_meta($page_id, 'home_image_meta_field', true));
	$image_data 	= wp_get_attachment($image_id);
	$image_url 		= wp_get_attachment_url($image_id);

	$image_title	= esc_attr(get_post_meta($page_id, 'home_image_title_meta_field', true));

	$image_content_1	= get_post_meta($page_id, 'home_image_content_1_meta_field', true);
	$image_content_2	= get_post_meta($page_id, 'home_image_content_2_meta_field', true);


?>

<div class="home-we-are img-bg section-pad">

	<span class="ukiyo"></span>

	<div class="wide-container">

		<div class="w100">

			<div class="w60">
				<img src="<?= $image_url; ?>">
			</div>
			<div class="w40">

				<h2 class="skew-up"><?= $image_title ?></h2>
				<div class="sr-1"><?= wpautop( $image_content_1 ); ?></div>
				<div class="sr-1"><?= wpautop( $image_content_2 ); ?></div>


			</div>

		</div>

	</div>
</div>

