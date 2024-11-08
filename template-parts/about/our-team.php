<?php

	$page_id = get_the_id();

	$team_heading	= esc_attr(get_post_meta($page_id, 'team_heading_meta_field', true));
	$team_content	= get_post_meta($page_id, 'team_content_meta_field', true);

?>

<div class="about-team section-pad-top white-bg">
	<div class="wide-container">


			<div class="team-heading">

				<h2 class="skew-up"><?= $team_heading ?></h2>
				<div class="w33 skew-up small-skew"><?= wpautop( $team_content ); ?></div>

			</div>

			<div class="w100 team-100">
				<?php 
					$args = array(
						'post_type' => 'anno_team',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'team_categories',
								'field' => 'term_id',
								'terms' => '10',
							),
						),
					);
					$query = new WP_Query( $args );
					if	( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							$id 				= get_the_ID();
							$name_title 		= get_the_title($id);
							$featured_image 	= get_the_post_thumbnail_url($id);
							$content		 	= get_the_content(null, false, $id);
							$job_title			= esc_attr(get_post_meta($id, 'team_job_title_meta_field', true));
							$fav_cocktail		= esc_attr(get_post_meta($id, 'team_fav_cocktail_meta_field', true));
							?>

								<div class="w33 team-member">

									<div class="team-card" style="background-image: url('<?= $featured_image ?>');">

										<div class="tc-content"><?= wpautop( $content ); ?></div>

										<div class="fav-cocktail">
											<p>Favourite cocktail:</p>
											<p><?= $fav_cocktail ?></p>
										</div>

										<div class="team-info">
											<h4><?= $name_title ?></h4>
											<p><?= $job_title ?></p>
										</div>

									</div>

								</div>
							
							<?php 	
						} 
					} 
					wp_reset_postdata();
				?>
			</div>

	</div>
</div>

