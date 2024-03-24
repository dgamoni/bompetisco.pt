<?php
/**
 * Dummy Options used when Redux Framework is not activated
 *
 * This way the layout will not be desconfigured if Redux is not activated 
 * by the user. Also allows the use of the theme without any plugin.
 */

// Call global vars from options
global $iv_aries;

if( null == $iv_aries ) {

// Header
	// ...

// Title Wrapper
	$iv_aries['title-text-blog'] = __('Our Blog', 'ivan_domain');
	$iv_aries['title-text-shop'] = __('Our Shop', 'ivan_domain');

// Content
	// ...

// Top Header
	$iv_aries['top-header-enable-switch'] = true;

// Footer
	$iv_aries['footer-column-1'] = '3';
	$iv_aries['footer-column-2'] = '3';
	$iv_aries['footer-column-3'] = '3';
	$iv_aries['footer-column-4'] = '3';

// Bottom Footer
	$iv_aries['bottom-footer-left-width'] = '6';
	$iv_aries['bottom-footer-right-width'] = '6';

// Blog
	$iv_aries['blog-layout'] = 'large';
	$iv_aries['blog-sub-large'] = 'bottom-meta';
	$iv_aries['blog-sidebar-right'] = true;

// Single
	$iv_aries['single-layout'] = 'large';
	$iv_aries['single-sub-large'] = 'simple';
	$iv_aries['single-sidebar-right'] = true;

// Shop
	$iv_aries['woo-shop-layout'] = 'left';
	$iv_aries['woo-per-page'] = '8';
	$iv_aries['woo-shop-columns'] = '3';
	$iv_aries['woo-display-sorting'] = true;

	$iv_aries['woo-product-layout'] = 'full';
	$iv_aries['woo-product-tabs-layout'] = 'default';


} // ends global if