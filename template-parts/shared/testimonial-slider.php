<?php


	$page_id = get_the_id();

	$testimonial_cat_selector_id = esc_attr(get_post_meta($page_id, 'testimonial_cat_selector', true));


?>

<div class="testimonial-slide-sec white-bg">
	<div class="wide-container">




			<div class="w100 testimonial-swiper" id="dragable">
				<div class="swiper-container" id="testimonial-swiper">
					<div class="swiper-wrapper">
						<?php 
							$args = array(
								'post_type' => 'testimonials',
								'orderby' => 'rand',
								'tax_query' => array(
									array(
										'taxonomy' => 'slider_categories',
										'field' => 'term_id',
										'terms' => array( $testimonial_cat_selector_id ),
										'operator' => 'IN'
									),
								),
							);
							$query = new WP_Query( $args );
							while ( $query->have_posts() ) {
								$query->the_post();
								$id = get_the_ID();
								$featured_img_url 	= get_the_post_thumbnail_url($id,'full');
								$post_title 		= get_the_title($id);
								$post_content 		= get_the_content(null, false, $id);
								$job_title			= esc_attr(get_post_meta($id, 'job_title_meta_field', true)); 
								?>

								
								<div class="testimonial-slide swiper-slide">

									<div><?= wpautop( $post_content ); ?></div>
									<h4><?= $post_title ?></h4>
									<h6><?= $job_title ?></h6>
									
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
    var swiper = new Swiper("#testimonial-swiper", {
		spaceBetween: 30,
		effect: "fade",
		loop: true,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
    });
</script>