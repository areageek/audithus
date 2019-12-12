(function($){
    'use strict';

    $('[data-thumbd]').each(function(){
        var img_url = $(this).attr('data-thumbd');
        $(this).css({
            'background-image':'url(' + img_url + ')',
            'background-size': 'cover'
        });
    });

})(jQuery);