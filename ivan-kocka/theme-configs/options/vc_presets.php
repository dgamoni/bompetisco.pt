<?php
/**
 * Add Templates to Visual Composer Modules
 *
 * This is used to create different ready styles to Visual Composer
 * Modules
 */

/**
 * Clean-up VC Default Elements
**/
function ivan_vc_remove_default_elems() {
	if(!defined('USE_DEPRECATED_MODULES')) {
		vc_remove_element( 'vc_images_carousel' );
		vc_remove_element( 'vc_tour' );
		vc_remove_element( 'vc_posts_slider' );
		vc_remove_element( 'vc_progress_bar' );
		vc_remove_element( 'vc_pie' );
		vc_remove_element( 'vc_custom_heading' );
		vc_remove_element( 'vc_basic_grid' );
		vc_remove_element( 'vc_media_grid' );
		vc_remove_element( 'vc_masonry_grid' );
		vc_remove_element( 'vc_masonry_media_grid' );
		vc_remove_element( 'vc_icon' );
		vc_remove_element( 'vc_btn' );
		vc_remove_element( 'vc_cta' );
		vc_remove_element( 'vc_message' );
	}
}
// Hook for admin editor.
add_action( 'vc_build_admin_page', 'ivan_vc_remove_default_elems', 11 );
// Hook for frontend editor.
add_action( 'vc_load_shortcode', 'ivan_vc_remove_default_elems', 11 );
// Remove Grid Elements
function ivan_vc_remove_grid_elems() {
	if(!defined('USE_DEPRECATED_MODULES') && defined('VC_PAGE_MAIN_SLUG')) {
		remove_submenu_page( VC_PAGE_MAIN_SLUG, 'edit.php?post_type=vc_grid_item' );
	}
}
add_action('admin_init', 'ivan_vc_remove_grid_elems', 500);

/**
 * Pie Charts
**/

add_filter('ivan_pie_chart_active_primary', 'custom_ivan_pie_chart_active_primary', 100);
function custom_ivan_pie_chart_active_primary( $color ) {

	$default = '#0ab6a2'; // same than @primary-bg

	if( ivan_get_option('ivan-custom-accent') != '' && ivan_get_option('ivan-custom-accent') != null )
		$default = ivan_get_option('ivan-custom-accent');

	return $default;
}

/**
 * Title Wrapper
**/
/*
add_filter('ivan_vc_title_wrapper', 'ivan_vc_title_wrapper_templates');
function ivan_vc_title_wrapper_templates( $templates ) {

	// Custom templates
	$templates['Magazine Flat'] = 'magazine-flat';

	return $templates;

}
*/

// Revolution Slider Enqueue Styles
// And font families to buttons

function iv_rev_custom_styles() {
	if( isset($_GET['page']) && isset($_GET['view'])) {
		if( $_GET['page'] == 'revslider' && $_GET['view'] == 'slide' ) {
			wp_register_style( 'ivan-rev-styles', get_template_directory_uri() . '/css/libs/revolution/rev_styles.css', array(), '1.0' );
			wp_enqueue_style( 'ivan-rev-styles' );
		}
	} //page=revslider&view=slide
}
add_action( 'admin_enqueue_scripts', 'iv_rev_custom_styles', 200 );