<?php


	$id = get_the_id();

	$title	= esc_attr(get_post_meta($id, 's_spirits_accordion_title_meta_field', true));
	$heading_content	= get_post_meta($id, 's_spirits_accordion_content_meta_field', true);


?>

<div class="spirits-accordion spirits-accordion-main section-pad green-bg ">
	<div class="wide-container">
			
		<div class="w100 green-accordion-title">

			<div class="w50">
				<h3 class="skew-up"><?= $title ?></h3>
			</div>
			<div class="w50">
			<div><?= wpautop( $heading_content ); ?></div>
			</div>

		</div>


		<div class="accordion">
				<?php 
					$args = array(
						'post_type' => 'anno_accordions',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'accordions_categories',
								'field' => 'term_id',
								'terms' => '13',
							),
						),
					);
					$query = new WP_Query( $args );
					while ( $query->have_posts() ) {
						$query->the_post();
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
					wp_reset_postdata();
				?>
			</div>



	</div>

</div>

