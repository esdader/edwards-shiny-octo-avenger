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
			'left-footer-menu' => __( 'Left Footer Menu' ),
			'right-footer-menu' => __( 'Right Footer Menu' ),
			'es-header-menu' => __( 'Espa&ntilde;ol Header Menu' ),
			'es-left-footer-menu' => __( 'Espa&ntilde;ol Left Footer Menu' ),
			'es-right-footer-menu' => __( 'Espa&ntilde;ol Right Footer Menu' )
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


/**
 * Adding options page
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Edwards Law Firm Contact Information',
		'menu_title'	=> 'Contact Information',
		'menu_slug' 	=> 'contact-information',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
}


// some helper functions
function strip_dashes_from_number ( $phone_number ) {
	$strip = array('(', ')', ' ', '-');
	return str_replace($strip, '', $phone_number);
}

?>
