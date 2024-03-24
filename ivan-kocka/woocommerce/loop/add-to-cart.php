<?php
/**
 * Loop Add to Cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Changes the Icon Text if necessary...
	$_btnText = esc_html( $product->add_to_cart_text() );
	$_btnClass = 'woo-quick-btn-default';

	if( ivan_get_option('woo-enable-cart-btn-reduced') ) :
		$_btnText = '<i class="fa fa-shopping-cart"></i>';
		$_btnClass = 'woo-quick-btn-reduced';
	endif;
    
echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<a href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s '. $_btnClass . '">%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		$_btnText
	),
$product );
