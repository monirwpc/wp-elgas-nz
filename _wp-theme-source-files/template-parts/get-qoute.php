<?php if( get_field('get_qoute_content') || get_field('get_qoute_button') ) { ?>
	<div class="container get-qoute-now"><!-- start get-qoute-now -->
		<div class="center-content">
			<div class="get-qoute-now-area">
				<div class="get-qoute-left">						
					<?php echo get_field('get_qoute_content'); ?>
				</div>
				<?php
					$link = get_field('get_qoute_button');
					if( $link ): 
					    $link_url    = $link['url'];
					    $link_title  = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					    if( $link_url && $link_title ) :
					    ?>
					    <div class="get-qoute-btn">
					    	<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					    </div>
					<?php endif; endif; ?>
			</div>
		</div>
	</div><!-- //end .get-qoute-now -->
<?php } ?>