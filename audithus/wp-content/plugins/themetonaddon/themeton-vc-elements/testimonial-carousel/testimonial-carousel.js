(function($){
    'use strict';

    $(document).ready(function(){

        $(".nxt-testimonial").each(function() {
            var _PerView = $('.nxt-testimonial').attr('data-prev');

            var galleryTop = new Swiper($(this).find('.swiper-container:not(.gallery-thumbs)'), {
                slidesPerView: _PerView,
                navigation: {
                    nextEl: $(this).find('.swiper-button-next'),
                    prevEl: $(this).find('.swiper-button-prev'),
                },
                //spaceBetween: 30,
                effect: 'slide',                
               
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                  },
                breakpoints: {
                    // when window width is <= 320px
                    320: {
                      slidesPerView: 1,
                    },
                    480: {
                      slidesPerView: 1,
                    },
                    640: {
                      slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 1
                    }
                },
                renderBullet: function (index, className) {
                    return '<li class="' + className + '"><span class="tp-bullet-inner"></span></li>';
                },
                paginationClickable: true,
            });

            if($(this).find('.gallery-thumbs').length){
                var galleryThumbs = new Swiper($(this).find('.gallery-thumbs'), {
                    spaceBetween: 10,
                    centeredSlides: true,
                    //loop: true,
                    slidesPerView: 'auto',
                    touchRatio: 0.2,
                    slideToClickedSlide: true
                });
                galleryTop.controller.control = galleryThumbs;
                galleryThumbs.controller.control = galleryTop;
            }
        });


        $(".nxt-testimonial-two").each(function() {
            var _PerView = $('.nxt-testimonial-two').attr('data-prev');
            var sliderTop = new Swiper($(this).find('.swiper-container:not(.gallery-thumbs)'), {
                slidesPerView: _PerView,
                loop:true,
                navigation: {
                    nextEl: $(this).find('.swiper-button-next'),
                    prevEl: $(this).find('.swiper-button-prev'),
                },
                breakpoints: {
                    // when window width is <= 320px
                    320: {
                      slidesPerView: 1,
                    },
                    480: {
                      slidesPerView: 1,
                    },
                    640: {
                      slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 1
                    }
                },
            });
            if($(this).find('.gallery-thumbs').length){
                var sliderThumbs = new Swiper($(this).find('.gallery-thumbs'), {
                    spaceBetween: 2,
                    centeredSlides: true,
                    slidesPerView:3,
                    loop:true,
                    slideToClickedSlide: true,
                    breakpoints: {
                        // when window width is <= 320px
                        320: {
                          slidesPerView: 1,
                        },
                        480: {
                          slidesPerView: 1,
                        },
                        640: {
                          slidesPerView: 1
                        },
                        768: {
                            slidesPerView: 1
                        }
                    },
                });
            
                sliderTop.controller.control = sliderThumbs;
                sliderThumbs.controller.control = sliderTop;
            }
        });
     });
}(jQuery));