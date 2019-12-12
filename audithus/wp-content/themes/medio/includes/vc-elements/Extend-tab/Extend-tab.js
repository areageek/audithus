;(function($){
    'use strict';

    $(document).ready(function(){
        //VARIABLES

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


        $('.process').on('click', function(){
            var $t = $(this);
            var tabFinish;
            if(tabFinish || $t.hasClass('active')) return false;
            tabFinish = 1;
            $t.closest('.work-process').find('.process').removeClass('active-process');
            $t.addClass('active-process');
            var index = $t.parent().parent().find('.process').index(this);
            $t.closest('.work-process').find('.process-info:visible').fadeOut(500, function(){
                $t.closest('.work-process').find('.process-info').eq(index).fadeIn(500, function() {
                    tabFinish = 0;

                });
            });
        });

        // VC tabs
        $('.wpb_tabs_extended').each(function(){
            var $tabs = $(this);
            var type = typeof $tabs.attr('data-style')!=='undefined' ? $tabs.attr('data-style') : 'default';
            var show_number = typeof $tabs.attr('data-number')!=='undefined' ? $tabs.attr('data-number') : 'yes';
            var show_sub = typeof $tabs.attr('data-subtitle')!=='undefined' ? $tabs.attr('data-subtitle') : 'yes';
            var bgimage = typeof $tabs.attr('data-bgimage')!=='undefined' ? $tabs.attr('data-bgimage') : '';
            var brightness = typeof $tabs.attr('data-brightness')!=='undefined' ? $tabs.attr('data-brightness') : '';

            $tabs.find('.vc_tta-tabs-list').addClass('uk-grid');
            if( type=='process' ){

                var count_nav = $tabs.find('.vc_tta-tabs-list li').length;
                var nav_count = parseInt(12/count_nav, 10);
                var nav_counts = parseInt(12/nav_count, 10);
                var nav_class = 'uk-width-auto uk-padding uk-width-1-2';
               

                var $heads = $('<div class="uk-grid uk-flex-center"></div>');
                $tabs.find('.vc_tta-tabs-list li').each(function(index){
                    var $div = $('<div class="'+nav_class+'"></div>').append('<div class="process"></div>');
                    var $panel = $tabs.find('div.vc_tta-panel').eq(index);
                    var icon = $panel.data('icon')+'';
                    var number = $panel.data('number');
                    var subtitle = $panel.data('subtitle');

                    if( icon!='' ){
                        if( icon.length>4 && icon.substring(0,4)=='http' ) {
                            $div.find('.process').append( '<img src="'+icon+'"  alt="Tab title"/>' );
                        }
                        else {
                            $div.find('.process').append( '<i class="'+icon+'"></i>' );
                        }
                    }
                    $div.find('.process').append( $('<h6></h6>').append( $(this).find('a').text() ) );
                    if( typeof number!=='undefined' && number!='' && show_number=='yes' ){
                        $div.find('.process').append( '<div class="number"><p>'+number+'</p></div>' );
                        $div.addClass('show-progress');
                    }

                    $heads.append( $div );
                });


                var $tab_contents = $('<div class="tab-container"></div>');
                $tabs.find('div.vc_tta-panel').each(function(){
                    var $div = $('<div class="uk-width-1-1  process-info"></div>')
                    $div.append( $(this).html() );
                    $tab_contents.append( $div );
                });

                $tabs.html( $heads ).append($tab_contents);

                $tabs.find('.process').each(function(index){
                    var $btn = $(this);
                    $btn.on('click', function(){
                        if( !$(this).hasClass('active-process') ){
                            $tabs.find('.process').removeClass('active-process');
                            $btn.addClass('active-process');

                            $tabs.find('.process-info').hide();
                            $tabs.find('.process-info').eq(index).fadeIn('slow');

                            $tabs.find('.process').each(function(j){
                                var $p = $(this);
                                if( j<=index ){
                                    setTimeout(function(){
                                        $p.addClass('process-on');
                                    }, (j-1)*400);
                                }
                                else{
                                    $(this).removeClass('process-on');
                                }
                            });
                        }
                    });
                });

                $tabs.find('.process').eq(0).trigger('click');

            }
            else if( type=='service' ){

                var $heads = $('<div class="uk-width-1-3@m uk-width-1-1@s mt3"></div>').append('<div class="serv-item"><ul class="tab_list"></ul></div>');
                $tabs.find('.vc_tta-tabs-list li').each(function(index){
                    var $div = $('<li class="service uk-grid uk-flex uk-flex-middle mb2"></li>');
                    var $panel = $tabs.find('div.vc_tta-panel').eq(index);
                    var icon = $panel.data('icon')+'';
                    var number = $panel.data('number');
                    var title = $tabs.find('.vc_tta-tabs-list li ').eq(index).find('a').text();
                    var subtitle = $panel.data('subtitle');

                
                    $div.append( '<div class="uk-width-1-4@m uk-width-1-1@s uk-flex uk-flex-middle"><span class="number">'+number+'</span></div>' );
                    $div.append( '<div class="uk-width-3-4@m uk-width-1-1@s uk-text-left"><h3 class="content_title">'+title+'</h3> <span class="subtitle">'+subtitle+'</span></div>' );

                    $heads.find('.tab_list').append( $div );
                });

                var $tab_contents = $('<div class="uk-width-2-3@m uk-width-1-1@s bg-serv"><div class="services"></div></div>');
                $tabs.find('div.vc_tta-panel').each(function(index){
                    var $div = $('<div class="serv-description"></div>')
                    $div.append( $(this).html() );
                    $tab_contents.find('.services').append( $div );
                });

                $tabs.html('<div class="uk-grid uk-flex uk-flex-middle"></div>');
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