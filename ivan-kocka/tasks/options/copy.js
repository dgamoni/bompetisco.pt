module.exports = {
	// Copy the theme to a versioned release directory
	main: {
		expand: true,
		src:  [
			'**',
			'!**/.*',
			'!**/readme.md',
			'!node_modules/**',
			'!vendor/**',
			'!tests/**',
			'!release/**',
			//'!css/less/**',
			//'!js/src/**',
			//'!js/woocommerce/src/**',
			'!bootstrap.php',
			'!bower.json',
			'!composer.json',
			'!composer.lock',
			//'!Gruntfile.js',
			//'!package.json',
			'!phpunit.xml',
			'!phpunit.xml.dist',
			'!koala-config.json',
			'!config.codekit',
			'!.gitignore',
			'!.gitattributes'
		],
		dest: 'release/<%= pkg.version %>/'
	}
};