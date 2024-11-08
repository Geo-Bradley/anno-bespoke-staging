<?php // Template Name: Spirits

	get_header();

?>

<div class="home-container">
	<?php

		get_template_part('template-parts/spirits/hero');
		get_template_part('template-parts/shared/ticker-2');
		get_template_part('template-parts/spirits/green-accordion');
		get_template_part('template-parts/spirits/stages');
		get_template_part('template-parts/spirits/accordion');
		get_template_part('template-parts/shared/img-slider');
		get_template_part('template-parts/shared/testimonial-slider');
		get_template_part('template-parts/shared/case-study-about');

	?>
</div>

<?php

	get_footer();

