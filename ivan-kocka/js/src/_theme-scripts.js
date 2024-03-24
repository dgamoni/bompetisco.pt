/* Media Query Vars */

var _window_width = jQuery(window).width();

var iv_device_xs = false;
if( _window_width < 768 )
	iv_device_xs = true;

//console.log( iv_device_xs );

var iv_device_sm = false;
if( _window_width >= 768 && _window_width < 992 )
	iv_device_sm = true;

//console.log( iv_device_sm );

var iv_device_md = false;
if( _window_width >= 992 && _window_width < 1200 )
	iv_device_md = true;

//console.log( iv_device_md );

var iv_device_lg = false;
if( _window_width >= 1200)
	iv_device_lg = true;

/*
 *	Recalculate Sticky Wrapper Height
 */
function ivan_recalc_sticky_height() {
	"use strict";

	var _h = jQuery('.iv-layout.header').outerHeight( false );
	jQuery('.header-sticky-wrapper').css('height', _h + 'px');
}

/*!
 * Flexible Header Height
 *
 * Function used to turn header height half the actual size depending of Window Scroll
 *
 */
function ivan_fixed_header() {
	"use strict";

	if( jQuery('.header-fixed').length > 0 ) {

		imagesLoaded( jQuery('.header-fixed').find('.logo'), function() {

			var $headerFixed = jQuery('.header-fixed');

			var _logoWidth = $headerFixed.find('.logo img:visible').outerWidth();
			var _logoHeight = $headerFixed.find('.logo img:visible').outerHeight();
			//console.log( _logoHeight );
			if(_logoHeight === 0) {
				setTimeout( function() { ivan_fixed_header(); }, 500 );
				return;
			}

			var _headerHeight = $headerFixed.outerHeight();
			//console.log( _headerHeight );

			var _class = '';
			if( $headerFixed.hasClass('light') )
				_class = 'light';

			if( $headerFixed.hasClass('dark') )
				_class = 'dark';

			var _foldHeight = -_logoHeight - 150;

			var _classFold = '';
			if( $headerFixed.hasClass('display-after-fold') ) {
				_classFold = 'display-after-fold';

				_foldHeight = -jQuery.waypoints('viewportHeight') + (_headerHeight - 1);
			}

			$headerFixed.waypoint('sticky', {
				wrapper: '<div class="sticky-wrapper header-sticky-wrapper" />',
				handler: function( direction ) {
					if( direction == 'up' ) {

						if( jQuery('.smooth-opening-holder').length > 0 ) {
							jQuery('.smooth-opening-holder').removeClass('stuck-holder');
						}

						$headerFixed.find('.logo img').css({ maxHeight: 'inherit'});
						$headerFixed.find('.logo .hd-res').css({ width: _logoWidth + 'px'});
						$headerFixed.addClass( _class );
						$headerFixed.addClass( _classFold );

						if( $headerFixed.hasClass('hide-container') === true ) {
							$headerFixed.find('.to-hide').css('display', 'block');
							//ivan_recalc_sticky_height();
						}

						$headerFixed.parent('.sticky-wrapper').outerHeight(_headerHeight);
						//console.log($headerFixed.parent('.sticky-wrapper').outerHeight());
					}
					else {

						if( jQuery('.smooth-opening-holder').length > 0 ) {
							jQuery('.smooth-opening-holder').removeClass('z-enabled');
							jQuery('.smooth-opening-holder').addClass('stuck-holder');
						}

						$headerFixed.removeClass( _class );
						$headerFixed.removeClass( _classFold );
						$headerFixed.css('opacity', '0');
                        
						if( $headerFixed.hasClass('hide-container') === true ) {
							$headerFixed.find('.to-hide').css('display', 'none');
						}

						if(_logoHeight > 0) {
							$headerFixed.find('.logo img').css({ maxHeight: (_logoHeight * 0.8) + 'px'});
							$headerFixed.find('.logo .hd-res').css({ width: (_logoWidth * 0.8) + 'px'});
						}

						$headerFixed.animate({ opacity: '1'}, 300);

					}

					ivan_fix_header_area_height();
				},
				offset: _foldHeight
			});
	        
            ivan_theme_scripts.hidescroll = Boolean(ivan_theme_scripts.hidescroll);

			if(ivan_theme_scripts.hidescroll === true) {
				$headerFixed.headroom({
					"offset": 400 + _headerHeight
				});
			}

		}); // imagesLoaded Logic

	}

	// Or in aside menu case...
	if( jQuery('.aside-header-wrapper .fixed-height').length > 0 ) {

		var $headerFixed = jQuery('.aside-header-wrapper .fixed-height');

		$headerFixed.waypoint('sticky', {
			wrapper: '<div class="aside-sticky-wrapper aside-header-sticky-wrapper" />',
			stuckClass: 'aside-stuck'
		});	

	}

}

