<?php


	$page_id = get_the_id();

	$services_title	= esc_attr(get_post_meta($page_id, 'home_services_title_meta_field', true));
	$services_text	= esc_attr(get_post_meta($page_id, 'home_services_text_meta_field', true));

	$subheading	= esc_attr(get_post_meta($page_id, 'home_services_sub_meta_field', true));

	$services_btn	= esc_attr(get_post_meta($page_id, 'home_services_btn_title_meta_field', true));
	$services_btn_url	= esc_attr(get_post_meta($page_id, 'home_services_btn_url_meta_field', true));




?>

<div class="home-services section-pad white-bg">
	<div class="wide-container">

			<div class="w100 home-services-100">
				<div class="w50">
					<h2><?= $services_title ?></h2>
				</div>
				<div class="w50">
					<div><?= wpautop( $services_text ); ?></div>
				</div>
			</div>

			<div class="w100 services-100" id="viewable">
				<?php 
					$args = array(
						'post_type' => 'anno_services',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'services_categories',
								'field' => 'term_id',
								'terms' => '3',
							),
						),
					);
					$query = new WP_Query( $args );
					if	( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							$id = get_the_ID();
							$service_title = get_the_title($id);
							$featured_image_url = get_the_post_thumbnail_url($id);
							?>

								<div class="w100 service-100">
									<div class="w50">
										<h3 class="skew-up"><?= $service_title ?></h3>
									</div>
									<div class="w50">
										<div class="s-img-container">
											<img class="ukiyo" src="<?= $featured_image_url; ?>">
										</div>
									</div>
								</div>
							
							<?php 	
						} 
					} 
					wp_reset_postdata();
				?>
			</div>


			<div class="collab-frame">
				<h2><?= $subheading; ?></h2>
				<a class="btn" href="<?= $services_btn_url; ?>"><?= $services_btn; ?><i class="fa-solid fa-chevron-right"></i><span></span></a>
			</div>

	</div>
</div>

