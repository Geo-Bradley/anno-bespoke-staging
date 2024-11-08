<?php


	$id = get_the_id();

	$heading	= esc_attr(get_post_meta($id, 'faq_contact_heading_meta_field', true));
	$content	= get_post_meta($id, 'faq_contact_content_meta_field', true);
	$btn	= esc_attr(get_post_meta($id, 'faq_contact_btn_meta_field', true));
	$btn_url	= esc_attr(get_post_meta($id, 'faq_contact_btn_url_meta_field', true));


?>

<div class="faq-section section-pad-bottom white-bg">
	<div class="wide-container">
			

	<div class="w100">

		<div class="w30">

			<div class="faq-categories">
				<a href="#faq-cat-1" fade-in1=""><h4>SPIRIT DEVELOPMENT</h4></a>
				<a href="#faq-cat-2" fade-in2=""><h4>BRANDING SUPPORT</h4></a>
				<a href="#faq-cat-3" fade-in3=""><h4>DELIVERABLES</h4></a>
				<a href="#faq-cat-4" fade-in4=""><h4>SPIRIT DELIVERY</h4></a>
				<a href="#faq-cat-5" fade-in5=""><h4>OTHER QUESTIONS</h4></a>
			</div>

			<div class="faq-contact">
				<h4><?= $heading ?></h4>
				<div class="up-1"><?= wpautop( $content ); ?></div>
				<a class="btn" href="<?= $btn_url ?>"><?= $btn ?><i class="fa-solid fa-chevron-right"></i><span></span></a>
			</div>

		</div>

		<div class="accordion w70">



			<div class="faq-cat faq-cat-1" id="faq-cat-1">
				<?php 
													// Category 1
					$args = array(
						'post_type' => 'anno_faqs',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'faqs_categories',
								'field' => 'term_id',
								'terms' => '15',
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

						<div class="accordion-item faq-1">
							<button aria-expanded="false"><span class="accordion-title"><?= $accordion_heading ?></span><span class="icon" aria-hidden="true"><i class="fa-solid fa-chevron-down"></i></span></button>
							<div class="accordion-content">
								<p><?= $accordion_content ?></p>
							</div>
						</div>

						<?php 
					} 
					wp_reset_postdata();

				?></div>


				<div class="faq-cat faq-cat-2" id="faq-cat-2"><?php

													// Category 2
					$args = array(
						'post_type' => 'anno_faqs',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'faqs_categories',
								'field' => 'term_id',
								'terms' => '16',
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

						<div class="accordion-item faq-2">
							<button aria-expanded="false"><span class="accordion-title"><?= $accordion_heading ?></span><span class="icon" aria-hidden="true"><i class="fa-solid fa-chevron-down"></i></span></button>
							<div class="accordion-content">
								<p><?= $accordion_content ?></p>
							</div>
						</div>

						<?php 
					} 
					wp_reset_postdata();


				?></div>


				<div class="faq-cat faq-cat-3" id="faq-cat-3"><?php

													// Category 3
					$args = array(
						'post_type' => 'anno_faqs',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'faqs_categories',
								'field' => 'term_id',
								'terms' => '17',
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

						<div class="accordion-item faq-3">
							<button aria-expanded="false"><span class="accordion-title"><?= $accordion_heading ?></span><span class="icon" aria-hidden="true"><i class="fa-solid fa-chevron-down"></i></span></button>
							<div class="accordion-content">
								<p><?= $accordion_content ?></p>
							</div>
						</div>

						<?php 
					} 
					wp_reset_postdata();


				?></div>


				<div class="faq-cat faq-cat-4" id="faq-cat-4"><?php

													// Category 4
					$args = array(
						'post_type' => 'anno_faqs',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'faqs_categories',
								'field' => 'term_id',
								'terms' => '19',
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

						<div class="accordion-item faq-4">
							<button aria-expanded="false"><span class="accordion-title"><?= $accordion_heading ?></span><span class="icon" aria-hidden="true"><i class="fa-solid fa-chevron-down"></i></span></button>
							<div class="accordion-content">
								<p><?= $accordion_content ?></p>
							</div>
						</div>

						<?php 
					} 
					wp_reset_postdata();


				?></div>


				<div class="faq-cat faq-cat-5" id="faq-cat-5"><?php

													// Category 5
					$args = array(
						'post_type' => 'anno_faqs',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'faqs_categories',
								'field' => 'term_id',
								'terms' => '18',
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

						<div class="accordion-item faq-5">
							<button aria-expanded="false"><span class="accordion-title"><?= $accordion_heading ?></span><span class="icon" aria-hidden="true"><i class="fa-solid fa-chevron-down"></i></span></button>
							<div class="accordion-content">
								<p><?= $accordion_content ?></p>
							</div>
						</div>

						<?php 
					} 
					wp_reset_postdata();

					?></div>

			</div>
		</div>

	</div>
</div>

