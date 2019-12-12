(function($){
	'use strict';

	$(document).ready(function(){

	});

	$(window).load(function(){


		// masonry layout
		$('.mungu-card-masonry').each(function(){
			var _masonry = $(this);
			var _col_width = _masonry.data('col-width') + '';

			_masonry.isotope({
				itemSelector: '.masonry-item',
				masonry: {
                    columnWidth: 1
                }
			});

            /*_masonry.find('.fs-post-filter a').on('click', function(){
                var filter = $(this).data('filter');
                _masonry.isotope({ filter: filter });

                _masonry.find('.fs-post-filter li').removeClass('active');
                $(this).parent().addClass('active');
            });*/

		});



	});

})(jQuery);