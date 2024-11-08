<?php

	$page_id = get_the_id();

	$location_heading	= esc_attr(get_post_meta($page_id, 'location_heading_meta_field', true));
	$location_content	= get_post_meta($page_id, 'location_content_meta_field', true);

?>

<div class="about-location section-pad green-bg">
	<div class="wide-container">

		<div class="w100">

			<div class="w35 valign-bottom">
				<h4><?= $location_heading ?></h4>
			</div>
			<div class="w65">
				<h3><?= $location_content ?></h3>
			</div>

		</div>

	</div>
</div>

