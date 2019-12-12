(function($){
    'use strict';
    $('.woo-themeton-children').each(function(){
        var _this = $(this);
        _this.on('click',function(){
            $(_this).find('ul').toggle('slow');
            if ($(_this).hasClass('active')) $(_this).removeClass('active');
            else $(_this).addClass('active');
        });
    });
}(jQuery));