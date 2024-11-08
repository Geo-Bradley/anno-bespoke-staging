<?php


	$id = get_the_id();
	$parent_id = 11;

	$image_id		= esc_attr(get_post_meta($id, 'cs_about_img_meta_field', true));
	$image_data 	= wp_get_attachment($image_id);
	$image_url 		= wp_get_attachment_url($image_id);

	$bottle_num	= esc_attr(get_post_meta($id, 'cs_bttle_num_meta_field', true));
	$bottle_type	= esc_attr(get_post_meta($id, 'cs_bottle_num_text_meta_field', true));

	$subheading	= esc_attr(get_post_meta($id, 'cs_about_heading_meta_field', true));
	$content_1	= get_post_meta($id, 'cs_about_text_1_meta_field', true);
	$content_2	= get_post_meta($id, 'cs_about_text_2_meta_field', true);





	if(!(empty($image_url))) { ?>


		<div class="cs-project  section-pad-bottom green-bg">
			<div class="wide-container">
					
				<div class="cs-imgs w100">

					<div class="w50 cs-imgs-50 ukiyo" style="background-image: url('<?= $image_url; ?>');">
						<div class="bottle-num w100">
							<div class="w50 talign-center">
								<h4><?= $bottle_num ?></h4>
							</div>
							<div class="w50">
								<h6><?= $bottle_type ?></h6>
							</div>
						</div>
					</div>
					<div class="w50">
						<h4><?= $subheading ?></h4>
						<div><?= wpautop( $content_1 ); ?></div>
						<div><?= wpautop( $content_2 ); ?></div>
					</div>

				</div>

			</div>
		</div>


<?php }