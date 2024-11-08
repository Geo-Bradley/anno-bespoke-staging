<?php // Template Name: About

	get_header();

?>

<div class="home-container">
	<?php

		get_template_part('template-parts/about/hero');
		get_template_part('template-parts/about/upper');
		get_template_part('template-parts/shared/img-slider');
		get_template_part('template-parts/about/location');
		get_template_part('template-parts/about/craft');
		get_template_part('template-parts/about/find-out');
		get_template_part('template-parts/about/icon-trio');
		get_template_part('template-parts/about/our-team');
		get_template_part('template-parts/shared/img-slider');
		get_template_part('template-parts/shared/testimonial-slider');
		get_template_part('template-parts/shared/case-study-about');

	?>
</div>

<?php

	get_footer();

