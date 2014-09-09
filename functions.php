<?php

/**
 * Enqueue styles and scripts
 */

function starter_theme_scripts() {

	// google fonts
	// wp_enqueue_style( 
	// 	'google_fonts',
	// 	'http://fonts.googleapis.com/css?family=Fredoka+One'
	// );
	
	// main stylesheet
	wp_enqueue_style( 
		'main', 
		get_template_directory_uri() . '/css/main.css'
	);
	
	// modernizr
	wp_enqueue_script(
		'modernizr', 
		get_template_directory_uri() . '/js/vendor/modernizr-2.8.2.min.js',
		array(), // dependencies
		false,   // version
		false    // in footer
	);

	// special stuff for jquery
	wp_deregister_script('jquery');
	wp_register_script(
		'jquery',
		get_template_directory_uri() . '/js/vendor/jquery-1.11.1.min.js',
        array(),
		false,
		true
	);
	wp_enqueue_script( 'jquery' );

	// plugins
	wp_enqueue_script(
		'plugins',
		get_template_directory_uri() . '/js/plugins.js',
		array(
				'jquery'
			),
		false,
		true

	);

	// main javascript
	wp_enqueue_script(
		'main',
		get_template_directory_uri() . '/js/main.js',
		array(
				'jquery',
				'plugins'
			),
		false,
		true

	);
}

if ( !is_admin() ) add_action( 'wp_enqueue_scripts', 'starter_theme_scripts' );

/**
 * Add support for menus
 */

function register_starter_theme_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'extra-menu' => __( 'Extra Menu' )
		)
	);
}
add_action( 'init', 'register_starter_theme_menus' );


/**
 * Add featured images support
 */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

/**
 * Add image size
 * 
 * example if needed
 * not active by default because WordPress will save images in the example sizes
 */

// if ( function_exists( 'add_image_size' ) ) { 
// 	add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
// 	add_image_size( 'homepage-thumb', 220, 180, true ); //(cropped)
// }

/**
 * Add custom post types
 */

// Attorneys
require_once('post-types/abogados.php');
require_once('post-types/areas-de-practica.php');
require_once('post-types/attorneys.php');
require_once('post-types/blog.php');
require_once('post-types/case-results.php');
require_once('post-types/opiniones.php');
require_once('post-types/practice-areas.php');
require_once('post-types/resultados-de-casos.php');
require_once('post-types/reviews.php');

?>
