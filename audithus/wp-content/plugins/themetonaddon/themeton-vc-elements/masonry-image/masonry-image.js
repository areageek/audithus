(function($){
	'use strict';
    $(document).ready(function(){
        $('.simple-image').each(function(){
            $(this).isotope({
                layoutMode: 'packery',
                itemSelector: '.image-item',
                packery: {
                    gutter: 30 
                }
            });
        }); 
    });
}(jQuery));