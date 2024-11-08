<?php


	$postID = get_the_id();

	$image_id		= esc_attr(get_post_meta($postID, 'image_meta_field', true));
	$image_data 	= wp_get_attachment($postID);
	$image_url 		= wp_get_attachment_url($postID);


	$_title	= esc_attr(get_post_meta($page_id, 'title_meta_field', true));

	$_content	= get_post_meta($page_id, 'content_meta_field', true);


?>

<div class="home-hero heros green-bg">
	<div class="wide-container">
		<div class="w100">

			<div id="hero-dynamic-content">
				<div class="home-hero-bg hero-top-left"><h1 class="skew-up">Taste is a science, we know science.</h1></div>
				<div class="home-hero-bg hero-center"><span></span></div>
				<div class="home-hero-bg hero-btn-left">
					<div class="scroll-animation">
						<div class="scroll-c"></div>
						<div class="scroll-a"></div>
					</div>
				</div>
				<div class="home-hero-bg hero-btn-right"><h3 class="skew-up">Creating delicious award-winning spirits, looking to push the boundaries and defy convention.</h3></div>
			</div>

			<div class="hero-vid-wrapper">
				<div class="hero-vid">
					<div style="padding:56.25% 0 0 0;position:relative;">
						<iframe src="https://player.vimeo.com/video/1003208721?background=1&autoplay=1&loop=1&muted=1&dnt=1" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Anno Website Video"></iframe>
					</div>
					<script src="https://player.vimeo.com/api/player.js"></script>

				</div>
			</div>

		</div>
	</div>
</div>
