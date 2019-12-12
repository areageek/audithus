(function($){
	"use strict";

	$('[data-number-style]').each(function(){
		var _ul = $(this).find('ul li');
		$(_ul).each(function(){
			if ( $(this).text() < 10 && $(this).text() != '' ) {
				$(this).find('span').text('0'+$(this).text());
				$(this).find('a').text('0'+$(this).text());
			}
		});
	});
  
	$(window).load(function(){
		$('.meissa-owl').owlCarousel({
			margin:10,
			dots:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
				},
				600:{
					items:2,
				},
				1000:{
					items:3,
					loop:true
				}
			}
		});
	});

})(jQuery);