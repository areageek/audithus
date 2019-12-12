(function($){
	'use strict';
	$(window).load(function(){
		$('.upking-team-owl').owlCarousel({
				loop:true,
				margin:70,
				nav:true,
				dots:false,
				autoHeight:true,
				responsiveClass:true,
				responsive:{
						0:{
								items:1,
						},
						600:{
								items:1,
						},
						1000:{
								items:3,
								loop:true
						}
				}
		});
		$('.upking-team-owl').find('.owl-stage-outer').addClass('uk-width-2-3');
		$('.upking-team-owl').find('.owl-controls').addClass('uk-width-1-3 uk-flex-first uk-visible@s');
		$('.upking-team-owl').find('.owl-controls').find('.owl-nav').addClass('uk-flex uk-flex-center');
		var _cnr = $('.upking-team-owl');
		$('.upking-team-owl').find('.owl-controls').prepend('<div class="upking-title"><h1>'+_cnr.data('team-title')+'</h1><h3>'+_cnr.data('team-subtitle')+'</h3></div>');
		$('.upking-team-owl').find('.owl-controls').find('.owl-prev').html('<span class="uk-icon" data-uk-icon="icon: chevron-left; ratio: 1.5"></span>');
		$('.upking-team-owl').find('.owl-controls').find('.owl-next').html('<span class="uk-icon" data-uk-icon="icon: chevron-right; ratio: 1.5"></span>');
		//
	});
	
}(jQuery));