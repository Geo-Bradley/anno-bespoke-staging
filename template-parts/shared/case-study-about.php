<?php


	$page_id = get_the_id();


?>

<div class="shared-cs-about section-pad white-bg">
	<div class="wide-container">

		<div class="w100 csa-header">

			<div class="w66">
				<h2 class="skew-up">Take a look at our Case Studies to see what we are all about</h2>
			</div>
			<div class="w33">
				<div class="skew-up">
					<p>Want to see our full range of in-depth case studies?</p>
					<p>Click view more to see more specific to your needs.</p>
				</div>
				<a class="btn" href="/">VIEW MORE<i class="fa-solid fa-chevron-right"></i><span></span></a>
			</div>

		</div>







			<div class="w100 case-study-swiper">
				<div class="swiper-container" id="case-study-swiper">
					<div class="swiper-wrapper">
						<?php 
							$args = array(
								'post_type' => 'anno_case_studies',
								'orderby' => 'rand',
								'posts_per_page' => 3,
								'tax_query' => array(
									array(
										'taxonomy' => 'case_studies_categories',
										'field' => 'term_id',
										'terms' => '8',
									),
								),
							);
							$query = new WP_Query( $args );
							while ( $query->have_posts() ) {
								$query->the_post();
								$id = get_the_ID();
								$case_study_title	= esc_attr(get_post_meta($id, 'cs_reg_slider_title_meta_field', true));
								$case_study_content	= get_post_meta($id, 'cs_reg_slider_content_meta_field', true);
								$image_id			= esc_attr(get_post_meta($id, 'cs_reg_slider_image_meta_field', true));
								$image_data 		= wp_get_attachment($image_id);
								$image_url 			= wp_get_attachment_url($image_id);
								?>

								
								<div class="swiper-slide">

									<div class="dot"></div>

									<h6><?= $case_study_title ?></h6>
									<div><?= wpautop( $case_study_content ); ?></div>

									<div class="csa-img" style="background-image: url('<?= $image_url; ?>');">
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


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper("#case-study-swiper", {
		slidesPerView: 3,
		spaceBetween: 30,
		loop: false,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		breakpoints: {
			0: {
				slidesPerView: 1,
			},
			840: {
				slidesPerView: 2,
			},
			1160: {
				slidesPerView: 3,
			},
		}
    });
</script>