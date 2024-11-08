<?php 

	get_header();  
	
?>

	<div class="main">
		
		<?php if ( has_post_thumbnail() ) {

			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>

				<div class="page-header" style="background-image: url('<?php echo $thumb['0'];?>');">
					<div class="container">
						<h1 class="page-heading"><span><?php the_title(); ?></span></h1>
					</div>
				</div>

		<? } else { ?>

			<div class="page-header">
				<div class="container">
					<h1 class="page-heading">
						<span><?php the_title(); ?></span>
					</h1>
				</div>
			</div>
			
		<?php } ?>
		
		<div class="container">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
					<?php the_content(); ?>
				</article>

			<?php endwhile; ?>
			<?php else: ?>

				<article>
					<h2><?php _e( 'Sorry, nothing to display.', 'startups_theme' ); ?></h2>
				</article>

			<?php endif; ?>

		</div>

	</div>

<?php 

	get_footer(); 
	