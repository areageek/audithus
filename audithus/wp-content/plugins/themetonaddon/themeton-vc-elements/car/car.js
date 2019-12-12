(function($){
    'use strict';

    $(document).ready(function(){
        $('#car-ajax-btn').on('click',function(){
            var _min = $('#range-slider-with-tooltip input[type=hidden]').eq(0).val();
            var _max = $('#range-slider-with-tooltip input[type=hidden]').eq(1).val();
            var _mins = $('#range-slider-with-tooltip1 input[type=hidden]').eq(0).val();
            var _maxs = $('#range-slider-with-tooltip1 input[type=hidden]').eq(1).val();
            var cat_id = '';
            $('input[data-cat-id]').each(function(){
                if ($(this).is(':checked')) {
                    cat_id = cat_id + $(this).attr('data-cat-id') + ',';
                }
            });
            var tag_id = '';
            $('input[data-tag-id]').each(function(){
                if ($(this).is(':checked')) {
                    tag_id = tag_id + $(this).attr('data-tag-id') + ',';
                }
            });
            if (typeof theme_options !== 'undefined') {
                $.post(theme_options.ajax_url, { 
                    action:'mungu_carrental',
                    min_price:_min,
                    max_price:_max,
                    min_seats:_mins,
                    max_seats:_maxs,
                    cat_ids: cat_id,
                    tag_ids: tag_id,
                    }, 
                    function(response){
                        $('.car-ajax').html(response);
                        try{
                        }
                        catch(e){}
                    }
                );
            }
        });

        $('#real-ajax-btn').on('click',function(){
            var _min = $('#range-slider-with-tooltip input[type=hidden]').eq(0).val();
            var _max = $('#range-slider-with-tooltip input[type=hidden]').eq(1).val();
            var _mins = $('#range-slider-with-tooltip1 input[type=hidden]').eq(0).val();
            var _maxs = $('#range-slider-with-tooltip1 input[type=hidden]').eq(1).val();
            var _bed = $('.real_bedroom').val();
            var _bath = $('.real_bathroom').val();
            var _type = $('.real_rent_type').val();
            var _layout = $('.realstate-widget').attr('data-layout');
            var _post_count = $('.realstate-widget').attr('data-page-count');
            $.post(theme_options.ajax_url, { 
                action:'mungu_realstate',
                rent_type:_type,
                min_price:_min,
                max_price:_max,
                min_floor:_mins,
                max_floor:_maxs,
                bedroom:_bed,
                bathroom:_bath,
                layout:_layout,
                post_count:_post_count,
                }, 
                function(response){
                    $('.car-ajax').html(response);
                    try{
                    }
                    catch(e){}
                }
            );
        });

    });
}(jQuery));