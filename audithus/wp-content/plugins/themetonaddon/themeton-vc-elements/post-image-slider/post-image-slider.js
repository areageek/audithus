(function($){
    'use strict';

    $(document).ready(function(){  

        $('.post-feature-image').each(function(){
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 3,
                spaceBetween: 30,
                pagination: {
                    el:'.swiper-pagination',
                    clickable: true,
                    type: 'bullets'
                },
                renderBullet: function (swiper, index, className) {
                    return '<li class="' + className + '"><span class="tp-bullet-inner"></span></li>';
                },                
                breakpoints: {
                    1024: {
                      slidesPerView: 1
                    }
                }
            });
        });
            
    });
}(jQuery));