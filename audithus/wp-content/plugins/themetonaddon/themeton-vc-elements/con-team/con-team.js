(function($){
	'use strict';

	$(document).ready(function(){

		$('.mungu-team-container').each(function(){
			var _swiper = $(this);
			var column = 4;
			var attr = $(this).attr('data-col');
			if (typeof attr !== typeof undefined && attr !==  false) {
			    column = $(this).attr('data-col');
			}
			var swiper = new Swiper('.mungu-team-container', {
				slidesPerView: 4,
				spaceBetween: 30,
				slidesPerGroup: 4,
				loop: true,
				loopFillGroupWithBlank: true,
				pagination: {
				  el: '.swiper-pagination',
				  clickable: true,
				},
				navigation: {
				  nextEl: '.swiper-button-next',
				  prevEl: '.swiper-button-prev',
				},
			  });
	
		});

	});   

	$(window).load(function(){
			var len = $('.bushido-team-owl').attr('data-kendoshow');
			if (len > 2 ) var mlen=len-1;
			else var mlen=len;
			$('.bushido-team-owl').owlCarousel({
				loop:true,
				margin:10,
				dots:true,
				responsiveClass:true,
				responsive:{
					0:{
						items:1,
					},
					600:{
						items:mlen,
					},
					1000:{
						items:len,
						loop:true
					}
				}
		});
		$('.bushido-team-owl-grid').owlCarousel({
				loop:true,
				margin:10,
				dots:true,
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
						items:1,
						loop:false
					}
				}
		});
		$('.hover-team-owl').owlCarousel({
			loop:true,
			margin:80,
			dots:true,
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

	});
	
}(jQuery));