<?php


	$id = get_the_id();
	$parent_id = 11;

	$quote_large	= get_post_meta($id, 'cs_testimonial_1_meta_field', true);
	$quote_small	= get_post_meta($id, 'cs_testimonial_2_meta_field', true);
	
	$name	= esc_attr(get_post_meta($id, 'cs_testimonial_heading_meta_field', true));
	$job_title	= esc_attr(get_post_meta($id, 'cs_testimonial_job_title_meta_field', true));



if(!(empty($quote_large) && empty($name))) { ?>


	<div class="section-pad-top cs-testimonials green-bg">
		<div class="wide-container">
				

		<div class="w100">

			<div class="w50">
				<h3 class="skew-up"><?= $quote_large ?></h3>
			</div>
			<div class="w50 cst-50">
				<div class="cs-testimonial-p cs-testimonial-up"><?= wpautop( $quote_small ); ?></div>
				<h4 class="cs-testimonial-up"><?= $name ?></h4>
				<h6 class="cs-testimonial-up"><?= $job_title ?></h6>
			</div>

		</div>


		</div>
	</div>


<?php }