/*!
 * Init Live Search
 *
 * Function used to enable live search effects
 *
 */
function ivan_live_search_init() {
	"use strict";

	jQuery('.live-search .trigger').click( function(e) {

		e.preventDefault();

		var _element = jQuery(this).siblings('.inner-wrapper');

		if( _element.hasClass('visible') === false ) {

			_element.addClass('visible');

			if(jQuery(this).parents('.header.simple-left-right').length === 0) {
				_element.animate( { opacity: 1 }, 400 );
			} else {
				_element.css('opacity', '1');
			}

			_element.find('#s').focus();

		} else {
			_element.find('input:focus').blur();
		}

	});

	jQuery(document).mouseup( function(e) {

		var _element = jQuery('.inner-wrapper.visible');
        
        // if the target of the click isn't the container...
        // && nor a descendant of the container
		if (!_element.is(e.target) && _element.has(e.target).length === 0 ) {

			if(jQuery(this).parents('.header.simple-left-right').length === 0) {
				_element.animate( { opacity: 0 }, 150, function() {
					if( _element.hasClass('visible') ) {
						_element.removeClass('visible');
					}
				} );
			} else {
				_element.css('opacity', '0');
				if( _element.hasClass('visible') ) {
					_element.removeClass('visible');
				}
			}

			_element.find('input:focus').blur();
			
		}

	});

	jQuery('.live-search .submit-form').click( function(e) {

		e.preventDefault();

		jQuery(this).parents('form').submit();

	});
}

/*!
 * Init Woo Cart
 *
 * Function used to enable cart effects
 *
 */
function ivan_woo_cart_init() {
	"use strict";

	if(jQuery(window).width() > 992) {

		jQuery('.woo-cart').hover( function() {

			var _element = jQuery(this).find('.inner-wrapper');

			_element.addClass('visible');

			if(jQuery(this).parents('.header.simple-left-right').length === 0) {
				_element.animate( { opacity: 1 }, 400 );
			} else {
				_element.css('opacity', '1');
			}

		}, function() {

			var _element = jQuery(this).find('.inner-wrapper');

			if(jQuery(this).parents('.header.simple-left-right').length === 0) {
				_element.animate( { opacity: 0 }, 150, function() {
					_element.removeClass('visible');
				} );
			} else {
				_element.css('opacity', '0');
				_element.removeClass('visible');
			}

		});

	} // End window size logic

}

/*!
 * Init Login with AJAX
 *
 * Function used to enable live search effects
 *
 */
function ivan_login_ajax_init() {
	"use strict";

	jQuery('.login-ajax .trigger').click( function(e) {

		var _element = jQuery(this).siblings('.inner-wrapper');

		if( _element.hasClass('visible') === false ) {

			_element.addClass('visible');

			if(jQuery(this).parents('.header.simple-left-right').length === 0) {
				_element.animate( { opacity: 1 }, 400 );
			} else {
				_element.css('opacity', '1');
			}

			_element.find('#lwa_user_login').focus();

		} else {
			_element.find('input:focus').blur();
		}

		e.preventDefault();
	});

	jQuery(document).mouseup( function(e) {

		var _element = jQuery('.inner-wrapper.visible');

		if (!_element.is(e.target) && _element.has(e.target).length === 0 ) {
			if(jQuery(this).parents('.header.simple-left-right').length === 0) {
				_element.animate( { opacity: 0 }, 150, function() {
					if( _element.hasClass('visible') ) {
						_element.removeClass('visible');
					}
				} );
			} else {
				_element.css('opacity', '0');
				if( _element.hasClass('visible') ) {
					_element.removeClass('visible');
				}
			}

			_element.find('input:focus').blur();
		}

	});
}

