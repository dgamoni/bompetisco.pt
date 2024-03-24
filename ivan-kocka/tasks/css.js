module.exports = function (grunt) {
	grunt.registerTask( 'css', ['less', 'postcss', 'cssmin'] );
};