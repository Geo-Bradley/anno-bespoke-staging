<?php


	$page_id = get_the_id();


	$large_content	= get_post_meta($page_id, 'about_large_content_meta_field', true);
	$small_content_1	= get_post_meta($page_id, 'about_small_content_1_meta_field', true);
	$small_content_2	= get_post_meta($page_id, 'about_small_content_2_meta_field', true);
	$btn	= esc_attr(get_post_meta($page_id, 'about_upper_btn_meta_field', true));
	$btn_url	= esc_attr(get_post_meta($page_id, 'about_upper_btn_url_meta_field', true));


?>

<div class="about-upper white-bg">
	<div class="wide-container">

		<hr>
		<div class="w100">

			<div class="w50">
				<div> 
					<h3 class="skew-up"><?= $large_content ?></h3>
				</div>
			</div>
			<div class="w10"></div>
			<div class="w40 valign-bottom">
				<div class="up-1 sr-1"><?= wpautop( $small_content_1 ); ?></div>
				<div class="up-2 sr-1"><?= wpautop( $small_content_2 ); ?></div>
				<a class="btn sr-1" href="<?= $btn_url ?>"><?= $btn ?><i class="fa-solid fa-chevron-right"></i><span></span></a>
			</div>

		</div>
		<hr>

	</div>
</div>

