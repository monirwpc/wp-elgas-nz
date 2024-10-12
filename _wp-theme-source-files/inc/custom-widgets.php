<?php 

	add_action( 'widgets_init' , 'elgas_widget' );
	function elgas_widget() {
		register_sidebar( array(
			'name'           => __( 'Footer Column 1' , 'elgas' ),
			'id'             => 'footer_column_1',
			'description'    => __( 'Footer Column 1 Widgets' , 'elgas' ),
			'before_widget'  => '',
			'after_widget'   => '',
			'before_title'   => '<h3>',
			'after_title'    => '</h3>',
		) );

		register_sidebar( array(
			'name'           => __( 'Footer Column 2' , 'elgas' ),
			'id'             => 'footer_column_2',
			'description'    => __( 'Footer Column 2 Widgets' , 'elgas' ),
			'before_widget'  => '',
			'after_widget'   => '',
			'before_title'   => '<h3>',
			'after_title'    => '</h3>',
		) );

		register_sidebar( array(
			'name'           => __( 'Footer Column 3' , 'elgas' ),
			'id'             => 'footer_column_3',
			'description'    => __( 'Footer Column 3 Widgets' , 'elgas' ),
			'before_widget'  => '',
			'after_widget'   => '',
			'before_title'   => '<h3>',
			'after_title'    => '</h3>',
		) );

		register_sidebar( array(
			'name'           => __( 'Footer Column 4' , 'elgas' ),
			'id'             => 'footer_column_4',
			'description'    => __( 'Footer Column 4 Widgets' , 'elgas' ),
			'before_widget'  => '',
			'after_widget'   => '',
			'before_title'   => '<h3>',
			'after_title'    => '</h3>',
		) );
	}


?>