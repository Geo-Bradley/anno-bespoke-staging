<?php


	$id = get_the_id();

	$image_id		= esc_attr(get_post_meta($id, 'spirits_hero_image_meta_field', true));
	$image_data 	= wp_get_attachment($image_id);
	$image_url 		= wp_get_attachment_url($image_id);



	$title	= esc_attr(get_post_meta($id, 'spirits_hero_title_meta_field', true));
	$subheading	= esc_attr(get_post_meta($id, 'spirits_hero_subheading_meta_field', true));


?>

<div class="spirits-hero section-pad white-bg">
	<div class="wide-container">
			
		<div class="main-header w100">

			<div class="w50">
				<h1 class="skew-up"><?= $title ?></h1>
			</div>
			<div class="w50">
				<h3 class="skew-up"><?= $subheading ?></h3>
			</div>

		</div>


		<div class="w100 spirits-100 section-pad-top">
				<?php 
					$args = array(
						'post_type' => 'anno_spirit',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'spirit_categories',
								'field' => 'term_id',
								'terms' => '11',
							),
						),
					);
					$query = new WP_Query( $args );
					while ( $query->have_posts() ) {
						$query->the_post();
						$id = get_the_ID();
						$spirit_title		= get_the_title($id);
						$permalink_url			= get_permalink($id);
						?>

						<div class="w50">

							<a href="<?= $permalink_url ?>">

								<div class="inner-spirit">
									<h6><?= $spirit_title ?></h6>
								</div>

							</a>

						</div>

						<?php 
					} 
					wp_reset_postdata();
				?>
			</div>



	</div>

</div>