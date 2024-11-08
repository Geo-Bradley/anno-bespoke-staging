<?php


	$id = get_the_id();
	$parent_id = 11;

	$image_id		= esc_attr(get_post_meta($id, 'cs_services_img_meta_field', true));
	$image_data 	= wp_get_attachment($image_id);
	$image_url 		= wp_get_attachment_url($image_id);

	$subheading	= esc_attr(get_post_meta($id, 'cs_services_heading_meta_field', true));


	$services = maybe_unserialize(get_post_meta($id, 'cs_services_meta_field', true));




	if(!(empty($image_url))) { ?>


		<div class="cs-project  section-pad-bottom green-bg">
			<div class="wide-container">
					
				<div class="cs-imgs w100">

					<div class="w50">
						
						<h4><?= $subheading ?></h4>

						<div class="cs-services">
							<?php foreach ($services as $service) {
								$service_title = get_the_title($service); ?>

								<h6><?= $service_title ?></h6>

							<?php } ?>
						</div>

					</div>

					<div class="w50 cs-imgs-50 ukiyo" style="background-image: url('<?= $image_url; ?>');">
					</div>


				</div>

			</div>
		</div>


<?php }