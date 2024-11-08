<?php 

	get_header();  
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );

?>
	<div class="main">

		<div class="title-bar" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" style="background-image: url('<?php echo $thumb['0'];?>');">
			<div class="container">
				<div class="width100">
					<h1 class="page-title"><?php the_title(); ?></h1>	
				</div>
			</div>
		</div>

		<div class="container">
			<div class="width100">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
						<span class="date">
							<time datetime="<?php the_time( 'Y-m-d' ); ?> <?php the_time( 'H:i' ); ?>">
								<?php the_date(); ?> <?php the_time(); ?>
							</time>
						</span>
						<?php the_content(); ?>
					</article>
				<?php endwhile; ?>
				<?php else: ?>
					<article>
						<h2><?php 'Sorry, nothing to display.' ?></h2>
					</article>
				<?php endif; ?>
			</div>
		</div>
		
	</div>

<?php 

	get_footer(); 
	