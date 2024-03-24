module.exports = {
	options: {
		banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
		' * <%=pkg.homepage %>\n' +
		' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
		' * Licensed GPLv2+' +
		' */\n'
	},
	theme_styles: {
		expand: true,

		cwd: 'css/',
		src: ['theme-styles.css'],

		dest: 'css/',
		ext: '.min.css'
	},
    rtl_styles: {
		expand: true,

		cwd: 'css/',
		src: ['rtl.css'],

		dest: 'css/',
		ext: '.min.css'
	},
    woo: {
		expand: true,

		cwd: 'css/woocommerce/',
		src: ['woocommerce.css'],

		dest: 'css/',
		ext: '.min.css'
	},
    woo_layout: {
		expand: true,

		cwd: 'css/woocommerce/',
		src: ['woocommerce-layout.css'],

		dest: 'css/',
		ext: '.min.css'
	},
    woo_smallscreen: {
		expand: true,

		cwd: 'css/woocommerce/',
		src: ['woocommerce-smallscreen.css'],

		dest: 'css/',
		ext: '.min.css'
	}
};
