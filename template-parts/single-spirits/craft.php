<?php

	$id = get_the_id();

	$image_id		= esc_attr(get_post_meta($id, 's_spirit_craft_image_meta_field', true));
	$image_data 	= wp_get_attachment($image_id);
	$image_url 		= wp_get_attachment_url($image_id);

	$heading	= esc_attr(get_post_meta($id, 's_spirit_craft_heading_meta_field', true));
	$content	= get_post_meta($id, 's_spirit_craft_content_meta_field', true);
	$btn	= esc_attr(get_post_meta($id, 's_spirit_craft_btn_meta_field', true));
	$btn_url	= esc_attr(get_post_meta($id, 's_spirit_craft_btn_url_meta_field', true));

?>

<div class="about-craft spirit-craft section-pad-bottom white-bg">
	<div class="wide-container">

		<div class="w100">

			<div class="w35 valign-bottom">
				<h4><?= $heading ?></h4>
				<div class="up-1"><?= wpautop( $content ); ?></div>
				<a class="btn" href="<?= $btn_url ?>"><?= $btn ?><i class="fa-solid fa-chevron-right"></i><span></span></a>
			</div>
			<div class="w65">
				<img class="ukiyo" src="<?= $image_url; ?>">
			</div>

		</div>

	</div>
</div>

