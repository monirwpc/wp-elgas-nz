<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<div id="wrapper"><!-- start #wrapper -->
		<?php if( ! is_404() ) { ?>
			
			<?php if( ! is_page_template( 'template-connected.php' ) ) {  ?>
			<header class="container header-container"><!-- start header-container -->
				<div id="menu-holder"></div> 
				<div class="center-content">
					<div class="header-area">
						<?php
							$logo = get_field('logo' , 'option' );
							$theme_logo[0] = $logo['url'];
							if( ! $theme_logo[0] ) {
								$theme_logo[0] = get_template_directory_uri(). '/assets/images/logo.png';
							}
						?>
						<div class="logo">
							<a href="<?php echo esc_url( home_url() ); ?>">
								<img src="<?php echo esc_url( $theme_logo[0] ); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
							</a>
						</div>
						<div class="head-right">
							<?php echo get_search_form(); ?>
							<?php if( have_rows('button', 'option') ) : ?>
							<div class="btn">
								<?php while( have_rows('button', 'option') ) : the_row(); ?>
								<?php 
									$link = get_sub_field('add_button');
									if( $link ): 
									    $link_url    = $link['url'];
									    $link_title  = $link['title'];
									    $link_target = $link['target'] ? $link['target'] : '_self';
									    if( $link_url && $link_title ) :
									    ?>
									    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; endif; ?>
								<?php endwhile; ?>
							</div>
							<?php endif; ?>
						</div>
					</div>

					<nav class="main-menu">
						<?php 
	                        wp_nav_menu(array(
	                            'theme_location'  => 'main-menu',
	                            'container'       => false,
	                            'menu_class'      => false,
	                            'menu_id'         => 'menu',
	                            'depth'           => '3'
	                        ));
	                    ?>
	                    <div class="clear"></div>                    
	                </nav>

				</div>
			</header><!-- //end .header-container -->
			<?php } else { ?>
			<header class="container get-connected-header">
				<div class="center-content">
					<?php
						$logo = get_field('logo2');
						if( ! $logo ) {
							$logo = get_field('logo2' , 'option' );
						}
						$theme_logo[0] = $logo['url'];
						if( ! $theme_logo[0] ) {
							$theme_logo[0] = get_template_directory_uri(). '/assets/images/logo2.png';
						}
					?>
					<div class="conn-logo">
						<a href="<?php echo esc_url( home_url() ); ?>">
							<img src="<?php echo esc_url( $theme_logo[0] ); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
						</a>
					</div>
				</div>
			</header>
			<?php } ?>
		<?php } ?>