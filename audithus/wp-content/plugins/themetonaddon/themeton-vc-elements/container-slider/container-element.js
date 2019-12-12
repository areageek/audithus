(function($){
	'use strict';
    $(document).ready(function(){
		$(".carousel-anything-container").each(function() {
			$(this).find('> .vc_row-full-width').remove();
				var $this = $(this),
				_arrow = $this.data('navigation'),
				_bullets = $this.data('thumbnails');
			$(this).owlCarousel({
				items : $(this).attr('data-items'),
				itemsDesktop : [1199, $(this).attr('data-items')],
				itemsDesktopSmall : [979, $(this).attr('data-items-small')],
				itemsTablet : [768, $(this).attr('data-items-tablet')],
				itemsMobile : [479, $(this).attr('data-items-mobile')],
				scrollPerPage : $(this).attr('data-scroll_per_page') === 'true' ? true : false,
				smartSpeed: $(this).attr('data-speed-rewind'),
				autoplay:$(this).attr('data-autoplay') === 'false' ? false : $(this).attr('data-autoplay'),
				autoplayTimeout:5000,
				autoplayHoverPause:true,
				//autoHeight: true,
				margin: 30,
				nav: _arrow,	
				loop: true,
				dots: true,
				pagination: _bullets,
				navText : ["<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAMCAYAAACX8hZLAAAAu0lEQVQ4jbXSsREBURDG8R8uI3CJEZpTghZOCaQySqAEWrgSKIFURgm0oAXBezdjDAJ3981s8N7u7P/tt681HIxUUIoch19F7SoETLDHLcIagZTKcIzArCnIHBvMcMG6CcgDO4xxxdaLhUm8mPzZPH073zEVJtoKFhZtHzysQY8YkCWCn/8qF15bKhUmWEbICkVSAfCudYxU2M8ugtQF2cfmJ+GXXV+TdU6yQvEp0el1+1Ualwte4Pyt6AlCbR/8M1k/PwAAAABJRU5ErkJggg=='>"
				,"<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAMCAYAAACX8hZLAAAAu0lEQVQ4jbXSsREBURDG8R8uI3CJEZpTghZOCaQySqAEWrgSKIFURgm0oAXBezdjDAJ3981s8N7u7P/tt681HIxUUIoch19F7SoETLDHLcIagZTKcIzArCnIHBvMcMG6CcgDO4xxxdaLhUm8mPzZPH073zEVJtoKFhZtHzysQY8YkCWCn/8qF15bKhUmWEbICkVSAfCudYxU2M8ugtQF2cfmJ+GXXV+TdU6yQvEp0el1+1Ualwte4Pyt6AlCbR/8M1k/PwAAAABJRU5ErkJggg=='>"],
				
				// This fixes the height issues
				afterInit: function(){
					setTimeout( function(){
						$this.data('owlCarousel').updateVars(); 
					}, 500);   
				},

			});
	
		});
	
	}); 

}(jQuery));