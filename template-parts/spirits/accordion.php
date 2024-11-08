<?php


	$id = get_the_id();

	$image_id		= esc_attr(get_post_meta($id, 'spirits_hero_image_meta_field', true));
	$image_data 	= wp_get_attachment($image_id);
	$image_url 		= wp_get_attachment_url($image_id);



	$title	= esc_attr(get_post_meta($id, 'spirits_g_section_title_meta_field', true));
	$heading_content	= get_post_meta($id, 'spirits_g_section_content_meta_field', true);


?>

<div class="spirits-accordion spirits-accordion-main section-pad white-bg ">
	<div class="wide-container">


		<div class="accordion w100">
				<?php 
					$args = array(
						'post_type' => 'anno_services',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'services_categories',
								'field' => 'term_id',
								'terms' => '23',
							),
						),
					);
					$query = new WP_Query( $args );
					?>
					<div class="w50"><?php
					$count = 0;
					while ( $query->have_posts() ) {
						$query->the_post();
						$count++;
						if ($count % 2 == 0) {
							$id = get_the_ID();
							$accordion_heading		= get_the_title($id);
							$accordion_content        = get_the_content($id);
							?>

							<div class="accordion-item">
								<button aria-expanded="false"><span class="accordion-title"><?= $accordion_heading ?></span><span class="icon" aria-hidden="true"><i class="fa-solid fa-chevron-down"></i></span></button>
								<div class="accordion-content">
									<p><?= $accordion_content ?></p>
								</div>
							</div>
							<?php 
						}

					} 
					?></div>


					<div class="w50"><?php
					$count = 0;
					while ( $query->have_posts() ) {
						$query->the_post();
						$count++;
						if ($count % 2 != 0) {
							$id = get_the_ID();
							$accordion_heading		= get_the_title($id);
							$accordion_content        = get_the_content($id);
							?>

							<div class="accordion-item">
								<button aria-expanded="false"><span class="accordion-title"><?= $accordion_heading ?></span><span class="icon" aria-hidden="true"><i class="fa-solid fa-chevron-down"></i></span></button>
								<div class="accordion-content">
									<p><?= $accordion_content ?></p>
								</div>
							</div>
							<?php 
						}

					} 
					?></div><?php
					wp_reset_postdata();
				?>
			</div>



	</div>

</div>