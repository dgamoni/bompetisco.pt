module.exports = {
	livereload: {
		files: ['css/*.css'],
		options: {
			livereload: true
		}
	},
	styles: { 
		files: ['css/**/*.less'],
		tasks: ['less', 'postcss', 'cssmin'],
		options: {
			debounceDelay: 500
		}
	},
	scripts: {
		files: ['js/src/**/*.js', 'js/woocommerce/src/**/*.js'],
			tasks: ['jshint', 'concat', 'uglify'],
			options: {
			debounceDelay: 500
		}
	}
};