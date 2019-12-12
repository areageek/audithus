(function ($) {
  'use strict';
  $(document).ready(function () {

    $("#carouselswipper").each(function () { 
      var nav = $('.vc_row'); 
      nav.addClass("swiper-slide");
      var _PerView = $('.swiper-container').attr('data-prev');
      var _PerViewsmall = $('.swiper-container').attr('data-prev-small');
      var _PerViewtab = $('.swiper-container').attr('data-prev-tab');
      var _PerViewmobile = $('.swiper-container').attr('data-prev-mobile');
      var _Perspeed = $('.swiper-container').attr('data-speed');
      var _Perplay = $('.swiper-container').attr('data-play');
      var swiper = new Swiper($(this).find('.swiper-container'), {
        slidesPerView: _PerView,
        spaceBetween: 0,
        autoplay: {
          delay: 6000,
          disableOnInteraction: true,
        },
        fadeEffect: {
          crossFade: true
        },
        speed: 400,
        slidesPerGroup: 1,
        autoResize: true,
        loop:false,
        navigation: {
          nextEl: $(this).find('.swiper-button-next'),
          prevEl: $(this).find('.swiper-button-prev'),
        },
        pagination: {
          el: '.swiper-pagination',  
          clickable: true,
          renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
          },
        },
        breakpoints: {
          1024: {
            slidesPerView: _PerView,
            spaceBetween: 0,
          },
          970: {
            slidesPerView: _PerViewsmall,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: _PerViewtab,
            spaceBetween: 20,
          },
          640: {
            slidesPerView:_PerViewmobile, 
          },
          320: {
            slidesPerView: _PerViewmobile,
            spaceBetween: 10,
          }
        }
      });
    });
  });
}(jQuery));