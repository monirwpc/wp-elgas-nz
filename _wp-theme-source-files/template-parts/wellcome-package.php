<?php if( get_field('wellcome_image', 'option' ) || get_field('wellcome_image_content', 'option') || get_field('wellcome_right_content', 'option') ) { ?>
<div class="container wellcome-container"><!-- start wellcome-container -->
	<div class="center-content">
		<div class="welcome-pkg">
			<div class="welcome-pkg-col">
				<?php echo get_field('wellcome_image_content', 'option'); ?>
			</div>
			<?php if( get_field('wellcome_right_content', 'option') ) { ?>
			<div class="welcome-pkg-col">
				<?php echo get_field('wellcome_right_content', 'option'); ?>
				<?php 
					$link = get_field('button_url', 'option');
					if( $link ): 
					    $link_url    = $link['url'];
					    $link_title  = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					    if( $link_url && $link_title ) :
					    ?>
					    <a class="green_btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; endif; ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div><!-- //end .wellcome-container -->
<?php } ?>