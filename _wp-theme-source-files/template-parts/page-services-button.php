<?php
	$pg_ser_btn      = get_field('display_page_services_button');
	$pg_ser_btn_type = get_field('select_button_template');
 	if( $pg_ser_btn == 1 && $pg_ser_btn_type != 'template_2' ) { 
?>

	<?php if( have_rows('services_button_item', 'option') ) : ?>
	<div class="container pg-main-btn-container"><!-- start pg-main-btn-container -->
		<div class="center-content">
			<div class="pg-main-btn">
				<ul>
					<?php while( have_rows('services_button_item', 'option') ) : the_row(); 
						$icon         = get_sub_field('icon');
						$title_text   = get_sub_field('title');
						$desktop_text = get_sub_field('desktop_text');
						$mobile_text  = get_sub_field('mobile_text');
						$mobile_hide  = get_sub_field('hide_on_mobile_devices');
						$title_text   = ( $title_text ) ? $title_text : $desktop_text;
					?>
					<li <?php if( $mobile_hide == 1 ) { echo 'class="mobile_hide"'; } ?>>
						<a href="<?php echo esc_url( get_sub_field('service_url') ); ?>" title="<?php echo esc_attr( $title_text ); ?>">
							<?php if( $icon['url'] ) { ?>
								<div class="pg-btn-icon">
									<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">
								</div>
							<?php } if( $desktop_text ) { ?>
								<h5><?php echo $desktop_text; ?></h5>
							<?php } if( $mobile_text ) { ?>
								<h4><?php echo $mobile_text; ?></h4>
							<?php } ?>
						</a>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div><!-- //end .pg-main-btn-container -->
	<?php endif; ?>

<?php } else if( $pg_ser_btn == 1 && $pg_ser_btn_type == 'template_2' ) { ?>

	<?php if( have_rows('services_button_item_2', 'option') ) : ?>
	<div class="container pg-main-btn-container pg-main-btn-2"><!-- start pg-main-btn-container -->
		<div class="center-content">
			<div class="pg-main-btn">
				<ul>
					<?php while( have_rows('services_button_item_2', 'option') ) : the_row(); 
						$icon         = get_sub_field('icon');
						$title_text   = get_sub_field('title');
						$desktop_text = get_sub_field('desktop_text');
						$mobile_text  = get_sub_field('mobile_text');
						$mobile_hide  = get_sub_field('hide_on_mobile_devices');
						$title_text   = ( $title_text ) ? $title_text : $desktop_text;
					?>
					<li <?php if( $mobile_hide == 1 ) { echo 'class="mobile_hide"'; } ?>>
						<a href="<?php echo esc_url( get_sub_field('service_url') ); ?>" title="<?php echo esc_attr( $title_text ); ?>">
							<?php if( $icon['url'] ) { ?>
								<div class="pg-btn-icon">
									<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">
								</div>
							<?php } if( $desktop_text ) { ?>
								<h5><?php echo $desktop_text; ?></h5>
							<?php } if( $mobile_text ) { ?>
								<h4><?php echo $mobile_text; ?></h4>
							<?php } ?>
						</a>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div><!-- //end .pg-main-btn-container -->
	<?php endif; ?>
<?php } ?>