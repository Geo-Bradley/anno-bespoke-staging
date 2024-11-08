<?php

	get_header();

?>

<div class="single-spirit">
	<?php

		get_template_part('template-parts/single-case-study/hero');
		get_template_part('template-parts/single-case-study/upper-sec');
		get_template_part('template-parts/single-case-study/snapshot');
		get_template_part('template-parts/single-case-study/img-left');
		get_template_part('template-parts/single-case-study/img-right');
		get_template_part('template-parts/single-case-study/bottle-notes');
		get_template_part('template-parts/single-case-study/testimonial');
		get_template_part('template-parts/shared/img-slider');
		get_template_part('template-parts/shared/case-study-about');
		get_template_part('template-parts/shared/collab-frame');

	?>
</div>

<?php

	get_footer();

