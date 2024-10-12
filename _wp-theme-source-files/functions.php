<?php 

/*---------------------------------------------------------------*/
//  include needed files
/*---------------------------------------------------------------*/
	include_once( get_template_directory(). '/inc/custom-widgets.php' );
	include_once( get_template_directory(). '/inc/shortcode.php' );

/*---------------------------------------------------------------*/
// elgas theme setup
/*---------------------------------------------------------------*/
	add_action( 'after_setup_theme' , 'setup_elgas' );
	if ( ! function_exists( 'setup_elgas' ) ) :
		function setup_elgas() {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'title-tag' );
			// add_theme_support( 'html5', array( 'search-form' ) );
			add_image_size( 'img_250x250', 250, 250, true );

			register_nav_menus(
				array(
					'main-menu'             =>  esc_html__( 'Main Menu' , 'elgas' ),
				)
			);
		}
	endif;

/*-----------------------------------------------------------------------------------*/
// enqueue css & js file
/*-----------------------------------------------------------------------------------*/
	add_action( 'wp_enqueue_scripts' , 'include_css_js' );
	function include_css_js() {
		//enqueue css      
		wp_enqueue_style( 'font-awesome' , get_template_directory_uri(). '/assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'owl-carousel' , get_template_directory_uri(). '/assets/css/owl.carousel.min.css' );  
		wp_enqueue_style( 'slicknav' , get_template_directory_uri(). '/assets/css/slicknav.css' );  
		wp_enqueue_style('system-styles', get_template_directory_uri() . '/assets/css/system.css', array(), filemtime(get_template_directory() . '/assets/css/system.css'), false);
		wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);
		wp_enqueue_style('responsive-styles', get_template_directory_uri() . '/assets/css/responsive.css', array(), filemtime(get_template_directory() . '/assets/css/responsive.css'), false);

		// enqueue js
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'custom-js', get_template_directory_uri().'/assets/js/custom.js' , array() , filemtime(get_template_directory() . '/assets/js/custom.js') , true );
		wp_enqueue_script( 'owl-carousel' , get_template_directory_uri(). '/assets/js/owl.carousel.min.js' , array() , '1.1.0' , true );
		wp_enqueue_script( 'slicknav' , get_template_directory_uri(). '/assets/js/jquery.slicknav.js' , array() , '1.1.0' , true );
		
	}


/*--------------------------------------------------------------------*/
// acf option page
/*--------------------------------------------------------------------*/
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page( array(
			'page_title'   => __( 'Theme Options Page' , 'elgas' ),
			'menu_title'   => __( 'Theme Option' , 'elgas' ),
			'menu_slug'    => 'theme_options_page',
			'capability'   => 'manage_options',
			'redirect'     => true
		) );
		acf_add_options_sub_page( array(
			'page_title'   => __( 'Header Options' , 'elgas' ),
			'menu_title'   => __( 'Header' , 'elgas' ),
			'parent_slug'  => 'theme_options_page',
			'capability'   => 'manage_options',	
		) );
		acf_add_options_sub_page( array(
			'page_title'   => __( 'Footer Options' , 'elgas' ),
			'menu_title'   => __( 'Footer' , 'elgas' ),
			'parent_slug'  => 'theme_options_page',
			'capability'   => 'manage_options',
		) );
		acf_add_options_sub_page( array(
			'page_title'   => __( 'Template Parts' , 'elgas' ),
			'menu_title'   => __( 'Template Parts' , 'elgas' ),
			'parent_slug'  => 'theme_options_page',
			'capability'   => 'manage_options',
		) );
	}

	//hide acf menu from wp-admin
	add_filter('acf/settings/show_admin', '__return_false');

/*-------------------------------------------------------------------*/
// Custom Excerpt Length
/*-------------------------------------------------------------------*/

	function excerpt_length( $length ) {
	   return 37;
	}
	add_filter( 'excerpt_length' , 'excerpt_length', 999 );

	if ( ! function_exists( 'excerpt_more' ) && ! is_admin() ) :
	function excerpt_more( $more ) {
		$link = sprintf( '<a href="%1$s">%2$s</a>',
			esc_url( get_permalink( get_the_ID() ) ),
			sprintf( __( '...', 'elgas' ))
			);
		return $link;
	}
	add_filter( 'excerpt_more', 'excerpt_more' );
	endif;

/*-------------------------------------------------------------------*/
//  increase wp-admin default excerpt metabox textarea height
/*-------------------------------------------------------------------*/
	add_action('admin_head', 'admin_excerpt');
	function admin_excerpt() { 
		echo "<style>"; echo "textarea#excerpt {height:150px;}"; echo "</style>"; 
	}
	
function elgas_remove_head_link() {
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'shortlink_wp_head' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
    remove_action( 'wp_head', 'start_post_rel_link', 10 );
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10 );
    remove_action( 'wp_head', 'parent_post_rel_link', 10 );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
}

function elgas_wpse33072_wp_head() {
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
}


	

add_action( 'init', 'elgas_remove_head_link' );
add_action( 'wp_head', 'elgas_wpse33072_wp_head', 1 );