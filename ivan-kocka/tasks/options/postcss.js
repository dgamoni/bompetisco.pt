module.exports = {
	dist: {
		options: {
			processors: [
				require('autoprefixer')({browsers: 'last 2 versions'}),
				require('postcss-flexibility')
			]
		},
		files: { 
			'css/theme-styles.css': [ 'css/theme-styles.css' ],
			'css/rtl.css': [ 'css/rtl.css' ],
			'css/woocommerce/css/woocommerce.css': [ 'css/woocommerce/css/woocommerce.css' ],
			'css/woocommerce/css/woocommerce-layout.css': [ 'css/woocommerce/css/woocommerce-layout.css' ],
			'css/woocommerce/css/woocommerce-smallscreen.css': [ 'css/woocommerce/css/woocommerce-smallscreen.css' ]
		}
	}
};
