(function($){
    'use strict';
    $(document).ready(function(){

	    if ($('.masonry-layout').length) {
			var $masonry = $('.masonry-layout');
            $masonry.isotope({
                itemSelector: '.masonry-item',
                masonry: {
                	columnWidth: 1
                }
            });
        }
        $('.jew-blog').each(function(){
           
            if ($('.jew-blog').length) {
                var $masonry = $('.jew-blog');
                $masonry.isotope({
                    itemSelector: '.jewitem',
                    masonry: {
                        columnWidth: 1,
                        gutter: 30,
                    }
                });
            }
        });
    });
    $(window).load(function(){
        var len = $('.bushido-blog-owl-grid').attr('data-kendoshow');
        if (len > 2 ) var mlen=len-1;
        else var mlen=len;
        $('.bushido-blog-owl-grid').owlCarousel({
                loop:true,
                margin:80,
                dots:true,
                autoHeight:true,
                responsiveClass:true,
                responsive:{
                        0:{
                                items:1,
                        },
                        600:{
                                items:1,
                        },
                        1000:{
                                items:1,
                                loop:false
                        }
                }
        });

    });
}(jQuery));