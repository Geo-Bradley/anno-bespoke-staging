<?php // Template Name: Home

	get_header();

?>

<div class="home-container">

	<?php
		get_template_part('template-parts/home/hero');
		get_template_part('template-parts/home/upper-sec');
		get_template_part('template-parts/shared/ticker');
		get_template_part('template-parts/home/we-are-anno');
		get_template_part('template-parts/home/services');
		get_template_part('template-parts/home/case-study-bslide');
		get_template_part('template-parts/shared/img-slider');
		get_template_part('template-parts/shared/testimonial-slider');
		get_template_part('template-parts/shared/case-study-about');
		get_template_part('template-parts/shared/collab-frame');
	?>

</div>

<?php

	get_footer();