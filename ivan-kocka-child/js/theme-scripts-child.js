/**
 * Theme Scripts Child Theme
**/

jQuery(document).ready(function($) {
	

    $('.moree').click(function(e) {
    	console.log('click');
        e.preventDefault();
        // $('.term-wrap_164').show();
        // $('.term-wrap_165').show();
        $('.more_none').show();
        //$('.moree').hide();
        var destination = $('.ivan-projects-main-wrapper').offset().top + 350;
		$('body,html').animate({scrollTop: destination}, 400);

    });

});