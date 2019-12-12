String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g, '');};

var wp_ajax_delay = true;

jQuery(function(){
	
	if( jQuery('.widgets-holder-wrap').length > 0 ){
		jQuery('.themeton_wpcolorpicker').wpColorPicker();
		jQuery('body').ajaxSuccess(function(evt, request, settings) {

			if( wp_ajax_delay ){
				wp_ajax_delay = false;
				jQuery('.wp-picker-container').each(function(){
					var $this = jQuery(this);
					var $input = $this.find('.themeton_wpcolorpicker').clone();
					$input.attr('style', '');
					$input.removeClass('wp-color-picker');
					$this.replaceWith( $input );
				});
				jQuery('.themeton_wpcolorpicker').wpColorPicker();

				setInterval(function(){ wp_ajax_delay = true; },3000);
			}
			
		});
	}

	/* Set value of select
	====================================*/
	jQuery('select.blox_select').each(function(){
		var data = jQuery(this).attr('data') + '';
		data = data!='undefined' ? data : '';
		jQuery(this).val(data);
		jQuery(this).change();

		if( data=='' ){
			jQuery(this).find('option').eq(0).attr('selected', 'selected');
			jQuery(this).change();
		}
	});
	
});

(function($){
	'use strict';
})(jQuery);