<?php


	$page_id = get_the_id();

	$large_content	= get_post_meta($page_id, 'cs_large_text_meta_field', true);
	$small_content	= get_post_meta($page_id, 'cs_small_text_meta_field', true);




	if(!(empty($large_content) && empty($small_content))) { ?>


		<div class="case-upper section-pad-bottom green-bg">
			<div class="wide-container">

				<hr>
				<div class="w100">

					<div class="w60">
						<div> 
							<h3 class="skew-up"><?= $large_content ?></h3>
						</div>
					</div>
					<div class="w40 valign-bottom">
						<div><?= wpautop( $small_content ); ?></div>
					</div>

				</div>
				<hr>

			</div>
		</div>


	<?php }
