<?php 
	global $wp_query;

	$banner_type_3 = get_field('right_side_content_banner');
	$rgt_bg_color  = get_field('enable_banner_content_bg_color');

	$banner_type_2 = get_field('banner_only_bg_color');
	$only_ban_cont = get_field('only_banner_content');

	$ban_bg        = get_field('banner_background_image');
	$ban_left_cont = get_field('banner_left_content');
	$left_bg_color = get_field('banner_left_bg_color');
	$ban_rgt_cont  = get_field('banne_right_image');
	$ban_rgt_cont  = $ban_rgt_cont['url'];
	$link          = get_field('banner_left_button_url');

	if( $wp_query->is_posts_page ) {
        $banner_type_3 = get_field('right_side_content_banner', get_option( 'page_for_posts', true ) );
		$rgt_bg_color  = get_field('enable_banner_content_bg_color', get_option( 'page_for_posts', true ) );

		$banner_type_2 = get_field('banner_only_bg_color', get_option( 'page_for_posts', true ) );
		$only_ban_cont = get_field('only_banner_content', get_option( 'page_for_posts', true ) );

		$ban_bg        = get_field('banner_background_image', get_option( 'page_for_posts', true ) );
		$ban_left_cont = get_field('banner_left_content', get_option( 'page_for_posts', true ) );
		$left_bg_color = get_field('banner_left_bg_color', get_option( 'page_for_posts', true ) );
		$ban_rgt_cont  = get_field('banne_right_image', get_option( 'page_for_posts', true ) );
		$ban_rgt_cont  = $ban_rgt_cont['url'];
		$link          = get_field('banner_left_button_url', get_option( 'page_for_posts', true ) );
    }
	
	if( $banner_type_2 != 1 && $banner_type_3 != 1 ) {
?>
	<?php if( $ban_bg || $ban_left_cont || $ban_rgt_cont ) { ?>
	<div class="container pg-banner-container" style="<?php if( $ban_bg ) { ?> background-image: url(<?php echo esc_url( $ban_bg ); ?>) <?php } ?>"> <!-- start banner-container -->
		<div class="center-content">
			<div class="pg-banner-area">
				<?php if( $ban_left_cont || $ban_rgt_cont ) { ?>
				<div class="pg-banner-wrap">
					<?php if( $ban_left_cont ) { ?>
					<div class="pg-ban-left">
						<div class="pg-ban-col" <?php if( $left_bg_color == 1 ) { ?> style="padding: 0; background: none;" <?php } ?> >
							<?php echo $ban_left_cont; ?>
							<?php
								if( $link ): 
								    $link_url    = $link['url'];
								    $link_title  = $link['title'];
								    $link_target = $link['target'] ? $link['target'] : '_self';
								    if( $link_url && $link_title ) :
								    ?>
								    <a class="green_btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif; endif; ?>
						</div>		
					</div>
					<?php } if( $ban_rgt_cont ) { ?>
					<div class="pg-ban-rgt">
						<div class="pg-ban-col">
							<img src="<?php echo esc_url( $ban_rgt_cont ); ?>" style="max-height:300px; width:auto;" alt="">
						</div>			
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div><!-- //end .banner-container -->

<?php } } else if( $banner_type_2 == 1 ) { ?>

<?php if( $only_ban_cont ) { ?>
	<div class="container pg-banner-container pg-ban-solid"><!-- start banner-container -->
		<div class="center-content">
			<div class="pg-banner-area">
				<?php echo $only_ban_cont; ?>
			</div>
		</div>
	</div><!-- //end .banner-container -->

<?php } } else if( $banner_type_3 == 1 ) { ?>
	<?php if( $ban_bg || $ban_left_cont ) { ?>
	<div class="container pg-banner-container ban-right-side" style="<?php if( $ban_bg ) { ?> background-image: url(<?php echo esc_url( $ban_bg ); ?>) <?php } ?>"> <!-- start banner-container -->
		<div class="pg-banner-area">
			<?php if( $ban_left_cont ) { ?>
				<div class="pg-ban-rgt-cont">
					<div class="pg-ban-col" <?php if( $rgt_bg_color == 1 ) { ?> style="padding: 20px 25px 40px 25px; background: rgba(158,40,131,0.70);" <?php } ?> >
						<?php echo $ban_left_cont; ?>
						<?php
							if( $link ): 
							    $link_url    = $link['url'];
							    $link_title  = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    if( $link_url && $link_title ) :
							    ?>
							    <a class="green_btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; endif; ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div><!-- //end .banner-container -->
<?php } } ?>