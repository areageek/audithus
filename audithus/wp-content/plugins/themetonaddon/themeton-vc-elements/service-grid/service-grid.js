(function($){
    'use strict';

    $(document).ready(function(){
        $('.nxt-service-icon').each(function(){
            var $this = $(this),
                _col = $this.data('col'),
                _row = $this.data('row'),
                _perView = _col * _row;

            var swiper = new Swiper($this.find('.swiper-container'), {
                slidesPerView: _col,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                renderBullet: function (swiper, index, className) {
                    return '<li class="' + className + '"><span class="tp-bullet-inner"></span></li>';
                },
                spaceBetween: 30,
                navigation: {
                    nextEl: $this.find('.swiper-button-next'),
                    prevEl: $this.find('.swiper-button-prev'),
                },
                breakpoints: {
                    1080: {
                        slidesPerView: 3,
                        slidesPerGroup: 3
                    },
                    768: {
                        slidesPerView: 2,
                        slidesPerGroup: 2
                    },
                    480: {
                        slidesPerView: 1,
                        slidesPerGroup: 1
                    }
                }
            });
        });        
    });
}(jQuery));