/*!
 * Init Responsive Menus
 *
 * Function used to enable responsive menus
 *
 */
function ivan_responsive_menus_init() {
	"use strict";

	setTimeout(function() {
		//var _bodyHeight = jQuery('body').outerHeight();

		jQuery('.mobile-menu-trigger').each( function() {

			var _selector = jQuery(this).attr('data-selector');
			var _id = jQuery(this).attr('data-id');
			var _menuExists = true;

			if( jQuery(_selector + ' .menu').length <= 0 ) {
				_menuExists = false;
			}

			if( _menuExists === true ) {

				_selector += ' .menu';

				jQuery('body').prepend('<div class="iv-mobile-menu-wrapper" id="' + _id + '"><div class="iv-mobile-menu-holder"><div class="iv-mobile-menu-inner"><div class="iv-mobile-menu-close"><a href="#"><i class="fa fa-times"></i></a></div><div class="modules"></div><div class="menu-wrap"></div></div></div></div>');

				jQuery('#' + _id + ' .iv-mobile-menu-inner .modules').append( jQuery( _selector ).parents('.iv-layout').find('.social-icons, .custom-text').clone().removeClass('hidden-xs hidden-sm') );

				jQuery('#' + _id + ' .iv-mobile-menu-inner .menu-wrap').append( jQuery( _selector ).clone().removeClass('mega_main_menu_ul').attr('id', '') );

				jQuery('#' + _id).find('.post_type_dropdown .mega_dropdown, .grid_dropdown .mega_dropdown, .widgets_dropdown  .mega_dropdown').remove();

				jQuery('#' + _id).find('.iv-mobile-menu-holder').niceScroll({touchbehavior:false,cursorcolor:"#aaa",cursorborder:'none',cursoropacitymax:0.7,cursorwidth:4,background:"#000",autohidemode:true});
				
				jQuery('#' + _id).find('.iv-mobile-menu-holder').getNiceScroll().hide();

				jQuery('#' + _id).find('.menu > .menu-item-has-children > .item_link').click(function(e) {

					if(jQuery(this).hasClass('opened') === false) {
						e.preventDefault();

						jQuery(this).siblings('ul').slideDown('slow', function() {
							jQuery('#' + _id).find('.iv-mobile-menu-holder').getNiceScroll().resize();
						});

						jQuery(this).addClass('opened');
					} else {
						return true;
					}

				});
			} else {

				//console.log('Menu False' + _selector);

				// Special code used when 
				jQuery('body').prepend('<div class="iv-mobile-menu-wrapper" id="' + _id + '"><div class="iv-mobile-menu-holder"><div class="iv-mobile-menu-inner"><div class="iv-mobile-menu-close"><a href="#"><i class="fa fa-times"></i></a></div><div class="modules"></div><div class="menu-wrap"></div></div></div></div>');

				jQuery('#' + _id + ' .iv-mobile-menu-inner .modules').append( jQuery( _selector ).find('.social-icons, .custom-text').clone().removeClass('hidden-xs hidden-sm') );
			}

			jQuery(this).click(function(e) {

				e.preventDefault();

				jQuery('#' + _id).css("display", "block");

				jQuery('#' + _id).find('.iv-mobile-menu-holder').getNiceScroll().resize();

			});

		});

		jQuery('.iv-mobile-menu-close').click( function(e) {

			e.preventDefault();

			jQuery(this).parents('.iv-mobile-menu-wrapper').css("display", "none");

		});
		
	}, 1000);
}

/*!
 * Init Responsive Menus Selects
 *
 * Function used to enable responsive menus inside a select
 *
 */
