;(function($){
    'use strict';

    $(document).ready(function(){
        
        //OUR SERVICES
        $('.service').on('click',function(){
            var $t = $(this);
            var tabFinish;
            if(tabFinish || $t.hasClass('active')) return false;
            tabFinish = 1;
            $t.closest('.serv').find('.service').removeClass('active-item');
            $t.addClass('active-item');
            var index = $t.parent().find('.service').index(this);
            $t.closest('.serv').find('.serv-description:visible').fadeOut(500, function(){
                $t.closest('.serv').find('.serv-description').eq(index).fadeIn(500,
                    function() {
                        tabFinish = 0;

                    });
            });
        });

        // VC tabs
        $('.wpb_tour_extended').each(function(){
            var $tabs = $(this);
            var type = typeof $tabs.attr('data-style')!=='undefined' ? $tabs.attr('data-style') : 'default';
            var show_number = typeof $tabs.attr('data-number')!=='undefined' ? $tabs.attr('data-number') : 'yes';
            var show_sub = typeof $tabs.attr('data-subtitle')!=='undefined' ? $tabs.attr('data-subtitle') : 'yes';
            var bgimage = typeof $tabs.attr('data-bgimage')!=='undefined' ? $tabs.attr('data-bgimage') : '';
            var brightness = typeof $tabs.attr('data-brightness')!=='undefined' ? $tabs.attr('data-brightness') : '';
            $tabs.find('.vc_tta-tabs-list').addClass('uk-grid');
            if( type=='service' ){

                var $heads = $('<div class="uk-width-1-3@m uk-width-1-1@s tour_nav  uk-text-right"><h3 class="nav_title">'+show_sub+'</h3></div>').append('<div class="enrty-hover"></div><div class="serv-item"><ul class="tab_list"></ul></div>');
                $tabs.find('.vc_tta-tabs-list li').each(function(index){
                    var $div = $('<li class="service mb3 uk-flex uk-flex-middle "></li>');
                    var $panel = $tabs.find('div.vc_tta-panel').eq(index);
                    var icon = $panel.data('icon')+'';
                    var number = $panel.data('number');
                    var title = $tabs.find('.vc_tta-tabs-list li ').eq(index).find('a').text();
                    var subtitle = $panel.data('subtitle');
                  
                    $div.append( '<div class="uk-width-1-1 uk-text-left"><h5 class="content_title">'+title+'</h5></div>' );

                    $heads.find('.tab_list').append( $div );
                });

                var $tab_contents = $('<div class="uk-width-2-3@m uk-width-1-1@s"><div class="services"></div></div>');
                $tabs.find('div.vc_tta-panel').each(function(index){
                    var $div = $('<div class="serv-description"></div>')
                    $div.append( $(this).html() );
                    $tab_contents.find('.services').append( $div );
                });

                $tabs.html('<div class="uk-grid uk-flex uk-flex-middle pv3"></div>');
                $tabs.find('.uk-grid').append($heads).append( $tab_contents );

                $tabs.find('.serv-item .service').each(function(index){
                    var $this = $(this);
                    $this.on('click', function(){
                        $tabs.find('.serv-item .service').removeClass('active-item');
                        $(this).addClass('active-item');

                        $tabs.find('.serv-description').hide();
                        $tabs.find('.serv-description').eq(index).fadeIn();
                    });
                });

                $tabs.find('.serv-item .service').eq(0).trigger('click');

                $tabs.find('.bg-serv').css({
                    'background-image': 'url('+bgimage+')'
                });
            }

        });

        if($(window).width() <= 768) {
            $('.show-progress').on('click', function(){
                var tabOffsetTop = $(this).parent().parent().find('.process-info').eq( $(this).index() ).offset().top - 90;
                $('html, body').animate({scrollTop: tabOffsetTop}, 1500);
            });
        }
    });
    
}(jQuery));