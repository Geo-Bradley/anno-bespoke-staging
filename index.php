<?php get_header(); ?>

	<div class="main" aria-label="Content">
		<div class="container">
			<div class="width100">

				<h1><?php esc_html_e( 'Latest Posts', 'startups_theme' ); ?></h1>

				<?php get_template_part( 'loop' ); ?>

				<?php get_template_part( 'pagination' ); ?>

			</div>
		</div>
	</div>

<?php get_footer();
