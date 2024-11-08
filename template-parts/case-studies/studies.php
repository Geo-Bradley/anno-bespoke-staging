<?php


	$id = get_the_id();


	$title_1	= esc_attr(get_post_meta($id, 'hero_studies_title_1_meta_field', true));
	$title_2	= esc_attr(get_post_meta($id, 'hero_studies_title_2_meta_field', true));

?>

<div class="studies-hero section-pad-top white-bg">
	<div class="wide-container">

		<div class="main-header w100">

			<div class="w50">
				<h1 class="skew-up"><?= $title_1 ?></h1>
			</div>
			<div class="w50">
				<h3 class="skew-up"><?= $title_2 ?></h3>
			</div>

		</div>

		<div class="all-studies">

			<div class="w100 studies-100">
				<?php 
					$args = array(
						'post_type' => 'anno_case_studies',
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => 3,
						'tax_query' => array(
							array(
								'taxonomy' => 'case_studies_categories',
								'field' => 'term_id',
								'terms' => 4,
							),
						),
					);
					$query = new WP_Query( $args );
					while ( $query->have_posts() ) {
						$query->the_post();
						$id = get_the_ID();
						$company_title	= esc_attr(get_post_meta($id, 'cs_card_company_title_meta_field', true));
						$sub_title	= esc_attr(get_post_meta($id, 'cs_card_subheading_meta_field', true));
						$content	= get_post_meta($id, 'cs_card_content_meta_field', true);
						$image_id		= esc_attr(get_post_meta($id, 'cs_card_img_meta_field', true));
						$image_data 	= wp_get_attachment($image_id);
						$image_url 		= wp_get_attachment_url($image_id);
						$btn_url			= get_permalink($id);
						?>

						<div class="w50 equal-height">

							<div class="inner-study-card">

								<div class="img_cover">
									<img src="<?= $image_url; ?>">
								</div>

								<div class="study-card-btn">
									<h5><?= $company_title ?></h5>
									<a class="btn btn-bg" href="<?= $btn_url ?>">VIEW PROJECT<i class="fa-solid fa-chevron-right"></i><span></span></a>
								</div>

								<h6><?= $sub_title ?></h6>
								<div><?= wpautop( $content ); ?></div>

							</div>

						</div>

						<?php 
					} 
					wp_reset_postdata();
				?>
			</div>

		</div>


	</div>
</div>

