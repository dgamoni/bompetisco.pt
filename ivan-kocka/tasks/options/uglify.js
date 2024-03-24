module.exports = {
	all: {
		files: {
			'js/theme-scripts.min.js': ['js/theme-scripts.js'],
			'js/woocommerce/woo-scripts.min.js': ['js/woocommerce/woo-scripts.js'],
			'js/woocommerce/woo-variation.min.js': ['js/woocommerce/woo-variation.js']
		},
		options: {
			banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
			' * <%= pkg.homepage %>\n' +
			' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
			' * Licensed GPLv2+' +
			' */\n',
			mangle: {
				except: ['jQuery']
			}
		}
	}
};
