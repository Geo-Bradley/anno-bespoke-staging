<?php


	$page_id = get_the_id();

	$subheading	= esc_attr(get_post_meta($page_id, 'home_services_sub_meta_field', true));

	$services_btn	= esc_attr(get_post_meta($page_id, 'home_services_btn_title_meta_field', true));
	$services_btn_url	= esc_attr(get_post_meta($page_id, 'home_services_btn_url_meta_field', true));




?>

<div class="collab-frame-sec section-pad-bottom white-bg">
	<div class="wide-container">

		<div class="collab-frame">
			<h2>INTERESTED IN COLLABORATING?</h2>
			<a class="btn" href="<?= $services_btn_url; ?>">CONTACT US<i class="fa-solid fa-chevron-right"></i><span></span></a>
		</div>

	</div>
</div>

