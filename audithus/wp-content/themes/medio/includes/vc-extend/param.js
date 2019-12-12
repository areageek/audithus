(function($){
	"use strict";
	$('.tt_select_prev').on('click',function(){
		$('#tt_prev_field').val($(this).val());
		var len = $('.tt_select_prev').length;
		for (var i=0; i<len; i++)
		$('.tt_select_prev_item').eq(i).removeClass('active');
		$(this).parent().parent().addClass('active');
	});
})(jQuery);