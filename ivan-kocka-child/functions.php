<?php
/**
 * Theme Child Functions/Extensions
 *
 */

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'ivan_scripts_child' ) ) :
function ivan_scripts_child() {

	/**
	* Enqueue theme scripts
	*/
		// Register theme scripts and enqueue it.
		wp_register_script( 'ivan-theme-scripts-child', get_stylesheet_directory_uri() . '/js/theme-scripts-child.js', array( 'jquery' ), '1', true );
		wp_enqueue_script( 'ivan-theme-scripts-child');

}
add_action( 'wp_enqueue_scripts', 'ivan_scripts_child', 101 );
endif; // function exists






/**
 * Register theme support and image sizes
 */
if ( ! function_exists( 'ivan_setup_child' ) ) :
function ivan_setup_child() {

	// Add theme support to something else...
	//add_theme_support( 'feature-name' );

	// Add image size to the theme...
	//add_image_size('ivan_blog_quad', 480, 480, true);
}
add_action( 'after_setup_theme', 'ivan_setup_child' );
endif; // ivan_setup

// @dgamoni : add custom size for recipe carousel 
function add_custom_sizes_recipe() {
    add_image_size( 'recetias-thumb', 480, 270, true );
}
add_action('after_setup_theme','add_custom_sizes_recipe');


// load core functions
require_once get_stylesheet_directory() . '/core/load.php';