function ivan_responsive_menus_select_init() {
	"use strict";

	jQuery('.responsive-menu-select').each( function() {

		var _selector = jQuery(this).attr('data-selector');
		
		jQuery(_selector).tinyNav({
			active: 'dummy',
			header: ' ',
			indent: '- ',
			place: jQuery(this).find('.receptor')
		});

	});
}

/*!
 * Init FullWidth MegaMenu
 *
 * Function used to fix megamenu fullwidth sizes
 *
 */
function ivan_megamenu_init() {
	"use strict";

	if(iv_device_md === true || iv_device_lg === true) {

		if( jQuery('body').hasClass('ivan-m-l-aside') === false ) {

			if(jQuery('.header .container').length <= 0)
				return;

			var _container = jQuery('.header .container'); 
			var _containerWidth = _container.width();

			var _containerOffset = _container.offset().left;

			var _containerPadding = _container.css("padding-left").replace("px", "");

			//console.log( _containerPadding);

			jQuery('.header .mega_main_menu:not(.direction-vertical), .top-header .mega_main_menu').each(function() {			

				jQuery(this).find('.mega_main_menu_ul > .submenu_full_width > .mega_dropdown').each( function(e) {

					var _offWrapper = jQuery(this).offset().left;

					//console.log( 'Offset:' + _offWrapper);

					var _mega = jQuery(this);

					_mega.css("width", _containerWidth + 'px');

					//console.log( _containerWidth );

					//var _offset = _mega.offset().left;

					var _offset = _offWrapper - _containerOffset - _containerPadding;

					_mega.css("left", '-' + Math.abs(_offset) + 'px');
					

				});

			});

		}
		
	}
}

 /*!
 * Init Negative Height
 *
 * Function used to add negative height header support
 *
 */

var ivan_title_paddingTop = null;
var ivan_header_marginTop = 0;
var ivan_negative_header_calls = 0;
function ivan_negative_height_init() {
	"use strict";

	//if( jQuery('.iv-layout.header').hasClass('negative-height') === true && jQuery('body').hasClass('vc_editor') === false ) {
	if( jQuery('.iv-layout.header').hasClass('negative-height') === true ) {

		var _h;

		if(jQuery('.iv-layout.header').hasClass('header-fixed')) {
			_h = jQuery('.header-sticky-wrapper').outerHeight( true );

			_h += ivan_header_marginTop;
		}
		else
			_h = jQuery('.iv-layout.header.negative-height').outerHeight( true );

		//console.log(_h);

		// Specific to when title wrapper is on
		if( jQuery('.iv-layout.title-wrapper').length > 0 ) {

			jQuery('.negative-push').css('margin-top', '-' + _h + 'px');

			jQuery('.iv-layout.header').css('display', 'block');

			if( jQuery('.iv-layout.title-wrapper').length > 0 ) {

				if( jQuery('.iv-layout.header').hasClass('show-after-fold') === false ||
					jQuery('.iv-layout.header').hasClass('keep-logo-before-fold') === true ) {

					if( ivan_title_paddingTop === null )
						ivan_title_paddingTop = parseInt( jQuery('.iv-layout.title-wrapper').css('padding-top').replace("px", "") );

					jQuery('.iv-layout.title-wrapper').css('padding-top', ivan_title_paddingTop + parseInt(_h) + 'px');

				}
			}

			if( jQuery('.smooth-opening-holder').hasClass('smooth-opened') === false) {
				jQuery('.smooth-opening-holder').addClass('smooth-opened');
			}

		} else {

			jQuery('.iv-layout.header').css('display', 'block');

			// Specific to when only fixed header is on...
			if( jQuery('.smooth-opening-holder').hasClass('smooth-opened') === false) {

				/*var _offsetHolder = jQuery('.smooth-opening-holder').offset();

				jQuery('.smooth-opening-holder').css('top', _offsetHolder.top + 'px' );*/

				jQuery('.smooth-opening-holder').addClass('smooth-opened only-fixed-header');
				
			}
		}

		ivan_negative_header_calls++;

		if( ivan_negative_header_calls == 1) { // Code used to ensure negative height was calculated properly!...
			setTimeout(function() { ivan_negative_height_init(); }, 2000);
		}

	}
}


