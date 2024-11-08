<?php 
$dir = get_stylesheet_directory_uri(); ?>
	

<div class="wide-container">
	<div class="header-content">
		<div class="header-btn-div">
			<a class="btn" href="#">CONTACT US<span></span></a>
		</div>
		<a href="/"><img class="header-logo hd-1" src="https://anno.digitalgeodev3.co.uk/wp-content/uploads/2024/07/anno-bespoke-logo.png"></a>

		<div class="header-menu-div">
			<!-- <img class="header-menu" src="https://anno.digitalgeodev3.co.uk/wp-content/uploads/2024/07/menu-bars.png"> -->

			<span class="burger-menu">
				<span class="line-1"></span>
				<span class="line-2"></span>
			</span>
		</div>
	</div>
</div>

<div class="menu-page">
	<div class="wide-container">

	    <div class="inner-menu">

			<?php
				wp_nav_menu(
					array(
						'theme_location'	=> 'header-menu',
						'container'			=> false,
						'menu_class'		=> 'h-menu',
					)
				);
			?>

			<div class="address-info">
				<a>info@annodistillers.co.uk</a>
				<a>01622 833278</a>

				<div class="address">
					<p>Anno Distillers Limited,</p>
					<p>Unit 4 Crest Industrial Estate,</p>
					<p>Pattenden Lane,</p>
					<p>Marden,</p>
					<p>Kent, TN12 9QJ</p>
				</div>

				<div class="single-fb social-f">
					<div>
						<a href=“<?= $facebook; ?>” target=“_blank” ><i class="fa-brands fa-facebook-f"></i></a>
					</div>
					<div>
						<a href=“<?= $twitter; ?>” target=“_blank” ><i class="fa-brands fa-x-twitter"></i></a>
					</div>
					<div>
						<a href=“<?= $linkedin; ?>” target=“_blank” ><i class="fa-brands fa-linkedin-in"></i></a>
					</div>
					<div>
						<a href=“<?= $intagram; ?>” target=“_blank” ><i class="fa-brands fa-instagram"></i></a>
					</div>
				</div>

			</div>
		</div>
		
	</div>
</div>

<script>

	document.querySelector('.burger-menu').addEventListener('click', function() {
		this.classList.toggle('toggle');
		document.querySelector('.menu-page').classList.toggle('toggle');
		document.querySelector('#header').classList.toggle('toggle');
	});

</script>
