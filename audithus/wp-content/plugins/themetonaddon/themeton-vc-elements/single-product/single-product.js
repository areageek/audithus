(function($){
    'use strict';

    $(window).load(function(){
        $(document).ready(function(){ 
            $('.woo-product-thumbnail').each(function(){
                var _swiper = $(this);
                var swiper = new Swiper(_swiper, {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    pagination: {
                        clickable: true,
                        el: '.swiper-pagination',    
                    }
                });
            });
    
            $('.woo-product-thumbnail-style-2').each(function(){
                var _swiper = $(this);
                var swiper = new Swiper(_swiper, {
                    slidesPerView: 2,
                    loop:true,
                    spaceBetween: 0,
                    navigation: {
                        nextEl: _swiper.find('.woo-button-next'),
                        prevEl: _swiper.find('.woo-button-prev'),
                    },
                    pagination: {
                        clickable: true,
                    }
                });
            });
        });
    });

}(jQuery));