/*!
 * Post Formats init
 *
 * Function used to start carousels and lightboxes of posts
 *
 */
function ivan_post_formats_init() {
	"use strict";

	var _autoHeight = true;

	if(jQuery('.ivan-mansory-blog').length > 0)
		_autoHeight = false;

	if(jQuery('.post-gallery-carousel').length > 0) {
		jQuery('.post-gallery-carousel').owlCarousel({
			theme: "style-outline-circle",
			singleItem: true,
			autoHeight: false,
			navigation: true,
			navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			pagination: false
		});
	}

	//'.format-gallery .thumbnail .post-gallery-carousel-item a, .format-image .thumbnail a')

	jQuery('.format-gallery, .format-image, .single-post .format-standard').each(function() {
		jQuery(this).find('.thumbnail a').magnificPopup({
			type: 'image',
			gallery:{
				enabled: true
			}
		});
	});
	
}

/*!
 * Gallery Shortcode Improved
 *
 * Function used to start lightbox in gallery items and mansory
 *
 */
function ivan_post_wp_gallery_init() {
	"use strict";

	var container = document.querySelector('.gallery');

	if( null !== container) {

		jQuery('.gallery').each(function() {

			jQuery(this).find('.gallery-item a').magnificPopup({
				type: 'image',
				image: {
					verticalFit: false
				},
				gallery:{
					enabled: true
				}
			});

		}); 

		var pckry;

		imagesLoaded( container, function() {
			pckry = new Packery( container, {
				itemSelector: '.gallery-item',
				gutter: 0
			});
		});
	}

	/* PrettyPhoto replaced by Magnific */
	jQuery('.prettyphoto').each(function() {
		jQuery(this).magnificPopup({
			type: 'image',
			image: {
				verticalFit: false
			},
			gallery:{
				enabled: true
			}
		});
	});

	/* Tiled Gallery JetPack */
	jQuery('.tiled-gallery a').magnificPopup({
		type: 'image',
		image: {
			verticalFit: false
		},
		gallery:{
			enabled: true
		}
	});	

	/* PrettyPhoto replaced by Magnific */
	jQuery('.ivan-lightbox a, a.ivan-lightbox').each(function() {
		jQuery(this).magnificPopup({
			type: 'image',
			image: {
				verticalFit: false
			},
			gallery:{
				enabled: true
			}
		});
	});
}

/*!
 * Load Back to Top Button
 *
 * Function used to display and configure back to top button
 *
 */
function ivan_back_to_top_init() {
	"use strict";

	var $back_top = jQuery('#back-top');

	var $next_prev_fixed = jQuery('.post-nav-fixed');

	// When user click it, animate to top
	$back_top.click( function(e) {
		e.preventDefault();

		jQuery('body, html').animate( {scrollTop: 0}, jQuery(window).scrollTop() / 3, 'linear' );
	});

	var _windowHeight = jQuery.waypoints('viewportHeight');
	var _windowHeightPart = jQuery.waypoints('viewportHeight') * 0.5;

	// Add class on and off according to 
	jQuery(window).scroll( function() {

		var _currentScroll = jQuery(this).scrollTop();

		if($back_top.length > 0 ) {
			if( _currentScroll > _windowHeight ) {
				$back_top.removeClass('off');
				$back_top.addClass('on');
			} else {
				$back_top.removeClass('on');
				$back_top.addClass('off');
			}
		}

		if($next_prev_fixed.length > 0 ) {
			if( _currentScroll > _windowHeightPart ) {
				$next_prev_fixed.removeClass('off');
				$next_prev_fixed.addClass('on');
			} else {
				$next_prev_fixed.removeClass('on');
				$next_prev_fixed.addClass('off');
			}
		}

	});
	
}

/*!
 * Start Smooth Link Functionality
 *
 * Function used to go from one section to another smoothly
 *
 */
