;(function($){
    'use strict';
    $(document).ready(function(){
        $(function() {
            var owl = $('.owl-carousel').owlCarousel({
                loop	:true,
                margin	:30,
                dots: true,
                pagination: true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    768:{ 
                        items:1
                    },
                    1000:{
                        items:3
                    }
                }
            })

            /* animate filter */
            var owlAnimateFilter = function(even) {
                $(this)
                .addClass('__loading')
                .delay(70 * $(this).parent().index())
                .queue(function() {
                    $(this).dequeue().removeClass('__loading')
                })
            }
    
            $('.filtera ').on('click', '.filter-item', function(e) {
                var filter_data = $(this).data('filter'); 
                /* return if current */
                if($(this).hasClass('active')) return;
    
                /* active current */
                $(this).addClass('active').siblings().removeClass('active');
    
                /* Filter */
                owl.owlFilter(filter_data, function(_owl) { 
                    $(_owl).find('.item').each(owlAnimateFilter); 
                });
            })
        })

    });
    
}(jQuery));