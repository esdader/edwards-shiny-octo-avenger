<?php

/**
 * Enqueue styles and scripts
 */

function starter_theme_scripts() {

	// set dev or production mode
	$mode = 'dev';
	// $mode = 'production';

	// google fonts
	// wp_enqueue_style( 
	// 	'google_fonts',
	// 	'http://fonts.googleapis.com/css?family=Fredoka+One'
	// );
	
	// main stylesheet
	wp_enqueue_style( 
		'main', 
		get_template_directory_uri() . '/css/main.css',
		array(),
		'1.0.1'
	);
	
	// modernizr
	wp_enqueue_script(
		'modernizr', 
		get_template_directory_uri() . '/js/vendor/modernizr-2.8.2.min.js',
		array(), // dependencies
		'0.0.3',   // version
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

	

	if ($mode == 'dev') {
		// plugins
		wp_enqueue_script(
			'plugins',
			get_template_directory_uri() . '/js/plugins.js',
			array(
					'jquery'
				),
			'0.0.2',
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
			'0.0.2',
			true

		);

	} else {
		// main javascript
		wp_enqueue_script(
			'production',
			get_template_directory_uri() . '/build/js/production.min.js',
			array(
					'jquery'
				),
			'1.0.0',
			true

		);
	}
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
	add_theme_support( 'post-thumbnails');
}

/**
 * Add html5 form for search
 */

add_theme_support( 'html5', array( 'search-form' ) );

/**
 * Add image size
 * 
 * example if needed
 * not active by default because WordPress will save images in the example sizes
 */

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'atty_small', 124, 9999);
	add_image_size( 'atty_med', 252, 9999);
	add_image_size( 'atty_lrg', 455, 9999);
	add_image_size( 'thmb_alt', 300, 9999);
}

/**
 * Add custom post types
 */

// Attorneys
require_once('post-types/abogados.php');
require_once('post-types/areas-de-practica.php');
require_once('post-types/attorneys.php');
require_once('post-types/blog.php');
require_once('post-types/case-results.php');
// require_once('post-types/opiniones.php');
require_once('post-types/practice-areas.php');
require_once('post-types/resultados-de-casos.php');
// require_once('post-types/reviews.php');

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


/**
 * Add support for SVG uploads
 * 
 * from http://www.leighton.com/blog/enable-upload-of-svg-to-wordpress-media-library
 * and http://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/
 */
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


/**
 * Custom editor styles
 */

function edwardslawfirm_add_editor_styles() {
    add_editor_style( 'css/custom-editor-styles.css' );
}
add_action( 'after_setup_theme', 'edwardslawfirm_add_editor_styles' );


/**
 * Add button for custom styles in editor
 */

// Callback function to insert 'styleselect' into the $buttons array
function edwardslawfirm_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'edwardslawfirm_buttons_2');


/**
 * Add custom buttons to style copy in editor
 */
// Callback function to filter the MCE settings
function edwardslawfirm_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Large Text',  
			'inline' => 'span',  
			'classes' => 'large-text',
			'wrapper' => false,
			
		),  
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'edwardslawfirm_before_init_insert_formats' );  


// building in offset function for different
// number of posts on each blog page

function limit_posts( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', '2' );
    }
}
add_action( 'pre_get_posts', 'limit_posts' );

add_action('pre_get_posts', 'myprefix_query_offset', 1 );
function myprefix_query_offset(&$query) {

    //Before anything else, make sure this is the right query...
    if ( ! $query->is_posts_page ) {
        return;
    }

    //First, define your desired offset...
    $offset = 1;
    
    //Next, determine how many posts per page you want (we'll use WordPress's settings)
    // $ppp = get_option('posts_per_page');
    $ppp = 2;

    //Next, detect and handle pagination...
    if ( $query->is_paged ) {


        //Manually determine page query offset (offset + current page (minus one) x posts per page)
        $page_offset = $offset + ( ($query->query_vars['paged']-1) * $ppp );

        //Apply adjust page offset
        $query->set('offset', '3');

    }
    else {

        //This is the first page. Just use the offset...
        $query->set('offset',$offset);

    }
}

add_filter('found_posts', 'myprefix_adjust_offset_pagination', 1, 2 );
function myprefix_adjust_offset_pagination($found_posts, $query) {

    //Define our offset again...
    $offset = 1;

    //Ensure we're modifying the right query object...
    if ( $query->is_posts_page ) {
        //Reduce WordPress's found_posts count by the offset... 
        return $found_posts - $offset;
    }
    return $found_posts;
}


// changin the read more on excerpt
function new_excerpt_more($more) {
	global $post;
	return ' [...] <a class="moretag" href="'. get_permalink($post->ID) . '">Read More</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

?>