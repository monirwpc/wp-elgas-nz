<?php
	$testimonial      = get_field('display_testimonial_section');
	$testimonial_tem  = get_field('select_testimonial_template');
 	if( $testimonial == 1 && $testimonial_tem != 'template_2' ) { 
?>
	<?php if( have_rows('testimonial_item', 'option') ) : ?>
	<div class="container testimonial-container testimonial-template-1"><!-- start testimonial-container -->
		<div class="center-content">
			<div class="testimonial-area owl-carousel">
				<?php while( have_rows('testimonial_item', 'option') ) : the_row(); ?>
				<div class="testimonial-item">
					<?php echo get_sub_field('testimonial_info'); if( $test_auth = get_sub_field('author_info') ) { ?>
					<div class="testi-author"><?php echo $test_auth; ?></div>
				<?php } ?>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div><!-- //end .testimonial-container -->
	<?php endif; ?>

<?php } else if( $testimonial == 1 && $testimonial_tem == 'template_2' ) { ?>

	<?php if( have_rows('testimonial_item_2', 'option') ) : ?>
	<div class="container testimonial-container testimonial-template-2"><!-- start testimonial-container -->
		<div class="center-content">
			<div class="testimonial-area owl-carousel">
				<?php while( have_rows('testimonial_item_2', 'option') ) : the_row(); ?>
				<div class="testimonial-item">
					<?php echo get_sub_field('testimonial_info'); if( $test_auth = get_sub_field('author_info') ) { ?>
					<div class="testi-author"><?php echo $test_auth; ?></div>
				<?php } ?>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div><!-- //end .testimonial-container -->
	<?php endif; ?>

<?php } ?>