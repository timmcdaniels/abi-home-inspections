<?php
	$fb_url = get_field( 'social_media', 'option' )['facebook_url'];
	$insta_url = get_field( 'social_media', 'option' )['instagram_url'];
	$linkedin_url = get_field( 'social_media', 'option' )['linkedin_url'];
?>
	<!-- Footer -->
	<section class="footer is-max-desktop">
		<div class="container">
			<div class="columns is-multiline">
				<!-- Logo & Tagline -->
				<div class="column is-3">
					<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/abi-logo-white.png" alt="ABI Home Inspections Logo"
							class="logo mb-2"></a>
					<div class="has-text-white has-text-weight-bold mt-2"><?php echo get_bloginfo('name'); ?></div>
					<div class="has-text-white is-size-7 mt-2">
						<?php echo get_bloginfo( 'description' ); ?>
					</div>
				</div>
				<!-- Browse -->
				<div class="column is-2">
					<div class="has-text-white has-text-weight-bold mb-2">Browse</div>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container' => '',
								'menu_class' => 'footer-links',
								'walker' => new ABI_Footer_Menu_Walker(),
							)
						);
					?>
				</div>
				<!-- Services -->
				<div class="column is-2">
					<div class="has-text-white has-text-weight-bold mb-2">Services</div>
					<ul class="footer-links">
						<?php foreach ( get_field( 'services', 'option' ) as $s ): ?>
						<li><a class="has-text-white" href="<?php echo $s['service']['url']; ?>"><?php echo $s['service']['label']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<!-- Contact -->
				<div class="column is-3"> <!-- TODO: Fix Column Width -->
					<div class="has-text-white has-text-weight-bold mb-2">Contact</div>
					<ul class="footer-links">
						<li>
							<span class="icon is-small has-text-white"><i class="fas fa-map-marker-alt"></i></span>
							<span class="ml-1 has-text-white"><?php the_field( 'address', 'option' ); ?></span>
						</li>
						<li>
							<span class="icon is-small has-text-white"><i class="fas fa-phone"></i></span>
							<a class="has-text-white ml-1" href="tel:<?php the_field( 'phone_number', 'option' ); ?>"><?php echo abi_format_phone( get_field( 'phone_number', 'option' ) ); ?></a>
						</li>
						<li>
							<span class="icon is-small has-text-white"><i class="fas fa-envelope"></i></span>
							<a class="has-text-white ml-1"
								href="mailto:<?php the_field( 'email', 'option' ); ?>"><?php the_field( 'email', 'option' ); ?></a>
						</li>
						<li class="mt-2">
							<?php if ( ! empty( $fb_url ) ): ?>
							<a href="<?php echo $fb_url; ?>" target="_blank" rel="noopener noreferrer" class="footer-social mr-2" aria-label="Visit our Facebook page"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( $insta_url ) ): ?>
                            <a href="<?php echo $insta_url; ?>" target="_blank" rel="noopener noreferrer" class="footer-social mr-2" aria-label="Visit our Instagram page"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            <?php endif; ?>
							<?php if ( ! empty( $linkedin_url ) ): ?>
							<a href="<?php echo $linkedin_url; ?>" target="_blank" rel="noopener noreferrer" class="footer-social mr-2" aria-label="Visit our LinkedIn page"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
							<?php endif; ?>
						</li>
					</ul>
				</div>
				<!-- ASHI Footer -->
				<div class="column is-2 has-text-white">
					<div class="has-text-centered ml-6 mr-6 p-2 ashi-footer">
						<a href="https://www.homeinspector.org/certification/ashi-certified-inspector/" target="_blank"
							rel="noopener noreferrer">
							<img src="https://www.homeinspector.org/wp-content/uploads/2024/04/logo.svg"
								alt="ASHI Logo">
						</a>
						<p>CERTIFIED INSPECTOR</p>
					</div>
				</div>
			</div>
		</div>
	</section>	
	<footer class="footer has-background-black py-2" style="border-top: 1px solid #222;">
		<div class="container">
			<div class="columns is-mobile is-vcentered">
				<div class="column has-text-left has-text-white is-size-7">
					ABI Incorporated © <?php echo date( 'Y' ); ?>
				</div>
				<div class="column has-text-right">
					<a href="<?php the_field( 'privacy_policy_url', 'option' ); ?>" class="has-text-white is-size-7">Privacy Policy</a>
				</div>
			</div>
		</div>  
	</footer>   
	<?php wp_footer(); ?>
</body>		 
</html>	
