/*!
 * WooCommerce Custom Scripts
 *
 * Functions used to add custom functionality to WooCommerce integration
 *
 */

function ivan_woo_back_image() {
	"use strict";

	jQuery('li.product').hover( function() {

		if( jQuery(this).find('.back-image').length > 0 ) {
			jQuery(this).find('.frontal-image').css('opacity', '0');
			jQuery(this).find('.back-image').css('opacity', '1');
		}

	}, function() {

		if( jQuery(this).find('.back-image').length > 0 ) {
			jQuery(this).find('.back-image').css('opacity', '0');
			jQuery(this).find('.frontal-image').css('opacity', '1');
		}

	});
}

function ivan_quick_view() {
	"use strict";

	jQuery('li.product').hover( function() {

		jQuery(this).find('.quick-view').animate({
			bottom: '0px'
		}, 300);

	}, function() {

		jQuery(this).find('.quick-view').animate({
			bottom: '-30px'
		}, 300);

	});

	/*
	 * Tap event to be used in mobile devices
	 */
	jQuery('li.product').on("touchend", function (e) {
		var link = jQuery(this); //preselect the link
		if (link.hasClass('hover')) {
			return true;
		} else {
			jQuery('li.product').removeClass("hover");
			link.addClass("hover");
			e.preventDefault();
			link.trigger('mouseenter');
			return false; //extra, and to make sure the function has consistent return points
	     }
	});

	// AJAXfy the loading process of quick view the item in a popup
	jQuery('.quick-view').on('click', function(e) {

		e.preventDefault();

		var _this = jQuery(this);

		// Add loading status in product
		jQuery(this).after('<div class="quick-view-loader"><i class="fa fa-spinner fa-spin"></i></div>');

		// Get product ID to query
		var _prodID = jQuery(_this).attr('data-product-id');

		// Prepare data to send by AJAX
		var _data = { action: 'ivan_woo_quick_view', product: _prodID };

		// Use post method to get info by AJAX (code located at /woocommerce/configuration.php)
		jQuery.post( ivan_theme_scripts.ajaxurl, _data, function( response ) {

			// Open response in the popup

			jQuery.magnificPopup.open({
				mainClass: 'ivan-mfp-custom-zoom-in',
				items: {
					src: '<div class="ivan-product-popup">' + response + '</div>',
					type: 'inline'
				}
			});

			// Remove loading status...
			jQuery('.quick-view-loader').remove();

			setTimeout( function() {

				// Start the product slider properly
				jQuery('.ivan-product-popup .single-product-main-images').owlCarousel({
					theme: "style-outline-circle dark",
					singleItem: true,
					autoHeight: true,
					navigation: true,
					navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
					pagination: false
				});

				// Call custom Woo Variant functions
				jQuery('.ivan-product-popup form').wc_variation_form();
				jQuery('.ivan-product-popup select').change();

			}, 650 );

		});

	});
}

function ivan_wishlist() {
	"use strict";

	jQuery('li.product').hover( function() {

		jQuery(this).find('.yith-wcwl-add-to-wishlist').animate({
			opacity: 1
		}, 300);

	}, function() {

		jQuery(this).find('.yith-wcwl-add-to-wishlist').animate({
			opacity: 0
		}, 300);

	});

}

// Related and Upsells Carousels
function ivan_single_product_related_upsells() {
	"use strict";

	// Related, Up Sells Carousel
	jQuery('.related-carousel ul, .upsells-carousel ul, .cross-sells-carousel ul').owlCarousel({
			theme: "style-opaque-box arrows-at-hover",
			items : 4,
			itemsDesktopSmall: [979, 3],
			itemsTablet: [768, 3],
			itemsMobile: [479, 1],
			autoHeight: false,
			navigation: true,
			navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			pagination: false
		});
}

/*
// AJAX Add Variation Product to Cart
function ivan_wc_ajax_quick_view_add_cart() {

	var ajax_url = ivan_theme_scripts.ajaxurl;
	
	jQuery(document).on('submit', '.ivan-product-popup form', function(e){

		var _formData = jQuery(this).serialize();

		// Adds action name to it
		_formData += '&action=ivan_wc_add_to_cart';

		console.log(_formData);

		jQuery.post( ajax_url, _formData, function(response) {

			console.log('Got this from the server: ' + response);

		}, "html");

		// If AJAX works, return false
		e.preventDefault();
		return false;
	});
	
}
*/

jQuery(document).ready( function() {
	"use strict";
	
	// Back Image effect in Woo Products
	ivan_woo_back_image();

	// AJAX Quick View Add to Cart
	//ivan_wc_ajax_quick_view_add_cart();

	// Quick View button in Woo Products
	ivan_quick_view();

	// Add to Wishlist in Woo Products
	ivan_wishlist();

	// Init Related and Upsells carousels
	ivan_single_product_related_upsells();

});