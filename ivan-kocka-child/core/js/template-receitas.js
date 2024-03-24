

jQuery(document).ready(function($){


// search by term

	$(document).on('click', '.product_category-el, .product_tags-el', function (e) {
		e.preventDefault();
		var this_el = $(this);
		var termid = $(this).attr('data-termid');
		var termname = $(this).attr('data-termname');
		var tax = $(this).attr('data-tax');

		var tax_cat = $('.resultado').attr('data-cat').split(',');
		var tax_tag = $('.resultado').attr('data-tag').split(',');
		tax_cat = jQuery.grep(tax_cat, function(n){ return (n); });
		tax_tag = jQuery.grep(tax_tag, function(n){ return (n); });


		if ( tax == 'ivan_vc_projects_cats' ) {
			tax_cat.push(termid);
		}
		if ( tax == 'receitas_tags' ) {
			tax_tag.push(termid);
		}


		$('.projects_cats_filter-result').css({
			'opacity': 0.3
		});
		this_el.css({
			'opacity': 0.3
		});
        $.ajax({
                type    : "POST",
                url     : js_url.ajaxurl,
                dataType: "json",
                data    : "action=get_recept&termid=" + termid + "&termname=" + termname + "&tax_cat=" + tax_cat+ "&tax_tag=" + tax_tag,
                success : function (data) {
                    console.log(data);
                    $('.resultado').attr('data-cat', data['tax_cat']);
                    $('.resultado').attr('data-tag', data['tax_tag']);
                    console.log( data['content'].length );
                    if ( data['content'].length > 0) { 
                    	$('.projects_cats_filter-result').html(data['content']);
                    } else {
						$('.projects_cats_filter-result').html('<div class="content_none">Nada encontrado !</div>');
                    }
                    

                    $('.projects_cats_filter-result-title').show();
                    //$('.resultado').html('<span data-tax="'+tax+'" data-id="'+termid+'" class="resultado-el">'+termname+'</span>');

                    $('.resultado').html('');
                    $.each(data['terms_cat'], function(index, val) {
                    	 $('.resultado').append('<span data-tax="ivan_vc_projects_cats" data-termid="'+index+'" class="resultado-el el-cats">'+val+'</span>');
                    });
                    $.each(data['terms_tag'], function(index, val) {
                    	 $('.resultado').append('<span data-tax="receitas_tags" data-termid="'+index+'" class="resultado-el el-tags">'+val+'</span>');
                    });                    

                    jQuery('.projects_cats_filter-result').css({
						'opacity': 1
					});
					this_el.css({
						'opacity': 1
					});					
                    var destination = $('.projects_cats_filter-result').offset().top - 200;
					$('body,html').animate({scrollTop: destination}, 400);
					

                }
            }); //end ajax  

	});


// delete element

	$(document).on('click', '.resultado-el', function (e) {
		e.preventDefault();
		var this_el = $(this);
		var termid = $(this).attr('data-termid');
		var termname = $(this).text();
		var tax = $(this).attr('data-tax');

		var tax_cat = $('.resultado').attr('data-cat').split(',');
		var tax_tag = $('.resultado').attr('data-tag').split(',');
		//tax_cat = jQuery.grep(tax_cat, function(n){ return (n); });
		tax_tag = jQuery.grep(tax_tag, function(n){ return (n); });
		tax_cat = jQuery.grep(tax_cat, function(value) {
		  return value != termid;
		});
		tax_tag = jQuery.grep(tax_tag, function(value) {
		  return value != termid;
		});

		// if ( tax == 'ivan_vc_projects_cats' ) {
		// 	tax_cat.push(termid);
		// }
		// if ( tax == 'receitas_tags' ) {
		// 	tax_tag.push(termid);
		// }


		$('.projects_cats_filter-result').css({
			'opacity': 0.3
		});
		// this_el.css({
		// 	'opacity': 0.3
		// });
        $.ajax({
                type    : "POST",
                url     : js_url.ajaxurl,
                dataType: "json",
                data    : "action=get_recept&termid=" + termid + "&termname=" + termname + "&tax_cat=" + tax_cat+ "&tax_tag=" + tax_tag,
                success : function (data) {
                    console.log(data);
                    $('.resultado').attr('data-cat', data['tax_cat']);
                    $('.resultado').attr('data-tag', data['tax_tag']);
                    console.log( data['content'].length );
                    if ( data['content'].length > 0) { 
                    	$('.projects_cats_filter-result').html(data['content']);
                    } else {
						$('.projects_cats_filter-result').html('<div class="content_none">Nada encontrado !</div>');
                    }
                    

                    $('.projects_cats_filter-result-title').show();
                    //$('.resultado').html('<span data-tax="'+tax+'" data-id="'+termid+'" class="resultado-el">'+termname+'</span>');

                    $('.resultado').html('');
                    $.each(data['terms_cat'], function(index, val) {
                    	 $('.resultado').append('<span data-tax="ivan_vc_projects_cats" data-termid="'+index+'" class="resultado-el el-cats">'+val+'</span>');
                    });
                    $.each(data['terms_tag'], function(index, val) {
                    	 $('.resultado').append('<span data-tax="receitas_tags" data-termid="'+index+'" class="resultado-el el-tags">'+val+'</span>');
                    });                    

                    jQuery('.projects_cats_filter-result').css({
						'opacity': 1
					});
					// this_el.css({
					// 	'opacity': 1
					// });					
                    var destination = $('.projects_cats_filter-result').offset().top - 200;
					$('body,html').animate({scrollTop: destination}, 400);
					

                }
            }); //end ajax  

	});

// autocomplete 
	// var searchRequest;
	// $('.search-autocomplete').autoComplete({
	// 	minChars: 2,
	// 	source: function(term, suggest){
	// 		try { searchRequest.abort(); } catch(e){}
	// 		searchRequest = $.post(js_url.ajaxurl, { search: term, action: 'search_site' }, function(res) {
	// 			suggest(res.data);
	// 		});
	// 	}
	// });




}); 