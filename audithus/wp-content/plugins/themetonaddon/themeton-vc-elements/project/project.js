(function($){
	'use strict';

	 $(document).ready(function(){

        $('.project-items').each(function(){
            var $this = $(this)
            var swiper = new Swiper($this.find('.project-completed'), {
                slidesPerView: 5,
			    spaceBetween: 20,
			    centeredSlides: true,
			    loop:true,
                autoplay:6000,
                navigation: {
                	nextEl: $this.find('.swiper-button-next'),
                	prevEl: $this.find('.swiper-button-prev'),
                }
            });

        });
        $('.swiper-container-feautured-project').each(function(){
			var _swiper = $(this);
			var swiper = new Swiper(_swiper, {
			    pagination: {
			    	el: '.swiper-pagination',
			    	clickable: true
			    },
			    hashnav: true,
			    navigation: {
			    	nextEl: $this.find('.swiper-button-next'),
			    	prevEl: $this.find('.swiper-button-prev'),
			    }
			});
		});
    });	
}(jQuery));