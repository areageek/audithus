(function($){
    'use strict';
    $(document).ready(function(){
		$('.single-product-gallery-container').each(function(){
			var _swiper = $(this);
			var swiper = new Swiper(_swiper, {
				slidesPerView: 1,
				navigation: {
	                nextEl: _swiper.find('.swiper-button-next'),
	                prevEl: _swiper.find('.swiper-button-prev'),
	            },
				pagination: {
					el: '.swiper-pagination',
					clickable: true,
				},
				spaceBetween: 0,
			});
		});
	});
}(jQuery));