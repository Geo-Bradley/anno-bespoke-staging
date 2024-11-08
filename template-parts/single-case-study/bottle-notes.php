<?php


	$id = get_the_id();



	$image_id		= esc_attr(get_post_meta($id, 'cs_bnotes_img_meta_field_1', true));
	$image_data 	= wp_get_attachment($image_id);
	$image_url_1 		= wp_get_attachment_url($image_id);

	$title_1	= esc_attr(get_post_meta($id, 'cs_bnotes_heading_meta_field_1', true));

	$title1_1	= esc_attr(get_post_meta($id, 'cs_bnotes_heading_1_meta_field_1', true));
	$content1_1	= get_post_meta($id, 'cs_bnotes_text_1_meta_field_1', true);
	$title1_2	= esc_attr(get_post_meta($id, 'cs_bnotes_heading_2_meta_field_1', true));
	$content1_2	= get_post_meta($id, 'cs_bnotes_text_2_meta_field_1', true);
	$title1_3	= esc_attr(get_post_meta($id, 'cs_bnotes_heading_3_meta_field_1', true));
	$content1_3	= get_post_meta($id, 'cs_bnotes_text_3_meta_field_1', true);
	$title1_4	= esc_attr(get_post_meta($id, 'cs_bnotes_heading_4_meta_field_1', true));
	$content1_4	= get_post_meta($id, 'cs_bnotes_text_4_meta_field_1', true);




	$image_id		= esc_attr(get_post_meta($id, 'cs_bnotes_img_meta_field_2', true));
	$image_data 	= wp_get_attachment($image_id);
	$image_url_2 		= wp_get_attachment_url($image_id);

	$title_2	= esc_attr(get_post_meta($id, 'cs_bnotes_heading_meta_field_2', true));

	$title2_1	= esc_attr(get_post_meta($id, 'cs_bnotes_heading_1_meta_field_2', true));
	$content2_1	= get_post_meta($id, 'cs_bnotes_text_1_meta_field_2', true);
	$title2_2	= esc_attr(get_post_meta($id, 'cs_bnotes_heading_2_meta_field_2', true));
	$content2_2	= get_post_meta($id, 'cs_bnotes_text_2_meta_field_2', true);
	$title2_3	= esc_attr(get_post_meta($id, 'cs_bnotes_heading_3_meta_field_2', true));
	$content2_3	= get_post_meta($id, 'cs_bnotes_text_3_meta_field_2', true);
	$title2_4	= esc_attr(get_post_meta($id, 'cs_bnotes_heading_4_meta_field_2', true));
	$content2_4	= get_post_meta($id, 'cs_bnotes_text_4_meta_field_2', true);





if(!(empty($image_url_1) && empty($image_url_2))) { ?>


<div class="bottle-note-sec img-bg">
	<div class="wide-container">


		<?php 	if(!(empty($image_url_1))) { ?>

			<div class="bottle-note w100">

				<div class="w50">
					<img src="<?= $image_url_1; ?>">
				</div>
				<div class="w50">
					<h2 class="skew-up"><?= $title_1 ?></h2>

					<h6 class="bottom-up"><?= $title1_1 ?></h6>
					<div class="bottom-up"><?= wpautop( $content1_1 ); ?></div>

					<h6 class="bottom-up"><?= $title1_2 ?></h6>
					<div class="bottom-up"><?= wpautop( $content1_2 ); ?></div>

					<h6 class="bottom-up"><?= $title1_3 ?></h6>
					<div class="bottom-up"><?= wpautop( $content1_3 ); ?></div>

					<h6 class="bottom-up"><?= $title1_4 ?></h6>
					<div class="bottom-up"><?= wpautop( $content1_4 ); ?></div>
				</div>

			</div>

		<?php } ?>

		<?php 	if(!(empty($image_url_2))) { ?>

		<div class="bottle-note bottle-note-2 w100">

			<div class="w50">
				<h2 class="skew-up"><?= $title_2 ?></h2>

				<h6 class="bottom-up"><?= $title2_1 ?></h6>
				<div class="bottom-up"><?= wpautop( $content2_1 ); ?></div>

				<h6 class="bottom-up"><?= $title2_2 ?></h6>
				<div class="bottom-up"><?= wpautop( $content2_2 ); ?></div>

				<h6 class="bottom-up"><?= $title2_3 ?></h6>
				<div class="bottom-up"><?= wpautop( $content2_3 ); ?></div>

				<h6 class="bottom-up"><?= $title2_4 ?></h6>
				<div class="bottom-up"><?= wpautop( $content2_4 ); ?></div>
			</div>
			<div class="w50">
				<img src="<?= $image_url_2; ?>">
			</div>

		</div>

		<?php } ?>



	</div>
</div>


<?php }
