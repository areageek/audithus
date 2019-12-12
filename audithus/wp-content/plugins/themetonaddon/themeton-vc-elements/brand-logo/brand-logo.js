(function($){
    'use strict';
    $(document).ready(function(){
        $('.brand-logo').each(function(){
            var _slider = $(this),
                _col = _slider.data('col'),
                _row = _slider.data('row'),
                _perView = _col * _row;
            var swiper = new Swiper(_slider.find('.swiper-container'), {
                slidesPerView: _col,
                spaceBetween: 30,
                slidesPerGroup: 3,
                loop: true,
                loopFillGroupWithBlank: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: _slider.find('.swiper-button-next'),
                    prevEl: _slider.find('.swiper-button-prev'),
                },
            });
        });
    });
}(jQuery));