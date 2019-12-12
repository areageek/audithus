
(function($){
    'use strict';

    $(document).ready(function(){
      

    var nxtPortfilio = window.nxtPortfilio || {},
    $win = $( window );
    

/*
|--------------------------------------------------------------------------
| isotope
|--------------------------------------------------------------------------
|
|
|
*/      

    nxtPortfilio.Isotope = function () {
    
        // 4 column layout
        var isotopeContainer = $('.portfolio-element');
 
        if( !isotopeContainer.length || !jQuery().isotope ) return;
        $win.load(function(){
            isotopeContainer.isotope({
                itemSelector: '.portfolio-items'
            });
        $('.portfolio-filter').on( 'click', 'a', function(e) {
                $('.portfolio-filter').find('.active').removeClass('active');
                $(this).parent().addClass('active');
                var filterValue = $(this).attr('data-filter');
                isotopeContainer.isotope({ filter: filterValue });
                e.preventDefault();
            });
        });
    };
    


    
    nxtPortfilio.Isotope();

    
    });
}(jQuery));