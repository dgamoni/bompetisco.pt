<?php
/**
 * Basic Customizer
 *
 * This is used to allow users customize primary font, heading font and accent color.
 *
 * Use: http://rvision.ws/cssextractor/
 *
 *
 */

// Customizer Output
function ivan_customizer_output() {

	$output = '';

	ob_start();

	// Link Color
	$linkColor = ivan_get_option('ivan-link-color');

	if($linkColor != '') :
	?>
		
	a,
	.btn-link,
	a.jm-post-like:hover,
	a.jm-post-like:active,
	a.jm-post-like:focus,
	a.liked:hover,
	a.liked:active,
	a.liked:focus {
	  color: <?php echo $linkColor; ?>;
	}

	.post .share-icons a:hover,
	.woocommerce table.cart a.remove:hover,
	.woocommerce-page table.cart a.remove:hover,
	.woocommerce-wishlist .share-icons a:hover,
	.woocommerce div.product div.summary .share-icons a:hover,
	.woocommerce-page div.product div.summary .share-icons a:hover,
	.woocommerce div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover,
	.woocommerce-page div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover {
	  color: <?php echo $linkColor; ?>;
	  border-color: <?php echo $linkColor; ?>;
	}

	.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
	.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a {
	  color: <?php echo $linkColor; ?>;
	  border-top-color: <?php echo $linkColor; ?>;
	}

	<?php
	endif;

	// Custom Accent BG
	$accentBG = ivan_get_option('ivan-custom-accent');
	$accentColor = '#fff'; // Default
	if( '' != ivan_get_option('ivan-custom-accent-color') )
		$accentColor = ivan_get_option('ivan-custom-accent-color');


	if($accentBG != '') :
	?>

	.ivan-staff-wrapper .social-icons a:hover,
	.ivan-call-action.primary-bg.with-icon .call-action-icon i,
	.ivan-button.outline:hover,
	.ivan-pricing-table.default.dark-bg .signup:hover,
	.ivan-pricing-table.default.black-bg .signup:hover,
	.ivan-pricing-table.big-price .top-section .adquire-plan .signup:hover,
	.ivan-pricing-table.description-support .bottom-section .signup:hover,
	.ivan-pricing-table.subtitle.dark-bg .signup:hover,
	.ivan-pricing-table.subtitle.black-bg .signup:hover,
	.ivan-pricing-table.small-desc.dark-bg .signup:hover,
	.ivan-pricing-table.small-desc.black-bg .signup:hover,
	.marker-icon.ivan-gmap-marker,
	.ivan-title-wrapper.primary-bg .icon-above i,
	.ivan-title-wrapper.primary-bg strong,
	.ivan-title-wrapper.primary-bg a,
	.ivan-title-wrapper.primary-bg a:hover,
	.ivan-service .main-icon,
	.ivan-service.primary-bg .fa-stack .main-icon,
	.ivan-icon-box.primary-bg .icon-box-holder .main-icon,
	.ivan-icon-wrapper .primary-bg .ivan-icon,
	.ivan-icon-wrapper .primary-bg a:hover,
	.ivan-icon-wrapper .primary-bg .ivan-font-stack .stack-holder,
	.ivan-icon-wrapper .primary-bg .ivan-font-stack.with-link:hover .stack-holder,
	.ivan-icon-list.primary-bg i,
	.ivan-list.primary-bg.number ul > li:before,
	a:hover,
	a:focus,
	.btn-primary .badge,
	.btn-link:hover,
	.btn-link:focus,
	.post .entry-title a:hover,
	#comments .comment-body .comment-reply-link:hover,
	.ivan-vc-filters a:hover,
	.ivan-vc-filters a.current {
	  color: <?php echo $accentBG; ?>;
	}

	.ivan-button:hover,
	.ivan-button.outline:hover hr,
	.ivan-button.no-border:hover,
	.ivan-button.primary-bg,
	.ivan-projects .ivan-project.hide-entry .entry,
	.ivan-projects .ivan-project.outer-square .entry,
	.ivan-projects .ivan-project.lateral-cover .entry,
	.ivan-projects .ivan-project.smooth-cover .entry,
	.ivan-testimonial.primary-bg.boxed-left .testimonial-content,
	.ivan-service .fa-stack,
	.ivan-service.primary-bg,
	.ivan-progress.primary-bg .ivan-progress-inner,
	.ivan-icon-box.primary-bg .icon-box-holder .fa-stack,
	.ivan-icon-boxed-holder.primary-bg .ivan-icon-boxed-icon-inner .fa-stack,
	.ivan-icon-wrapper .primary-bg .ivan-font-stack-square,
	.ivan-icon-list.primary-bg.circle i,
	.ivan-list.primary-bg.number.circle-in ul > li:before,
	.ivan-list.primary-bg.circle ul > li:before,
	.ivan-quote.primary-bg blockquote,
	.ivan-tabs-wrap .wpb_tour_tabs_wrapper.iv-tabs.iv-boxed .wpb_tabs_nav li.ui-tabs-active a,
	.ivan-vc-separator.primary-bg,
	.btn:hover,
	.button:hover,
	button:hover,
	input[type="submit"]:hover,
	.btn:focus,
	.button:focus,
	button:focus,
	input[type="submit"]:focus,
	.btn:active,
	.button:active,
	button:active,
	input[type="submit"]:active,
	.btn.active,
	.button.active,
	button.active,
	input[type="submit"].active,
	.open .dropdown-toggle.btn,
	.open .dropdown-toggle.button,
	.open .dropdown-togglebutton,
	.open .dropdown-toggleinput[type="submit"],
	.btn-default:hover,
	.btn-default:focus,
	.btn-default:active,
	.btn-default.active,
	.open .dropdown-toggle.btn-default,
	.btn-primary,
	input.btn-primary,
	.btn-primary:hover,
	.btn-primary:focus,
	.btn-primary:active,
	.btn-primary.active,
	.open .dropdown-toggle.btn-primary,
	.btn-primary.disabled,
	.btn-primary[disabled],
	fieldset[disabled] .btn-primary,
	.btn-primary.disabled:hover,
	.btn-primary[disabled]:hover,
	fieldset[disabled] .btn-primary:hover,
	.btn-primary.disabled:focus,
	.btn-primary[disabled]:focus,
	fieldset[disabled] .btn-primary:focus,
	.btn-primary.disabled:active,
	.btn-primary[disabled]:active,
	fieldset[disabled] .btn-primary:active,
	.btn-primary.disabled.active,
	.btn-primary[disabled].active,
	fieldset[disabled] .btn-primary.active,
	.page-links a:hover span,
	.sidebar .widget.widget_tag_cloud a:hover,
	.content-wrapper .wpb_widgetised_column .widget.widget_tag_cloud a:hover,
	.ivan-pricing-table.default.primary-bg,
	.ivan-pricing-table.subtitle .featured-table-text,
	.ivan-pricing-table.subtitle.primary-bg,
	.ivan-pricing-table.small-desc .featured-table-text,
	.ivan-pricing-table.small-desc.primary-bg,
	.ivan-projects .ivan-project.cover-entry .entry .read-more a:hover,
	.ivan-projects .ivan-project.soft-cover .entry .read-more a:hover,
	.ivan-icon-wrapper .primary-bg .ivan-font-stack-square.with-link:hover,
	.wpb_toggle.iv-toggle.boxed-arrow.wpb_toggle_title_active,
	.ivan_acc_holder.iv-accordion.with-arrow .ui-state-active,
	.iv-social-icon.circle:hover,
	.iv-social-icon.square:hover,
	.iv-mobile-menu-wrapper .current-menu-item > a,
	.iv-layout.top-header input[type="submit"]:hover,
	.iv-layout.top-header .woo-cart .buttons a:hover,
	.iv-layout.top-header .login-ajax .lwa input[type="submit"]:hover,
	.iv-layout.header input[type="submit"]:hover,
	.iv-layout.header .woo-cart .buttons a:hover,
	.iv-layout.header .login-ajax .lwa input[type="submit"]:hover,
	.iv-layout.footer .widget .iv-social-icon.circle:hover,
	.dynamic-footer .wpb_widgetised_column .widget .iv-social-icon.circle:hover,
	.iv-layout.footer .widget .iv-social-icon.square:hover,
	.dynamic-footer .wpb_widgetised_column .widget .iv-social-icon.square:hover,
	.iv-layout.bottom-footer .iv-social-icon.circle:hover,
	.iv-layout.bottom-footer .iv-social-icon.square:hover,
	#infinite-handle span:hover,
	#all-site-wrapper .mejs-controls .mejs-time-rail .mejs-time-current,
	#all-site-wrapper .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
	.page-loader-spinner > div,
	.thumbnail-hover .overlay,
	.post-nav-fixed .nl-infos,
	.ivan-message.success.woo-msg-wrapper {
		background-color: <?php echo $accentBG; ?>;
	}

	.ivan-button.outline:hover {
		background-color: transparent;
	}

	.ivan-button:hover,
	.ivan-button.outline:hover,
	.ivan-button.no-border:hover,
	.ivan-button.primary-bg,
	.ivan-button.primary-bg.outline.text-separator.with-icon .text-btn,
	.ivan-pricing-table.default.dark-bg .signup:hover,
	.ivan-pricing-table.default.black-bg .signup:hover,
	.ivan-pricing-table.big-price .top-section .adquire-plan .signup:hover,
	.ivan-pricing-table.description-support .bottom-section .signup:hover,
	.ivan-pricing-table.subtitle.dark-bg .signup:hover,
	.ivan-pricing-table.subtitle.black-bg .signup:hover,
	.ivan-pricing-table.small-desc.dark-bg .signup:hover,
	.ivan-pricing-table.small-desc.black-bg .signup:hover,
	.ivan-projects .ivan-project.cover-entry .entry .read-more a:hover,
	.ivan-projects .ivan-project.soft-cover .entry .read-more a:hover,
	.btn:hover,
	.button:hover,
	button:hover,
	input[type="submit"]:hover,
	.btn:focus,
	.button:focus,
	button:focus,
	input[type="submit"]:focus,
	.btn:active,
	.button:active,
	button:active,
	input[type="submit"]:active,
	.btn.active,
	.button.active,
	button.active,
	input[type="submit"].active,
	.open .dropdown-toggle.btn,
	.open .dropdown-toggle.button,
	.open .dropdown-togglebutton,
	.open .dropdown-toggleinput[type="submit"],
	.btn-default:hover,
	.btn-default:focus,
	.btn-default:active,
	.btn-default.active,
	.open .dropdown-toggle.btn-default,
	.btn-primary,
	input.btn-primary,
	.btn-primary:hover,
	.btn-primary:focus,
	.btn-primary:active,
	.btn-primary.active,
	.open .dropdown-toggle.btn-primary,
	.btn-primary.disabled,
	.btn-primary[disabled],
	fieldset[disabled] .btn-primary,
	.btn-primary.disabled:hover,
	.btn-primary[disabled]:hover,
	fieldset[disabled] .btn-primary:hover,
	.btn-primary.disabled:focus,
	.btn-primary[disabled]:focus,
	fieldset[disabled] .btn-primary:focus,
	.btn-primary.disabled:active,
	.btn-primary[disabled]:active,
	fieldset[disabled] .btn-primary:active,
	.btn-primary.disabled.active,
	.btn-primary[disabled].active,
	fieldset[disabled] .btn-primary.active,
	.iv-layout.top-header input[type="text"]:focus,
	.iv-layout.top-header input[type="email"]:focus,
	.iv-layout.top-header input[type="password"]:focus,
	.iv-layout.top-header input[type="search"]:focus,
	.iv-layout.top-header textarea:focus,
	.iv-layout.top-header input[type="submit"]:hover,
	.iv-layout.top-header .woo-cart .buttons a:hover,
	.iv-layout.top-header .login-ajax .lwa input[type="submit"]:hover,
	.iv-layout.header input[type="text"]:focus,
	.iv-layout.header input[type="email"]:focus,
	.iv-layout.header input[type="password"]:focus,
	.iv-layout.header input[type="search"]:focus,
	.iv-layout.header textarea:focus,
	.iv-layout.header input[type="submit"]:hover,
	.iv-layout.header .woo-cart .buttons a:hover,
	.iv-layout.header .login-ajax .lwa input[type="submit"]:hover,
	#infinite-handle span:hover,
	.sidebar .widget.widget_tag_cloud a:hover,
	.content-wrapper .wpb_widgetised_column .widget.widget_tag_cloud a:hover,
	.ivan-service .fa-stack,
	.ivan-icon-box.primary-bg .icon-box-holder .fa-stack,
	.ivan-icon-boxed-holder.primary-bg .ivan-icon-boxed-icon-inner .fa-stack,
	.ivan-tabs-wrap .wpb_tour_tabs_wrapper.iv-tabs.iv-boxed .wpb_tabs_nav li.ui-tabs-active a,
	.ivan-tabs-wrap .wpb_tour_tabs_wrapper.iv-tabs.iv-boxed .wpb_tab,
	.ivan-message.success.woo-msg-wrapper {
		border-color: <?php echo $accentBG; ?>;
	}

	/* **** */
	/* Accent Color */
	/* **** */

	.ivan-button:hover,
	.ivan-button.primary-bg,
	.ivan-button.primary-bg:hover,
	.ivan-button.primary-bg.with-icon.icon-cover .icon-simple,
	.ivan-pricing-table.default.primary-bg h3,
	.ivan-pricing-table.default.primary-bg li,
	.ivan-pricing-table.default.primary-bg .plan-infos,
	.ivan-pricing-table.default.primary-bg li a,
	.ivan-pricing-table.default.primary-bg li a:hover,
	.ivan-pricing-table.default.primary-bg .signup,
	.ivan-pricing-table.default.primary-bg .signup:hover,
	.ivan-pricing-table.default.primary-bg .featured-table-text,
	.ivan-pricing-table.subtitle .featured-table-text,
	.ivan-pricing-table.subtitle.primary-bg h3,
	.ivan-pricing-table.subtitle.primary-bg li,
	.ivan-pricing-table.subtitle.primary-bg .plan-infos,
	.ivan-pricing-table.subtitle.primary-bg .plan-subtitle,
	.ivan-pricing-table.subtitle.primary-bg li a,
	.ivan-pricing-table.subtitle.primary-bg li a:hover,
	.ivan-pricing-table.subtitle.primary-bg .signup,
	.ivan-pricing-table.subtitle.primary-bg .signup:hover,
	.ivan-pricing-table.subtitle.primary-bg .featured-table-text,
	.ivan-pricing-table.small-desc .featured-table-text,
	.ivan-pricing-table.small-desc.primary-bg h3,
	.ivan-pricing-table.small-desc.primary-bg li,
	.ivan-pricing-table.small-desc.primary-bg .plan-infos,
	.ivan-pricing-table.small-desc.primary-bg .plan-subtitle,
	.ivan-pricing-table.small-desc.primary-bg li a,
	.ivan-pricing-table.small-desc.primary-bg li a:hover,
	.ivan-pricing-table.small-desc.primary-bg .signup,
	.ivan-pricing-table.small-desc.primary-bg .signup:hover,
	.ivan-pricing-table.small-desc.primary-bg .featured-table-text,
	.ivan-projects .ivan-project.cover-entry .entry .read-more a:hover,
	.ivan-projects .ivan-project.soft-cover .entry .read-more a:hover,
	.ivan-testimonial.primary-bg.boxed-left .testimonial-content,
	.ivan-testimonial.primary-bg.boxed-left .testimonial-content a,
	.ivan-testimonial.primary-bg.boxed-left .testimonial-content a:hover,
	.ivan-service .fa-stack .main-icon,
	.ivan-service.primary-bg .service-title,
	.ivan-service.primary-bg .main-icon,
	.ivan-icon-box.primary-bg .icon-box-holder .fa-stack .main-icon,
	.ivan-icon-boxed-holder.primary-bg .ivan-icon-boxed-icon-inner .fa-stack .main-icon,
	.ivan-icon-wrapper .primary-bg a,
	.ivan-icon-wrapper .primary-bg .ivan-font-stack .main-icon,
	.ivan-icon-wrapper .primary-bg .ivan-font-stack-square i,
	.ivan-icon-list.primary-bg.circle i,
	.ivan-list.primary-bg.number.circle-in ul > li:before,
	.ivan-quote.primary-bg blockquote h5,
	.ivan-quote.primary-bg blockquote .author,
	.ivan-quote.primary-bg blockquote .pull-left,
	.ivan-tabs-wrap .wpb_tour_tabs_wrapper.iv-tabs.iv-boxed .wpb_tabs_nav li.ui-tabs-active a,
	.wpb_toggle.iv-toggle.boxed-arrow.wpb_toggle_title_active,
	.wpb_toggle.iv-toggle.boxed-arrow.wpb_toggle_title_active .toggle-mark .toggle-mark-icon,
	.ivan_acc_holder.iv-accordion.with-arrow .ui-state-active a,
	.ivan_acc_holder.iv-accordion.with-arrow .ui-state-active .accordion-mark .accordion-mark-icon,
	.btn:hover,
	.button:hover,
	button:hover,
	input[type="submit"]:hover,
	.btn:focus,
	.button:focus,
	button:focus,
	input[type="submit"]:focus,
	.btn:active,
	.button:active,
	button:active,
	input[type="submit"]:active,
	.btn.active,
	.button.active,
	button.active,
	input[type="submit"].active,
	.open .dropdown-toggle.btn,
	.open .dropdown-toggle.button,
	.open .dropdown-togglebutton,
	.open .dropdown-toggleinput[type="submit"],
	.btn-default:hover,
	.btn-default:focus,
	.btn-default:active,
	.btn-default.active,
	.open .dropdown-toggle.btn-default,
	.btn-primary,
	input.btn-primary,
	.btn-primary:hover,
	.btn-primary:focus,
	.btn-primary:active,
	.btn-primary.active,
	.open .dropdown-toggle.btn-primary,
	.iv-social-icon.circle:hover,
	.iv-social-icon.square:hover,
	.iv-layout.top-header input[type="submit"]:hover,
	.iv-layout.top-header .woo-cart .buttons a:hover,
	.iv-layout.top-header .login-ajax .lwa input[type="submit"]:hover,
	.iv-layout.header input[type="submit"]:hover,
	.iv-layout.header .woo-cart .buttons a:hover,
	.iv-layout.header .login-ajax .lwa input[type="submit"]:hover,
	.iv-layout.footer .widget .iv-social-icon.circle:hover,
	.dynamic-footer .wpb_widgetised_column .widget .iv-social-icon.circle:hover,
	.iv-layout.footer .widget .iv-social-icon.square:hover,
	.dynamic-footer .wpb_widgetised_column .widget .iv-social-icon.square:hover,
	.iv-layout.bottom-footer .iv-social-icon.circle:hover,
	.iv-layout.bottom-footer .iv-social-icon.square:hover,
	#infinite-handle span:hover,
	.page-links a:hover span,
	.sidebar .widget.widget_tag_cloud a:hover,
	.content-wrapper .wpb_widgetised_column .widget.widget_tag_cloud a:hover,
	.ivan-message.success.woo-msg-wrapper,
	.ivan-message.success.woo-msg-wrapper a {
		color: <?php echo $accentColor; ?>;
	}

	.ivan-button:hover hr,
	.ivan-button.primary-bg hr,
	.ivan-button.primary-bg:hover hr,
	.ivan-service.primary-bg .fa-stack {
		background-color: <?php echo $accentColor; ?>;
	}

	.ivan-pricing-table.default.primary-bg .signup,
	.ivan-pricing-table.default.primary-bg .signup:hover,
	.ivan-pricing-table.subtitle.primary-bg .signup,
	.ivan-pricing-table.subtitle.primary-bg .signup:hover,
	.ivan-pricing-table.small-desc.primary-bg .signup,
	.ivan-pricing-table.small-desc.primary-bg .signup:hover,
	.ivan-service.primary-bg .fa-stack {
		border-color: <?php echo $accentColor; ?>;
	}

	/* **** */
	/* Darken/Lighten */
	/* **** */

	.post-nav-fixed:hover .nl-arrow-icon,
	.ivan-button.primary-bg:hover,
	.ivan-button.primary-bg.outline hr,
	.ivan-button.primary-bg.outline:hover hr,
	.ivan-button.primary-bg.outline.icon-cover.with-icon .icon-simple {
	  background-color: <?php echo iv_adjustColor($accentBG, -13); ?>;
	}

	.ivan-button.primary-bg.outline,
	.ivan-button.primary-bg.outline:hover {
	  color: <?php echo iv_adjustColor($accentBG, -13); ?>;
	}

	.ivan-pricing-table.default.primary-bg .featured-table-text,
	.ivan-pricing-table.subtitle.primary-bg .featured-table-text,
	.ivan-pricing-table.small-desc.primary-bg .featured-table-text {
		color: <?php echo iv_adjustColor($accentBG, -13); ?>;
	}

	.ivan-service.primary-bg .content-section-holder li,
	.ivan-service.primary-bg .content-section-holder p {
	  border-color: <?php echo iv_adjustColor($accentBG, -7); ?>;
	}

	/* **** */
	/* WooCommerce Default */
	/* **** */

	::selection {
	  color: <?php echo $accentColor; ?>;
	  background-color: <?php echo $accentBG; ?>;
	}

	::-moz-selection {
	  color: <?php echo $accentColor; ?>;
	  background-color: <?php echo $accentBG; ?>;
	}

	p.demo_store,
	.woocommerce a.button.alt,
	.woocommerce-page a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce-page button.button.alt,
	.woocommerce input.button.alt,
	.woocommerce-page input.button.alt,
	.woocommerce #respond input#submit.alt,
	.woocommerce-page #respond input#submit.alt,
	.woocommerce a.button.alt:hover,
	.woocommerce-page a.button.alt:hover,
	.woocommerce button.button.alt:hover,
	.woocommerce-page button.button.alt:hover,
	.woocommerce input.button.alt:hover,
	.woocommerce-page input.button.alt:hover,
	.woocommerce #respond input#submit.alt:hover,
	.woocommerce-page #respond input#submit.alt:hover,
	.single-post .entry-tags a:hover {
	  background-color: <?php echo $accentBG; ?>;
	  border-color: <?php echo $accentBG; ?>;
	  color: <?php echo $accentColor; ?>;
	}

	.woocommerce span.onsale,
	.woocommerce-page span.onsale,
	.woocommerce .widget_layered_nav_filters ul li a,
	.woocommerce-page .widget_layered_nav_filters ul li a,
	.sticky-post-holder {
		background-color: <?php echo $accentBG; ?>;
		color: <?php echo $accentColor; ?>;
	}

	<?php
	endif;

	// Heading Color
	$headingColor = ivan_get_option('ivan-heading-color');

	if($headingColor != '') :
	?>
		
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.woocommerce div.product div.summary span.price,
	.woocommerce-page div.product div.summary span.price,
	.woocommerce div.product div.summary p.price,
	.woocommerce-page div.product div.summary p.price,
	.woocommerce table.shop_table th,
	.woocommerce-page table.shop_table th,
	.woocommerce .cart-collaterals .cart_totals h2,
	.woocommerce-page .cart-collaterals .cart_totals h2,
	.woocommerce .coupon label,
	.woocommerce-page .coupon label,
	.woocommerce .shipping-calculator-button,
	.woocommerce-page .shipping-calculator-button {
		color: <?php echo $headingColor; ?>;
	}

	.sidebar .widget.widget_tag_cloud a {
		color: <?php echo $headingColor; ?>;
		border-color: <?php echo $headingColor; ?>;
	}

	<?php
	endif;

	// Heading Weight
	$headingWeight = ivan_get_option('ivan-heading-weight');

	if($headingWeight != '') :
	?>
		
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.sidebar .widget.widget_tag_cloud a,
	.woocommerce div.product div.summary span.price,
	.woocommerce-page div.product div.summary span.price,
	.woocommerce div.product div.summary p.price,
	.woocommerce-page div.product div.summary p.price,
	.woocommerce table.shop_table th,
	.woocommerce-page table.shop_table th,
	.woocommerce .cart-collaterals .cart_totals h2,
	.woocommerce-page .cart-collaterals .cart_totals h2,
	.woocommerce .coupon label,
	.woocommerce-page .coupon label,
	.woocommerce .shipping-calculator-button,
	.woocommerce-page .shipping-calculator-button {
		font-weight: <?php echo $headingWeight; ?>;
	}

	<?php
	endif;

	// Heading Weight Widget and Title
	$headingWidgetWeight = ivan_get_option('ivan-side-title-heading-weight');

	if($headingWidgetWeight != '') :
	?>
		
	.post .entry-title,
	.sidebar .widget .widget-title {
		font-weight: <?php echo $headingWidgetWeight; ?>;
	}

	<?php
	endif;

	// Custom Title Wrapper Color and Height Calcs
	$titleTypo = ivan_get_option('title-wrapper-font');

	if( is_array($titleTypo) && isset($titleTypo['color']) ) {
		if( $titleTypo['color'] != '' ) : ?>

		.iv-layout.title-wrapper a, .iv-layout.title-wrapper a:hover {
			color: <?php echo $titleTypo['color']; ?>;
		}

		<?php
		endif;
	}

	// Remove aside border of header
	if( ivan_get_option('aside-header-remove-border') == true ) :
	?>
		.ivan-m-l-aside.ivan-m-l-aside-left .ivan-main-layout-aside-left {
			border-right: none;
		}

		.ivan-m-l-aside.ivan-m-l-aside-right .ivan-main-layout-aside-right {
			border-left: none;
		}
	<?php
	endif;

	// Header Light / Dark Scheme
	if( ivan_get_option('aside-header-color-scheme') == 'light' ) {
	?>
		.iv-layout.header,
		.iv-layout.header a,
		.iv-layout.header a:hover,
		.iv-layout.header a:visited,
		.iv-layout.header .woo-cart .basket-wrapper .basket,
		.iv-layout.header .woo-cart:hover .top,
		.iv-layout.header .woo-cart:hover .basket,
		.iv-layout.header .woo-cart:hover .cart-total .amount,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link:hover,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link:visited,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link span.description_text,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.current-menu-ancestor > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.current-menu-item > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li:hover > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.highlight_style > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.highlight_style > .item_link:hover,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link > .item_link_content,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link:hover > .item_link_content {
			color: #fff;
		}

		.iv-layout.header .iv-module:after,
		.iv-layout.header .custom-text .iv-separator,
		.iv-layout.header .woo-cart .basket-wrapper .top,
		.iv-layout.header .woo-cart .basket-wrapper .basket,
		.iv-layout.header .woo-cart:hover .top,
		.iv-layout.header .woo-cart:hover .basket,
		.iv-layout.header .woo-cart:hover .cart-total .amount,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link > .item_link_content,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link:hover > .item_link_content {
			border-color: #fff;
		}
	<?php
	} else if( ivan_get_option('aside-header-color-scheme') == 'dark' ) {
	?>

		.iv-layout.header,
		.iv-layout.header a,
		.iv-layout.header a:hover,
		.iv-layout.header a:visited,
		.iv-layout.header .woo-cart .basket-wrapper .basket,
		.iv-layout.header .woo-cart:hover .top,
		.iv-layout.header .woo-cart:hover .basket,
		.iv-layout.header .woo-cart:hover .cart-total .amount,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link:hover,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link:visited,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link span.description_text,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.current-menu-ancestor > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.current-menu-item > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li:hover > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.highlight_style > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.highlight_style > .item_link:hover,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link > .item_link_content,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link:hover > .item_link_content {
			color: #222;
		}

		.iv-layout.header .iv-module:after,
		.iv-layout.header .custom-text .iv-separator,
		.iv-layout.header .woo-cart .basket-wrapper .top,
		.iv-layout.header .woo-cart .basket-wrapper .basket,
		.iv-layout.header .woo-cart:hover .top,
		.iv-layout.header .woo-cart:hover .basket,
		.iv-layout.header .woo-cart:hover .cart-total .amount,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link > .item_link_content,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link:hover > .item_link_content {
			border-color: #222;
		}
	<?php } // end header color scheme if...

	// Custom Header Color Scheme
	if( ivan_get_option('header-custom-color') != '' ) {
	?>
		.iv-layout.header,
		.iv-layout.header a,
		.iv-layout.header a:hover,
		.iv-layout.header a:visited,
		.iv-layout.header .woo-cart .basket-wrapper .basket,
		.iv-layout.header .woo-cart:hover .top,
		.iv-layout.header .woo-cart:hover .basket,
		.iv-layout.header .woo-cart:hover .cart-total .amount,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link:hover,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link:visited,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li > .item_link span.description_text,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.current-menu-ancestor > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.current-menu-item > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li:hover > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.highlight_style > .item_link,
		.iv-layout.header .mega_main_menu .mega_main_menu_ul > li.highlight_style > .item_link:hover,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link > .item_link_content,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link:hover > .item_link_content {
			color: <?php echo ivan_get_option('header-custom-color'); ?>;
		}

		.iv-layout.header .iv-module:after,
		.iv-layout.header .custom-text .iv-separator,
		.iv-layout.header .woo-cart .basket-wrapper .top,
		.iv-layout.header .woo-cart .basket-wrapper .basket,
		.iv-layout.header .woo-cart:hover .top,
		.iv-layout.header .woo-cart:hover .basket,
		.iv-layout.header .woo-cart:hover .cart-total .amount,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link > .item_link_content,
		.iv-layout.header .mega_main_menu.direction-horizontal .mega_main_menu_ul > li.button_style > .item_link:hover > .item_link_content {
			border-color: <?php echo ivan_get_option('header-custom-color'); ?>;
		}
		<?php
	}

	// Header 
	if( ivan_get_option('aside-header-bg') != false ) {

		$aside_header_bg = ivan_get_option('aside-header-bg');

		if( isset( $aside_header_bg['background-color'] ) && $aside_header_bg['background-color'] != '') {
		?>

			.title-wrapper-divider {
			  background: <?php echo $aside_header_bg['background-color']; ?>;
			}

			<?php if( iv_is_color_dark( $aside_header_bg['background-color'] ) ) { ?>
				.iv-layout.header.simple-left-right .mega_main_menu .mega_main_menu_ul > li > .item_link,
				.classic-right-area .menu-area-wrapper,
				.classic-logo-centered .menu-area-wrapper {
				  border-color: rgba(255, 255, 255, 0.1);
				}

			<?php } else { ?>

				.iv-layout.header.simple-left-right .mega_main_menu .mega_main_menu_ul > li > .item_link,
				.classic-right-area .menu-area-wrapper,
				.classic-logo-centered .menu-area-wrapper {
				  border-color: rgba(0, 0, 0, 0.1);
				}

			<?php } ?>

		<?php
		}
	}

	// Sub Header Basic Customization
	if( ivan_get_option('sub-header-bg') != false ) {

		$sub_header_bg = ivan_get_option('sub-header-bg');

		if( isset( $sub_header_bg['background-color'] ) && $sub_header_bg['background-color'] != '') {
		?>

			.iv-layout.header .inner-form,
			.header .mega_main_menu .default_dropdown > ul,
			.header .mega_main_menu .default_dropdown li > ul,
			.header .mega_main_menu .multicolumn_dropdown > ul,
			.header .mega_main_menu .widgets_dropdown > ul {
			  background: <?php echo $sub_header_bg['background-color']; ?>;
			  border-color: <?php echo iv_adjustColor( $sub_header_bg['background-color'], -20); ?>;
			}

		<?php
		}
	}

	// Sub Header Light / Dark Scheme
	if( ivan_get_option('sub-header-color-scheme') == 'light' ) {
	?>
		.iv-layout.header input[type="text"],
		.iv-layout.header input[type="email"],
		.iv-layout.header input[type="password"],
		.iv-layout.header input[type="search"],
		.iv-layout.header textarea,
		.iv-layout.header input[type="submit"],
		.iv-layout.header .inner-form,
		.iv-layout.header .inner-form a,
		.iv-layout.header .inner-form a:visited,
		.iv-layout.header .woo-cart .cart_list span,
		.iv-layout.header .woo-cart .cart_list dl dt,
		.iv-layout.header .woo-cart .buttons a,
		.iv-layout.header .login-ajax .lwa input[type="submit"],
		.header .mega_main_menu .default_dropdown > ul,
		.header .mega_main_menu .default_dropdown li > ul,
		.header .mega_main_menu .multicolumn_dropdown > ul,
		.header .mega_main_menu .widgets_dropdown > ul,
		.header .mega_main_menu .default_dropdown > ul a,
		.header .mega_main_menu .default_dropdown li > ul a,
		.header .mega_main_menu .multicolumn_dropdown > ul a,
		.header .mega_main_menu .widgets_dropdown > ul a,
		.header .mega_main_menu .default_dropdown > ul .item_link,
		.header .mega_main_menu .default_dropdown li > ul .item_link,
		.header .mega_main_menu .multicolumn_dropdown > ul .item_link,
		.header .mega_main_menu .widgets_dropdown > ul .item_link,
		.iv-layout.header input[type="text"]:focus,
		.iv-layout.header input[type="email"]:focus,
		.iv-layout.header input[type="password"]:focus,
		.iv-layout.header input[type="search"]:focus,
		.iv-layout.header textarea:focus,
		.iv-layout.header .inner-form a:hover,
		.iv-layout.header .live-search .submit-form,
		.iv-layout.header .login-ajax .lwa .lwa-field .fa,
		.iv-layout.header.dark .inner-form a, 
		.iv-layout.header.light .inner-form a,
		.iv-layout.header.dark .inner-form a:hover, 
		.iv-layout.header.light .inner-form a:hover,
		.header .mega_main_menu .default_dropdown > ul a:hover,
		.header .mega_main_menu .default_dropdown li > ul a:hover,
		.header .mega_main_menu .multicolumn_dropdown > ul a:hover,
		.header .mega_main_menu .widgets_dropdown > ul a:hover,
		.header .mega_main_menu .default_dropdown > ul .item_link:hover,
		.header .mega_main_menu .default_dropdown li > ul .item_link:hover,
		.header .mega_main_menu .multicolumn_dropdown > ul .item_link:hover,
		.header .mega_main_menu .widgets_dropdown > ul .item_link:hover,
		.header .mega_main_menu .default_dropdown > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .default_dropdown li > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .multicolumn_dropdown > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .widgets_dropdown > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .default_dropdown > ul .widgettitle,
		.header .mega_main_menu .default_dropdown li > ul .widgettitle,
		.header .mega_main_menu .multicolumn_dropdown > ul .widgettitle,
		.header .mega_main_menu .widgets_dropdown > ul .widgettitle,
		.header .mega_main_menu .default_dropdown > ul li.section_header_style > .item_link,
		.header .mega_main_menu .default_dropdown li > ul li.section_header_style > .item_link,
		.header .mega_main_menu .multicolumn_dropdown > ul li.section_header_style > .item_link,
		.header .mega_main_menu .widgets_dropdown > ul li.section_header_style > .item_link {
			color: #fff;
		}

		.iv-layout.header input[type="text"],
		.iv-layout.header input[type="email"],
		.iv-layout.header input[type="password"],
		.iv-layout.header input[type="search"],
		.iv-layout.header textarea,
		.iv-layout.header input[type="submit"],
		.iv-layout.header .live-search input[type="search"]:focus,
		.iv-layout.header .woo-cart .buttons a,
		.iv-layout.header .login-ajax .lwa input:focus,
		.iv-layout.header .login-ajax .lwa input[type="submit"],
		.iv-layout.header input[type="text"]:focus,
		.iv-layout.header input[type="email"]:focus,
		.iv-layout.header input[type="password"]:focus,
		.iv-layout.header input[type="search"]:focus,
		.iv-layout.header textarea:focus,
		.iv-layout.header .live-search .submit-form {
			border-color: #fff;
		}
		
		.iv-layout.header .woo-cart .total,
		.iv-layout.header .login-ajax .lwa .lwa-field .fa,
		.iv-layout.header .login-ajax .lwa .lwa-info li {
			border-color: rgba(255, 255, 255, 0.4);
		}
	<?php
	} else if( ivan_get_option('sub-header-color-scheme') == 'dark' ) {
	?>

		.iv-layout.header input[type="text"],
		.iv-layout.header input[type="email"],
		.iv-layout.header input[type="password"],
		.iv-layout.header input[type="search"],
		.iv-layout.header textarea,
		.iv-layout.header input[type="submit"],
		.iv-layout.header .inner-form,
		.iv-layout.header .inner-form a,
		.iv-layout.header .inner-form a:visited,
		.iv-layout.header .woo-cart .cart_list span,
		.iv-layout.header .woo-cart .cart_list dl dt,
		.iv-layout.header .woo-cart .buttons a,
		.iv-layout.header .login-ajax .lwa input[type="submit"],
		.header .mega_main_menu .default_dropdown > ul,
		.header .mega_main_menu .default_dropdown li > ul,
		.header .mega_main_menu .multicolumn_dropdown > ul,
		.header .mega_main_menu .widgets_dropdown > ul,
		.header .mega_main_menu .default_dropdown > ul a,
		.header .mega_main_menu .default_dropdown li > ul a,
		.header .mega_main_menu .multicolumn_dropdown > ul a,
		.header .mega_main_menu .widgets_dropdown > ul a,
		.header .mega_main_menu .default_dropdown > ul .item_link,
		.header .mega_main_menu .default_dropdown li > ul .item_link,
		.header .mega_main_menu .multicolumn_dropdown > ul .item_link,
		.header .mega_main_menu .widgets_dropdown > ul .item_link,
		.iv-layout.header input[type="text"]:focus,
		.iv-layout.header input[type="email"]:focus,
		.iv-layout.header input[type="password"]:focus,
		.iv-layout.header input[type="search"]:focus,
		.iv-layout.header textarea:focus,
		.iv-layout.header .inner-form a:hover,
		.iv-layout.header .live-search .submit-form,
		.iv-layout.header .login-ajax .lwa .lwa-field .fa,
		.iv-layout.header.dark .inner-form a, 
		.iv-layout.header.light .inner-form a,
		.iv-layout.header.dark .inner-form a:hover, 
		.iv-layout.header.light .inner-form a:hover,
		.header .mega_main_menu .default_dropdown > ul a:hover,
		.header .mega_main_menu .default_dropdown li > ul a:hover,
		.header .mega_main_menu .multicolumn_dropdown > ul a:hover,
		.header .mega_main_menu .widgets_dropdown > ul a:hover,
		.header .mega_main_menu .default_dropdown > ul .item_link:hover,
		.header .mega_main_menu .default_dropdown li > ul .item_link:hover,
		.header .mega_main_menu .multicolumn_dropdown > ul .item_link:hover,
		.header .mega_main_menu .widgets_dropdown > ul .item_link:hover,
		.header .mega_main_menu .default_dropdown > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .default_dropdown li > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .multicolumn_dropdown > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .widgets_dropdown > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .default_dropdown > ul .widgettitle,
		.header .mega_main_menu .default_dropdown li > ul .widgettitle,
		.header .mega_main_menu .multicolumn_dropdown > ul .widgettitle,
		.header .mega_main_menu .widgets_dropdown > ul .widgettitle,
		.header .mega_main_menu .default_dropdown > ul li.section_header_style > .item_link,
		.header .mega_main_menu .default_dropdown li > ul li.section_header_style > .item_link,
		.header .mega_main_menu .multicolumn_dropdown > ul li.section_header_style > .item_link,
		.header .mega_main_menu .widgets_dropdown > ul li.section_header_style > .item_link {
			color: #222;
		}

		.iv-layout.header input[type="text"],
		.iv-layout.header input[type="email"],
		.iv-layout.header input[type="password"],
		.iv-layout.header input[type="search"],
		.iv-layout.header textarea,
		.iv-layout.header input[type="submit"],
		.iv-layout.header .live-search input[type="search"]:focus,
		.iv-layout.header .woo-cart .buttons a,
		.iv-layout.header .login-ajax .lwa input:focus,
		.iv-layout.header .login-ajax .lwa input[type="submit"],
		.iv-layout.header input[type="text"]:focus,
		.iv-layout.header input[type="email"]:focus,
		.iv-layout.header input[type="password"]:focus,
		.iv-layout.header input[type="search"]:focus,
		.iv-layout.header textarea:focus,
		.iv-layout.header .live-search .submit-form {
			border-color: #222;
		}
		
		.iv-layout.header .woo-cart .total,
		.iv-layout.header .login-ajax .lwa .lwa-field .fa,
		.iv-layout.header .login-ajax .lwa .lwa-info li {
			border-color: rgba(0, 0, 0, 0.4);
		}
	<?php } // end header color scheme if...

	// Custom Header Color Scheme
	if( ivan_get_option('sub-header-custom-color') != '' ) {
	?>
		.iv-layout.header input[type="text"],
		.iv-layout.header input[type="email"],
		.iv-layout.header input[type="password"],
		.iv-layout.header input[type="search"],
		.iv-layout.header textarea,
		.iv-layout.header input[type="submit"],
		.iv-layout.header .inner-form,
		.iv-layout.header .inner-form a,
		.iv-layout.header .inner-form a:visited,
		.iv-layout.header .woo-cart .cart_list span,
		.iv-layout.header .woo-cart .cart_list dl dt,
		.iv-layout.header .woo-cart .buttons a,
		.iv-layout.header.dark .inner-form a, 
		.iv-layout.header.light .inner-form a,
		.iv-layout.header.dark .inner-form a:hover, 
		.iv-layout.header.light .inner-form a:hover,
		.iv-layout.header .login-ajax .lwa input[type="submit"],
		.header .mega_main_menu .default_dropdown > ul,
		.header .mega_main_menu .default_dropdown li > ul,
		.header .mega_main_menu .multicolumn_dropdown > ul,
		.header .mega_main_menu .widgets_dropdown > ul,
		.header .mega_main_menu .default_dropdown > ul a,
		.header .mega_main_menu .default_dropdown li > ul a,
		.header .mega_main_menu .multicolumn_dropdown > ul a,
		.header .mega_main_menu .widgets_dropdown > ul a,
		.header .mega_main_menu .default_dropdown > ul .item_link,
		.header .mega_main_menu .default_dropdown li > ul .item_link,
		.header .mega_main_menu .multicolumn_dropdown > ul .item_link,
		.header .mega_main_menu .widgets_dropdown > ul .item_link,
		.iv-layout.header input[type="text"]:focus,
		.iv-layout.header input[type="email"]:focus,
		.iv-layout.header input[type="password"]:focus,
		.iv-layout.header input[type="search"]:focus,
		.iv-layout.header textarea:focus,
		.iv-layout.header .inner-form a:hover,
		.iv-layout.header .live-search .submit-form,
		.iv-layout.header .login-ajax .lwa .lwa-field .fa,
		.header .mega_main_menu .default_dropdown > ul a:hover,
		.header .mega_main_menu .default_dropdown li > ul a:hover,
		.header .mega_main_menu .multicolumn_dropdown > ul a:hover,
		.header .mega_main_menu .widgets_dropdown > ul a:hover,
		.header .mega_main_menu .default_dropdown > ul .item_link:hover,
		.header .mega_main_menu .default_dropdown li > ul .item_link:hover,
		.header .mega_main_menu .multicolumn_dropdown > ul .item_link:hover,
		.header .mega_main_menu .widgets_dropdown > ul .item_link:hover,
		.header .mega_main_menu .default_dropdown > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .default_dropdown li > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .multicolumn_dropdown > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .widgets_dropdown > ul li.current-menu-item > .item_link,
		.header .mega_main_menu .default_dropdown > ul .widgettitle,
		.header .mega_main_menu .default_dropdown li > ul .widgettitle,
		.header .mega_main_menu .multicolumn_dropdown > ul .widgettitle,
		.header .mega_main_menu .widgets_dropdown > ul .widgettitle,
		.header .mega_main_menu .default_dropdown > ul li.section_header_style > .item_link,
		.header .mega_main_menu .default_dropdown li > ul li.section_header_style > .item_link,
		.header .mega_main_menu .multicolumn_dropdown > ul li.section_header_style > .item_link,
		.header .mega_main_menu .widgets_dropdown > ul li.section_header_style > .item_link {
			color: <?php echo ivan_get_option('sub-header-custom-color'); ?>;
		}

		.iv-layout.header input[type="text"],
		.iv-layout.header input[type="email"],
		.iv-layout.header input[type="password"],
		.iv-layout.header input[type="search"],
		.iv-layout.header textarea,
		.iv-layout.header input[type="submit"],
		.iv-layout.header .live-search input[type="search"]:focus,
		.iv-layout.header .woo-cart .cart_list img,
		.iv-layout.header .woo-cart .buttons a,
		.iv-layout.header .login-ajax .lwa input:focus,
		.iv-layout.header .login-ajax .lwa input[type="submit"],
		.iv-layout.header input[type="text"]:focus,
		.iv-layout.header input[type="email"]:focus,
		.iv-layout.header input[type="password"]:focus,
		.iv-layout.header input[type="search"]:focus,
		.iv-layout.header textarea:focus,
		.iv-layout.header .live-search .submit-form,
		.iv-layout.header .custom-text .iv-separator,
		.iv-layout.header .woo-cart .total,
		.iv-layout.header .login-ajax .lwa .lwa-field .fa,
		.iv-layout.header .login-ajax .lwa .lwa-info li {
			border-color: <?php echo iv_adjustColor( ivan_get_option('sub-header-custom-color'), 13); ?>;
		}
	<?php
	}

	$output = ob_get_contents();
	ob_end_clean();
	// Check if can print something...
	if('' != $output) :
		echo '<style type="text/css">' . $output . '</style>';
	endif;// end main check

}
add_action('wp_head', 'ivan_customizer_output', 210);

function iv_adjustColor($hex, $steps) { // 2.55 = 1 %
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}

function iv_is_color_dark( $hex ) {
	$hex = str_replace('#', '', $hex);

	//break up the color in its RGB components
	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));

	//do simple weighted avarage
	//
	//(This might be overly simplistic as different colors are perceived
	// differently. That is a green of 128 might be brighter than a red of 128.
	// But as long as it's just about picking a white or black text color...)
	if($r + $g + $b > 382){
	    return false;
	}else{
	    return true;
	}
}