<?php 

	// shortcode - full width section inside center content
	add_shortcode( 'full_width' , 'fullWidthSection' );
	function fullWidthSection( $atts , $content ) { ob_start();
		$data = shortcode_atts(array(
			'bg' => ''
		), $atts); ?>
		<div class="container full-width <?php if( $data['bg'] == 1 ) { echo "bg-light"; } ?>">
			<div class="center-content paddingX-50">
				<?php echo $content; ?>
			</div>
		</div>
	<?php return ob_get_clean(); }

	// shortcode - bg lightest section
	add_shortcode( 'lightest_section' , 'lightest_section' );
	function lightest_section( $atts , $content ) { ob_start();
		$data = shortcode_atts(array( ), $atts); ?>
		<div class="section-lightest">
			<?php echo $content; ?>
		</div>
	<?php return ob_get_clean(); }


	// shortcode - fly buys section
	add_shortcode( 'flybuys_section' , 'flybuys_section' );
	function flybuys_section( $atts , $content ) { ob_start();
		$data      = shortcode_atts(array( ), $atts); 
		$fly_title = get_field('fly_buys_title');
		$link      = get_field('fly_buys_button');		
		$fly_cont  = get_field('fly_buys_content');
		if( $fly_title || $link || $fly_cont ) {
		?>
		<div class="calculate-section">
			<?php if( $fly_title ) { ?>
				<h2 class="flybuys-title"><?php echo $fly_title; ?></h2>
			<?php } ?>
			<?php				
				if( $link ): 
				    $link_url    = $link['url'];
				    $link_title  = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    if( $link_url && $link_title ) :
				    ?>
				    <div><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><button><?php echo esc_html( $link_title ); ?></button></a></div>
				<?php endif; endif; if( $fly_cont ) { ?>			
				<div><?php echo $fly_cont; ?></div>
			<?php } ?>
		</div>
	<?php } return ob_get_clean(); }


	// shortcode - three column items
	add_shortcode( 'three_column' , 'three_column' );
	function three_column( $atts , $content ) {
		$data = shortcode_atts(array(
			'full_width' => '',
			'bg'         => ''
		), $atts);
		if( $data['bg'] == 1 ) { $three_col_bg = "bg-light"; }
		if( $data['full_width'] == 1 ) {
			return '<div class="container full-width '.$three_col_bg.'">
					<div class="center-content paddingX-50">
						<div class="three-col-area">'.do_shortcode($content).'</div>
					</div>
				</div>'; 
		} else {
			return '<div class="three-col-area">'.do_shortcode($content).'</div>';
		}		
	}

	// shortcode - three column item
	add_shortcode( 'three_column_item' , 'three_column_item' );
	function three_column_item( $atts , $content ) { ob_start();
		$data = shortcode_atts(array( ), $atts); ?>
		<div class="three-col-item">
			<?php echo $content; ?>
		</div>
	<?php return ob_get_clean(); }


	// shortcode - gas sylinder sizes
	add_shortcode( 'box_column' , 'box_column_section' );
	function box_column_section( $atts , $content ) {
		$data = shortcode_atts(array(
			'full_width' => '',
			'column'     => '',
			'bg'         => ''
		), $atts);
		$GLOBALS['box_col_size'] = $data["column"];
		if( $data['bg'] == 1 ) { $box_bg = "bg-light"; }
		if( $data['full_width'] == 1 ) {
			return ' <div class="container box-column full-width paddingX-50 '.$box_bg.'">
				<div class="center-content">
					<div class="box-column-area"><div class="box-column-wrap">'.do_shortcode($content).'</div></div>
				</div>
			</div>'; 
		} else {
			return '<div class="box-column-wrap">'.do_shortcode($content).'</div>';
		}
	}

	// shortcode - gas sylinder items
	add_shortcode( 'box_column_item' , 'box_column_items' );
	function box_column_items( $atts , $content ) { ob_start();
		$data = shortcode_atts(array(
			'title'       => '',
			'title_small' => ''
		), $atts); ?>
		<div class="box-column-item" <?php if( $GLOBALS["box_col_size"] >= 2 ) { echo 'style="width: '. 100/$GLOBALS["box_col_size"] .'%"'; } ?>>
			<div class="box-column-col">
				<?php if( $data['title'] ) { ?>
					<h2 class="section-header <?php if( $data['title_small'] == 1 ) { echo "title-small"; } ?>"><?php echo $data['title']; ?></h2>
				<?php } ?>
				<div class="box-column-info">
					<?php echo $content; ?>
				</div>
			</div>
		</div>

	<?php return ob_get_clean(); }


	// shortcode - business column on for business page
	add_shortcode( 'business_column' , 'business_column' );
	function business_column( $atts , $content ) { ob_start();
		$data = shortcode_atts(array( ), $atts); ?>
		<?php if( have_rows('business_column') ) : ?>
		<div class="container business-pg-4-col full-width">
			<div class="center-content">
				<div class="four-col-area">
					<div class="four-col-wrap">
						<?php while( have_rows('business_column') ) : the_row(); 
							$buss_url = get_sub_field('url');
							$buss_img = get_sub_field('image');
							$buss_img = wp_get_attachment_image_src( $buss_img, 'img_250x250' );
						?>
						<div class="four-col-item">
							<?php if( $buss_img[0] ) { ?>
							<div class="four-col-img">
								<img src="<?php echo esc_url( $buss_img[0] ); ?>" alt="" />
								<?php if( $ovrly = get_sub_field('image_caption') ) { ?>
								<div class="four-col-img-ovrly">
									<a href="<?php echo esc_url( $buss_url ); ?>"><?php if( $ovrly ) { echo $ovrly; } else { echo get_sub_field('title'); } ?></a>
								</div>
								<?php } ?>
							</div>
							<?php } ?>
							<div class="four-col-cont">
								<?php if( $buss_title = get_sub_field('title') ) { ?>
									<h4><a href="<?php echo esc_url( $buss_url ); ?>"><strong><?php echo $buss_title; ?></strong></a></h4>
								<?php } if( $buss_cont = get_sub_field('content') ) { ?>
									<p><?php echo $buss_cont; ?></p>
								<?php } ?>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>

	<?php endif; return ob_get_clean(); }

	// remove empty p tag from shortcode
	add_filter( 'the_content', 'tgm_io_shortcode_empty_paragraph_fix' );
	function tgm_io_shortcode_empty_paragraph_fix( $content ) {
	    $array = array(
	        '<p>['    => '[',
	        ']</p>'   => ']',
	        ']<br />' => ']'
	    );
	    return strtr( $content, $array );
	}


?>