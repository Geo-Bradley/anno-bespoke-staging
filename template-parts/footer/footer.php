<?php


	$page_id = get_the_id();

	$twitter 	= esc_attr(get_option(‘twitter_url’));
	


?>



<div class="footer-content green-bg">
	<div class="wide-container">

		<div class="footer-block">

		    <div class="footer-top">

				<div class="f-logo">
					<img class="footer-logo" src="https://anno.digitalgeodev3.co.uk/wp-content/uploads/2024/07/anno-bespoke-logo.png">
				</div>

				<div class="f-menu">
					<p class="grey-title">MENU</p>
					<?php
						wp_nav_menu(
							array(
								'theme_location'	=> 'footer-menu',
								'container'			=> false,
								'menu_class'		=> '',
							)
						);
					?>
				</div>
				
			    <div class="information">
					<p class="grey-title">INFORMATION</p>
					<div class="info-left">
						<a href="/">SHIPPING POLICY</a>
						<a href="/">PRIVACY POLICY</a>
					</div>
					<div class="info-right">
						<a href="/">TERMS OF SERVICE</a>
						<a href="/">REFUND POLICY</a>
					</div>
				</div>

				<div class="address-info">
					<p class="grey-title">CONTACT</p>
					<a>info@annodistillers.co.uk</a>
					<a>01622 833278</a>

					<div class="address">
						<p>Anno Distillers Limited,</p>
						<p>Unit 4 Crest Industrial Estate,</p>
						<p>Pattenden Lane,</p>
						<p>Marden,</p>
						<p>Kent, TN12 9QJ</p>
					</div>
				</div>


			</div>
			<div class="footer-bottom">

				<div class="single-fb">
					<p class="grey-title g1">OUR WEBSITE</p>
					<a href="/">annodistillers.co.uk</a>
				</div>
				<div class="single-fb talign-center">
					<p class="grey-title">DESIGNED AND BUILT BY</p>
					<a href="/">GEO BRAND</a>
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
	<img class="footer-logo" src="https://anno.digitalgeodev3.co.uk/wp-content/uploads/2024/08/footer-logo.png">
</div>

