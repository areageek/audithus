(function($){
    'use strict';

    $(document).ready(function(){

		var $container = $('.faq_container');
		$container.isotope({
			filter: '*',
			layoutMode : 'vertical',
			animationOptions: {
		    	duration: 750,
		    	easing: 'linear',
		    	queue: false,
			}
		});
			
		$('#faq-filter a').on('click', function(){
			var selector = $(this).attr('data-filter');
			if( selector=='*' ){
				$('#faq_container').find('.faq_container').find('.search-result-item').each(function(){
					$(this).remove();
				});
			}
		    $container.isotope({ 
				filter: selector,
				animationOptions: {
		    		duration: 750,
		    		easing: 'linear',
		    		queue: false,
				}
			});
			return false;
		});

		$('#faq_container').each(function(){

			var _filter_area = $(this).find('#faq-filter');

			_filter_area.find('ul li a').on('click', function(){
	            var $filter = $(this);
	            var filter = $filter.attr('data-filter');

	            _filter_area.find('ul li a').removeClass('active');
	            $filter.addClass('active');

	        });
		});


		$('.form-faq-search').each(function(){
			var _form = $(this);
			_form.on('submit', function(){
				var _search = _form.find('.search-input-field').eq(0).val();
				_form.find('.search-input-field').eq(0).blur();

				$('#faq-filter').find('a.active').removeClass('active');

				if( _search!='' ){
					$('#the_loader').removeClass('loaded').show();
				}
				if (typeof theme_options !== 'undefined') {
					$.post(theme_options.ajax_url, { action:'faq_search_form', search:_search, params:_form.find('.faq-form-data').eq(0).text() }, function(response){
						try{
							$('#faq_container').find('.faq_container').find('.search-result-item').each(function(){
								$(this).remove();
							});

							var _json = $.parseJSON(response);
							if( _json.result.length ){
								$.each(_json.result, function(_index, _item){
									$('#faq_container').find('.faq_container').append( $(_item) );
								});

								$('#faq_container').find('.faq_container').isotope( 'reloadItems' ).isotope({
									filter: '.search-result-item',
									animationOptions: {
							    		duration: 750,
							    		easing: 'linear',
							    		queue: false,
									}
								});
							}
						}
						catch(e){

						}

						$('#the_loader').addClass('loaded').hide();
					});
				}
				return false;
			});
		});

	});

}(jQuery));