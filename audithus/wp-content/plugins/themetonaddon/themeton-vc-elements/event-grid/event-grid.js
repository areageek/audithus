(function($){
    'use strict';

    $(document).ready(function(){
		$("#owl-demo").owlCarousel({
			items : 4, //10 items above 1000px browser width
			itemsDesktop : [1000,4], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,3], // betweem 900px and 601px
			itemsTablet: [600,2], //2 items between 600 and 0;
			itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		});
       	$('.masonry-events').isotope({
			itemSelector: '.event_content',
			percentPosition: true,
			masonry: {
			    // use outer width of grid-sizer for columnWidth
			    columnWidth: '.grid-sizer'
			}
		});

    	$('.sermons-list').find('.thumb').each(function(){
    		var _this = $(this);
    		var url = _this.attr('data-src');
    		_this.css({
		      "background-image": 'url(' + url + ')',
		      "background-size":"cover"
		    });
    	});

    	$('.sermons-grid').find('.thumb').each(function(){
    		var _this = $(this);
    		var url = _this.attr('data-src');
    		_this.css({
		      "background-image": 'url(' + url + ')',
		      "background-size":"cover"
		    });
    	});
    });

}(jQuery));