<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package	TGM-Plugin-Activation
 * @subpackage Example
 * @version	2.5
 * @author	 Thomas Griffin <thomasgriffinmedia.com>
 * @author	 Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license	http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link	   https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ivan_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function ivan_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		/*
		// This is an example of how to include a plugin pre-packaged with a theme.
		array(
			'name'			   => 'TGM Example Plugin', // The plugin name.
			'slug'			   => 'tgm-example-plugin', // The plugin slug (typically the folder name).
			'source'			 => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'		   => true, // If false, the plugin is only 'recommended' instead of required.
			'version'			=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'	   => '', // If set, overrides default API URL and points to an external URL.
		),

		// This is an example of how to include a plugin from a private repo in your theme.
		array(
			'name'			   => 'TGM New Media Plugin', // The plugin name.
			'slug'			   => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
			'source'			 => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
			'required'		   => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url'	   => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'	  => 'BuddyPress',
			'slug'	  => 'buddypress',
			'required'  => false,
		),
		*/

		// Includes Redux Framework to the theme
		array(
			'name'			   => 'Redux Framework', // The plugin name.
			'slug'			   => 'redux-framework', // The plugin slug (typically the folder name).
			'source'			 => get_template_directory_uri() . '/theme-configs/plugins/redux-framework.zip', // The plugin source.
			'required'		   => true, // If false, the plugin is only 'recommended' instead of required.
			'version'			=> '3.6.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'	   => '', // If set, overrides default API URL and points to an external URL.
		),


		array(
			'name'			   => 'WPBakery Visual Composer', // The plugin name.
			'slug'			   => 'js_composer', // The plugin slug (typically the folder name).
			'source'			 => 'https://s3.amazonaws.com/c9rsplugins/1_1_5/js_composer.zip', // The plugin source.
			'required'		   => true, // If false, the plugin is only 'recommended' instead of required.
            'version'          => '4.11.2.1',
		),

		array(
			'name'			   => 'Elite Addons for Visual Composer', // The plugin name.
			'slug'			   => 'elite-addons-vc', // The plugin slug (typically the folder name).
			'source'			 => 'https://s3.amazonaws.com/c9rsplugins/1_1_5/elite-addons-vc.zip', // The plugin source.
			'required'		   => true, // If false, the plugin is only 'recommended' instead of required.
            'version'          => '1.1.9',
		),

		array(
			'name'			   => 'Mega Menu Addon', // The plugin name.
			'slug'			   => 'mega_main_menu', // The plugin slug (typically the folder name).
			'source'			 => 'https://s3.amazonaws.com/c9rsplugins/1_1_5/mega_main_menu.zip', // The plugin source.
			'required'		   => true, // If false, the plugin is only 'recommended' instead of required.
            'version'          => '1.0',
		),

		array(
			'name'			   => 'Revolution Slider', // The plugin name.
			'slug'			   => 'revslider', // The plugin slug (typically the folder name).
			'source'			 => 'https://s3.amazonaws.com/c9rsplugins/1_1_5/revslider.zip', // The plugin source.
			'required'		   => true, // If false, the plugin is only 'recommended' instead of required.
            'version'          => '5.2.5',
		),

		array(
			'name'	  => 'Ninja Forms',
			'slug'	  => 'ninja-forms',
			'required'  => false,
		),

		array(
			'name'	  => 'Custom Sidebars',
			'slug'	  => 'custom-sidebars',
			'required'  => false,
		),

		array(
			'name'	  => 'Display Tweets',
			'slug'	  => 'display-tweets-php',
			'required'  => false,
		),

		array(
			'name'			   => 'Device Mockups Mod', // The plugin name.
			'slug'			   => 'device-mockups-mod', // The plugin slug (typically the folder name).
			'source'			 => 'https://s3.amazonaws.com/c9rsplugins/1_1_5/device-mockups-mod.zip', // The plugin source.
			'required'		   => false, // If false, the plugin is only 'recommended' instead of required.
            'version'          => '1.0.0',
		),

		array(
			'name'	  => 'Login with AJAX',
			'slug'	  => 'login-with-ajax',
			'required'  => false,
		),

		array(
			'name'	  => 'WooCommerce',
			'slug'	  => 'woocommerce',
			'required'  => false,
		),

		array(
			'name'			   => 'WooCommerce Wishlist Mod', // The plugin name.
			'slug'			   => 'yith-woocommerce-wishlist-mod', // The plugin slug (typically the folder name).
			'source'			 => 'https://s3.amazonaws.com/c9rsplugins/1_1_5/yith-woocommerce-wishlist-mod.zip', // The plugin source.
			'required'		   => false, // If false, the plugin is only 'recommended' instead of required.
            'version'          => '2.0.11',
		),

	);	

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}
