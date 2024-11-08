<?php


	$page_id = get_the_id();

	$img_slider_cat_selector_id = esc_attr(get_post_meta($page_id, 'img_slider_cat_selector', true));

?>

<div class="img-slide section-pad white-bg">
	<div class="wide-container">




			<div class="w100 img-swiper" id="dragable">
				<div class="swiper-container" id="img-swiper">
					<div class="swiper-wrapper">
						<?php 
							$args = array(
								'post_type' => 'anno_slider',
								'orderby' => 'rand',
								'tax_query' => array(
									array(
										'taxonomy' => 'slider_categories',
										'field' => 'term_id',
										'terms' => array( $img_slider_cat_selector_id ),
										'operator' => 'IN'
									),
								),
							);
							$query = new WP_Query( $args );
							while ( $query->have_posts() ) {
								$query->the_post();
								$id = get_the_ID();
								$featured_img_url 	= get_the_post_thumbnail_url($id,'full');
								$img_alt 			= get_post_meta(get_post_thumbnail_id($id), '_wp_attachment_image_alt', true);
								?>

								
								<div class="img-slide swiper-slide" style="background-image: url('<?= $featured_img_url; ?>');">


									
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
    var swiper = new Swiper("#img-swiper", {
        slidesPerView: "auto",
        spaceBetween: 30,
		loop: true,
		autoplay: {
			delay: 3000,
			disableOnInteraction: false,
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
    });
</script>