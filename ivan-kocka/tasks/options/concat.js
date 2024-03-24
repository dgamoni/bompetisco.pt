module.exports = {
	options: {
		stripBanners: true,
			banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
		' * <%= pkg.homepage %>\n' +
		' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
		' * Licensed GPLv2+' +
		' */\n'
	},
	main: {
		src: [
			'js/src/_plugins.js',
			'js/src/_theme-scripts.js',
		],
		dest: 'js/theme-scripts.js'
	},
    woocommerce: {
		src: [
			'js/woocommerce/src/_woo-scripts.js'
		],
		dest: 'js/woocommerce/woo-scripts.js'
	},
    woocommerce_variation: {
		src: [
			'js/woocommerce/src/_woo-variation.js'
		],
		dest: 'js/woocommerce/woo-variation.js'
	}
};
