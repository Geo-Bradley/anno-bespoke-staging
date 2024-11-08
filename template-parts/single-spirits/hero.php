<?php


	$id = get_the_id();
	$parent_id = 11;

	$featured_img_url 	= get_the_post_thumbnail_url($id,'full');
	$title 				= get_the_title($id);
	$subheading 			= get_the_content(null, false, $id);


?>

<div class="s-spirit-hero section-pad white-bg">
	<div class="wide-container">
			
		<div class="main-header w100">

			<div class="w50">
				<h1 class="skew-up"><?= $title ?></h1>
			</div>
			<div class="w50">
				<h3 class="skew-up"><?= $subheading ?></h3>
			</div>

		</div>

		<div class="w100 s-spirit-hero-img scale-hero-img">
			<img src="<?= $featured_img_url; ?>">
		</div>

	</div>
</div>

