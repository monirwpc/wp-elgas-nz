<?php get_header(); ?>

	<?php 
		// get_template_part("template-parts/page-banner"); 
		$feature_img_id = get_post_thumbnail_id(get_option('page_for_posts'));
		$feature_img   = get_template_directory_uri().'/assets/images/new_blog_banner.jpg';
	?>
	<div class="pg-banner-container blog-banner"> <!-- start banner-container -->
		<?php if($feature_img_id) { echo wp_get_attachment_image($feature_img_id, 'full'); } else { echo "<img src='".$feature_img."' alt=''>"; } ?>
	</div>

	<div class="container article-page-container full-width-page"><!-- start article-page-container -->
		<div class="center-content">
			<div class="article-page article-post entry-content">

				<?php if( get_field('page_caption_text') ) { ?>
					<p class="img-caption"><?php echo get_field('page_caption_text'); ?></p>
				<?php } 
				if( get_field('intro') == "1") the_excerpt();
				the_content(); 
				?>

				<div class="social-sharing">
					<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
				</div>
			</div>
		</div>
	</div><!-- //end .article-page-container -->		

<?php get_footer(); ?>