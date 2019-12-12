(function($){
    'use strict';
    $(document).ready(function(){
    	if($('#single_review_form').length) {
        	var _form = $('#respond').html();
	        $('#respond').remove();
	        $('#single_review_form').append('<div id="respond">'+_form+'</div>');
	        $('.woocommerce-review-link').on('click',function(){
	            $('#single_review_form').css('display','block');
	        });
	    }
    });
}(jQuery));