<?php


	$page_id = get_the_id();


	$large_content	= get_post_meta($page_id, 'home_large_content_meta_field', true);

	$small_content	= get_post_meta($page_id, 'home_small_content_meta_field', true);
	$small_c_btn	= esc_attr(get_post_meta($page_id, 'home_small_c_btn_meta_field', true));
	$small_c_btn_url	= esc_attr(get_post_meta($page_id, 'home_small_c_btn_url_meta_field', true));


?>

<div class="home-upper section-pad green-bg">
	<div class="wide-container">

		<hr>
		<div class="w100">

			<div class="w60">
				<div> 
					<h3 class="skew-up"><?= $large_content ?></h3>
				</div>
			</div>
			<div class="w10"></div>
			<div class="w30 valign-bottom reveal-bottom">
				<div><?= wpautop( $small_content ); ?></div>
				<a class="btn btn-b" href="<?= $small_c_btn_url ?>"><?= $small_c_btn ?><i class="fa-solid fa-chevron-right"></i><span></span></a>
			</div>

		</div>
		<hr>

	</div>
</div>