function ivan_smooth_links_init() {
	"use strict";

	var header_offset = 0;

	if( jQuery('.header-fixed').length > 0 ) {
		header_offset = jQuery('.header-fixed').outerHeight(false) * 0.57;
	}

	// Go to present hashtags
	if(window.location.hash) {

		header_offset = 0;

		if( jQuery('.header-fixed').length > 0 ) {
			header_offset = jQuery('.header-fixed').outerHeight(false);
		}

		//console.log(window.location.hash);
		var target = jQuery(window.location.hash);

		if( target.length ) {
			if( target.offset().top < 150)
				header_offset = 0;

			jQuery(document).scrollTop( target.offset().top - header_offset );
		}

	} else {
		// Fragment doesn't exist
	}

	// Smooth scrolling to internal anchors
	jQuery('a[href*="#"]:not([href="#"]):not([href*="#tab"]):not([href*="#comments"]):not(a[data-vc-container*="vc"])').click(function() {

		if( header_offset === 0 ) {
			header_offset = jQuery('.header-fixed').outerHeight(false) * 0.57;
		}

		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || 
            location.hostname == this.hostname) {

			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			   if (target.length) {

			   	// if it's a normal link, not fullpage section...
			   	if(target.hasClass('row-fullpage') === false) {

				   	if( target.offset().top < 150)
				   		header_offset = 0;

					jQuery('html,body').animate({
						scrollTop: target.offset().top - header_offset
					}, 600);
				}
				// But if it is a fullpage section...
				else {
					// does nothing...
				}

				return false;
			}
		}
	});
	
}

/*!
 * Init Mansory Styled Blog
 *
 * Function used to display blog in styled way
 *
 */
function ivan_init_mansory_style_blog() {
	"use strict";

	var container = document.querySelector('.ivan-mansory-blog');

	if( null !== container) {

		var pckry;

		imagesLoaded( container, function() {
			pckry = new Packery( container, {
				itemSelector: '.post-wrapper'
				/*gutter: container.querySelector('.gutter-spacer')*/
			});

			setTimeout(function() {
				if(jQuery('body').hasClass("ivan-m-l-aside")) {
					jQuery('.ivan-mansory-blog').packery();
				}
			}, 1500);

		});

	}
	
}

/*!
 * Calculate Correct Header Area Sizes
 *
 * Function used to fix height that should be used
 *
 */
function ivan_fix_header_area_height() {
	"use strict";

	if( jQuery('.header').length > 0 ) {
		jQuery('.calc-height-area').each( function() {

			jQuery(this).outerHeight( jQuery('.header-center-area').outerHeight() );

		} );
	}
}

// Update properly the layout after added by AJAX
function ivan_update_mansory_style_blog() {
	"use strict";

	jQuery('.ivan-mansory-blog').packery();
	jQuery('.ivan-mansory-blog').packery('reloadItems');

}

/**********************************************************
***********************************************************
***********************************************************/

// Visual Composer Container Size
function ivan_vc_full_width_container() {
	"use strict";

	var _w = jQuery(window).width();

	jQuery('.entry-content > .wpb_row').each( function() {

		var _rowW = jQuery(this).width();

		var _diff = (_w - _rowW) / 2 + 15;

		jQuery(this).css({
			marginLeft: '-' + _diff + 'px',
			paddingLeft: _diff + 'px',
			marginRight: '-' + _diff + 'px',
			paddingRight: _diff + 'px',
		});

	});
}


/**********************************************************
***********************************************************
***********************************************************/

// Fix Menu Areas that can't be fixed
ivan_fix_header_area_height();

/*
 * Window Load Event
 */
jQuery(window).load( function() {
	"use strict";

	// Fix Menu Areas that can't be fixed
	ivan_fix_header_area_height();

	ivan_vc_full_width_container();

});

function ivan_theme_script_load() {
	"use strict";

	// Fix Menu Areas that can't be fixed
	ivan_fix_header_area_height();

	ivan_vc_full_width_container();
}

/*
 * Document Ready Event
 */
jQuery(document).ready( function() {
	"use strict";

	ivan_theme_script_ready();

});

