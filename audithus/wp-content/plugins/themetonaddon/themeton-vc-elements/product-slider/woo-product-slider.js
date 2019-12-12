(function($){
    'use strict';
    $(document).ready(function(){  
        
        $('.post-product-thumb').each(function(){
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 5,
                spaceBetween: 0,
                breakpoints: {
                    1024: {
                        slidesPerView: 1
                    }
                }
            });
        });

        $('div[data-woo-product]').each(function(){
            var _this = $(this);
            var _img = _this.attr('data-woo-product');
            _this.css({
                'background':'url('+ _img +')',
                'background-size' : 'cover'
            });
        });

        $('.post-product-slide').each(function(){
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 3,
                slidesPerColumn: 2,
                spaceBetween: 0,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                paginationBulletRender: function (swiper, index, className  ) {
                    return '<span class="' + className + '">'+0+''+(index + 1) + '</span>';
                },
                breakpoints: {
                    1024: {
                      slidesPerView: 1
                    }
                }

            });

        });
        $('.post-product-slide-thumb').each(function(){
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 3,
                spaceBetween: 30,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                paginationBulletRender: function (swiper, index, className  ) {
                    return '<span class="' + className + '">'+0+''+(index + 1) + '</span>';
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