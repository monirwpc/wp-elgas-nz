<?php get_header(); ?>
	<div class="container error-container"><!-- start error-container -->
		<div class="center-content">
			<div class="error-content">
				<div class="error-box">
					<div class="error-code">
						<span class="first"><?php echo _e('4', 'elgas'); ?></span>
						<span class=""><?php echo _e('0', 'elgas'); ?></span>
						<span class="last"><?php echo _e('4', 'elgas'); ?></span>
					</div>
					<div class="error-message"><h2><?php echo _e('Article not found', 'elgas'); ?></h2></div>
					<div id="errorboxbody">
						<p><?php echo _e('Please try one of the following pages:', 'elgas'); ?></p>
					</div>
					<a class="button-home" href="<?php echo esc_url( home_url() ); ?>" title="Go to the Home Page"><?php echo _e('Home Page', 'elgas'); ?></a>
				</div>					
			</div>
		</div>
	</div><!-- //end .error-container -->
<?php get_footer(); ?>