<?php get_header(); ?>

	<?php get_template_part("template-parts/page-banner"); ?>

	<?php if( get_field('display_page_services_button') == 1 ) { get_template_part("template-parts/page-services-button"); } ?>

	<?php get_template_part("template-parts/get-qoute"); ?>

	<div class="container article-page-container <?php if( get_field('full_width_page_content') == 1 ) { echo "full-width-page"; } ?>"><!-- start article-page-container -->
		<div class="center-content">
			<div class="article-page entry-content">
				
				<div class="print-email-setting"><!-- start print-email-setting -->
					<span class="setting-icon">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<i class="fa fa-caret-down" aria-hidden="true"></i>
					</span>
					<div class="setting-down">
						<?php echo do_shortcode('[printfriendly]'); ?>
					</div> 
				</div><!-- //end .print-email-setting -->
				
				<?php if( get_field('page_caption_text') ) { ?>
					<p class="img-caption"><?php echo get_field('page_caption_text'); ?></p>
				<?php } the_content(); ?>

				<div class="social-sharing">
					<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
				</div>
				
			</div>
		</div>
	</div><!-- //end .article-page-container -->		

<?php get_footer(); ?>