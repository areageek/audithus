(function($){
    'use strict';
    $(document).ready(function(){
        if($('#instafeed').length > 0) {
            var id = $('#instafeed').attr('data-id');
            var token = $('#instafeed').attr('data-token');
            var count = $('#instafeed').attr('data-count');
            var feed = new Instafeed({
                get: 'user',
                userId: id,
                accessToken: token,
                limit: count,
                resolution: 'standard_resolution',
                template: '<li class=\"item\"><div class=\"item-content\"><a href=\"{{link}}\" target=\"_blank\"><img src=\"{{image}}\" /></a><div class=\"item-hover\"><span><i class=\"fa fa-heart-o\"></i> {{likes}}</span> </div></div></li>',
            });

            feed.run();
        }
    });
}(jQuery));