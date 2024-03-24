/*!
 * WooCommerce Custom Scripts
 *
 * Functions used to add custom functionality to WooCommerce integration
 *
 */

 /*!
  * Variations Plugin
  */
 ;(function ( $, window, document, undefined ) {

 	jQuery.fn.wc_variation_form = function () {

 		jQuery.fn.wc_variation_form.find_matching_variations = function( product_variations, settings ) {
 			var matching = [];

 			for ( var i = 0; i < product_variations.length; i++ ) {
 				var variation = product_variations[i];
 				var variation_id = variation.variation_id;

 				if ( jQuery.fn.wc_variation_form.variations_match( variation.attributes, settings ) ) {
 					matching.push( variation );
 				}
 			}

 			return matching;
 		};

 		jQuery.fn.wc_variation_form.variations_match = function( attrs1, attrs2 ) {
 			var match = true;

 			for ( var attr_name in attrs1 ) {
 				if ( attrs1.hasOwnProperty( attr_name ) ) {
 					var val1 = attrs1[ attr_name ];
 					var val2 = attrs2[ attr_name ];

 					if ( val1 !== undefined && val2 !== undefined && val1.length !== 0 && val2.length !== 0 && val1 !== val2 ) {
 						match = false;
 					}
 				}
 			}

 			return match;
 		};

 		// Unbind any existing events
 		this.unbind( 'check_variations update_variation_values found_variation' );
 		this.find( '.reset_variations' ).unbind( 'click' );
 		this.find( '.variations select' ).unbind( 'change focusin' );

 		// Bind events
 		$form = this

 			// On clicking the reset variation button
 			.on( 'click', '.reset_variations', function( event ) {

 				jQuery( this ).closest( '.variations_form' ).find( '.variations select' ).val( '' ).change();

 				var $sku = jQuery( this ).closest( '.product' ).find( '.sku' ),
 					$weight = jQuery( this ).closest( '.product' ).find( '.product_weight' ),
 					$dimensions = jQuery( this ).closest( '.product' ).find( '.product_dimensions' );

 				if ( $sku.attr( 'data-o_sku' ) )
 					$sku.text( $sku.attr( 'data-o_sku' ) );

 				if ( $weight.attr( 'data-o_weight' ) )
 					$weight.text( $weight.attr( 'data-o_weight' ) );

 				if ( $dimensions.attr( 'data-o_dimensions' ) )
 					$dimensions.text( $dimensions.attr( 'data-o_dimensions' ) );

 				return false;
 			} )

 			// Upon changing an option
 			.on( 'change', '.variations select', function( event ) {

 				$variation_form = jQuery( this ).closest( '.variations_form' );

 				if ( $variation_form.find( 'input.variation_id' ).length > 0 )
 				   $variation_form.find( 'input.variation_id' ).val( '' ).change();
 				else
 					$variation_form.find( 'input[name=variation_id]' ).val( '' ).change();

 				$variation_form
 					.trigger( 'woocommerce_variation_select_change' )
 					.trigger( 'check_variations', [ '', false ] );

 				jQuery( this ).blur();

 				if( jQuery().uniform && jQuery.isFunction( jQuery.uniform.update ) ) {
 					jQuery.uniform.update();
 				}

 				// Custom event for when variation selection has been changed
 				$variation_form.trigger( 'woocommerce_variation_has_changed' );

 			} )

 			// Upon gaining focus
 			.on( 'focusin touchstart', '.variations select', function( event ) {

 				$variation_form = jQuery( this ).closest( '.variations_form' );

 				// Get attribute name from data-attribute_name, or from input name if it doesn't exist
 				if ( typeof( $( this ).data( 'attribute_name' ) ) != 'undefined' )
 					attribute_name = $( this ).data( 'attribute_name' );
 				else
 					attribute_name = $( this ).attr( 'name' );

 				$variation_form
 					.trigger( 'woocommerce_variation_select_focusin' )
 					.trigger( 'check_variations', [ attribute_name, true ] );

 			} )

 			// Check variations
 			.on( 'check_variations', function( event, exclude, focus ) {
 				var all_set = true,
 					any_set = false,
 					showing_variation = false,
 					current_settings = {},
 					$variation_form = jQuery( this ),
 					$reset_variations = $variation_form.find( '.reset_variations' );

 				$variation_form.find( '.variations select' ).each( function() {

 					// Get attribute name from data-attribute_name, or from input name if it doesn't exist
 					if ( typeof( $( this ).data( 'attribute_name' ) ) != 'undefined' )
 						attribute_name = $( this ).data( 'attribute_name' );
 					else
 						attribute_name = $( this ).attr( 'name' );

 					if ( jQuery( this ).val().length === 0 ) {
 						all_set = false;
 					} else {
 						any_set = true;
 					}

 					if ( exclude && attribute_name === exclude ) {

 						all_set = false;
 						current_settings[ attribute_name ] = '';

 					} else {

 						// Encode entities
 						value = jQuery( this ).val();

 						// Add to settings array
 						current_settings[ attribute_name ] = value;
 					}

 				});

 				var product_id = parseInt( $variation_form.data( 'product_id' ) ),
 					all_variations = $variation_form.data( 'product_variations' );

 				// Fallback to window property if not set - backwards compat
 				if ( ! all_variations )
 					all_variations = window.product_variations.product_id;
 				if ( ! all_variations )
 					all_variations = window.product_variations;
 				if ( ! all_variations )
 					all_variations = window['product_variations_' + product_id ];

 				var matching_variations = jQuery.fn.wc_variation_form.find_matching_variations( all_variations, current_settings );

 				if ( all_set ) {

 					var variation = matching_variations.shift();

 					if ( variation ) {

 						// Found - set ID

 						// Get variation input by class, or by input name if class doesn't exist
 						if ( $variation_form.find( 'input.variation_id' ).length > 0 )
 							$variation_input = $variation_form.find( 'input.variation_id' );
 						else
 							$variation_input = $variation_form.find( 'input[name=variation_id]' );
 						 
 						$variation_input
 							.val( variation.variation_id )
 							.change();

 						$variation_form.trigger( 'found_variation', [ variation ] );

 					} else {

 						// Nothing found - reset fields
 						$variation_form.find( '.variations select' ).val( '' );

 						if ( ! focus )
 							$variation_form.trigger( 'reset_image' );

 						alert( wc_add_to_cart_variation_params.i18n_no_matching_variations_text );

 					}

 				} else {

 					$variation_form.trigger( 'update_variation_values', [ matching_variations ] );

 					if ( ! focus )
 						$variation_form.trigger( 'reset_image' );

 					if ( ! exclude ) {
 						$variation_form.find( '.single_variation_wrap' ).slideUp( 200 );
 					}

 				}

 				if ( any_set ) {

 					if ( $reset_variations.css( 'visibility' ) === 'hidden' )
 						$reset_variations.css( 'visibility', 'visible' ).hide().fadeIn();

 				} else {

 					$reset_variations.css( 'visibility', 'hidden' );

 				}

 			} )

 			// Reset product image
 			.on( 'reset_image', function( event ) {

 				var $product = jQuery(this).closest( '.product' ),
 					$product_img = $product.find( '.single-product-main-images img:eq(0)' ),
 					$product_link = $product.find( '.single-product-main-images a.zoom:eq(0)' ),
 					o_src = $product_img.attr( 'data-o_src' ),
 					o_title = $product_img.attr( 'data-o_title' ),
 					o_alt = $product_img.attr( 'data-o_alt' ),
 					o_href = $product_link.attr( 'data-o_href' ),
 					$product_slider = $product.find(".single-product-main-images").data('owlCarousel');

 				if ( o_src !== undefined ) {
 					$product_img
 						.attr( 'src', o_src );
 				}

 				if ( o_href !== undefined ) {
 					$product_link
 						.attr( 'href', o_href );
 				}

 				if ( o_title !== undefined ) {
 					$product_img
 						.attr( 'title', o_title );
 					$product_link
 						.attr( 'title', o_title );
 				}

 				if ( o_alt !== undefined ) {
 					$product_img
 						.attr( 'alt', o_alt );
 				}

 				// Restart Carousel Slide
 				if( $product_slider !== undefined )
 					$product_slider.goTo( 0 );

 			} )

 			// Disable option fields that are unavaiable for current set of attributes
 			.on( 'update_variation_values', function( event, variations ) {

 				$variation_form = jQuery( this ).closest( '.variations_form' );

 				// Loop through selects and disable/enable options based on selections
 				$variation_form.find( '.variations select' ).each( function( index, el ) {

 					current_attr_select = jQuery( el );

 					// Reset options
 					if ( ! current_attr_select.data( 'attribute_options' ) )
 						current_attr_select.data( 'attribute_options', current_attr_select.find( 'option:gt(0)' ).get() );

 					current_attr_select.find( 'option:gt(0)' ).remove();
 					current_attr_select.append( current_attr_select.data( 'attribute_options' ) );
 					current_attr_select.find( 'option:gt(0)' ).removeClass( 'attached' );

 					// Get name
 					current_attr_select.find( 'option:gt(0)' ).removeClass( 'enabled' );
 					current_attr_select.find( 'option:gt(0)' ).removeAttr( 'disabled' );
 					 
 					// Get name from data-attribute_name, or from input name if it doesn't exist
 					if ( typeof( current_attr_select.data( 'attribute_name' ) ) != 'undefined' )
 						current_attr_name = current_attr_select.data( 'attribute_name' );
 					else
 						current_attr_name = current_attr_select.attr( 'name' );

 					// Loop through variations
 					for ( var num in variations ) {

 						if ( typeof( variations[ num ] ) != 'undefined' ) {

 							var attributes = variations[ num ].attributes;

 							for ( var attr_name in attributes ) {
 								if ( attributes.hasOwnProperty( attr_name ) ) {
 									var attr_val = attributes[ attr_name ];

 									if ( attr_name == current_attr_name ) {

 										if ( variations[ num ].variation_is_active )
 											variation_active = 'enabled';
 										else
 											variation_active = '';

 										if ( attr_val ) {

 											// Decode entities
 											attr_val = jQuery( '<div/>' ).html( attr_val ).text();

 											// Add slashes
 											attr_val = attr_val.replace( /'/g, "\\'" );
 											attr_val = attr_val.replace( /"/g, "\\\"" );

 											// Compare the meerkat
 											current_attr_select.find( 'option[value="' + attr_val + '"]' ).addClass( 'attached ' + variation_active );

 										} else {

 											current_attr_select.find( 'option:gt(0)' ).addClass( 'attached ' + variation_active );

 										}
 									}
 								}
 							}
 						}
 					}

 					// Detach inactive
 					current_attr_select.find( 'option:gt(0):not(.attached)' ).remove();

 					// Grey out disabled
 					current_attr_select.find( 'option:gt(0):not(.enabled)' ).attr( 'disabled', 'disabled' );

 				});

 				// Custom event for when variations have been updated
 				$variation_form.trigger( 'woocommerce_update_variation_values' );

 			} )

 			// Show single variation details (price, stock, image)
 			.on( 'found_variation', function( event, variation ) {
 				var $variation_form = jQuery( this ),
 					$product = jQuery( this ).closest( '.product' ),
 					$product_img = $product.find( '.single-product-main-images img:eq(0)' ),
 					$product_link = $product.find( '.single-product-main-images a.zoom:eq(0)' ),
 					o_src = $product_img.attr( 'data-o_src' ),
 					o_title = $product_img.attr( 'data-o_title' ),
 					o_alt = $product_img.attr( 'data-o_alt' ),
 					o_href = $product_link.attr( 'data-o_href' ),
 					variation_image = variation.image_src,
 					variation_link  = variation.image_link,
 					variation_title = variation.image_title,
 					variation_alt = variation.image_alt,
 					$product_slider = $product.find(".single-product-main-images").data('owlCarousel');

 				$variation_form.find( '.variations_button' ).show();
 				$variation_form.find( '.single_variation' ).html( variation.price_html + variation.availability_html );

 				if ( o_src === undefined ) {
 					o_src = ( ! $product_img.attr( 'src' ) ) ? '' : $product_img.attr( 'src' );
 					$product_img.attr( 'data-o_src', o_src );
 				}

 				if ( o_href === undefined ) {
 					o_href = ( ! $product_link.attr( 'href' ) ) ? '' : $product_link.attr( 'href' );
 					$product_link.attr( 'data-o_href', o_href );
 				}

 				if ( o_title === undefined ) {
 					o_title = ( ! $product_img.attr( 'title' ) ) ? '' : $product_img.attr( 'title' );
 					$product_img.attr( 'data-o_title', o_title );
 				}

 				if ( o_alt === undefined ) {
 					o_alt = ( ! $product_img.attr( 'alt' ) ) ? '' : $product_img.attr( 'alt' );
 					$product_img.attr( 'data-o_alt', o_alt );
 				}

 				if ( variation_image && variation_image.length > 1 ) {
 					$product_img
 						.attr( 'src', variation_image )
 						.attr( 'alt', variation_alt )
 						.attr( 'title', variation_title );
 					$product_link
 						.attr( 'href', variation_link )
 						.attr( 'title', variation_title );
 				} else {
 					$product_img
 						.attr( 'src', o_src )
 						.attr( 'alt', o_alt )
 						.attr( 'title', o_title );
 					$product_link
 						.attr( 'href', o_href )
 						.attr( 'o_title', o_title );
 				}

 				// Restart Carousel Slide
 				if( $product_slider !== undefined )
 					$product_slider.goTo( 0 );

 				var $single_variation_wrap = $variation_form.find( '.single_variation_wrap' ),
 					$sku = $product.find( '.product_meta' ).find( '.sku' ),
 					$weight = $product.find( '.product_weight' ),
 					$dimensions = $product.find( '.product_dimensions' );

 				if ( ! $sku.attr( 'data-o_sku' ) )
 					$sku.attr( 'data-o_sku', $sku.text() );

 				if ( ! $weight.attr( 'data-o_weight' ) )
 					$weight.attr( 'data-o_weight', $weight.text() );

 				if ( ! $dimensions.attr( 'data-o_dimensions' ) )
 					$dimensions.attr( 'data-o_dimensions', $dimensions.text() );

 				if ( variation.sku ) {
 					$sku.text( variation.sku );
 				} else {
 					$sku.text( $sku.attr( 'data-o_sku' ) );
 				}

 				if ( variation.weight ) {
 					$weight.text( variation.weight );
 				} else {
 					$weight.text( $weight.attr( 'data-o_weight' ) );
 				}

 				if ( variation.dimensions ) {
 					$dimensions.text( variation.dimensions );
 				} else {
 					$dimensions.text( $dimensions.attr( 'data-o_dimensions' ) );
 				}

 				$single_variation_wrap.find( '.quantity' ).show();

 				if ( ! variation.is_purchasable || ! variation.is_in_stock || ! variation.variation_is_visible ) {
 					$variation_form.find( '.variations_button' ).hide();
 				}

 				if ( ! variation.variation_is_visible ) {
 					$variation_form.find( '.single_variation' ).html( '<p>' + wc_add_to_cart_variation_params.i18n_unavailable_text + '</p>' );
 				}

 				if ( variation.min_qty )
 					$single_variation_wrap.find( '.quantity input.qty' ).attr( 'min', variation.min_qty ).val( variation.min_qty );
 				else
 					$single_variation_wrap.find( '.quantity input.qty' ).removeAttr( 'min' );

 				if ( variation.max_qty )
 					$single_variation_wrap.find( '.quantity input.qty' ).attr( 'max', variation.max_qty );
 				else
 					$single_variation_wrap.find( '.quantity input.qty' ).removeAttr( 'max' );

 				if ( variation.is_sold_individually === 'yes' ) {
 					$single_variation_wrap.find( '.quantity input.qty' ).val( '1' );
 					$single_variation_wrap.find( '.quantity' ).hide();
 				}

 				$single_variation_wrap.slideDown( 200 ).trigger( 'show_variation', [ variation ] );

 			});

 		$form.trigger( 'wc_variation_form' );

 		return $form;
 	};

 	jQuery( function() {

 		// wc_add_to_cart_variation_params is required to continue, ensure the object exists
 		if ( typeof wc_add_to_cart_variation_params === 'undefined' ) {
 			return false;
 		}

 		jQuery( '.variations_form' ).wc_variation_form();
 		jQuery( '.variations_form .variations select' ).change();
 	});

 })( jQuery, window, document );

 function ivan_single_product_images() {
	"use strict";

	// Start Magnific Lightbox
	if( wc_add_to_cart_variation_params.disable_lightbox !== true ) {
		jQuery('.single-product-main-images a').magnificPopup({
			type: 'image',
			image: {
				verticalFit: false
			},
			gallery:{
				enabled:true
			}
		});
	} else {
		jQuery('.single-product-main-images a').click( function(e) {
			e.preventDefault();

			return false;
		});
	}

	var mainThumb = jQuery(".single-product-main-images");
	var smallThumb = jQuery(".single-product-thumb-images");

	mainThumb.owlCarousel({
		theme: "style-outline-circle dark arrows-at-hover",
		singleItem: true,
		autoHeight: true,
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		pagination: false,
		afterAction : function (el){
            var current = this.currentItem;
            
            jQuery(".single-product-thumb-images")
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced");
            if( jQuery(".single-product-thumb-images").data("owlCarousel") !== undefined){
            center(current);
            }
        }
	});

	smallThumb.owlCarousel({
		theme: "style-opaque-box arrows-at-hover",
		items : 4,
		itemsDesktopSmall: [979, 4],
		itemsTablet: [768, 4],
		itemsMobile: [479, 4],
		autoHeight: true,
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		pagination: false,
		afterInit : function(el){
			el.find(".owl-item").eq(0).addClass("synced");
		}
	});

	smallThumb.on("click", ".owl-item", function(e){
	    e.preventDefault();
	    var number = jQuery(this).data("owlItem");
	    mainThumb.trigger("owl.goTo",number);
	  });
}

 function center(number){
 	"use strict";

	var smallThumb = jQuery(".single-product-thumb-images");

    var smallThumbvisible = smallThumb.data("owlCarousel").owl.visibleItems;
    var num = number;
    var found = false;
    for(var i in smallThumbvisible){
      if(num === smallThumbvisible[i]){
        found = true;
      }
    }
 
    if(found===false){
      if(num>smallThumbvisible[smallThumbvisible.length-1]){
        smallThumb.trigger("owl.goTo", num - smallThumbvisible.length+2);
      }else{
        if(num - 1 === -1){
          num = 0;
        }
        smallThumb.trigger("owl.goTo", num);
      }
    } else if(num === smallThumbvisible[smallThumbvisible.length-1]){
      smallThumb.trigger("owl.goTo", smallThumbvisible[1]);
    } else if(num === smallThumbvisible[0]){
      smallThumb.trigger("owl.goTo", num-1);
    }
    
  }

  jQuery(document).ready( function() {
  	"use strict";
  	// Carousel to Single Product Images
  	ivan_single_product_images();

  });