(function($){
    'use strict';
	$(document).ready(function(){
		if (typeof theme_options !== 'undefined') {
			$.post(theme_options.ajax_url, {
				action:'get_gym',
				data:$.parseJSON($('#gym_data').text()),
				gym_type:$('.themeton-fitnes-drop').val()
				}, 
			function(response){
				$('.schedule').find('.fitness-column').html(response);
				try{
				}
				catch(e){}
			});
		}
		if (typeof theme_options !== 'undefined') {
			$('.dropdown').change(function(){
				$.post(theme_options.ajax_url, {
					action:'get_gym',
					data:$.parseJSON($('#gym_data').text()),
					gym_type:$('.themeton-fitnes-drop').val()
					}, 
				function(response){
					$('.schedule').find('.fitness-column').html(response);
					try{}
					catch(e){}
				});
			});
		}
	});
}(jQuery));