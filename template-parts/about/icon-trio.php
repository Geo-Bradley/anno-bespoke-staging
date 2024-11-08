<?php

	$page_id = get_the_id();

	$heading_1	= esc_attr(get_post_meta($page_id, 'icon_heading_1_meta_field', true));
	$content_1	= get_post_meta($page_id, 'icon_content_1_meta_field', true);

	$heading_2	= esc_attr(get_post_meta($page_id, 'icon_heading_2_meta_field', true));
	$content_2	= get_post_meta($page_id, 'icon_content_2_meta_field', true);

	$heading_3	= esc_attr(get_post_meta($page_id, 'icon_heading_3_meta_field', true));
	$content_3	= get_post_meta($page_id, 'icon_content_3_meta_field', true);

?>

<div class="about-icon-trio section-pad-bottom green-bg">
	<div class="wide-container">

		<div class="w100">
			<div class="icon-single s-icon-1">

				<div class="icon-heading">
					<span class="icon-trio"></span>
					<div class="icon-h4"><h4><?= $heading_1 ?></h4></div>
				</div>
				<div><?= wpautop( $content_1 ); ?></div>

			</div>


			<div class="icon-single s-icon-2">

				<div class="icon-heading">
					<span class="icon-trio"></span>
					<div class="icon-h4"><h4><?= $heading_2 ?></h4></div>
				</div>
				<div><?= wpautop( $content_2 ); ?></div>

			</div>


			<div class="icon-single s-icon-3">

				<div class="icon-heading">
					<span class="icon-trio"></span>
					<div class="icon-h4"><h4><?= $heading_3 ?></h4></div>
				</div>
				<div><?= wpautop( $content_3 ); ?></div>

			</div>
		</div>

	</div>
</div>