function ivan_theme_script_ready() {
	"use strict";

	/* Small fix to empty p in content */
	jQuery('.entry-content > p:empty').remove();

	/* Init Smooth Links */
	ivan_smooth_links_init();

	/* Init Back to Top Button */
	ivan_back_to_top_init();

	/* Calls Negative Height init script */
	if(jQuery('.iv-layout.header').hasClass('negative-height'))
		ivan_header_marginTop = parseInt( jQuery('.iv-layout.header.negative-height').css("marginTop").replace('px', '') );

	setTimeout(function() { ivan_negative_height_init(); }, 1000);

	/* Calls Live Search init script */
	ivan_live_search_init();

	/* Calls Woo Cart init script */
	ivan_woo_cart_init();

	/* Calls Login AJAX init script */
	ivan_login_ajax_init();

	/* Calls Responsive Menu init script */
	ivan_responsive_menus_init();

	/* Calls Responsive Menu Select init script */
	ivan_responsive_menus_select_init();

	/* Calls MegaMenu init script */
	setTimeout(function() { ivan_megamenu_init(); }, 1000);

	/* Call init function to post formats */
	ivan_post_formats_init();

	/* Init Mansory Blog */
	ivan_init_mansory_style_blog();

	/* Init default WP Gallery shortcode lightbox and mansory layout */
	ivan_post_wp_gallery_init();

	/* Flexible Header */
	ivan_fixed_header();

	/* Fix iOS Zoom problems */
	jQuery('input:text,select,textarea').cancelZoom();

	// Try to fix/ensure wrong title wrapper calcs
	//setTimeout(function() { ivan_recalc_dimensions(); }, 1000);
}

// Infinite Scroll
jQuery( document.body ).on( 'post-load', function () {
	"use strict";


	imagesLoaded( jQuery('#post-list'), function() {

		ivan_post_formats_init();

		ivan_update_mansory_style_blog();

		setTimeout(function() { ivan_update_mansory_style_blog(); }, 1000);

	});
	
});

ivan_theme_scripts.preload = Boolean(ivan_theme_scripts.preload);

if(ivan_theme_scripts.preload) {
	/*
	 * Fade In/Out Effect
	 */
	jQuery(window).bind("load", function() {
		"use strict";

		jQuery('#page-loader').fadeOut();
	});

	jQuery(window).bind('beforeunload', function(e){
		"use strict";

		jQuery('#page-loader').fadeIn();
	});
}

/*
 * Debounced Resize Event
 */
jQuery(window).on('debouncedresize', function( event ) {

	ivan_recalc_dimensions();

});

function ivan_recalc_dimensions() {
	"use strict";

	ivan_negative_height_init();

	ivan_recalc_sticky_height();

	ivan_vc_full_width_container();
}

/*!
 * Like Post Script
 *
 * Adds like post capabilities
 *
*/

jQuery(document).ready(function() {
	"use strict";

	jQuery('body').on('click','.jm-post-like',function(event){
		event.preventDefault();
		var heart = jQuery(this);
		var post_id = heart.data("post_id");
		heart.html("<i class='fa fa-heart'></i>&nbsp;<i class='fa fa-cog fa-spin'></i>");
		jQuery.ajax({
			type: "post",
			url: ivan_theme_scripts.ajaxurl,
			data: "action=jm-post-like&nonce="+ivan_theme_scripts.nonce+"&jm_post_like=&post_id="+post_id,
			success: function(count){
				if( count.indexOf( "already" ) !== -1 )
				{
					var lecount = count.replace("already","");
					if (lecount === 0)
					{
						lecount = "";
					}
					heart.prop('title', '+1');
					heart.removeClass("liked");
					heart.html("<i class='fa fa-heart-o'></i>&nbsp;"+lecount);
				}
				else
				{
					heart.prop('title', '-1');
					heart.addClass("liked");
					heart.html("<i class='fa fa-heart'></i>&nbsp;"+count);
				}
			}
		});
	});
 });


 /*!
 * Skip Input Focus Fix
 *
 * Fix odd focus behavior in mobile devices
 *
 */
( function() {

	"use strict";

	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
		is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
		is_ie	 = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && 'undefined' !== typeof( document.getElementById ) ) {
		var eventMethod = ( window.addEventListener ) ? 'addEventListener' : 'attachEvent';
		window[ eventMethod ]( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
})();