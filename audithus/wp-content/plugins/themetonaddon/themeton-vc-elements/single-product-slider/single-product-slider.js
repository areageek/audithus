(function($){
    'use strict';
    $(window).load(function(){
        $('.single-product-slide').each(function(){
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 2,
                slidesPerColumn: 1,
                spaceBetween: 0,
                loop:true,
                navigation: {
                    nextEl: _swiper.find('.swiper-button-next'),
                },
                pagination: {
                    el: _swiper.find('.single-swiper-pagination'),
                    clickable: true,
                },
                paginationBulletRender: function (swiper, index, className  ) {
                    var text = $('.single-product-text').eq(_swiper.find('.swiper-slide').eq(index).attr('data-swiper-slide-index')).text();
                    return '<span class="' + className + '">'+text+'</span>';
                },
                breakpoints: {
                    1024: {slidesPerView: 1}
                }

            });
        });
	});
}(jQuery));