(function($){
	'use strict';
	
	$('.mungu_sortable_ul li').click(function() {
		$('.mungu_sortable_ul li').removeClass('active');
		$(this).addClass('active');
		var _id = $(this).attr('data-filter');

		$('.vc_ui-template[data-category]').each(function(){
			if (_id == 'all') {
				$(this).removeClass('vc-mungu-none');
			}
			else {
				if ($(this).attr('data-category')!=_id) $(this).addClass('vc-mungu-none');
				else $(this).removeClass('vc-mungu-none');
			}
		});
	});

})(jQuery);