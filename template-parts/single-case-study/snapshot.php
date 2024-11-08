<?php


	$page_id = get_the_id();

	$title_1	= esc_attr(get_post_meta($id, 'cs_snapshot_heading_1_meta_field', true));
	$content_1	= get_post_meta($page_id, 'cs_snapshot_text_1_meta_field', true);

	$title_2	= esc_attr(get_post_meta($id, 'cs_snapshot_heading_2_meta_field', true));
	$content_2	= get_post_meta($page_id, 'cs_snapshot_text_2_meta_field', true);

	$title_3	= esc_attr(get_post_meta($id, 'cs_snapshot_heading_3_meta_field', true));
	$content_3	= get_post_meta($page_id, 'cs_snapshot_text_3_meta_field', true);



	if(!(empty($title_1) && empty($title_2) && empty($title_3))) { ?>


		<div class="shared-cs-about section-pad-bottom green-bg">
			<div class="wide-container">

				<div class="w100">

					<h4 class="skew-up">IN A SNAPSHOT</h4>

				</div>

				<div class="w100 snapshot-100">
			
					<?php 	if(!(empty($title_1))) { ?>

						<div class="w33">
							<div class="dot"></div>

							<h6><?= $title_1 ?></h6>
							<div><?= wpautop( $content_1 ); ?></div>
						</div>

					<?php } ?>


					<?php 	if(!(empty($title_2))) { ?>

						<div class="w33">
							<div class="dot"></div>

							<h6><?= $title_2 ?></h6>
							<div><?= wpautop( $content_1 ); ?></div>
						</div>

					<?php } ?>


					<?php 	if(!(empty($title_3))) { ?>

						<div class="w33">
							<div class="dot"></div>

							<h6><?= $title_3 ?></h6>
							<div><?= wpautop( $content_1 ); ?></div>
						</div>

					<?php } ?>

				</div>


			</div>
		</div>


	<?php }
