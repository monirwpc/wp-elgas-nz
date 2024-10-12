<?php get_header(); ?>

	<?php 
		if( have_rows('ban_services') || get_field('banner_content') ) : 
			$ban_bg = get_field('background_image');
			$ban_bg = ( $ban_bg ) ? $ban_bg : get_template_directory_uri().'/assets/images/homepage-hero-image.jpg';
	?>
	<div class="container banner-container" style="background-image: url(<?php echo $ban_bg; ?>)"><!-- start banner-container -->
		<div class="center-content">
			<div class="banner-area">
				<div class="ban-head">
					<?php if( get_field('banner_content') ) { echo get_field('banner_content'); }?>
				</div>				
				<div class="ban-services-wrap">
					<?php while( have_rows('ban_services') ) : the_row(); ?>
					<div class="ban-services-column">
						<?php if( have_rows('ban_services_column') ) : while( have_rows('ban_services_column') ) : the_row(); ?>
						<div class="ban-services-col">
							<?php echo get_sub_field('ban_service_info');
								$link = get_sub_field('ban_button_url');
								if( $link ): 
								    $link_url    = $link['url'];
								    $link_title  = $link['title'];
								    $link_target = $link['target'] ? $link['target'] : '_self';
								    if( $link_url && $link_title ) :
								    ?>
								    <a class="ban-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif; endif; ?>
						</div>
						<?php endwhile; endif; ?>
					</div>
					<?php endwhile; ?>				
				</div>
			</div>
		</div>
	</div><!-- //end .banner-container -->
	<?php endif; ?>

	<?php if( have_rows('service_item') ) : ?>
	<div class="container service-container"><!-- start service-container -->
		<div class="center-content">
			<div class="service-area">
				<?php while( have_rows('service_item') ) : the_row();  ?>
				<div class="ser-column">
					<div class="ser-col">
						<?php 
							$ser_img = get_sub_field('icon');
							if( $ser_img['url'] ) {
						?>
						<div class="ser-img">
							<img src="<?php echo esc_url( $ser_img['url'] ); ?>" alt="<?php echo esc_attr( $ser_img['alt'] ); ?>" />
						</div>
						<?php } echo get_sub_field('content'); ?>						
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div><!-- //end .service-container -->
	<?php endif; ?>

	<?php get_template_part("template-parts/wellcome-package"); ?>

<?php get_footer(); ?>