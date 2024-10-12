		<?php if( ! is_404() ) { ?>

			<?php if( get_field('display_wellcome_package_section') == 1 ) { get_template_part("template-parts/wellcome-package"); } ?>
			
			<?php if( get_field('display_testimonial_section') == 1 && ! is_search() ) { get_template_part("template-parts/testimonial"); } ?>

			<?php if( ! is_page_template( 'template-connected.php' ) ) {  ?>
				<footer class="container footer-container"><!-- start footer-container -->
					<div class="center-content">
						<div class="footer-area">
							<div class="footer-col">
								<?php dynamic_sidebar('footer_column_1'); ?>
							</div>
							<div class="footer-col">
								<?php dynamic_sidebar('footer_column_2'); ?>
							</div>
							<div class="footer-col">
								<?php dynamic_sidebar('footer_column_3'); ?>
							</div>
							<div class="footer-col">
								<?php dynamic_sidebar('footer_column_4'); ?>
							</div>
						</div>
						<div class="copyright-area">
							<?php if( get_field('copyright_left_content', 'option') ) { ?>
							<div class="copy-lft">
								<?php echo get_field('copyright_left_content', 'option'); ?>
							</div>
							<?php } ?>
							<?php if( get_field('facebook_url', 'option') || get_field('apple_store_url', 'option') || get_field('google_playstore_url', 'option') ) { ?>
							<div class="copy-rgt">
								<p>
									<?php if( $facebook = get_field('facebook_url', 'option') ) { ?>
									<a href="<?php echo esc_url( $facebook ); ?>" target="_blank">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="">
									</a> 
									<?php } if( $apple = get_field('apple_store_url', 'option') ) { ?>
									<a href="<?php echo esc_url( $apple ); ?>" target="_blank">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/app-apple.png" alt="">
									</a>
									<?php } if( $playstore = get_field('google_playstore_url', 'option') ) { ?>
									<a href="<?php echo esc_url( $playstore ); ?>" target="_blank">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/app-android.jpg" alt="">
									</a>
								<?php } ?>
								</p>
							</div>
							<?php } ?>				
						</div>
					</div>
				</footer><!-- //end .footer-container -->
			<?php } else { 
				
					$foo_2_lft_cont = get_field('footer_2_left_content');
					if( ! $foo_2_lft_cont ) {
						$foo_2_lft_cont = get_field('footer_2_left_content', 'option');
					}
					$foo_2_rgt_cont = get_field('footer_2_right_content');
					if( ! $foo_2_rgt_cont ) {
						$foo_2_rgt_cont = get_field('footer_2_right_content', 'option');
					}

					if( $foo_2_lft_cont || $foo_2_rgt_cont ) { ?>
					<footer class="container get-connected-footer">
						<div class="center-content">
							<div class="conn-footer-area">
								<?php if( $foo_2_lft_cont ) { ?>
								<div class="conn-footer-lft">
									<?php echo $foo_2_lft_cont; ?>
								</div>
								<?php } if( $foo_2_rgt_cont ) { ?>
								<div class="conn-footer-rgt">
									<?php echo $foo_2_rgt_cont; ?>
								</div>
								<?php } ?>
							</div>
						</div>
					</footer>
				<?php } ?>
			<?php } ?>

			<div class="back-to-top"><!-- start back-to-top -->
				<a href="#wrapper">
					<i class="fa fa-arrow-up" aria-hidden="true"></i>
				</a>
			</div><!-- //end .back-to-top -->

			<?php if( $slidebox_content = get_field('slidebox_content') ) { ?>
			<div class="popup-slidebox"><!-- start popup-slidebox -->
				<a class="close">&nbsp;</a>
				<div class="popup-info">
					<?php echo $slidebox_content; ?>
				</div>
			</div><!-- //end .popup-slidebox -->
			<?php } ?>

		<?php } ?>
	</div><!-- //end #wrapper -->
	<?php wp_footer(); ?>
</body>
</html>