<?php


	$page_id = get_the_id();

	$services_title	= esc_attr(get_post_meta($page_id, 'home_services_title_meta_field', true));
	$services_text	= esc_attr(get_post_meta($page_id, 'home_services_text_meta_field', true));

	$subheading	= esc_attr(get_post_meta($page_id, 'home_services_sub_meta_field', true));

	$services_btn	= esc_attr(get_post_meta($page_id, 'home_services_btn_title_meta_field', true));
	$services_btn_url	= esc_attr(get_post_meta($page_id, 'home_services_btn_url_meta_field', true));




?>

<div class="home-bcs-slide img-bg">
	<div class="wide-container">

		<div class="w100">
			<div class="bcs-swiper" id="dragable">
				<div class="swiper-container" id="bcs-swiper">
					<div class="swiper-wrapper">
						<?php 
							$args = array(
								'post_type' => 'anno_case_studies',
								'orderby' => 'menu_order',
								'order' => 'ASC',
								'tax_query' => array(
									array(
										'taxonomy' => 'case_studies_categories',
										'field' => 'term_id',
										'terms' => '4',
									),
								),
							);
							$query = new WP_Query( $args );
							while ( $query->have_posts() ) {
								$query->the_post();
								$id = get_the_ID();
								$bottle_title		= esc_attr(get_post_meta($id, 'bcs_slider_title_meta_field', true)); 
								$bottle_date		= esc_attr(get_post_meta($id, 'bcs_slider_date_meta_field', true)); 
								$bottle_content		= get_post_meta($id, 'bcs_slider_content_meta_field', true);
								$cs_btn_url			= get_permalink($id);
								$image_id			= esc_attr(get_post_meta($id, 'bcs_slider_img_meta_field', true));
								$image_data 		= wp_get_attachment($image_id);
								$image_url 			= wp_get_attachment_url($image_id);
								?>
								
								<div class="swiper-slide">

									<div class="bcs-left">
										<h4><?= $bottle_title ?></h4>
										<h6>Create in <?= $bottle_date ?></h6>
										<div><?= wpautop( $bottle_content ); ?></div>
										<a class="btn" href="<?= $cs_btn_url ?>">VIEW MORE<i class="fa-solid fa-chevron-right"></i><span></span></a>
									</div>
									<div class="bcs-right">
										<img src="<?= $image_url; ?>">
									</div>


								</div>

								<?php 
							} 
							wp_reset_postdata();
						?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>




	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper("#bcs-swiper", {
		spaceBetween: 430,
		loop: true,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
    });
</script>